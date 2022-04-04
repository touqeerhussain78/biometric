<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;


use App\Http\Controllers\Api\BaseController;
use App\Models\Announcment;
use App\Models\CourseReviewRating;
use App\Models\Payment;
use App\Models\UserCourseEnrollment;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Traits\StripePayment;

class UserController extends BaseController
{
    use StripePayment;

    public function index(Request $request)
    {

        if (request()->filled('search')) {
            $courses = Courses::with('course_enrollment')->where('title', 'like', "%" . request('search') . "%")
                ->orWhere('cost', 'like', "%" . request('search') . "%")
                ->orWhere('status', 'like', "%" . request('search') . "%");
            return $this->sendResponse($courses->paginate($request->entries), __('responseMessages.courseFetch'));
        }
        
        if (request()->filled('status')) {
            $courses = Courses::with('course_enrollment')->where('status', $request->status);
            return $this->sendResponse($courses->paginate($request->entries), __('responseMessages.courseFetch'));
        }

        if (request()->filled('page')) {
            $courses = Courses::with('course_enrollment')->latest('id')->paginate($request->entries);
        } else {
            $courses = Courses::with('course_enrollment')->latest()->paginate($request->entries);
        }

        return $this->sendResponse($courses, __('responseMessages.courseFetch'));
     }

        public function getCourseById($id)
        {
            // $courseStatus  = false;
            // $checkCoursePayment = Payment::where('user_id',auth()->user()->id)
            // ->where('course_id',$id);
            // if($checkCoursePayment){
            //     $courseStatus = true;
            // }
            $course = Courses::with('course_objective')->find($id);
           // $course['course_status'] = $courseStatus;
            return $this->sendResponse($course, __('responseMessages.courseFetch'));
        }

        public function registerAsInterset(Request $request)
        {
            return $request->all();
        }

        public function enrollment(Request $request)
        {

           // return auth()->user()->id;
            $alreadyEnrolled = UserCourseEnrollment::where('user_id',auth()->user()->id)
            ->where('course_id',$request->courseId)->first();
            
            if($alreadyEnrolled){
                return $this->sendError(__('responseMessages.alreadyEnroll'), false);
            }
            //return $request->all();
            if(isset($request->education)){
                $education = $request->education;
                    for($i=0;$i<count($education);$i++){
                        UserEducation::create([
                            'user_id'   =>auth()->user()->id,
                            'institute' =>$education[$i]['institute'],
                            'degree'    =>$education[$i]['degree_title'],
                            'from'      =>$education[$i]['from'],
                            'to'        =>$education[$i]['to']
                        ]);
                    }
            }

            if(isset($request->experience)){
                $experience = $request->experience;
                    for($i=0;$i<count($experience);$i++){
                        UserExperience::create([
                            'user_id'      =>auth()->user()->id,
                            'institute'    =>$experience[$i]['institute'],
                            'designation'  =>$experience[$i]['designation'],
                            'from'         =>$experience[$i]['from'],
                            'to'           =>$experience[$i]['to']
                        ]);
                    }
            }

            if(isset($request->courseId)){
                $course = Courses::find($request->courseId);
                $remeningSlots  = ($course->slots-1);
                Courses::where('id',$request->courseId)->update([
                    'slots' =>$remeningSlots
                ]);

                UserCourseEnrollment::create([
                    'user_id'   =>auth()->user()->id,
                    'course_id' =>$request->courseId
                ]);
            }

            return $this->sendResponse(true, __('responseMessages.courseEnrollment'));

        }

        public function makePayment(Request $request)
        {
           // return $request->all();
             $request->validate([
                 'card_number'  =>'required|digits:16',
                 'date'         =>'required',
                 'cvv'          =>'required|digits:3',
             ]);   
             $amount  = Courses::where('id',$request->courseId)->first('cost');
             $stripePayment  = $this->stripe($request->card_number,$request->date,$request->cvv,$amount->cost);

             if($stripePayment){
                 //return $stripePayment;
                 $coursePayment = Payment::create([
                     'user_id'          =>auth()->user()->id,
                     'course_id'        =>$request->courseId,
                     'card_holder_name' =>$request->card_holder_name,
                     'card_number'      =>$request->card_number,
                     'expiry_date'      =>$request->date,
                     'transaction_id'   =>$stripePayment->id,
                     'payment_method'   =>$stripePayment->payment_method
                 ]);
             }

             return $this->sendResponse($coursePayment, __('responseMessages.paymentMade'));

        }

        public function getCourseDetails($id)
        {

            $checkCoursePayment = Payment::where('user_id',auth()->user()->id)
            ->where('course_id',$id)->first();
            if($checkCoursePayment){
                $course  = Courses::where('id',$id)->with('course_objective','course_media','announcments')->first();
                return $this->sendResponse($course, __('responseMessages.courseFetch'));
            }else{  
                return $this->sendError(__('responseMessages.paymentNotMade'), false);
            }
            
        }

        public function updateAnnoncment(Request $request){

          //  return $request->data;
            $updateAnnocment = Announcment::where('id',$request->data['id'])->update([
                'status' =>$request->data['status']
            ]);

            if($updateAnnocment){
                $course  = Courses::where('id',$request->data['course_id'])->with('course_objective','course_media','announcments')->first();

            }
            return $this->sendResponse($course, __('responseMessages.announcmentChangeStatus'));
  

        }

        public function getUserCourses(Request $request)
        {
            if(request()->filled('search')) {
                $courses = UserCourseEnrollment::with(['course'=>function($query){
                    $query->where('title', 'like', "%" . request('search') . "%")
                    ->orWhere('cost', 'like', "%" . request('search') . "%")
                    ->orWhere('status', 'like', "%" . request('search') . "%");
                }])->where('user_id',auth()->user()->id);
                return $this->sendResponse($courses->paginate($request->entries), __('responseMessages.courseFetch'));
            }
    
            if(request()->filled('status')) {
                $courses = UserCourseEnrollment::with('course')
                ->where('status',$request->status)
                ->where('user_id',auth()->user()->id);
                return $this->sendResponse($courses->paginate($request->entries), __('responseMessages.courseFetch'));
            }
    
            if(request()->filled('page')) {
                $courses = UserCourseEnrollment::with('course')
                ->where('user_id',auth()->user()->id)
                ->latest('id')->paginate($request->entries);
            } else {
                $courses = UserCourseEnrollment::with('course')
                ->where('user_id',auth()->user()->id)
                ->latest()->paginate($request->entries);
            }

            return $this->sendResponse($courses, __('responseMessages.courseFetch'));
        }

        public function viewCourseDetails($id)
        {   
            //return $id;
            $course  = Courses::where('id',$id)->with('course_objective','course_media','announcments')->first();
            return $this->sendResponse($course, __('responseMessages.courseFetch'));
        }

        public function reviewAgainestCourse(Request $request)
        {
             $courseReview  = CourseReviewRating::create([
                 'user_id'    =>auth()->user()->id,
                 'course_id'  =>$request->courseId,
                 'review'     =>$request->review,
                 'rating'     =>$request->rating
             ]);

             return $this->sendResponse($courseReview, __('responseMessages.reviewAgainestCourse'));

        }
}
