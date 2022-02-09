<?php  
    $title = "Update Password";
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
                        <img src="./assets/images/logo.png" alt="">
                    </div>
                    <div class="logo-div">
                        <h2 class="font-40 font-brinnan-bold color-dark-33 text-center mb-5">Password Recovery</h2>
                    </div>
                        @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action="{{route('updating_password')}}"  method="POST">
                        @csrf
                        <div class="form-field mb-4">
                        <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">New Password <span class="color-red">*</span> </label>
                            <input type="hidden" name="email" value="{{ request()->email  }}">
                            <div class="password-field">
                            <input type="password" name="password" class="custom-input password1 font-16 font-brinnan-light color-dark-66" placeholder="Enter New Password">

                            <i class="fas fa-eye-slash show-hide-icon"></i>
                            </div>    
                        </div>
                        <div class="form-field mb-4">
                            <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Confirm Password <span class="color-red">*</span> </label>
                            <div class="password-field">
                            <input type="password" name="password_confirmation" class="custom-input password2 font-16 font-brinnan-light color-dark-66" placeholder="Enter Confirm Password">
                            <i class="fas fa-eye-slash show-hide-icon2"></i>
                            </div>    
                        </div>
                        <div class="form-field mt-5">
                            <input type="submit"  class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink" value="Update">
                            {{-- <a href="#_" class="btn-pink d-block text-center background-pink font-20 font-brinnan-regular border-pink" data-toggle="modal" data-target="#exampleModal">Update</a>   --}}
                            <a href="login.php" class="btn-green d-block text-center background-green mt-3 font-20 font-brinnan-regular border-green">Back to Login</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body-content text-center">
            <div class="svg-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="136" height="135" viewBox="0 0 136 135">
                <g id="Group_3" data-name="Group 3" transform="translate(-741.811 -412.906)">
                    <g id="Group_98" data-name="Group 98" transform="translate(742 413.059)">
                    <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34"/>
                    <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876"/>
                    <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                    </g>
                </g>
                </svg>

            </div>
            <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Password Updated Successfully!</h3>
        </div>
    </div>
  </div>
</div>

@endsection