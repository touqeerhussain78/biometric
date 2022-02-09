<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;
use App\Notifications\CourseNotification;
use DB;
use Illuminate\Support\Carbon;
class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         DB::table('notifications')->where('notifiable_id', auth()->user()->id)->update(['read_at' => Carbon::now()]);
         $notifications =   DB::table('notifications')->where('notifiable_id', auth()->user()->id)->get();
        // $notifications = Notification::whereNotifiableId(auth()->user()->id)->whereNull('read_at')->get();

        return view('admin.notifications', compact('notifications'));
    }

    public function   markAsRead(Request $request) {
        if ($request->isMethod('POST')) {

            $notification = Notification::whereId($request->id)->update(['read_at' => Carbon::now()]);


            return \response()->json(["message" => "Mark as read successfully."], 200);
        }
    }

    public function single_notification($id) {

        DB::table('notifications')->where('notifiable_id', auth()->user()->id)->update(['read_at' => Carbon::now()]);
        $notifications =   DB::table('notifications')->where('id',$id)->where('notifiable_id', auth()->user()->id)->first();
        return view('admin.single_notification', compact('notifications'));
    }

    // public function notifications()
    // {

    //     $notifications = Notification::whereNotifiableId(auth()->user()->id)->whereNull('read_at')->get();
    //     return view('admin.notifications', compact('notifications'));
    // }
    
   

    // public function index()
    // {
    //     return view('product');
    // }

    public function sendOfferNotification()
    {
        
        $userSchema = User::first();

        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];

        // Notification::send($userSchema, new OffersNotification($offerData));

        dd('Task completed!');
    }
}
