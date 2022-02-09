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
                        <h2 class="font-40 font-brinnan-bold color-dark-33 text-center mb-5">Login</h2>
                    </div>
                    <form  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-field mb-4">
                            <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Email Address <span class="color-red">*</span> </label>
                            <input type="email" name="email" class="custom-input font-16 font-brinnan-light color-dark-66" placeholder="Enter Email Address">
                        </div>
                        <div class="form-field mb-4">
                            <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Password <span class="color-red">*</span> </label>
                            <div class="password-field">
                            <input type="password" name="password" class="custom-input password1 font-16 font-brinnan-light color-dark-66" placeholder="Enter Password">
                            <i class="fas fa-eye-slash show-hide-icon"></i>
                            </div>    
                        </div>
                        <div class="form-field check-box-main d-block d-sm-flex ml-3 ml-sm-0">
                                <div class="check-box-inner d-flex pl-0 pl-sm-3">
                                    <label class="form-check-label checkbox-label font-14 font-brinnan-light color-dark-66 mb-2 mb-sm-0" for="exampleCheck1">Remember Me</label>
                                    <input type="checkbox" class="form-check-input checkbox-input" id="exampleCheck1"> 
                                </div>    
                                <div class="form-link-box d-flex">
                                    <a href="{{route('password_recovery')}}" class="color-pink font-14 font-brinnan-regular">Forgot your Password?</a>
                                </div>                      
                        </div>
                        <div class="form-field mt-5">
                            {{-- <a href="" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink"  >Log In </a> --}}
                            <input type="Submit" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink"  value="Log In">
                            {{-- <a  >Log in</a>   --}}
                            <a href="{{route('login')}}" class="btn-green d-block text-center background-green mt-3 font-20 font-brinnan-regular border-green">Back to Login</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection