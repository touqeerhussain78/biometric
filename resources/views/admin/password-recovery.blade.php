{{-- <?php  
    $title = "Password Recovery";
    include('header.php'); 
?> --}}

@extends('layouts.myapp')
@section('content')

<section class="loginSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 col-xl-8 m-auto">
                <div class="login-card">
                    <div class="logo-div text-center mb-4">
                        <img src="./assets/images/logo.png" alt="">
                    </div>
                    <div class="logo-div">
                        <h2 class="font-40 font-brinnan-bold color-dark-33 text-center mb-5">Password Recovery</h2>
                    </div>
                    <form action="{{route('forget_password')}}" method="POST" >
                        @csrf
                        <div class="form-field mb-4">
                            <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Email Address <span class="color-red">*</span> </label>
                            <input type="text" class="custom-input font-16 font-brinnan-light color-dark-66" name="email" placeholder="Enter Email Address">
                        </div>
                        <div class="form-field mb-4">
                            <p class="font-14 font-brinnan-light color-dark-66 ml-3">Enter your email address to receive a verification code</p>
                        </div>
                        <div class="form-field mt-5">
                            <input type="submit" value="Continue" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink">
                            {{-- <a href="{{route('verification_code')}}" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink">Continue</a>   --}}
                            <a href="{{route('login')}}" class="btn-green d-block text-center background-green mt-3 font-20 font-brinnan-regular border-green">Back to Login</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

