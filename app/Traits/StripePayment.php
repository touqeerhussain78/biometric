<?php

namespace App\Traits;
use Illuminate\Http\booking;
use Session;
use Stripe;
use DB;

trait StripePayment
{
	public function stripe($card_number, $card_expiry, $cvv, $amount)
	{

			$date =  strtotime($card_expiry);
			$month = date("m",$date);
			$year  = date("Y",$date);
			$card   = explode('-', $card_number);

			Stripe\Stripe::setApiKey('sk_test_6mb3q2e2DC5qsrTVlkX82lkQ00RqzFBxvP');
			
			$token = \Stripe\Token::create([
				'card' => [
					'number' 	=> $card[0],
					'exp_month' => $month,
					'exp_year' => $year,
					'cvc'	 => $cvv,
					
				]
			]);
			
			$charge = Stripe\Charge::create ([
				"amount" => $amount *100,
				"currency" => "eur",
				"source" => $token->id,
			      //  "customer" => $customer_id,
			      //  "type" => $type
			]);
			
			return $charge;


			    // return response()->json([
			    //     'status'=>'success',
			    //     'charge_id' => $charge->id,
			    //     'data'	=>	$charge
			    // ], 200);
			
			// } catch(\Stripe_CardError $e) {

			// 	 $error = TRUE;
			// 	 $insertData = [
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	 DB::table('payment_errors')->insert($insertData);
			// 	 return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	} catch (\Stripe_InvalidbookingError $e) {
			// 	 $error = TRUE;
			// 	 $insertData = [
			
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	 DB::table('payment_errors')->insert($insertData);
			// 	 return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	 // Invalid parameters were supplied to Stripe's API
			// 	} catch (\Stripe_AuthenticationError $e) {
			// 	 $error = TRUE;
			// 	 $insertData = [
			
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	DB::table('payment_errors')->insert($insertData);
			// 	return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	 // Authentication with Stripe's API failed
			// 	 // (maybe you changed API keys recently)
			// 	} catch (\Stripe_ApiConnectionError $e) {
			// 	 $error = TRUE;
			// 	 $insertData = [
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	 DB::table('payment_errors')->insert($insertData);
			// 	 return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	 // Network communication with Stripe failed
			// 	} catch (\Stripe_Error $e) {
			// 	 $error = TRUE;
			// 	 $insertData = [
			
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	 DB::table('payment_errors')->insert($insertData);
			// 	 return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	 // Display a very generic error to the user, and maybe send
			// 	 // yourself an email
			// 	} catch (\Exception $e) {
			// 	 $error = TRUE;
			// 	 $insertData = [
			// 	   'error'      => $e,
			// 	   'type' 		=>'stripe'
			// 	 ];
			// 	 DB::table('payment_errors')->insert($insertData);
			// 	 return response()->json([
		 //            'status'=>'error',
		 //            'error'	=>	$e->getMessage()
		 //        ], 422);
			// 	}
			// 	catch (\Exception $e) 
			// 	{
			//         return response()->json([
			//             'status'=>'error',
			//             'error'	=>	$e->getMessage()
			//         ], 422);
		 //        }
			
		}
	}