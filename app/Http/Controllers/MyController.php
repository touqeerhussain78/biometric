<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use PHPUnit\Framework\Constraint\Count;
use Session;
use App\Models\Courses;
use App\Models\CourseObjective;
use App\Models\PaymentLog;
use App\Models\Webinar;
use App\Models\Announcment;
use App\Models\UserAnnouncment;
use App\Models\CourseMedia;
use App\Models\Blog;
use App\Models\EnrollmentQuestion;
use App\Models\Feedback;
use App\Models\HandOnExperience;
use App\Models\UserEnroll;
use Carbon\Carbon;
use DB;
use App\Notifications\CourseNotification;
use App\Notifications\WebinarNotification;
use App\Notifications\BlogNotification;
use App\Notifications\MediaNotification;
use Notification;

class MyController extends Controller
{
    public function my_login(){
        if(Auth::check())
        {
            $users = User::count();
            $course_enroll = UserEnroll::distinct()->count('course_id');
            $payment = PaymentLog::sum('cost');
            $payments_log = PaymentLog::with('user_enroll.user', 'user_enroll.course')->get();
            $month =  PaymentLog::whereMonth('created_at', Carbon::now()->month)->first();
            $month_sum =  PaymentLog::whereMonth('created_at', Carbon::now()->month)->sum('cost');
            $data = [];
            $data['label'][] = Carbon::parse($month->created_at)->format('M');
            $data['data'][] = (int) $month_sum;
            $data = [
                'users' => $users,
                'course_enroll' => $course_enroll,
                'payment' => $payment,
                'payments_log' => $payments_log,
                'chart_data' => json_encode($data)
            ];

            return view('admin.dashboard')->with($data);
        }else{
            return view('login');
        }
    }

    public function dashboard() {

        
        
        $year = request('year', date('Y'));
        $from = $year . '-01-01 00:00:00';
        $to = $year . '-12-31 00:00:00';
           
        $revenue = PaymentLog::whereMonth('created_at', Carbon::now()->month)->sum('cost');
        $revenue_per_year = PaymentLog::whereYear('created_at', Carbon::now()->year)->sum('cost');
        
        $month =  PaymentLog::whereYear('created_at', Carbon::now()->year)->first();
        $month_sum =  PaymentLog::whereYear('created_at', Carbon::now()->year)->sum('cost'); 
        $data = [];
        $data['label'][] = Carbon::parse($month->created_at)->format('Y');
        $data['data'][] = (int) $month_sum;
        
        // foreach ($month as $row) {
            // $record = PaymentLog::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            // ->where('created_at' , Carbon::now()->month)
            // ->groupBy('created_at ', 'month')
            // ->orderBy('day')
            // ->get();
        // }
        //     return
        //  $data['chart_data'] = json_encode($data);

        $users = User::count();
        $course_enroll = UserEnroll::distinct()->count('course_id');
        $payment = PaymentLog::sum('cost');
        $payments_log = PaymentLog::with('user_enroll.user', 'user_enroll.course')->get();
        $data = [
            'users' => $users,
            'course_enroll' => $course_enroll,
            'payment' => $payment,
            'payments_log' => $payments_log,
            'chart_data' => json_encode($data)
        ];

        return view('admin.dashboard')->with($data);
    }

    public function getYearlyBased(Request $request)
    {


        // return $request->year;



        if (isset($request->year)) {

            $year =  PaymentLog::whereYear('created_at', $request->year)->first();
            $year_sum =  PaymentLog::whereYear('created_at', $request->year)->sum('cost');
            // return response()->json($year);
            if(isset($year) ) {
                $data = [];
                $data['label'][] = Carbon::parse($year->created_at)->format('Y');
                $data['data'][] = (int) $year_sum;
                return response()->json(['success' => 1, 'chart_data' => $data]);
            }else{
                $data = [];
                $data['label'][] = Carbon::parse($request->year)->format('Y');
                $data['data'][] = (int) 0;

                return response()->json(['success' => 1, 'chart_data' => $data]);
            }
        } else {
            return response()->json(['success' => 0, 'chart_data' => 'no data found']);
        }
      

        // foreach ($valuation_request_s as $key => $value) {
        //     $valuation_request_mcount[(int)$key] = count($value);
        // }

        // for ($i = 1; $i <= 12; $i++) {
        //     if (!empty($valuation_request_mcount[$i])) {
        //         $valuation_request_Counts[$i] = $valuation_request_mcount[$i];
        //     } else {
        //         $valuation_request_Counts[$i] = 0;
        //     }
        // }

        // $valuation_request_Counts = array_values($valuation_request_Counts);

        // return response()->json(['success' => 1, 'valuation_request_Counts' => $valuation_request_Counts]);
    }

    public function  dashboard_payment_filter(Request $request)
    {

        $users = User::count();
        $course_enroll = UserEnroll::distinct()->count('course_id');
        $payment = PaymentLog::sum('cost');
        $course_enroll = UserEnroll::distinct()->get(['course_id'])->count();
        $month =  PaymentLog::whereMonth('created_at', Carbon::now()->month)->first();
        $month_sum =  PaymentLog::whereMonth('created_at', Carbon::now()->month)->sum('cost');
        $data = [];
        $data['label'][] = Carbon::parse($month->created_at)->format('M');
        $data['data'][] = (int) $month_sum;
        // $total_user_enroll = UserEnroll::distinct()->get(['user_id'])->count();
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $data = array(
            'users' => $users,
            'course_enroll' => $course_enroll,
            'payment' => $payment,
            'course_enroll' => $course_enroll,
            'chart_data'    => json_encode($data)
            // 'total_user_enroll' => $total_user_enroll,
        );
        $payment_filter = PaymentLog::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.dashboard', compact('payment_filter', $payment_filter))->with($data);
    }

    public function password_recovery() {
        return view('admin.password-recovery');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function edit_profile()
    {
        return view('admin.edit_profile');
    }

    public function change_password()
    {
        return view('admin.change_password');
    }

    public function course_add()
    {
        return view('admin.course_add');
    }

    public function go_live()
    {
        return view('admin.go_live');
    }

    public function start_live()
    {
        return view('admin.start_live');
    }



    

    public function webinar_add()
    {
        return view('admin.webinar_add');
    }

    // public function blogs()
    // {
    //     return view('admin.blogs');
    // }



    // public function blog_edit()
    // {
    //     return view('admin.blog_edit');
    // }

    // public function blog_details()
    // {
    //     return view('admin.blog_details');
    // }

    public function content_management()
    {
        return view('admin.content_management');
    }

    public function home_edit()
    {
        return view('admin.home_edit');
    }

    public function about_edit()
    {
        return view('admin.about_edit');
    }

    public function portfolio_edit()
    {
        return view('admin.portfolio_edit');
    }

   

    public function forget_password(Request $request) 
    {
        $email=$request->email;
        $user_check = User::where('email', $email)->get();
        if($user_check->count() > 0 )
        {
            
            $code = rand(100, 1000);
            $user = User::where('email',$email)->first();
            $user->code = $code;
            $user->save();
            if($user){
                $user_email = $request->email;
                $message = 'Verification Code is  '.$code ;
                try {
                    $link = "<a href='http://127.0.0.1:8000/verification_code/$email'>Link</a>";
                    Mail::raw("Verification Code is " . $code. "And The Link Is " .$link, function ($message) use($user_email,$code) {
                        $message->to($user_email)
                            ->subject('Verification Code')->from('richardsteve979@gmail.com');
                    });
                } catch (\Exception $e) {
                }   
                return redirect()->route('verification_code',['email' =>$email]);
            }
        }else {
            return "no user found";
        }

    }

    public function verification_code($asd)
    {

        return view('admin.verification_code');
    }


    public function verifying_password (Request $request){

        $code  = $request->code;
         $email  = $request->email;
        $user_check = User::where('code',$code)->where('email', $email)->first();
        if (isset($user_check)) {
                return redirect()->route('update_password',['email' => $email]);
        }else{
            return 'wrong code';
        }
    }

    public function update_password($email)
    {
        
        $my_email= $email;

        return view('admin.update_password');
    }

    public function updating_password (Request $request){

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $password = $request->password;
        $email = $request->email;

        $user_check =  User::where('email',$email)->first();
        if ($user_check->count() > 0) {

            $user =  User::where('email', $email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login'); 
        
        }

    }

    public function update_profile (Request $request){
     
        // $request->validate([
        //     'my_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

       

        $user_id = Auth::user()->id;
        $user_check =  User::where('id', $user_id)->first();
        if ($user_check->count() > 0) {

            $user_check->first_name = $request->first_name;
            $user_check->last_name  = $request->last_name;
            if ($request->hasFile('my_image')) {
                $image = $request->file('my_image');
                //  print_r($image);
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/images');
                $image->move($destinationPath, $image_name);

                // $imageName      = time() . '.' . $request->image;
                // $request->image->move(public_path('images'), $imageName);
                $user_check->image      = $image_name;
            }
            $user_check->save();

            Session::flash('message', 'Profile Update Successfully!');
            Session::flash('alert-class', 'alert-info');
            return redirect()->back();


        }
    }

    public function password_update(Request $request) {

        // $request->validate([
        //     'current_password' => ['required', new MatchOldPassword],
        //     'new_password' => ['required'],
        //     'new_confirm_password' => ['same:new_password'],
        // ]);
        $this->validate($request, [

            'current_password' => 'required',
            'new_password' => 'required|min:6',
            // 'new_confirm_password' => 'required|same:password|min:6'
        ]);

        $data = $request->all();
            $user = User::where('id',Auth::user()->id)->first();
        if (!Hash::check($data['current_password'], $user->password)) {
            Session::flash('message', 'The specified password does not match the database password');
            Session::flash('alert-class', 'alert-danger');    
            return redirect()->back();
        } else {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
            Session::flash('message', 'Password Update Successfully!');
            Session::flash('alert-class', 'alert-info');    
            return redirect()->back();
        }

    }


    public function users()
    {
        $users  = User::get();
        return view('admin.users',compact('users',$users));
    }

  

    


    public function user_filter(Request $request){

       
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_filter = User::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();
        return view('admin.users',compact('user_filter',$user_filter));
    }

    

    public function user_detail($id)
    {

        $user_record = User::where('id',$id)->first();
        // $payment_log= PaymentLog::with('user_enroll.course.payment')->where('id', $id)->get();
        $payment_log =  PaymentLog::with(['course.course_enroll.user' => function ($q) use ($id) {
            $q->where('id', $id);
        }])->get();
        return view('admin.user_detail',compact('user_record',$user_record, 'payment_log', $payment_log));
    }

    public function user_edit_single($id)
    {

        $user_record = User::where('id', $id)->first();
        return view('admin.user_edit_single', compact('user_record'));
    }

    public function update_profile_user(Request $request)
    {

        $request->validate([
            'my_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $user_id = $request->id;
        $user_check =  User::where('id', $user_id)->first();
        if ($user_check->count() > 0) {

            $user_check->first_name = $request->first_name;
            $user_check->last_name  = $request->last_name;
            if ($request->hasFile('my_image')) {
                $image = $request->file('my_image');
                //  print_r($image);
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/images');
                $image->move($destinationPath, $image_name);

                // $imageName      = time() . '.' . $request->image;
                // $request->image->move(public_path('images'), $imageName);
                $user_check->image      = $image_name;
            }
            $user_check->save();

            Session::flash('message', 'Profile Update Successfully!');
            Session::flash('alert-class', 'alert-info');
            return redirect()->back();
        }
    }

    public function user_edit($id)
    {
        $user_record = User::where('id', $id)->first();
        return view('admin.user_edit', compact('user_record', $user_record));
    }

    public function user_edit_profile(Request $request)
    {

        $request->validate([
            'my_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $user_id = $request->id;
        $user_check =  User::where('id', $user_id)->first();
        if ($user_check->count() > 0) {

            $user_check->first_name = $request->first_name;
            $user_check->last_name  = $request->last_name;
            if ($request->hasFile('my_image')) {
                $image = $request->file('my_image');
                //  print_r($image);
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/images');
                $image->move($destinationPath, $image_name);

                // $imageName      = time() . '.' . $request->image;
                // $request->image->move(public_path('images'), $imageName);
                $user_check->image      = $image_name;
            }
            $user_check->save();

            Session::flash('message', 'Profile Update Successfully!');
            Session::flash('alert-class', 'alert-info');
            return redirect()->back();
        }
    }

    public function payment_log_filter(Request $request)
    {

        $id=$request->id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_record = User::where('id', $id)->first();
        
        $payment_log_filter =  PaymentLog::with(['course.course_enroll.user'=>function($q) use($id){
            $q->where('id',$id);
        }])
                                ->whereDate('created_at', '>=', $start_date)
                                ->whereDate('created_at', '<=', $end_date)
                                ->get();
        // $payment_log_filter = PaymentLog::with(['user_enroll.course.payment'=>function($q) use($start_date,$end_date){
        //     $q->whereDate('created_at', '>=', $start_date);
        //     $q->whereDate('created_at', '<=', $end_date);
        // }])->get();
        return view('admin.user_detail', compact('payment_log_filter', $payment_log_filter, 'user_record', $user_record));
    }


    
    
    public function courses()
    {
        
        $courses  = Courses::get();
        return view('admin.courses', compact('courses', $courses));
    }

    public function course_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $course_filter = Courses::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.courses', compact('course_filter', $course_filter));
    }


    public function course_store(Request $request){
        // return $request->all();
        $request->validate([
            'my_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $course         = new Courses;
        $course->title = $request->title;
        $course->cost = $request->cost;
        $course->status = $request->status;
        $course->slots = $request->slots;
        $course->description = $request->description;
        $course->summary = $request->summary;
        $course->enrollment_from = $request->enrollment_from;
        $course->enrollment_to = $request->enrollment_to;
        

        if ($request->hasFile('my_image')) {
            $image = $request->file('my_image');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/images');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $course->course_image      = $image_name;
        }
        $course->save();

        if($course){

            if(isset($request->course_objective)) {
                foreach(array_filter($request->course_objective) as $key=>$item) {

                    $data = array(
                        'title' => $item,
                        'course_id' => $course->id,  
                    );
                 
                    CourseObjective::insert($data);
                }
            }

            if (isset($request->question)) {
                foreach (array_filter($request->question) as $key => $item) {

                    $data = array(
                        'question' => $item,
                        'course_id' => $course->id,
                    );

                    EnrollmentQuestion::insert($data);
                }
            }
            $id = Auth::user()->id;
            $user = User::where('id',$id)->first();
            $user->notify(new CourseNotification($course));


            // Notification::send($course, new CourseNotification($request));
        }


        Session::flash('message', 'Course Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('courses'); 
    }

    public function course_detail($id)
    {
        
        $course_record = Courses::with('course_enroll.user','course_objective','question')->where('id',$id)->first();        
        $course_media = CourseMedia::where('course_id',$id)->get();
        $data = array(
            'id' => $id
        );
        return view('admin.course_detail',compact('course_record',$course_record, 'course_media', $course_media))->with($data);
    }

    public function course_edit($id)
    {
        
        $course_record = Courses::with('question','course_objective')->where('id', $id)->first();        
        return view('admin.course_edit',compact('course_record',$course_record));
    }

    public function course_update(Request $request,$id) {

        $course_record = Courses::where('id', $id)->first();
        $course_record->title = $request->title;
        $course_record->cost = $request->cost;
        $course_record->status = $request->status;
        $course_record->slots = $request->slots;
        $course_record->description = $request->description;
        $course_record->summary = $request->summary;
        $course_record->enrollment_from = $request->enrollment_from;
        $course_record->enrollment_to = $request->enrollment_to;

        if ($request->hasFile('my_image')) {
            $image = $request->file('my_image');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/images');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $course_record->course_image      = $image_name;
        }
        $course_record->save();
        if ($course_record) {

            if (isset($request->course_objective)) {
                foreach (array_filter($request->course_objective) as $key => $item) {

                    $data = array(
                        'title' => $item,
                        'course_id' => $course_record->id,
                    );

                    CourseObjective::insert($data);
                }
            }

            if (isset($request->question)) {
                foreach (array_filter($request->question) as $key => $item) {

                    $data = array(
                        'question' => $item,
                        'course_id' => $course_record->id,
                    );

                    EnrollmentQuestion::insert($data);
                }
            }
        }
        Session::flash('message', 'Course Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('courses'); 
        // return view('admin.course_edit', compact('course_record', $course_record));
    }


    public function webinar_store(Request $request)
    {

        // $request->validate([
        //     'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|required'
        // ]);

        $webinar         = new Webinar;
        $webinar->title = $request->title;
        $webinar->description = $request->description;
        $webinar->charges = $request->charges;

        if ($request->hasFile('video')) {
            $image = $request->file('video');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/webinar/video');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $webinar->video      = $image_name;
        }
        $webinar->save();
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $user->notify(new WebinarNotification($webinar));

        Session::flash('message', 'Webinar Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('webinars');
    }

    public function webinars()
    {
        $webinars = Webinar::get();
        return view('admin.webinars',compact('webinars',$webinars));
    }


    public function webinar_edit($id)
    {
        
        $webinar_edit = Webinar::where('id', $id)->first();
        return view('admin.webinar_edit', compact('webinar_edit', $webinar_edit));
    }

    public function webinar_details($id)
    {
        
        $webinar = Webinar::where('id', $id)->first();
        return view('admin.webinar_details',compact('webinar',$webinar));
    }

    public function webinar_update(Request $request, $id)
    {

        $webinar = Webinar::where('id', $id)->first();
        $webinar->title = $request->title;
        $webinar->description = $request->description;
        $webinar->charges = $request->charges;

        if ($request->hasFile('video')) {
            $image = $request->file('video');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/images');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $webinar->video      = $image_name;
        }
        $webinar->save();
        Session::flash('message', 'Webinar Update Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('webinars');
        // return view('admin.course_edit', compact('course_record', $course_record));
    }

    public function webinar_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $webinar_filter = Webinar::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.webinars', compact('webinar_filter', $webinar_filter));
    }

    public function announcments($id)
    {
        $course_id = $id;
        $announcments = Announcment::where('course_id',$id)->get();

        return view('admin.announcment',compact('announcments', $announcments))->with('course_id',$course_id);
    }

    public function announcement_add($id)
    {
        $course_id=$id;
        $users = User::get();
        return view('admin.announcment_add',compact('users',$users))->with('course_id',$course_id);
    }


    public function announcement_store(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'video' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $announcment         = new Announcment;
        $announcment->title = $request->title;
        $announcment->message = $request->message;
        $announcment->type = $request->type;
        $announcment->date = $request->date;
        $announcment->course_id = $request->course_id;
        $announcment->time = $request->time;
        $announcment->save();

        if($announcment)
        {
            foreach($request->user_id as $users){

                $data=array(
                    'announcment_id' => $announcment->id,
                    'user_id' => $users
                );
                UserAnnouncment::insert($data);
            }
        }
        Session::flash('message', 'Announcment Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('announcments',['id'=>$request->course_id]);
    }

    public function announcement_detail($id)
    {
        $announcment_record = Announcment::where('id', $id)->first();
        
        $user_annoumcments = UserAnnouncment::with('user')->where('announcment_id',$id)->get();
        return view('admin.announcment_detail', compact('announcment_record', $announcment_record, 'user_annoumcments', $user_annoumcments));
        // return view('admin.announcment_detail');
    }

    public function announcement_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $course_id = $request->course_id;

        $announcement_filter = Announcment::where('course_id', $course_id)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.announcment', compact('announcement_filter', $announcement_filter))->with('course_id',$course_id);
    }

    public function webinar_delete(Request $request) {

        $webinar_id = $request->id;
        Webinar::where('id',$webinar_id)->delete();
        return response()->json($webinar_id);
    }

    public function user_status(Request $request)
    {

        $user_id = $request->id;
        if($request->status=='0')
        {
            $status = '1';
        }
        if ($request->status == '1') {
            $status = '0';
        }
        $user = User::where('id', $user_id)->first();
        if(isset($user))
        {
            $user->status = $status;
            $user->save();
        }
        return response()->json('Done');
    }

    public function media_add($id)
    {
        $course_id=$id;
        return view('admin.media_add')->with('course_id',$course_id);
    }

    public function media_store(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'video' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $coursemedia         = new CourseMedia;
        $coursemedia->title = $request->title;
        $coursemedia->description = $request->description;
        $coursemedia->type = $request->type;
        $coursemedia->course_id = $request->course_id;
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/course_media');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $coursemedia->media      = $image_name;
        }
        $coursemedia->save();

        
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $user->notify(new MediaNotification($coursemedia));

        Session::flash('message', 'Meida Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('course_detail', ['id' => $request->course_id]);
    }

    public function media_edit($id)
    {
        $media_id = $id;
        $course_media = CourseMedia::where('id', $media_id)->first();
        return view('admin.media_edit', compact('course_media', $course_media))->with('media_id', $media_id);
    }

    public function media_details($id)
    {
        $media_id=$id;
        $course_media = CourseMedia::where('id', $media_id)->first();
        return view('admin.media_details',compact('course_media', $course_media))->with('media_id',$media_id);
    }

    public function media_delete(Request $request)
    {

        $media_id = $request->id;
        CourseMedia::where('id', $media_id)->delete();
        return response()->json($media_id);
    }

    public function media_update(Request $request,$id){

       
        $course_media = CourseMedia::where('id', $id)->first();
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/course_media');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $course_media->media      = $image_name;
        }
        $course_media->save();


        Session::flash('message', 'Meida Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('course_detail', ['id' => $course_media->course_id]);
    }

    public function course_media_filter(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $course_media_filter = CourseMedia::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        $course_record = Courses::with('course_objective')->where('id', $request->course_id)->first();
        
        $data = array(
            'id' => $request->course_id,
            'course_record' => $course_record
        );
        return view('admin.course_detail', compact('course_media_filter', $course_media_filter))->with($data);
    }




    public function blogs()
    {
        $blogs  = Blog::get();
        return view('admin.blogs', compact('blogs', $blogs));
    }

    public function blog_add()
    {
        return view('admin.blog_add');
    }

    public function blog_filter(Request $request)
    {


        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $blog_filter = Blog::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.blogs', compact('blog_filter', $blog_filter));
    }



    public function blog_detail($id)
    {

        $blog_record = Blog::where('id', $id)->first();
        // $payment_log= PaymentLog::with('user_enroll.course.payment')->where('id', $id)->get();
        return view('admin.blog_details', compact('blog_record', $blog_record));
    }

   

    public function blog_save(Request $request)
    {
        // return $request->all();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $blog         = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //  print_r($image);
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/blog');
            $image->move($destinationPath, $image_name);

            // $imageName      = time() . '.' . $request->image;
            // $request->image->move(public_path('images'), $imageName);
            $blog->image      = $image_name;
        }
        $blog->save();

        
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $user->notify(new BlogNotification($blog));

        Session::flash('message', 'Blog Add Successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect()->route('blogs');
    }

    public function blog_edit($id)
    {


        $blog_record = Blog::where('id', $id)->first();
        return view('admin.blog_edit', compact('blog_record'));
    }

    public function blog_edit_update(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $blog_id = $request->id;
        $blog =  Blog::where('id', $blog_id)->first();
        if ($blog->count() > 0) {

            $blog->title = $request->title;
            $blog->description  = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                //  print_r($image);
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                //  echo $image;
                //  exit(0);
                $destinationPath = base_path('public/blog');
                $image->move($destinationPath, $image_name);

                // $imageName      = time() . '.' . $request->image;
                // $request->image->move(public_path('images'), $imageName);
                $blog->image      = $image_name;
            }
            $blog->save();

            Session::flash('message', 'Blog Update Successfully!');
            Session::flash('alert-class', 'alert-info');
            return redirect()->back();
        }
    }


    public function feedbacks()
    {
        $feedbacks  = Feedback::get();
        return view('admin.feedbacks', compact('feedbacks', $feedbacks));
    }


    public function feedback_filter(Request $request)
    {


        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $feedback_filter = Feedback::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.feedbacks', compact('feedback_filter', $feedback_filter));
    }

    public function feedback_detail($id)
    {

        $feedback_detail = Feedback::where('id', $id)->first();
        return view('admin.feedback_details',compact('feedback_detail', $feedback_detail));
    }

    public function feedback_not_found()
    {
        return view('admin.feedback_not_found');
    }

    public function feedback_delete(Request $request)
    {

        $feedback_id = $request->id;
        Feedback::where('id', $feedback_id)->delete();
        return response()->json($feedback_id);
    }
    
    public function hand_on(){

        $hand_on = HandOnExperience::get();
        return view('admin.hand_on',compact('hand_on'));
    }

    public function hand_on_detail($id)
    {
        $hand_on = HandOnExperience::where('id', $id)->first();
        return view('admin.hand_on_details', compact('hand_on', $hand_on));

    }

    public function hand_on_filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $hand_on_filter = HandOnExperience::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.hand_on', compact('hand_on_filter', $hand_on_filter));
    }

    public function payments()
    {

        $total_amount = PaymentLog::sum('cost');
        $total_course_enroll = UserEnroll::distinct()->get(['course_id'])->count();
        $total_user_enroll = UserEnroll::distinct()->get(['user_id'])->count();
        $payments = PaymentLog::with('user_enroll.user', 'user_enroll.course')->get();
        $data=array(
            'total_amount' => $total_amount,
            'total_course_enroll' => $total_course_enroll,
            'total_user_enroll' => $total_user_enroll,
        );
        return view('admin.payments',compact('payments'))->with($data);
    }

    public function  payment_filter(Request $request){

        $total_amount = PaymentLog::sum('cost');
        $total_course_enroll = UserEnroll::distinct()->get(['course_id'])->count();
        $total_user_enroll = UserEnroll::distinct()->get(['user_id'])->count();
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $data = array(
            'total_amount' => $total_amount,
            'total_course_enroll' => $total_course_enroll,
            'total_user_enroll' => $total_user_enroll,
        );
        $payment_filter = PaymentLog::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        return view('admin.payments', compact('payment_filter', $payment_filter))->with($data);
    }

    public function course_objective_delete ($id){
        
        CourseObjective::where('id',$id)->delete();
        return redirect()->back();
    }

    public function question_delete($id)
    {
        EnrollmentQuestion::where('id', $id)->delete();
        return redirect()->back();
    }

    // public function  payment_filter_month(Request $request)
    // {

    //     $month = date("m", (int)$request->month);

    //     $total_amount = PaymentLog::sum('cost');
    //     $total_course_enroll = UserEnroll::distinct()->get(['course_id'])->count();
    //     $total_user_enroll = UserEnroll::distinct()->get(['user_id'])->count();
    //     $month = $request->month;
    //     $data = array(
    //         'total_amount' => $total_amount,
    //         'total_course_enroll' => $total_course_enroll,
    //         'total_user_enroll' => $total_user_enroll,
    //     );




    //     // $payment_filter = PaymentLog::
    //     //     whereMonth('created_at',  $month)
    //     //     ->get();
    //     $payment_filter =    DB::table('payment_logs')->whereMonth('created_at',  $month)
    //     ->get();

    //     return view('admin.payments', compact('payment_filter', $payment_filter))->with($data);
    // }
}
