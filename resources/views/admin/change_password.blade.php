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
                    <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Change Password</h3>
                </div>
                <div class="col-xl-6 col-lg-8 col-12">
                        @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                           @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('password_update')}}" method="POST">
                            @csrf
                            <div class="form-field mb-4 mt-3">
                                <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Current Password <span class="color-red">*</span> </label>
                                <div class="password-field">
                                    <input type="password" name="current_password" class="custom-input green-input password1 font-16 font-brinnan-light color-dark-66" placeholder="Enter Current Password">
                                    <i class="far grey-text fa-eye-slash show-hide-icon"></i>
                                </div>
                            </div>
                            <div class="form-field mb-4">
                                <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">New Password <span class="color-red">*</span> </label>
                                <div class="password-field">
                                    <input type="password"  name="new_password" class="custom-input green-input password1 font-16 font-brinnan-light color-dark-66" placeholder="Enter New Password">
                                    <i class="far grey-text fa-eye-slash show-hide-icon"></i>
                                </div>
                            </div>
                            {{-- <div class="form-field mb-4">
                                <label for="" class="custom-label font-20 font-brinnan-regular color-dark-33 ml-3">Confirm New Password <span class="color-red">*</span> </label>
                                <div class="password-field">
                                    <input type="password" name="new_confirm_password" class="custom-input green-input password2 font-16 font-brinnan-light color-dark-66" placeholder="Confirm New Password">
                                    <i class="far grey-text fa-eye-slash show-hide-icon2"></i>
                                </div>
                            </div> --}}
                            <input type="submit" class="site-btn mt-2 px-5 py-2" value="Update">
                            {{-- <button class="site-btn mt-2 px-5 py-2" type="button" data-toggle="modal" data-target=".passwordUpdated">Update</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade passwordUpdated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34" />
                                <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876" />
                                <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" />
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
{{-- <?php include('footer.php'); ?> --}}