<?php $title = "Course Details";
$pg = 'Courses';
// include('side-navbar.php');
?>
@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')

    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card pb-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Webinar Details</h4>
                            <a class="site-btn mt-3 mt-sm-0 px-5 py-2 font-15" href="{{route('webinar_edit',['id' => $webinar->id])}}">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-10">
                        <div class="grey-bg py-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Webinar Title: <span class="font-brinnan-light">{{$webinar->title}}</span></p>
                        </div>
                        <div class="grey-bg mt-3 py-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Description:</p>
                            <p class="font-14 mb-0 grey-text">{{$webinar->description}}</p>
                        </div>
                        <div class="grey-bg py-3 mt-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Date: <span class="font-14 ml-2 font-brinnan-light">{{$webinar->created_at->format('m/d/Y')}}</span></p>
                        </div>
                        <div class="grey-bg py-3 mt-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Charges: <span class="font-14 ml-2 font-brinnan-light">${{$webinar->charges}}</span></p>
                        </div>
                        <div class="grey-bg py-3 mt-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Purchased by: <span class="ml-2 font-brinnan-light font-14">123 Users</span></p>
                        </div>
                        <div class="grey-bg py-3 mt-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Duration: <span class="font-14 ml-2 font-brinnan-light">1 Hour 45 Minutes</span></p>
                        </div>
                        <div class="grey-bg py-3 mt-3 px-4">
                            <p class="font-20 d-grey-text mb-0 font-brinnan-regular">Webinar Video:</p>
                        </div>
                        <div class="position-relative mt-4">
                            @if(isset($webinar->video))               

                            <video controls poster="assets/images/video.png" class="w-100">
                                <source src="{{$webinar->video}}" type="video/mp4">
                            </video>
                                {{-- <img src="{{asset('images')}}/{{$webinar->video}}"  alt="" class="img-fluid"> --}}
                            @endif
                            <p class="video-text mb-0">Video Title</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade enrolledUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <h3 class="font-36 font-brinnan-bold mt-4 color-pink">Enrolled Users</h3>
                <div class="custom-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <img src="assets/images/table-img.png" alt="" class="img-fluid table-img">
                                        <div class="media-body ml-3 text-left">
                                            <p class="font-14 mb-0 grey-text">Mark Jack</p>
                                        </div>
                                    </div>
                                </td>
                                <td>mm/dd/yyyy</td>
                                <td>
                                    <div class="btn-group dropleft custom-dropdown ml-2 mb-1">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown-menu">
                                            <span class="triangle"></span>
                                            <a href="#_" class="dropdown-item">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="13.743" height="10.538" viewBox="0 0 13.743 10.538">
                                                    <g id="stack-of-square-papers" transform="translate(0 -35.441)">
                                                        <g id="Group_116" data-name="Group 116" transform="translate(0 35.441)">
                                                        <path id="Path_83" data-name="Path 83" d="M.223,38.618,6.728,41.4a.359.359,0,0,0,.144.03.369.369,0,0,0,.144-.03l6.5-2.784a.366.366,0,0,0-.014-.679L7,35.465a.365.365,0,0,0-.26,0l-6.5,2.474a.366.366,0,0,0-.014.679ZM6.872,36.2,12.4,38.3,6.872,40.667,1.344,38.3Z" transform="translate(0 -35.441)" fill="#666"/>
                                                        <path id="Path_84" data-name="Path 84" d="M.223,125.894l6.649,2.846,6.649-2.846a.366.366,0,0,0-.288-.674l-6.361,2.723L.511,125.22a.366.366,0,1,0-.288.674Z" transform="translate(-0.001 -121.132)" fill="#666"/>
                                                        <path id="Path_85" data-name="Path 85" d="M.223,158.292l6.649,2.846,6.649-2.846a.366.366,0,1,0-.288-.673l-6.361,2.723L.511,157.619a.366.366,0,1,0-.288.673Z" transform="translate(-0.001 -152.066)" fill="#666"/>
                                                        <path id="Path_86" data-name="Path 86" d="M.223,190.7l6.649,2.846,6.649-2.846a.366.366,0,0,0-.288-.673l-6.361,2.723L.511,190.023a.366.366,0,1,0-.288.673Z" transform="translate(-0.001 -183.004)" fill="#666"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            View Details</a>
                                            <a href="#_" class="dropdown-item" data-toggle="modal" data-target=".enrollmentForm" data-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.265" height="12.451" viewBox="0 0 10.265 12.451">
                                                    <g id="forms" transform="translate(-44.944)">
                                                        <g id="Group_173" data-name="Group 173" transform="translate(44.944)">
                                                        <g id="Group_172" data-name="Group 172" transform="translate(0)">
                                                            <path id="Path_96" data-name="Path 96" d="M55.135,3.085,52.124.074A.254.254,0,0,0,51.944,0H46.179a1.236,1.236,0,0,0-1.235,1.235v9.981a1.236,1.236,0,0,0,1.235,1.235h7.8a1.236,1.236,0,0,0,1.235-1.235V3.265A.254.254,0,0,0,55.135,3.085ZM52.2.868l2.143,2.143H52.925a.727.727,0,0,1-.727-.727Zm2.5,10.349a.728.728,0,0,1-.727.727h-7.8a.728.728,0,0,1-.727-.727V1.235a.728.728,0,0,1,.727-.727H51.69V2.284a1.235,1.235,0,0,0,1.235,1.235H54.7v7.7Z" transform="translate(-44.944 0)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_175" data-name="Group 175" transform="translate(47.077 7.387)">
                                                        <g id="Group_174" data-name="Group 174" transform="translate(0)">
                                                            <path id="Path_97" data-name="Path 97" d="M133.03,303.745h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -303.745)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_177" data-name="Group 177" transform="translate(48.013 7.387)">
                                                        <g id="Group_176" data-name="Group 176" transform="translate(0)">
                                                            <path id="Path_98" data-name="Path 98" d="M175.953,303.745H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -303.745)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_179" data-name="Group 179" transform="translate(47.077 6.226)">
                                                        <g id="Group_178" data-name="Group 178" transform="translate(0)">
                                                            <path id="Path_99" data-name="Path 99" d="M133.03,256h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -256)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_181" data-name="Group 181" transform="translate(48.013 6.226)">
                                                        <g id="Group_180" data-name="Group 180" transform="translate(0)">
                                                            <path id="Path_100" data-name="Path 100" d="M175.953,256H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -256)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_183" data-name="Group 183" transform="translate(47.077 5.065)">
                                                        <g id="Group_182" data-name="Group 182" transform="translate(0)">
                                                            <path id="Path_101" data-name="Path 101" d="M133.03,208.255h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -208.255)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_185" data-name="Group 185" transform="translate(48.013 5.065)">
                                                        <g id="Group_184" data-name="Group 184" transform="translate(0)">
                                                            <path id="Path_102" data-name="Path 102" d="M175.953,208.255H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -208.255)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            View Form</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <img src="assets/images/table-img.png" alt="" class="img-fluid table-img">
                                        <div class="media-body ml-3 text-left">
                                            <p class="font-14 mb-0 grey-text">Mark Jack</p>
                                        </div>
                                    </div>
                                </td>
                                <td>mm/dd/yyyy</td>
                                <td>
                                    <div class="btn-group dropleft custom-dropdown ml-2 mb-1">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown-menu">
                                            <span class="triangle"></span>
                                            <a href="#_" class="dropdown-item">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="13.743" height="10.538" viewBox="0 0 13.743 10.538">
                                                    <g id="stack-of-square-papers" transform="translate(0 -35.441)">
                                                        <g id="Group_116" data-name="Group 116" transform="translate(0 35.441)">
                                                        <path id="Path_83" data-name="Path 83" d="M.223,38.618,6.728,41.4a.359.359,0,0,0,.144.03.369.369,0,0,0,.144-.03l6.5-2.784a.366.366,0,0,0-.014-.679L7,35.465a.365.365,0,0,0-.26,0l-6.5,2.474a.366.366,0,0,0-.014.679ZM6.872,36.2,12.4,38.3,6.872,40.667,1.344,38.3Z" transform="translate(0 -35.441)" fill="#666"/>
                                                        <path id="Path_84" data-name="Path 84" d="M.223,125.894l6.649,2.846,6.649-2.846a.366.366,0,0,0-.288-.674l-6.361,2.723L.511,125.22a.366.366,0,1,0-.288.674Z" transform="translate(-0.001 -121.132)" fill="#666"/>
                                                        <path id="Path_85" data-name="Path 85" d="M.223,158.292l6.649,2.846,6.649-2.846a.366.366,0,1,0-.288-.673l-6.361,2.723L.511,157.619a.366.366,0,1,0-.288.673Z" transform="translate(-0.001 -152.066)" fill="#666"/>
                                                        <path id="Path_86" data-name="Path 86" d="M.223,190.7l6.649,2.846,6.649-2.846a.366.366,0,0,0-.288-.673l-6.361,2.723L.511,190.023a.366.366,0,1,0-.288.673Z" transform="translate(-0.001 -183.004)" fill="#666"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            View Details</a>
                                            <a href="#_" class="dropdown-item" data-toggle="modal" data-target=".enrollmentForm" data-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.265" height="12.451" viewBox="0 0 10.265 12.451">
                                                    <g id="forms" transform="translate(-44.944)">
                                                        <g id="Group_173" data-name="Group 173" transform="translate(44.944)">
                                                        <g id="Group_172" data-name="Group 172" transform="translate(0)">
                                                            <path id="Path_96" data-name="Path 96" d="M55.135,3.085,52.124.074A.254.254,0,0,0,51.944,0H46.179a1.236,1.236,0,0,0-1.235,1.235v9.981a1.236,1.236,0,0,0,1.235,1.235h7.8a1.236,1.236,0,0,0,1.235-1.235V3.265A.254.254,0,0,0,55.135,3.085ZM52.2.868l2.143,2.143H52.925a.727.727,0,0,1-.727-.727Zm2.5,10.349a.728.728,0,0,1-.727.727h-7.8a.728.728,0,0,1-.727-.727V1.235a.728.728,0,0,1,.727-.727H51.69V2.284a1.235,1.235,0,0,0,1.235,1.235H54.7v7.7Z" transform="translate(-44.944 0)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_175" data-name="Group 175" transform="translate(47.077 7.387)">
                                                        <g id="Group_174" data-name="Group 174" transform="translate(0)">
                                                            <path id="Path_97" data-name="Path 97" d="M133.03,303.745h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -303.745)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_177" data-name="Group 177" transform="translate(48.013 7.387)">
                                                        <g id="Group_176" data-name="Group 176" transform="translate(0)">
                                                            <path id="Path_98" data-name="Path 98" d="M175.953,303.745H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -303.745)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_179" data-name="Group 179" transform="translate(47.077 6.226)">
                                                        <g id="Group_178" data-name="Group 178" transform="translate(0)">
                                                            <path id="Path_99" data-name="Path 99" d="M133.03,256h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -256)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_181" data-name="Group 181" transform="translate(48.013 6.226)">
                                                        <g id="Group_180" data-name="Group 180" transform="translate(0)">
                                                            <path id="Path_100" data-name="Path 100" d="M175.953,256H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -256)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_183" data-name="Group 183" transform="translate(47.077 5.065)">
                                                        <g id="Group_182" data-name="Group 182" transform="translate(0)">
                                                            <path id="Path_101" data-name="Path 101" d="M133.03,208.255h-.114a.254.254,0,1,0,0,.508h.114a.254.254,0,1,0,0-.508Z" transform="translate(-132.662 -208.255)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                        <g id="Group_185" data-name="Group 185" transform="translate(48.013 5.065)">
                                                        <g id="Group_184" data-name="Group 184" transform="translate(0)">
                                                            <path id="Path_102" data-name="Path 102" d="M175.953,208.255H171.4a.254.254,0,0,0,0,.508h4.555a.254.254,0,0,0,0-.508Z" transform="translate(-171.144 -208.255)" fill="#a1a2a2"/>
                                                        </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            View Form</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade enrolledBatches" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <h3 class="font-36 font-brinnan-bold mt-4 color-pink">Enrolled Batches</h3>
                <div class="custom-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Total Enrollments</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>123</td>
                                <td>mm/dd/yyyy</td>
                                <td>mm/dd/yyyy</td>
                                <td><a href="#_" class="color-pink">View Users</a></td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>123</td>
                                <td>mm/dd/yyyy</td>
                                <td>mm/dd/yyyy</td>
                                <td><a href="#_" class="color-pink">View Users</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade enrollmentForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content px-lg-5 px-4">
                <h3 class="font-36 text-center font-brinnan-bold mt-4 color-pink">User Abc's Enrollment Form</h3>
                <p class="mb-2 font-brinnan-bold d-grey-text font-16">Question : <span class="ml-3 font-brinnan-light font-14">Lorem ipsum dolor sit amet, consectetur adipiscing ?</span></p>
                <div class="l-grey-bg p-3">
                    <p class="grey-text mb-0 font-14">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos.</p>
                </div>
                <p class="mb-2 mt-3 font-brinnan-bold d-grey-text font-16">Question : <span class="ml-3 font-brinnan-light font-14">Lorem ipsum dolor sit amet, consectetur adipiscing ?</span></p>
                <div class="l-grey-bg p-3">
                    <p class="grey-text mb-0 font-14">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade courseFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content px-lg-5 px-4">
                <h3 class="font-36 font-brinnan-bold mt-4">Course Feedback <span class="color-pink ml-4">4.5/<span class="font-30">5</span></span></h3>
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-12">
                        <div class="d-flex align-items-center">
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85"></div>
                            </div>
                            <p class="mb-0 font-12 ml-3 font-brinnan-regular color-pink">85%</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="progress w-100 mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
                            </div>
                            <p class="mb-0 font-12 ml-3 font-brinnan-regular mt-3 color-pink">65%</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="progress w-100 mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                            </div>
                            <p class="mb-0 font-12 ml-3 font-brinnan-regular mt-3 color-pink">45%</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="progress w-100 mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                            </div>
                            <p class="mb-0 font-12 ml-3 font-brinnan-regular mt-3 color-pink">30%</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="progress w-100 mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
                            </div>
                            <p class="mb-0 font-12 ml-3 font-brinnan-regular mt-3 color-pink">15%</p>
                        </div>
                    </div>
                </div>
                <div class="media d-md-flex d-block">
                    <img src="assets/images/table-img.png" alt="" class="img-fluid table-img mt-3">
                    <div class="media-body ml-md-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mt-3">
                                <p class="font-22 d-grey-text font-brinnan-regular mb-1">Mark Carson</p>
                                <div class="d-flex">
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="far fa-star color-pink"></i>
                                </div>
                            </div>
                            <button class="transparent-btn mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                    <g id="Group_213" data-name="Group 213" transform="translate(-1472 -411)">
                                        <rect id="Rectangle_8" data-name="Rectangle 8" width="40" height="40" rx="20" transform="translate(1472 411)" fill="#d41876"/>
                                        <g id="Group_196" data-name="Group 196" transform="translate(73.251 -146)">
                                        <g id="delete" transform="translate(1412.752 569.001)">
                                            <path id="Path_89" data-name="Path 89" d="M222.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,0,0,.721,0v-6.814A.361.361,0,0,0,222.759,154.7Zm0,0" transform="translate(-214.383 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_90" data-name="Path 90" d="M104.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,104.759,154.7Zm0,0" transform="translate(-100.637 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_91" data-name="Path 91" d="M1.021,4.582v8.883a1.989,1.989,0,0,0,.529,1.372,1.775,1.775,0,0,0,1.288.557H9.659a1.775,1.775,0,0,0,1.288-.557,1.989,1.989,0,0,0,.529-1.372V4.582a1.377,1.377,0,0,0-.353-2.708H9.277V1.423A1.416,1.416,0,0,0,7.849,0h-3.2A1.416,1.416,0,0,0,3.22,1.423v.451H1.374a1.377,1.377,0,0,0-.353,2.708Zm8.638,10.09H2.838a1.142,1.142,0,0,1-1.1-1.208V4.613h9.013v8.851a1.142,1.142,0,0,1-1.1,1.208ZM3.941,1.423a.695.695,0,0,1,.707-.7h3.2a.695.695,0,0,1,.707.7v.451H3.941ZM1.374,2.594h9.749a.649.649,0,0,1,0,1.3H1.374a.649.649,0,0,1,0-1.3Zm0,0" transform="translate(0 0)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_92" data-name="Path 92" d="M163.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,163.759,154.7Zm0,0" transform="translate(-157.51 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                        </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <p class="mb-0 grey-text mt-2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                        <p class="mb-0 d-grey-text mt-2">1 day ago</p>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="media d-md-flex d-block">
                    <img src="assets/images/table-img.png" alt="" class="img-fluid table-img mt-3">
                    <div class="media-body ml-md-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mt-3">
                                <p class="font-22 d-grey-text font-brinnan-regular mb-1">Mark Carson</p>
                                <div class="d-flex">
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="fas fa-star color-pink mr-2"></i>
                                    <i class="far fa-star color-pink"></i>
                                </div>
                            </div>
                            <button class="transparent-btn mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                    <g id="Group_213" data-name="Group 213" transform="translate(-1472 -411)">
                                        <rect id="Rectangle_8" data-name="Rectangle 8" width="40" height="40" rx="20" transform="translate(1472 411)" fill="#d41876"/>
                                        <g id="Group_196" data-name="Group 196" transform="translate(73.251 -146)">
                                        <g id="delete" transform="translate(1412.752 569.001)">
                                            <path id="Path_89" data-name="Path 89" d="M222.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,0,0,.721,0v-6.814A.361.361,0,0,0,222.759,154.7Zm0,0" transform="translate(-214.383 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_90" data-name="Path 90" d="M104.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,104.759,154.7Zm0,0" transform="translate(-100.637 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_91" data-name="Path 91" d="M1.021,4.582v8.883a1.989,1.989,0,0,0,.529,1.372,1.775,1.775,0,0,0,1.288.557H9.659a1.775,1.775,0,0,0,1.288-.557,1.989,1.989,0,0,0,.529-1.372V4.582a1.377,1.377,0,0,0-.353-2.708H9.277V1.423A1.416,1.416,0,0,0,7.849,0h-3.2A1.416,1.416,0,0,0,3.22,1.423v.451H1.374a1.377,1.377,0,0,0-.353,2.708Zm8.638,10.09H2.838a1.142,1.142,0,0,1-1.1-1.208V4.613h9.013v8.851a1.142,1.142,0,0,1-1.1,1.208ZM3.941,1.423a.695.695,0,0,1,.707-.7h3.2a.695.695,0,0,1,.707.7v.451H3.941ZM1.374,2.594h9.749a.649.649,0,0,1,0,1.3H1.374a.649.649,0,0,1,0-1.3Zm0,0" transform="translate(0 0)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                            <path id="Path_92" data-name="Path 92" d="M163.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,163.759,154.7Zm0,0" transform="translate(-157.51 -149.127)" fill="#fff" stroke="#fff" stroke-width="0.5"/>
                                        </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <p class="mb-0 grey-text mt-2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                        <p class="mb-0 d-grey-text mt-2">1 day ago</p>
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
                <input type="text" class="custom-input green-input h-auto py-2" placeholder="Enter Question">
                <div class="text-right">
                    <button class="color-pink transparent-btn mt-2 font-16">Add Another Question</button>
                </div>
                <button class="site-btn mt-lg-5 mt-4 px-5 py-2 w-100" data-dismiss="modal" aria-label="Close" data-target=".courseAdded" data-toggle="modal">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade courseAdded" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Course Abc Added Successfully!</h3>
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
                            <ellipse id="Ellipse_11" data-name="Ellipse 11" cx="68" cy="67.5" rx="68" ry="67.5" transform="translate(-0.189 -0.154)" fill="#d41876" opacity="0.34"/>
                            <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="63" cy="62.5" rx="63" ry="62.5" transform="translate(4.811 4.846)" fill="#d41876"/>
                            <path id="Icon_feather-check" data-name="Icon feather-check" d="M75.7,9,27.78,56.916,6,35.136" transform="translate(27.311 34.346)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/>
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