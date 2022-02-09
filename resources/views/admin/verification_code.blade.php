<?php  
    $title = "Verification Code";
    // include('header.php'); 
?>
@extends('layouts.myapp')
@section('content')


<section class="loginSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 col-xl-8 m-auto">
                <div class="login-card">
                    <div class="logo-div text-center mb-4">
                        
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </div>
                    <div class="logo-div">
                        <h2 class="font-40 font-brinnan-bold color-dark-33 text-center mb-5">Password Recovery</h2>
                    </div>
                    <form action="{{route('verifying_password')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="email" value="{{ request()->email  }}">
                        <div class="form-field mb-4">
                            <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Verification Code <span class="color-red">*</span> </label>
                            <input type="text" class="custom-input font-16 font-brinnan-light color-dark-66" name="code" placeholder="Enter Verification Code">
                        </div>
                        <div class="form-field check-box-main d-block d-sm-flex ml-3 ml-sm-0 justify-content-end"> 
                                <div class="form-link-box d-flex">
                                    {{-- <a href="password-recovery.php" class="color-pink font-14 font-brinnan-regular">Resend Code</a> --}}
                                </div>                      
                        </div>
                        <div class="form-field mt-5">
                            <input type="submit" value="Continue" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink">
                            {{-- <a href="{{route('update_password')}}" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink">Continue</a>   --}}
                            <a href="login.php" class="btn-green d-block text-center background-green mt-3 font-20 font-brinnan-regular border-green">Back to Login</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection