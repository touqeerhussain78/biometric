<?php $title = "Notifications";
$pg = 'Notifications';
// include('side-navbar.php');
?>

@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')

    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Profile</h3>
                    </div>
                    <div class="col-xl-7 col-lg-9 my-lg-5 my-4 mx-auto">
                        <div class="profile-card px-lg-5 py-4 px-sm-4 p-3">
                            <div class="profile-pic mx-auto">
                                <img src="assets/images/profile.png" alt="" class="img-fluid">
                            </div>
                            <div class="text-center">
                                <a href="{{route('change_password')}}" class="font-14 color-pink">Change Password</a>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">First Name : </p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-18 mb-0 grey-text font-brinnan-light">{{Auth::user()->first_name}}</p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">Last Name :</p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-18 mb-0 grey-text font-brinnan-light">{{Auth::user()->last_name}}</p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">Email Address :</p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-18 mb-0 grey-text font-brinnan-light">{{Auth::user()->email}}</p>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <button class="site-btn green-btn px-5 py-2" onclick="location.href='{{route('edit_profile')}}'">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- <?php include('footer.php'); ?> --}}