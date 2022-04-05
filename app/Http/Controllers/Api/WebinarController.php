<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Webinar;
use App\Models\WebinarPayment;
use App\Traits\StripePayment;

class WebinarController extends BaseController
{
    use StripePayment;
    public function index(Request $request)
    {

        if (request()->filled('search')) {
            $webinars = Webinar::where('title', 'like', "%" . request('search') . "%")
                ->orWhere('description', 'like', "%" . request('search') . "%");
            return $this->sendResponse($webinars->paginate($request->entries), __('responseMessages.webinarFetch'));
        }

        if (request()->filled('page')) {
            $webinars = Webinar::latest('id')->paginate($request->entries);
        } else {
            $webinars = Webinar::latest('id')->paginate($request->entries);
        }

        return $this->sendResponse($webinars, __('responseMessages.webinarFetch'));
     }

     public function makePayment(Request $request)
     {
         //return $request->all();
          $request->validate([
              'card_number'  =>'required|digits:16',
              'expiry_date'  =>'required',
              'cvv'          =>'required|digits:3',
          ]);  
          $amount  = Webinar::where('id',$request->id)->first('charges');
          $stripePayment  = $this->stripe($request->card_number,$request->expiry_date,$request->cvv,$amount->charges);

          if($stripePayment){
              //return $stripePayment;
              $webinarPayment = WebinarPayment::create([
                  'user_id'          =>auth()->user()->id,
                  'webinar_id'       =>$request->id,
                  'card_holder_name' =>$request->card_holder_name,
                  'card_number'      =>$request->card_number,
                  'expiry_date'      =>$request->expiry_date,
                  'transaction_id'   =>$stripePayment->id,
                  'payment_method'   =>$stripePayment->payment_method
              ]);
          }
          
          return $this->sendResponse($webinarPayment, __('responseMessages.webinarPayment'));

     }
}
