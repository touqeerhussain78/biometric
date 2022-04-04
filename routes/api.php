<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BlogController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['json.response', 'localization']], function () {

 Route::group(['prefix'=>'auth'],function(){
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::post('contactUs',[AuthController::class, 'contactUs'])->name('contactUs');
    Route::post('register',[AuthController::class, 'register'])->name('register');
    Route::post('courseRegistration',[AuthController::class, 'courseRegistration'])->name('courseRegistration');
    Route::post('send/email',[AuthController::class, 'sendForgotCode'])->name('sendForgotCode');
    Route::post('verify/code',[AuthController::class, 'verifiedForgotCode'])->name('verifiedForgotCode');
    Route::post('new-password',[AuthController::class, 'forgotPasswordChange'])->name('forgotPasswordChange');
    Route::get('getProfile',[AuthController::class, 'getProfile'])->name('getProfile')->middleware('auth:api');
    Route::get('getUserProfile/{id}',[AuthController::class, 'getUserProfile'])->name('getUserProfile')->middleware('auth:api');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth:api');
    Route::post('profile',[AuthController::class, 'AuthControllerProfile'])->name('AuthControllerProfile')->middleware('auth:api');
    Route::get('getGraphData', [AuthController::class, 'getGraphData'])->name('getGraphData')->middleware('auth:api');
    Route::post('AuthControllerChangePassword', [AuthController::class, 'updatePassword'])->name('updatePassword')->middleware('auth:api');
    Route::post('profile/update',[AuthController::class, 'userProfile'])->name('userProfile')->middleware('auth:api');
    Route::post('changePassword',[AuthController::class, 'changePassword'])->name('changePassword');
  });

  Route::group(['prefix'=>'courses'],function(){
    Route::get('index',[UserController::class, 'index'])->name('index');
    Route::get('show/{id}',[UserController::class, 'getCourseById'])->name('getCourseById');
    Route::post('enrollment',[UserController::class, 'enrollment'])->name('enrollment')->middleware('auth:api');
    Route::post('payment',[UserController::class, 'makePayment'])->name('makePayment')->middleware('auth:api');
    Route::get('details/{id}',[UserController::class, 'getCourseDetails'])->name('getCourseDetails')->middleware('auth:api');;
    Route::post('updateAnnoncment',[UserController::class, 'updateAnnoncment'])->name('updateAnnoncment')->middleware('auth:api');;
    Route::get('usercourses',[UserController::class, 'getUserCourses'])->name('getUserCourses')->middleware('auth:api');
    Route::get('viewCourse/{id}',[UserController::class, 'viewCourseDetails'])->name('viewCourseDetails')->middleware('auth:api');
    Route::post('registerasinterset',[UserController::class, 'registerAsInterset'])->name('registerAsInterset');
    Route::post('review',[UserController::class, 'reviewAgainestCourse'])->name('reviewAgainestCourse')->middleware('auth:api');

  });

  Route::group(['prefix'=>'blogs'],function(){
    Route::get('index',[BlogController::class, 'index'])->name('index');
    Route::get('show/{id}',[BlogController::class, 'getBlogById'])->name('getBlogById');
  });

});