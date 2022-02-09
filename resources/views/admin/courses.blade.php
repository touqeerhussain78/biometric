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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Courses</h4>
                            <a href="{{route('course_add')}}" class="site-btn px-5 mt-sm-0 mt-3 py-2" >Add New</a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end justify-content-end mb-4">
                    <div class="col-md-6 d-flex justify-content-end align-items-end">
                        <div class="text-field width-260 mr-5">
                            <input type="text" placeholder="Search here..." class="w-100">
                        </div>
                        <div class="select-field width-130">
                            <label for="" class="d-block ml-2 font-16 color-dark-33 font-brinnan-light mb-1">Entries</label>
                            <select class="w-100">
                                <option>10</option>
                                <option>12</option>
                                <option>14</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grey-bg">
                    <div class="row  align-items-end">
                       <form action="{{route('course_filter')}}" method="POST">
                            @csrf
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="date-field width-180">
                                <label for="" class="d-block ml-2 font-16 color-dark-33 font-brinnan-light mb-1">Sort by date</label>
                                <input type="date" required name="start_date" id="" class="w-100">
                            </div>
                            <div class="date-field width-180 ml-2">
                                <input type="date" required name="end_date" id="" class="w-100">
                            </div>
                                &nbsp;
                            <input type="submit" class="site-btn px-3 py-2" >
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            {{-- <div class="select-field width-260">
                                <label for="" class="d-block ml-2 font-16 color-dark-33 font-brinnan-light mb-1">Sort by status </label>
                                <select class="w-100 border-none">
                                    <option>search status</option>
                                    <option>Abc</option>
                                    <option>Abc</option>
                                </select> 
                            </div>--}}
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <div class="custom-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Course Title</th>
                                        <th>Enrollments</th>
                                        <th>Added On</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @if(isset($courses))
                                      @foreach ($courses as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->slots}}</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <div class="btn-group custom-dropdown ml-2 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu last-drop">
                                                    <a href="{{route('course_detail',['id'=>$item->id])}}" class="dropdown-item">
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
                                                    Details</a>
                                                    <a href="{{route('course_edit',['id' => $item->id])}}" class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="11.453" height="11.338" viewBox="0 0 11.453 11.338">
                                                            <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2" d="M10.972,3.7A1.5,1.5,0,0,1,13.1,5.823L5.923,13,3,13.8l.8-2.923Z" transform="translate(-2.6 -2.857)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8"/>
                                                        </svg>
                                                    Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    @php
                                        $i=1;
                                    @endphp
                                    @if(isset($course_filter))
                                      @foreach ($course_filter as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->slots}}</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <div class="btn-group custom-dropdown ml-2 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu last-drop">
                                                    <a href="{{route('course_detail',['id'=>$item->id])}}" class="dropdown-item">
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
                                                    Details</a>
                                                    <a href="{{route('course_edit',['id' => $item->id])}}" class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="11.453" height="11.338" viewBox="0 0 11.453 11.338">
                                                            <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2" d="M10.972,3.7A1.5,1.5,0,0,1,13.1,5.823L5.923,13,3,13.8l.8-2.923Z" transform="translate(-2.6 -2.857)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8"/>
                                                        </svg>
                                                    Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

<div class="modal fade userActivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">User Activated Successfully!</h3>
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