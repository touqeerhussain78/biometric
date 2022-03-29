<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes([
    'register' => false,
    'login' => true,
]);


Route::get('/', [App\Http\Controllers\MyController::class, 'my_login'])->name('login');
Route::get('/password_recovery', [App\Http\Controllers\MyController::class, 'password_recovery'])->name('password_recovery');
// Route::get('/login', [App\Http\Controllers\HomeController::class, 'my_login'])->name('login');


Route::group(['middleware' => 'auth'],function () {
    
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\MyController::class, 'dashboard'])->name('dashboard');
    Route::post('/dashboard/get-chart', [App\Http\Controllers\MyController::class, 'getYearlyBased'])->name('get-chart');
    Route::get('/profile', [App\Http\Controllers\MyController::class, 'profile'])->name('profile');
    Route::get('/edit_profile', [App\Http\Controllers\MyController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/change_password', [App\Http\Controllers\MyController::class, 'change_password'])->name('change_password');
   

    // Route::get('/announcment', [App\Http\Controllers\MyController::class, 'announcment'])->name('announcment');
    // Route::get('/announcment_add', [App\Http\Controllers\MyController::class, 'announcment_add'])->name('announcment_add');

    Route::get('/go_live', [App\Http\Controllers\MyController::class, 'go_live'])->name('go_live');
    Route::get('/start_live', [App\Http\Controllers\MyController::class, 'start_live'])->name('start_live');
    // Route::get('/blogs', [App\Http\Controllers\MyController::class, 'blogs'])->name('blogs');
    Route::get('/blog_add', [App\Http\Controllers\MyController::class, 'blog_add'])->name('blog_add');
    // Route::get('/blog_edit', [App\Http\Controllers\MyController::class, 'blog_edit'])->name('blog_edit');
    // Route::get('/blog_details', [App\Http\Controllers\MyController::class, 'blog_details'])->name('blog_details');
    Route::get('/content_management', [App\Http\Controllers\MyController::class, 'content_management'])->name('content_management');
    Route::get('/home_edit', [App\Http\Controllers\MyController::class, 'home_edit'])->name('home_edit');
    Route::get('/about_edit', [App\Http\Controllers\MyController::class, 'about_edit'])->name('about_edit');
    Route::get('/portfolio_edit', [App\Http\Controllers\MyController::class, 'portfolio_edit'])->name('portfolio_edit');

    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
    Route::post('/notification/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
    Route::get('/notification//{id}', [App\Http\Controllers\NotificationController::class, 'single_notification'])->name('single_notification');


    Route::post('/password_update', [App\Http\Controllers\MyController::class, 'password_update'])->name('password_update');
    Route::post('/update_profile', [App\Http\Controllers\MyController::class, 'update_profile'])->name('update_profile');


    // Users
    Route::get('/users', [App\Http\Controllers\MyController::class, 'users'])->name('users');
    Route::get('/user_edit/{id}', [App\Http\Controllers\MyController::class, 'user_edit'])->name('user_edit');
    Route::get('/user_detail/{id}', [App\Http\Controllers\MyController::class, 'user_detail'])->name('user_detail');
    Route::get('/user_edit_single/{id}', [App\Http\Controllers\MyController::class, 'user_edit_single'])->name('user_edit_single');
    Route::post('/user_edit_profile', [App\Http\Controllers\MyController::class, 'user_edit_profile'
    ])->name('user_edit_profile');    
    Route::post('/update_profile_user', [App\Http\Controllers\MyController::class, 'update_profile_user'])->name('update_profile_user');
    Route::post('/user_filter', [App\Http\Controllers\MyController::class, 'user_filter'])->name('user_filter');
    Route::post('/user_status', [App\Http\Controllers\MyController::class, 'user_status'])->name('user_status');



    Route::post('/payment_log_filter', [App\Http\Controllers\MyController::class, 'payment_log_filter'])->name('payment_log_filter');

    //Courses 
    Route::get('/courses', [App\Http\Controllers\MyController::class, 'courses'])->name('courses');
    Route::post('/course_filter', [App\Http\Controllers\MyController::class, 'course_filter'])->name('course_filter');
    Route::get('/course_add', [App\Http\Controllers\MyController::class, 'course_add'])->name('course_add');
    Route::post('/course_store', [App\Http\Controllers\MyController::class, 'course_store'])->name('course_store');
    Route::get('/course_edit/{id}', [App\Http\Controllers\MyController::class, 'course_edit'])->name('course_edit');
    Route::post('/course_update/{id}', [App\Http\Controllers\MyController::class, 'course_update'])->name('course_update');
    Route::get('/course_detail/{id}', [App\Http\Controllers\MyController::class, 'course_detail'])->name('course_detail');


    //Announcment
    Route::get('/announcments/{id}', [App\Http\Controllers\MyController::class, 'announcments'])->name('announcments');
    Route::get('/announcement_add/{id}', [App\Http\Controllers\MyController::class, 'announcement_add'])->name('announcement_add');
    Route::post('/announcement_store', [App\Http\Controllers\MyController::class, 'announcement_store'])->name('announcement_store');
    Route::get('/announcement_detail/{id}', [App\Http\Controllers\MyController::class, 'announcement_detail'])->name('announcement_detail');
    Route::post('/announcement_filter', [App\Http\Controllers\MyController::class, 'announcement_filter'])->name('announcement_filter');

    // Webinarannouncments
    Route::get('/webinars', [App\Http\Controllers\MyController::class, 'webinars'])->name('webinars');
    Route::get('/webinar_add', [App\Http\Controllers\MyController::class, 'webinar_add'])->name('webinar_add');
    Route::post('/webinar_store', [App\Http\Controllers\MyController::class, 'webinar_store'])->name('webinar_store');
    Route::get('/webinar_edit/{id}', [App\Http\Controllers\MyController::class, 'webinar_edit'])->name('webinar_edit');
    Route::post('/webinar_update/{id}', [App\Http\Controllers\MyController::class, 'webinar_update'])->name('webinar_update');
    Route::get('/webinar_details/{id}', [App\Http\Controllers\MyController::class, 'webinar_details'])->name('webinar_details');
    Route::post('/webinar_filter', [App\Http\Controllers\MyController::class, 'webinar_filter'])->name('webinar_filter');
    Route::post('/webinar_delete', [App\Http\Controllers\MyController::class, 'webinar_delete'])->name('webinar_delete');

    
    // Course Media Filter
    Route::get('/media_add/{id}', [App\Http\Controllers\MyController::class, 'media_add'])->name('media_add');
    Route::post('/media_store', [App\Http\Controllers\MyController::class, 'media_store'])->name('media_store');
    Route::get('/media_edit/{id}', [App\Http\Controllers\MyController::class, 'media_edit'])->name('media_edit');
    Route::post('/media_update/{id}', [App\Http\Controllers\MyController::class, 'media_update'])->name('media_update');
    Route::get('/media_details/{id}', [App\Http\Controllers\MyController::class, 'media_details'])->name('media_details');
    Route::post('/media_delete', [App\Http\Controllers\MyController::class, 'media_delete'])->name('media_delete');
    Route::post('/course_media_filter', [App\Http\Controllers\MyController::class, 'course_media_filter'])->name('course_media_filter');



    // Blogs
    Route::get('/blogs', [App\Http\Controllers\MyController::class, 'blogs'])->name('blogs');
    Route::get('/blog_edit/{id}', [App\Http\Controllers\MyController::class, 'blog_edit'])->name('blog_edit');
    Route::get('/blog_detail/{id}', [App\Http\Controllers\MyController::class, 'blog_detail'])->name('blog_detail');
    // Route::get('/blog_edit/{id}', [App\Http\Controllers\MyController::class, 'blog_edit'])->name('blog_edit');
    Route::post('/blog_save', [App\Http\Controllers\MyController::class, 'blog_save'])->name('blog_save');
    Route::post('/blog_edit_update', [App\Http\Controllers\MyController::class, 'blog_edit_update'])->name('blog_edit_update');
    Route::post('/blog_filter', [App\Http\Controllers\MyController::class, 'blog_filter'])->name('blog_filter');
    Route::post('/blog_delete', [App\Http\Controllers\MyController::class, 'blog_delete'])->name('blog_delete');

    //Feedback 
    Route::get('/feedbacks', [App\Http\Controllers\MyController::class, 'feedbacks'])->name('feedbacks');
    // Route::get('/feedback_details', [App\Http\Controllers\MyController::class, 'feedback_details'])->name('feedback_details');
    Route::get('/feedback_not_found', [App\Http\Controllers\MyController::class, 'feedback_not_found'])->name('feedback_not_found');
    Route::post('/feedback_filter', [App\Http\Controllers\MyController::class, 'feedback_filter'])->name('feedback_filter');
    Route::get('/feedback_detail/{id}', [App\Http\Controllers\MyController::class, 'feedback_detail'])->name('feedback_detail');
    Route::post('/feedback_delete', [App\Http\Controllers\MyController::class, 'feedback_delete'])->name('feedback_delete');


    //HandOnExperience
    Route::get('/hand_on', [App\Http\Controllers\MyController::class, 'hand_on'])->name('hand_on');
    Route::post('/hand_on_filter', [App\Http\Controllers\MyController::class, 'hand_on_filter'])->name('hand_on_filter');
    Route::get('/hand_on_detail/{id}', [App\Http\Controllers\MyController::class, 'hand_on_detail'])->name('hand_on_detail');

    //Payment Fetch 
    Route::get('/payments', [App\Http\Controllers\MyController::class, 'payments'])->name('payments');
    Route::post('/payment_filter', [App\Http\Controllers\MyController::class, 'payment_filter'])->name('payment_filter');
    // Route::post('/payment_filter_month', [App\Http\Controllers\MyController::class, 'payment_filter_month'])->name('payment_filter_month');

    Route::post('/dashboard_payment_filter', [App\Http\Controllers\MyController::class, 'dashboard_payment_filter'])->name('dashboard_payment_filter');
    Route::get('/course_objective_delete/{id}', [App\Http\Controllers\MyController::class, 'course_objective_delete'])->name('course_objective_delete');
    Route::get('/question_delete/{id}', [App\Http\Controllers\MyController::class, 'question_delete'])->name('question_delete');

    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);



    Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


});

Route::get('/verification_code/{email}', [App\Http\Controllers\MyController::class, 'verification_code'])->name('verification_code');

Route::post('/verifying_password', [App\Http\Controllers\MyController::class, 'verifying_password'])->name('verifying_password');
Route::post('/forget_password', [App\Http\Controllers\MyController::class, 'forget_password'])->name('forget_password');
Route::get('/update_password/{email}', [App\Http\Controllers\MyController::class, 'update_password'])->name('update_password');
Route::post('/updating_password', [App\Http\Controllers\MyController::class, 'updating_password'])->name('updating_password');

