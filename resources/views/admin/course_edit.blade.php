<?php $title = "Users";
$pg = 'Users';
// include('side-navbar.php');
?>

@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')
<form action="{{route('course_update',['id' => $course_record->id])}}" method="POST" enctype="multipart/form-data">

    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Edit Course</h4>
                            <button class="site-btn px-5 mt-sm-0 mt-3 py-2" data-target=".updateStatus" data-toggle="modal">Update</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 mt-3">
                        @if(isset($course_record->course_image))                                        
                            <img src="{{asset('images')}}/{{$course_record->course_image}}"  alt="" class="img-fluid">
                        @endif
                        {{-- <img src="assets/images/course-img.png" alt="" class="img-fluid course-img"> --}}
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
                                <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="13.667" height="16.827" viewBox="0 0 13.667 16.827">
                                    <g id="delete" transform="translate(0.003 0.001)">
                                        <path id="Path_89" data-name="Path 89" d="M222.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,222.792,154.7Zm0,0" transform="translate(-213.637 -148.608)" fill="#fff"/>
                                        <path id="Path_90" data-name="Path 90" d="M104.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,1,0,.788,0V155.1A.394.394,0,0,0,104.792,154.7Zm0,0" transform="translate(-100.287 -148.608)" fill="#fff"/>
                                        <path id="Path_91" data-name="Path 91" d="M1.116,5.008v9.709a2.174,2.174,0,0,0,.578,1.5,1.941,1.941,0,0,0,1.408.609h7.456a1.94,1.94,0,0,0,1.408-.609,2.174,2.174,0,0,0,.578-1.5V5.008a1.505,1.505,0,0,0-.386-2.96H10.14V1.555A1.548,1.548,0,0,0,8.58,0H5.08A1.548,1.548,0,0,0,3.52,1.555v.493H1.5a1.505,1.505,0,0,0-.386,2.96Zm9.442,11.029H3.1a1.248,1.248,0,0,1-1.2-1.32V5.043h9.852v9.675a1.248,1.248,0,0,1-1.2,1.32ZM4.308,1.555A.759.759,0,0,1,5.08.787h3.5a.759.759,0,0,1,.772.768v.493H4.308ZM1.5,2.836H12.158a.709.709,0,0,1,0,1.419H1.5a.709.709,0,0,1,0-1.419Zm0,0" transform="translate(0 0)" fill="#fff"/>
                                        <path id="Path_92" data-name="Path 92" d="M163.792,154.7a.394.394,0,0,0-.394.394v7.448a.394.394,0,0,0,.788,0V155.1A.394.394,0,0,0,163.792,154.7Zm0,0" transform="translate(-156.962 -148.608)" fill="#fff"/>
                                    </g>
                                </svg>
                            Delete</button>
                            <label class="site-btn font-12 mb-0 px-4 py-2 mt-3 ml-3" for="upload-course">Upload</label>
                            <div class="d-none">
                                <input type="file" name="my_image" id="upload-course">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 mt-3">
                        <div class="course-card px-lg-5 p-4">
                          
                                <label for="" class="custom-label font-16 font-brinnan-regular color-dark-33 ml-3">Course Title <span class="color-red">*</span> </label>
                                <input type="text" name="title" class="custom-input green-input h-auto py-2" placeholder="Enter Title" value="{{$course_record->title}}" >
                                <label for="" class="custom-label mt-3 font-16 font-brinnan-regular color-dark-33 ml-3">Cost <span class="color-red">*</span> </label>
                                <input type="number" name="cost" class="custom-input green-input h-auto py-2" placeholder="Enter Cost" value="{{$course_record->cost}}">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Total Slots <span class="color-red">*</span> </label>
                                <input type="text" name="slots" class="custom-input green-input h-auto py-2" placeholder="Enter Slots" value="{{$course_record->slots}}">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Description <span class="color-red">*</span> </label>
                                <textarea name="description" id="" cols="30" rows="6" class="custom-input green-input h-auto p-3" placeholder="Enter Description">{{$course_record->description}}</textarea>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Course Summary <span class="color-red">*</span> </label>
                                <textarea name="summary" id="" cols="30" rows="6" class="custom-input green-input h-auto p-3" placeholder="Enter Course Summary">{{$course_record->summary}}</textarea>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Course Objectives Already<span class="color-red">*</span> </label>                                
                                <ul>
                                    @foreach ($course_record->course_objective as $item)
                                        @csrf
                                        <li>{{$item->title}} &nbsp; <a href="{{route('course_objective_delete',['id' => $item->id])}}"><i class="fas fa-trash" style="color:red;"></i></a></li>
                                    @endforeach
                                </ul>
                                <div id="course_objective">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Course Objectives <span class="color-red">*</span> </label>
                                <input type="text" name="course_objective[]" class="custom-input green-input h-auto py-2" placeholder="Enter Objective">
                               </div>
                                <div class="d-flex align-items-center justify-content-end">
                                <input type="button" id="add_another" value="Add Another" class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
                                    {{-- <button class="site-btn d-flex align-items-center green-btn font-12 px-4 py-2 mt-3">
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
                                    <input type="radio" name="status" value="ongoing" id="" class="mr-1" @if($course_record->status=='ongoing') checked @endif>
                                    <label for="" class="mb-0 font-14">Ongoing</label>
                                    <input type="radio" name="status" value="upcoming" id="" class="ml-4 mr-1" @if($course_record->status=='upcoming') checked @endif>
                                    <label for="" class="mb-0 font-14">Upcoming</label>
                                </div>
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Enrollment From :</label>
                                <input type="date" name="enrollment_from" class="custom-input green-input h-auto py-2" placeholder="Select Date" value="{{$course_record->enrollment_from}}">
                                <label for="" class="custom-label font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Enrollment To :</label>
                                <input type="date" name="enrollment_to" class="custom-input green-input h-auto py-2" placeholder="Select Date" value="{{$course_record->enrollment_to}}">
                                <div class="text-right my-4">
                                    <button class="site-btn px-4 font-15 py-2" type="button" data-target=".addForm" data-toggle="modal">Add Enrollment Form</button>
                                </div>
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
                    <label for="">Previous Questions </label>
                    <ul>
                        @foreach ($course_record->question as $item)
                            @csrf
                            <li>{{$item->question}} &nbsp; <a href="{{route('question_delete',['id' => $item->id])}}"><i class="fas fa-trash" style="color:red;"></i></a></li>
                        @endforeach
                    </ul>
                    <label for="" class="custom-label text-left font-16 font-brinnan-regular mt-3 color-dark-33 ml-3">Question :</label>

                    <div class="d-flex align-items-center">
                       <input type="text" name="question[]" class="custom-input green-input h-auto py-2" placeholder="Enter Question">
                        <div id="another_question">
                        </div>
                        <input type="button" id="add_another_question" value="Add Another" class="transparent-btn ml-3">
                        {{-- <input type="text" class="custom-input green-input h-auto py-2" placeholder="Enter Question">
                        <button class="transparent-btn ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.034" height="24.667" viewBox="0 0 20.034 24.667">
                                <g id="delete" transform="translate(0.003 0.002)">
                                    <path id="Path_89" data-name="Path 89" d="M222.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,222.976,154.7Zm0,0" transform="translate(-209.554 -145.768)" fill="#002a36"/>
                                    <path id="Path_90" data-name="Path 90" d="M104.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,104.976,154.7Zm0,0" transform="translate(-98.37 -145.768)" fill="#002a36"/>
                                    <path id="Path_91" data-name="Path 91" d="M1.637,7.342V21.575a3.187,3.187,0,0,0,.847,2.2,2.845,2.845,0,0,0,2.064.892h10.93a2.844,2.844,0,0,0,2.064-.892,3.187,3.187,0,0,0,.847-2.2V7.342A2.207,2.207,0,0,0,17.824,3H14.866V2.28A2.269,2.269,0,0,0,12.578,0H7.449A2.269,2.269,0,0,0,5.161,2.28V3H2.2a2.207,2.207,0,0,0-.566,4.34ZM15.479,23.51H4.549a1.83,1.83,0,0,1-1.756-1.935V7.393H17.235V21.575a1.83,1.83,0,0,1-1.756,1.935ZM6.317,2.28A1.113,1.113,0,0,1,7.449,1.154h5.13A1.113,1.113,0,0,1,13.711,2.28V3H6.317ZM2.2,4.158h15.62a1.04,1.04,0,0,1,0,2.08H2.2a1.04,1.04,0,0,1,0-2.08Zm0,0" transform="translate(0 0)" fill="#002a36"/>
                                    <path id="Path_92" data-name="Path 92" d="M163.976,154.7a.578.578,0,0,0-.578.578V166.2a.578.578,0,0,0,1.155,0V155.281A.578.578,0,0,0,163.976,154.7Zm0,0" transform="translate(-153.962 -145.768)" fill="#002a36"/>
                                </g>
                            </svg>
                        </button> --}}
                    </div>
                    {{-- <div class="text-right">
                        <button class="color-pink transparent-btn mt-2 font-16">Add Another Question</button>
                    </div> --}}
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
    $("#another_question").append("<br><br><input type='text' name='question[]' class='custom-input green-input h-auto py-2' placeholder='Enter Question'>");
    });
    

    });
</script>
@endsection
{{-- <?php include('footer.php'); ?> --}}