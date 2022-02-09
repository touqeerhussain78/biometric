<?php $title = "Users";
$pg = 'Users';
// include('side-navbar.php');
?>
@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')

    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Add Announcement</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-10 mt-3">
                        <div class="grey-bg px-lg-5 p-4">
                            <form action="{{route('announcement_store')}}" method="POST">
                                @csrf
                                <label for="" class="custom-label font-16 font-brinnan-regular color-dark-33 ml-3">Title <span class="color-red">*</span> </label>
                                <input type="text" name="title" class="custom-input white-bg green-input h-auto py-2" placeholder="Title abc">
                                <label for="" class="custom-label mt-3 font-16 font-brinnan-regular color-dark-33 ml-3">Message <span class="color-red">*</span> : </label>
                                <textarea name="message" id="" cols="30" rows="6" placeholder="Enter Message" class="custom-input white-bg green-input h-auto p-3"></textarea>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Announcement Type <span class="red-text">*</span> :</label>
                                <div class="d-flex ml-3 align-items-center">
                                    <input type="radio" name="type" value="announcment" id="" class="mr-1">
                                    <label for="" class="mb-0 font-14">Announcement</label>
                                    <input type="radio" name="type" value="request" id="" class="ml-4 mr-1">
                                    <label for="" class="mb-0 font-14">Request</label>
                                </div>
                                <input type="hidden" name="course_id" value="{{$course_id}}">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Select Users  <span class="red-text">*</span> :</label>
                                <select name="user_id[]" multiple class="js-example-placeholder-single js-states form-control custom-input white-bg green-input h-auto py-2">
                                    <option value="all">All</option>
                                        @foreach ($users as $item)
                                        <option value="{{$item->id}}">{{$item->first_name}}</option>
                                        @endforeach
                                </select>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Date <span class="red-text">*</span> :</label>
                                <input type="date" name="date" class="custom-input green-input white-bg h-auto py-2" placeholder="Select Date">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Time <span class="red-text">*</span> :</label>
                                <input type="time" name="time" class="custom-input green-input white-bg h-auto py-2" placeholder="Select Date">
                                <div class="text-right my-4">
                                    <input type="submit" class="site-btn px-5 font-15 py-2" value="Announce">
                                    {{-- <button class="site-btn px-5 font-15 py-2" type="button" data-target=".announcementAdded" data-toggle="modal">Announce</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <h3 class="font-30 font-brinnan-bold mt-4 color-pink">Course Abc Enrollment Form</h3>
                <h6 class="font-26 color-dark-33 font-brinnan-regular">Questions</h6>
                <label for="" class="custom-label text-left font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Question :</label>
                <div class="d-flex align-items-center">
                    <input type="text" class="custom-input green-input h-auto py-2" placeholder="Enter Question">
                    <button class="transparent-btn ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20.034" height="24.667" viewBox="0 0 20.034 24.667">
                            <g id="delete" transform="translate(0.003 0.002)">
                                <path id="Path_89" data-name="Path 89" d="M222.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,222.976,154.7Zm0,0" transform="translate(-209.554 -145.768)" fill="#002a36"/>
                                <path id="Path_90" data-name="Path 90" d="M104.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,104.976,154.7Zm0,0" transform="translate(-98.37 -145.768)" fill="#002a36"/>
                                <path id="Path_91" data-name="Path 91" d="M1.637,7.342V21.575a3.187,3.187,0,0,0,.847,2.2,2.845,2.845,0,0,0,2.064.892h10.93a2.844,2.844,0,0,0,2.064-.892,3.187,3.187,0,0,0,.847-2.2V7.342A2.207,2.207,0,0,0,17.824,3H14.866V2.28A2.269,2.269,0,0,0,12.578,0H7.449A2.269,2.269,0,0,0,5.161,2.28V3H2.2a2.207,2.207,0,0,0-.566,4.34ZM15.479,23.51H4.549a1.83,1.83,0,0,1-1.756-1.935V7.393H17.235V21.575a1.83,1.83,0,0,1-1.756,1.935ZM6.317,2.28A1.113,1.113,0,0,1,7.449,1.154h5.13A1.113,1.113,0,0,1,13.711,2.28V3H6.317ZM2.2,4.158h15.62a1.04,1.04,0,0,1,0,2.08H2.2a1.04,1.04,0,0,1,0-2.08Zm0,0" transform="translate(0 0)" fill="#002a36"/>
                                <path id="Path_92" data-name="Path 92" d="M163.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,163.976,154.7Zm0,0" transform="translate(-153.962 -145.768)" fill="#002a36"/>
                            </g>
                        </svg>
                    </button>
                </div>
                <div class="text-right">
                    <button class="color-pink transparent-btn mt-2 font-16">Add Another Question</button>
                </div>
                <button class="site-btn mt-lg-5 mt-4 px-5 py-2 w-100" data-dismiss="modal" aria-label="Close" data-target=".announcementAdded" data-toggle="modal">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade announcementAdded" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34"/>
                            <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
                        </g>
                    </g>
                </svg>
            </div>
            <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Announced Successfully!</h3>
        </div>
    </div>
  </div>
</div>

<div class="modal fade activeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <img src="assets/images/qusetion.png" alt="" class="img-fluid">
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to Active this user ?</h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".userActivated" data-toggle="modal">Yes</button>
                <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade updateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <img src="assets/images/qusetion.png" alt="" class="img-fluid">
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to update the status of this course?</h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".statusUpdated" data-toggle="modal">Yes</button>
                <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
                </div>
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
                            <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34"/>
                            <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
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
                            <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34"/>
                            <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
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
{{-- <?php include('footer.php'); ?> --}}