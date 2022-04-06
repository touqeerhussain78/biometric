<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;

//
use Mail;
use Hash;
use Carbon\Carbon;
use App\Mail\ForgotCode;
use App\Mail\ContactUs;

//Libraries
use App\Http\Controllers\Api\BaseController;
use App\Models\Feedback;
use App\Models\Packages;
use App\Models\Payment;
use App\Models\UserCourseEnrollment;
use App\Models\UserWebinar;
use Mockery\Undefined;

class AuthController extends BaseController
{
    //
    /**
     * AuthController Login.
     *
     * @param LoginRequest $request
     */

    public function login(Request $request)
    {
    
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (!$user->hasRole($request->role)) { // you can pass an id or slug
                return $this->sendError(__('responseMessages.userWithRoleNotFound', ['role' => $request->role]), false);
            }

            if (Hash::check($request->password, $user->password)) {
                // Indicating user has logged In from temp pass after login

                $token = $user->createToken(env('APP_NAME'))->accessToken;  
                $user['token'] = $token;
                $user['role']  = $user->getRoles()[0]->slug;
                if (!is_null($user) && $user) {
                return $this->sendResponse($user, __('responseMessages.loggedIn'));
            }
            }


            return $this->sendError(__('responseMessages.incorrectPassword'), false);
        }

        return $this->sendError(__('responseMessages.userNotFound'), false);
    }

    public function logout(Request $request)
    {
        if (true) {
            $user = $request->user();

            $user->token()->revoke();

            return $this->sendResponse(true, __('responseMessages.loggedOut'));
        }

        return $this->sendError(__('responseMessages.errorLogout'), false);
    }

    /**
     * AuthController sendForgotCode.
     *
     * @param Request $request
     */
    public function sendForgotCode(Request $request)
    {
        //dd($request->email);
        $request->validate(['email'=>'required'],
        [
            'email.required' => 'Email is required!',
        ]);
        if (User::where('email', $request->email)->count() > 0) {
            $request['code'] = $this->generatePIN(4);
            $user = User::where('email', $request->email)->update([
                'code' => $request['code']
            ]);
            Mail::to($request['email'])->send(new ForgotCode($request));
            return $this->sendResponse(true, __('responseMessages.sendForgotCode'));
        }
        else{
            return response()->json(['message'=>'Email Not Found!...','status'=>401]);
        }

          
    }

    /**
     * AuthController verifiedForgotCode.
     *
     * @param Request $request
     */
    public function verifiedForgotCode(Request $request)
    {
        $request->validate(['code'=>'required'],
        [
            'code.required' => 'Code is required!',
        ]);
        $user = User::where('code', $request->code)->first();
        if (!empty($user)) {
            return $this->sendResponse($user->id, __('responseMessages.verifiedForgotCode'));
        }
        return response()->json(['message'=>'Verification Code Not Matched!...',401]);
    }

    public function forgotPasswordChange(Request $request)
    {
       // dd($request->all());
        $password  = Hash::make($request->password);
        $user = User::where('email', $request->email)->update([
            'password' => $password,
            'code' => ''
        ]);

        return $this->sendResponse(true, __('responseMessages.passwordChanged'));
    }

//    public function AdminProfile(Request $request)
//    {
//        $user_profile_update = $this->user->profileUpdate($request);
//
//        if($user_profile_update){
//           return $this->sendResponse(true, __('responseMessages.profileEdited'));
//        }
//        return $this->sendError(__('responseMessages.errorEditingProfile'), false);
//    }

    /**
     * AuthController changePassword.
     *
     * @param ChangePasswordRquest $request
     */

    public function changePassword(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'password_confirmation'=>'required_with:password:same:password'
        ]);
        //dd($request->all());
        if (Hash::check($request->password,$request->user()->password)) {
            $user_updated = $request->user()->update(['password' => Hash::make($request->password)]);
            if ($user_updated) {
                return $this->sendResponse($user_updated,__('responseMessages.passwordUpdated'));
            }
          
            return $this->sendError(__('responseMessages.errorUpdatingPassword'), false);
        } else {
            
            return $this->sendError(__('responseMessages.oldPasswordMismatch'), false);
        }
    }

        public function updatePassword(Request $request){

            //dd($request->all());
            $request->validate([
                'password_confirmation'=>'required_with:new_password:same:new_password'
            ]);
            
            if (Hash::check($request->old_password,$request->user()->password)) {
                $user_updated = $request->user()->update(['password' => Hash::make($request->new_password)]);
                if ($user_updated) {
                    return $this->sendResponse($user_updated,__('responseMessages.passwordUpdated'));
                }
                return $this->sendError(__('responseMessages.errorUpdatingPassword'), false);
            } else {
                return $this->sendError(__('responseMessages.oldPasswordMismatch'), false);
            }
        }

        public function changeUserPassword(Request $request){
            //dd($request->all());
            if (Hash::check($request->old_password,$request->user()->password)) {
                $user_updated = $request->user()->update(['password' => Hash::make($request->new_password)]);
                if ($user_updated) {
                    return $this->sendResponse($user_updated,__('responseMessages.passwordUpdated'));
                }
                return $this->sendError(__('responseMessages.errorUpdatingPassword'), false);
            } else {
                return $this->sendError(__('responseMessages.oldPasswordMismatch'), false);
            }
        }
        

    /**
     * AuthController getProfile.
     *
     * @param Request $request
     */
    
    public function getProfile(Request $request)
    {   
        //dd(auth()->user()->id);
        if(auth()->user()->id) {
            return User::whereId(auth()->user()->id)->first();
        }
        else{
            return $this->sendError(('responseMessages.something wrong'),401);    
        }
        return $this->sendResponse(auth()->user(), __('responseMessages.passwordUpdated'));
    }


    public function getUserProfile($courseId){

        if(auth()->user()->id) {
            $coursePayment = false;
            $checkCoursePayment = Payment::where('user_id',auth()->user()->id)
            ->where('course_id',$courseId)->first();
            if($checkCoursePayment){
                $coursePayment = true;
            }
            $course = UserCourseEnrollment::where('course_id',$courseId)
            ->where('user_id',auth()->user()->id)->first();
            if($course){
                $course['course_status'] = true;
            }
             $course['course_payment'] = $coursePayment;
            return $this->sendResponse($course, __('responseMessages.passwordUpdated'));

        }
        else{
            return $this->sendError(('responseMessages.something wrong'),401);    
        }
        return $this->sendResponse(auth()->user(), __('responseMessages.passwordUpdated'));
    }

    public function getLoginUser()
    {
        $user =  UserWebinar::where('user_id',auth()->user()->id)->first();
        return $this->sendResponse($user, __('responseMessages.passwordUpdated')); 
    }

    public function userProfile(Request $request)
    {   
       // dd($request->all());
        $profileUpdated = User::where('id', auth()->user()->id)->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
        ]);

        if($request->image != 'undefined'){
            $image = $this->uploadImage($request->image);
            $profileUpdated = User::where('id', auth()->user()->id)->update([
                'image' => $image,
            ]);
        }
    
        if ($profileUpdated){
            return $this->sendResponse(true, __('responseMessages.profileUpdated'));
        }
        return $this->sendError(__('responseMessages.errorEditingProfile'), false);
   
      }


        public function getPackages(){
        
            return  $packages =  Packages::select('name','name as label','id')->where('status',1)->get();

         }

        public function addUser(Request $request)
        {
            $userCreated = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip_code' => $request->zipcode,
                'password' => bcrypt($request->password)
            ]);
            $role = config('roles.models.role')::where('slug', $request->user)->first();
            $userCreated->attachRole($role);

            if ($userCreated) {
                return $this->sendResponse(true, __('responseMessages.userRegisterSuccessfully'));
            }
            return $this->sendError(__('responseMessages.errorEditingProfile'), false);
        }

    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:users|email',
            'password'   => 'required',
        ]);

        $image = null;
        if($request->image != 'undefined'){
            $image = $this->uploadImage($request->image);
        }
              //return $request->all(); 
              $userCreated = User::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'description'=> $request->description,
                'password'   =>Hash::make($request->password),
                'image'      =>$image
          ]);
        
        
        $role = config('roles.models.role')::where('slug', $request->role)->first();

        $userCreated->attachRole($role);

        if ($userCreated) {
            return $this->sendResponse($userCreated, __('responseMessages.userRegisterSuccessfully'));
        }
        return $this->sendError(__('responseMessages.something went wrong'), false);
    }


    public function courseRegistration(Request $request)
    {
             $request->validate([
                 'first_name'       =>'required',
                 'last_name'        =>'required',
                 'email'            =>'email|unique:users',
                 'phone_number'     =>'digits:11',
                 'age'              =>'digits:2',
                 'courseId'         =>'required'    
             ]);   
               
              $userCreated = User::create([
                'first_name'        => $request->first_name,
                'last_name'         => $request->last_name,
                'email'             => $request->email,
                'age'               => $request->age,
                'phone_number'      => $request->phone_number,
                'interset_in_course'=> $request->courseId,
                'password'   =>Hash::make('asd123'),
          ]);
        
        
        $role = config('roles.models.role')::where('slug', $request->role)->first();

        $userCreated->attachRole($role);

        if ($userCreated) {
            return $this->sendResponse($userCreated, __('responseMessages.courseInterset'));
        }
        return $this->sendError(__('responseMessages.something went wrong'), false);
    }

     public function userStatus($id)
     
     {
        //dd($id);
        $userStatus = User::where('id',$id)->first();
        $status  = $userStatus->block_status;
        $data = User::whereId($id)->update([
            'block_status' => $status == 1 ? 0 : 1
        ]);
        $data = array();
        $data['status'] = ($userStatus->block_status == 1) ? 0 : 1;
        $data['id']     = $id;
        return $this->sendResponse($data, __('responseMessages.userUpdateSuccessfully'));

    }


    public function contactUs(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'surname'    => 'required',
            'email'      => 'required',
            'subject'    => 'required',
            'message'    => 'required',
        ]);
        $contactus = Mail::to('richardsteve979@gmail.com')->send(new ContactUs($request->all()));
        \Log::channel('mysql')->info('User registered by email without verify');
        $data = array(
            'first_name' =>$request->first_name,
            'last_name'  =>$request->surname,
            'email'      =>$request->email,
            'subject'    =>$request->subject,
            'message'    =>$request->message,
        );
        $feedback  = Feedback::create($data);
        if($feedback){
        return response()->json([
            'status' => 'success',
            'message' => 'Contact Form submit successfully',
        ]);

       }
        
    }

}
