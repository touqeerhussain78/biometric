<?php $title = "Course Details";
$pg = 'Courses';
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
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Edit About Us</h4>
                        <button class="site-btn px-5 mt-sm-0 font-15 mt-3 py-2" data-toggle="modal" data-target=".contentUpdated">Update</button>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 mt-3">
                    <div class="blog-card">
                        <img src="assets/images/content-img.png" alt="" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-8 mt-3">
                    <h2 class="font-25 d-grey-text font-brinnan-regular">About Us</h2>
                    <input type="text" value="Lorem Ipsum" class="site-input rounded-pill w-100 px-3 py-2 green-input">
                    <textarea class="site-input px-3 py-2 mt-3 w-100 green-input" rows="7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                    <div class="d-sm-flex align-items-center">
                        <button class="site-btn mt-3 font-15 green-border px-4 py-2 mr-sm-3">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="13.019" height="15.895" viewBox="0 0 13.019 15.895">
                                <g id="Group_196" data-name="Group 196" transform="translate(-1412.491 -568.75)">
                                    <g id="delete" transform="translate(1412.752 569.001)">
                                        <path id="Path_89" data-name="Path 89" d="M222.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,0,0,.721,0v-6.814A.361.361,0,0,0,222.759,154.7Zm0,0" transform="translate(-214.383 -149.127)" fill="#666" stroke="#666" stroke-width="0.5" />
                                        <path id="Path_90" data-name="Path 90" d="M104.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,104.759,154.7Zm0,0" transform="translate(-100.637 -149.127)" fill="#666" stroke="#666" stroke-width="0.5" />
                                        <path id="Path_91" data-name="Path 91" d="M1.021,4.582v8.883a1.989,1.989,0,0,0,.529,1.372,1.775,1.775,0,0,0,1.288.557H9.659a1.775,1.775,0,0,0,1.288-.557,1.989,1.989,0,0,0,.529-1.372V4.582a1.377,1.377,0,0,0-.353-2.708H9.277V1.423A1.416,1.416,0,0,0,7.849,0h-3.2A1.416,1.416,0,0,0,3.22,1.423v.451H1.374a1.377,1.377,0,0,0-.353,2.708Zm8.638,10.09H2.838a1.142,1.142,0,0,1-1.1-1.208V4.613h9.013v8.851a1.142,1.142,0,0,1-1.1,1.208ZM3.941,1.423a.695.695,0,0,1,.707-.7h3.2a.695.695,0,0,1,.707.7v.451H3.941ZM1.374,2.594h9.749a.649.649,0,0,1,0,1.3H1.374a.649.649,0,0,1,0-1.3Zm0,0" transform="translate(0 0)" fill="#666" stroke="#666" stroke-width="0.5" />
                                        <path id="Path_92" data-name="Path 92" d="M163.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,163.759,154.7Zm0,0" transform="translate(-157.51 -149.127)" fill="#666" stroke="#666" stroke-width="0.5" />
                                    </g>
                                </g>
                            </svg>
                            Delete
                        </button>
                        <button class="site-btn mt-3 font-15 px-5 py-2">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade contentUpdated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Page Updated Successfully!</h3>
            </div>
        </div>
    </div>
</div>

<div class="modal fade deleteMedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <img src="assets/images/qusetion.png" alt="" class="img-fluid">
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to delete this media?</h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                    <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".mediaDeleted" data-toggle="modal">Yes</button>
                    <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mediaDeleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Media Deleted Successfully!</h3>
            </div>
        </div>
    </div>
</div>

<div class="modal fade statusUpdated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Course Updated Successfully!</h3>
            </div>
        </div>
    </div>
</div>

<div class="modal fade inactiveUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <img src="assets/images/qusetion.png" alt="" class="img-fluid">
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to Inactive this user ?</h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                    <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".userInactivated" data-toggle="modal">Yes</button>
                    <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade userInactivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">User Inactivated Successfully!</h3>
            </div>
        </div>
    </div>
</div>

@endsection
