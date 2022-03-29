<?php $title = "Users";
$pg = 'Users';
// include('side-navbar.php');
?>

@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')
<form action="{{route('course_store')}}" method="POST" enctype="multipart/form-data">

    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
        
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Add New Course</h4>
                            <input type="submit" class="site-btn px-5 mt-sm-0 mt-3 py-2" value="Add">
                            {{-- <button class="site-btn px-5 mt-sm-0 mt-3 py-2">Add</button> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 mt-3">
                        <img src="assets/images/course-img.png" alt="" class="img-fluid course-img">
                        <div class="d-flex align-items-center justify-content-center">
                            {{-- <button class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="13.667" height="16.827" viewBox="0 0 13.667 16.827">
                                    <g id="delete" transform="translate(0.003 0.001)">
                                        <path id="Path_89" data-name="Path 89" d="M222.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,222.792,154.7Zm0,0" transform="translate(-213.637 -148.608)" fill="#fff"/>
                                        <path id="Path_90" data-name="Path 90" d="M104.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,1,0,.788,0V155.1A.394.394,0,0,0,104.792,154.7Zm0,0" transform="translate(-100.287 -148.608)" fill="#fff"/>
                                        <path id="Path_91" data-name="Path 91" d="M1.116,5.008v9.709a2.174,2.174,0,0,0,.578,1.5,1.941,1.941,0,0,0,1.408.609h7.456a1.94,1.94,0,0,0,1.408-.609,2.174,2.174,0,0,0,.578-1.5V5.008a1.505,1.505,0,0,0-.386-2.96H10.14V1.555A1.548,1.548,0,0,0,8.58,0H5.08A1.548,1.548,0,0,0,3.52,1.555v.493H1.5a1.505,1.505,0,0,0-.386,2.96Zm9.442,11.029H3.1a1.248,1.248,0,0,1-1.2-1.32V5.043h9.852v9.675a1.248,1.248,0,0,1-1.2,1.32ZM4.308,1.555A.759.759,0,0,1,5.08.787h3.5a.759.759,0,0,1,.772.768v.493H4.308ZM1.5,2.836H12.158a.709.709,0,0,1,0,1.419H1.5a.709.709,0,0,1,0-1.419Zm0,0" transform="translate(0 0)" fill="#fff"/>
                                        <path id="Path_92" data-name="Path 92" d="M163.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,163.792,154.7Zm0,0" transform="translate(-156.962 -148.608)" fill="#fff"/>
                                    </g>
                                </svg>
                            Delete</button> --}}
                            <label class="site-btn font-12 mb-0 px-4 py-2 mt-3 ml-3" for="upload-course">Upload</label>
                            <div class="d-none">
                                <input type="file" name="my_image" id="upload-course">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 mt-3">
                        <div class="course-card px-lg-5 p-4">
                          
                                <label for="" class="custom-label font-16 font-brinnan-regular color-dark-33 ml-3">Course Title <span class="color-red">*</span> </label>
                                <input type="text" name="title" class="custom-input green-input h-auto py-2" placeholder="Enter Title">
                                <label for="" class="custom-label mt-3 font-16 font-brinnan-regular color-dark-33 ml-3">Cost <span class="color-red">*</span> </label>
                                <input type="number" name="cost" class="custom-input green-input h-auto py-2" placeholder="Enter Cost">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Total Slots <span class="color-red">*</span> </label>
                                <input type="text" name="slots" class="custom-input green-input h-auto py-2" placeholder="Enter Slots">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Description <span class="color-red">*</span> </label>
                                <textarea name="description" id="" cols="30" rows="6" class="custom-input green-input h-auto p-3" placeholder="Enter Description"></textarea>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Course Summary <span class="color-red">*</span> </label>
                                <textarea name="summary" id="" cols="30" rows="6" class="custom-input green-input h-auto p-3" placeholder="Enter Course Summary"></textarea>
                                <div id="course_objective">
                                    <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Course Objectives <span class="color-red">*</span> </label>
                                    <input type="text" name='course_objective[]'  class="custom-input green-input h-auto py-2" placeholder="Enter Objective">
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <input type="button" id="add_another" value="Add Another" class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
                                    {{-- <button onclick="add_me()" class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
                                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="10.561" height="10.561" viewBox="0 0 10.561 10.561">
                                            <path id="Icon_ionic-md-add" data-name="Icon ionic-md-add" d="M17.311,12.734H12.734v4.576H11.326V12.734H6.75V11.326h4.576V6.75h1.408v4.576h4.576Z" transform="translate(-6.75 -6.75)" fill="#fff"/>
                                        </svg>
                                    Add Another</button> --}}
                                    {{-- <button class="site-btn d-flex align-items-center font-12 px-4 py-2 mt-3 ml-3">
                                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="13.667" height="16.827" viewBox="0 0 13.667 16.827">
                                            <g id="delete" transform="translate(0.003 0.001)">
                                                <path id="Path_89" data-name="Path 89" d="M222.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,222.792,154.7Zm0,0" transform="translate(-213.637 -148.608)" fill="#fff"/>
                                                <path id="Path_90" data-name="Path 90" d="M104.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,1,0,.788,0V155.1A.394.394,0,0,0,104.792,154.7Zm0,0" transform="translate(-100.287 -148.608)" fill="#fff"/>
                                                <path id="Path_91" data-name="Path 91" d="M1.116,5.008v9.709a2.174,2.174,0,0,0,.578,1.5,1.941,1.941,0,0,0,1.408.609h7.456a1.94,1.94,0,0,0,1.408-.609,2.174,2.174,0,0,0,.578-1.5V5.008a1.505,1.505,0,0,0-.386-2.96H10.14V1.555A1.548,1.548,0,0,0,8.58,0H5.08A1.548,1.548,0,0,0,3.52,1.555v.493H1.5a1.505,1.505,0,0,0-.386,2.96Zm9.442,11.029H3.1a1.248,1.248,0,0,1-1.2-1.32V5.043h9.852v9.675a1.248,1.248,0,0,1-1.2,1.32ZM4.308,1.555A.759.759,0,0,1,5.08.787h3.5a.759.759,0,0,1,.772.768v.493H4.308ZM1.5,2.836H12.158a.709.709,0,0,1,0,1.419H1.5a.709.709,0,0,1,0-1.419Zm0,0" transform="translate(0 0)" fill="#fff"/>
                                                <path id="Path_92" data-name="Path 92" d="M163.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,163.792,154.7Zm0,0" transform="translate(-156.962 -148.608)" fill="#fff"/>
                                            </g>
                                        </svg>    
                                    Remove</button> --}}
                                </div>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Status :</label>
                                <div class="d-flex ml-3 align-items-center">
                                    <input type="radio" name="status" value="ongoing" id="" class="mr-1">
                                    <label for="" class="mb-0 font-14">Ongoing</label>
                                    <input type="radio" name="status" value="upcoming" id="" class="ml-4 mr-1">
                                    <label for="" class="mb-0 font-14">Upcoming</label>
                                </div>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Enrollment From :</label>
                                <input type="date" name="enrollment_from" class="custom-input green-input h-auto py-2" placeholder="Select Date">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Enrollment To :</label>
                                <input type="date" name="enrollment_to" class="custom-input green-input h-auto py-2" placeholder="Select Date">
                                <div class="text-right my-4">
                                    <button class="site-btn px-4 font-15 py-2" type="button" data-target=".addForm" data-toggle="modal">Add Enrollment Form</button>
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
                        <input type="text" name="question[]" class="custom-input green-input h-auto py-2" placeholder="Enter Question">
                        <input type="button" id="add_another_question" value="Add Another" class="transparent-btn ml-3">
                    </div>
                    <div id="another_question">
                    </div>
                    
                    {{-- <div class="text-right">
                        <button class="color-pink transparent-btn mt-2 font-16">Add Another Question</button>
                    </div> --}}
                    {{-- <input class="site-btn mt-lg-5 mt-4 px-5 py-2 w-100" data-dismiss="modal" aria-label="Close" data-target=".courseAdded" data-toggle="modal" value="Create"> --}}
                    {{-- <button class="site-btn mt-lg-5 mt-4 px-5 py-2 w-100" data-dismiss="modal" aria-label="Close" data-target=".courseAdded" data-toggle="modal">Create</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){

    $("#add_another").click(function(){
        $("#course_objective").append("<br><br><input type='text' name='course_objective[]'  class='custom-input green-input h-auto py-2' placeholder='Enter Objective'>");
    });

    $("#add_another_question").click(function(){
    $("#another_question").append("<br><div class='d-flex align-items-center'><input type='text' name='question[]' class='custom-input green-input h-auto py-2' placeholder='Enter Question'><div id='another_question'></div><input type='button' id='add_another_question' value='Add Another' class='transparent-btn ml-3'></div>");
    // <br><br><input type='text'    name='question[]' class='custom-input green-input h-auto py-2' placeholder='Enter Question'>
    });
    

    });

</script>
@endsection
{{-- <?php include('footer.php'); ?> --}}