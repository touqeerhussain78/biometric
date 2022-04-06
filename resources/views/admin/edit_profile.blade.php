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
                         @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <div class="profile-pic mx-auto">
                            <img src="{{Auth::user()->image}}" alt="" class="img-fluid">
                            <label for="upload-img" class="camera-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
                                    <g id="Group_403" data-name="Group 403" transform="translate(-978 -367)">
                                        <g id="Ellipse_12" data-name="Ellipse 12" transform="translate(978 367)" fill="#002a36" stroke="#fff" stroke-width="5">
                                            <circle cx="19" cy="19" r="19" stroke="none" />
                                            <circle cx="19" cy="19" r="16.5" fill="none" />
                                        </g>
                                        <g id="Icon_feather-camera" data-name="Icon feather-camera" transform="translate(988.589 379.103)">
                                            <path id="Path_81" data-name="Path 81" d="M17.385,16.052A1.444,1.444,0,0,1,15.941,17.5h-13A1.444,1.444,0,0,1,1.5,16.052V8.11A1.444,1.444,0,0,1,2.944,6.666H5.832L7.276,4.5h4.332l1.444,2.166h2.888A1.444,1.444,0,0,1,17.385,8.11Z" transform="translate(-1.5 -4.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path id="Path_82" data-name="Path 82" d="M17.776,16.388A2.888,2.888,0,1,1,14.888,13.5,2.888,2.888,0,0,1,17.776,16.388Z" transform="translate(-6.946 -9.168)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </g>
                                    </g>
                                </svg>
                            </label>
                            <form action="{{route('update_profile')}}" method="POST" enctype="multipart/form-data"> 
                            <div class="d-none">
                                <input type="file" name="my_image" id="upload-img">
                            </div>
                        </div>
                       
                                 {{-- <input type="file" name="my_image"> --}}
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-sm-5 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">First Name :</p>
                                </div>
                                <div class="col-sm-7 mt-3">
                                    <input type="text"  name ="first_name" class="custom-input" value="{{Auth::user()->first_name}}">
                                </div>

                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-5 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">Last Name :</p>
                                </div>
                                <div class="col-sm-7 mt-3">
                                    <input type="text" name ="last_name" class="custom-input" value="{{Auth::user()->last_name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <p class="font-20 mb-0 d-grey-text font-brinnan-regular">Email Address :</p>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <p class="font-18 mb-0 grey-text font-brinnan-light">{{Auth::user()->email}}</p>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <input class="site-btn px-5 py-2" type="submit"  value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade profileUpdated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Profile Updated Successfully!</h3>
            </div>
        </div>
    </div>
</div>

@endsection

