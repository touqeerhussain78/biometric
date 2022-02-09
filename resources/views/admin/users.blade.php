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
                <div class="row mb-4 align-items-end">
                    <div class="col-md-6">
                        <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">User</h4>
                    </div>
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
                        <form action="{{route('user_filter')}}" method="POST">
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Registration Date</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if(isset($users))
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->first_name}} </td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->created_at->format('m/d/Y') }}</td>
                                        <td>{{$item->email}}</td>
                                        @if($item->status=='1')
                                        <td>Active</td>
                                        @else
                                        <td>DeActive</td>
                                        @endif
                                        <td>
                                            <div class="btn-group dropleft custom-dropdown ml-2 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu custom-dropdown-menu">
                                                    <span class="triangle"></span>
                                                    <a href="{{route('user_detail',['id'=>$item->id])}}" class="dropdown-item">
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
                                                    
                                                    <a href="{{route('user_edit',['id'=>$item->id])}}" class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="11.453" height="11.338" viewBox="0 0 11.453 11.338">
                                                            <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2" d="M10.972,3.7A1.5,1.5,0,0,1,13.1,5.823L5.923,13,3,13.8l.8-2.923Z" transform="translate(-2.6 -2.857)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8"/>
                                                        </svg>
                                                    Edit</a>
                                                    <a class="dropdown-item" onclick="inactive_me({{$item->id}},{{$item->status}})"  >
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12.871" height="15.428" viewBox="0 0 12.871 15.428">
                                                            <g id="Group_117" data-name="Group 117" transform="translate(-1319.676 -447.839)">
                                                                <g id="user" transform="translate(1319.676 447.839)">
                                                                <path id="Path_87" data-name="Path 87" d="M90.748,7.432a3.6,3.6,0,0,0,2.627-1.089,3.6,3.6,0,0,0,1.089-2.627,3.6,3.6,0,0,0-1.089-2.627,3.715,3.715,0,0,0-5.254,0,3.6,3.6,0,0,0-1.089,2.627A3.6,3.6,0,0,0,88.12,6.343,3.6,3.6,0,0,0,90.748,7.432Zm-1.988-5.7a2.811,2.811,0,0,1,3.976,0,2.686,2.686,0,0,1,.824,1.988A2.686,2.686,0,0,1,92.736,5.7a2.81,2.81,0,0,1-3.976,0,2.686,2.686,0,0,1-.824-1.988,2.686,2.686,0,0,1,.824-1.988Zm0,0" transform="translate(-84.409 0)" fill="#666"/>
                                                                <path id="Path_88" data-name="Path 88" d="M12.84,251.727a9.178,9.178,0,0,0-.125-.975,7.68,7.68,0,0,0-.24-.98,4.842,4.842,0,0,0-.4-.914,3.445,3.445,0,0,0-.607-.792,2.679,2.679,0,0,0-.873-.548,3.016,3.016,0,0,0-1.114-.2,1.131,1.131,0,0,0-.6.256c-.181.118-.393.255-.629.406a3.6,3.6,0,0,1-.814.359,3.161,3.161,0,0,1-1.991,0,3.594,3.594,0,0,1-.813-.359c-.234-.15-.446-.286-.63-.406a1.13,1.13,0,0,0-.6-.256,3.013,3.013,0,0,0-1.114.2,2.677,2.677,0,0,0-.873.548,3.446,3.446,0,0,0-.607.792,4.85,4.85,0,0,0-.4.914,7.7,7.7,0,0,0-.24.98,9.115,9.115,0,0,0-.125.975c-.02.295-.031.6-.031.911a2.562,2.562,0,0,0,.761,1.938,2.739,2.739,0,0,0,1.961.715H10.15a2.739,2.739,0,0,0,1.96-.715,2.561,2.561,0,0,0,.761-1.938c0-.311-.011-.617-.031-.911Zm-1.353,2.194a1.844,1.844,0,0,1-1.337.466H2.721a1.844,1.844,0,0,1-1.337-.466,1.673,1.673,0,0,1-.48-1.283c0-.289.01-.575.029-.849a8.222,8.222,0,0,1,.113-.878,6.79,6.79,0,0,1,.211-.864,3.949,3.949,0,0,1,.328-.743,2.554,2.554,0,0,1,.446-.585,1.777,1.777,0,0,1,.581-.361,2.081,2.081,0,0,1,.712-.137c.032.017.088.049.179.109.186.121.4.259.637.411a4.479,4.479,0,0,0,1.022.457,4.064,4.064,0,0,0,2.547,0,4.486,4.486,0,0,0,1.022-.457c.242-.155.451-.289.636-.41.091-.059.148-.092.179-.109a2.082,2.082,0,0,1,.712.137,1.779,1.779,0,0,1,.581.361,2.548,2.548,0,0,1,.446.585,3.935,3.935,0,0,1,.328.743,6.773,6.773,0,0,1,.211.864,8.291,8.291,0,0,1,.113.878h0c.019.273.029.558.029.848a1.673,1.673,0,0,1-.48,1.283Zm0,0" transform="translate(0 -239.864)" fill="#666"/>
                                                                </g>
                                                                <path id="Icon_ionic-ios-close-circle" data-name="Icon ionic-ios-close-circle" d="M5.075,3.375a1.7,1.7,0,1,0,1.7,1.7A1.7,1.7,0,0,0,5.075,3.375Zm.431,2.316L5.075,5.26l-.431.431a.131.131,0,1,1-.185-.185l.431-.431L4.46,4.644a.131.131,0,1,1,.185-.185l.431.431.431-.431a.131.131,0,1,1,.185.185l-.431.431.431.431a.131.131,0,0,1,0,.185A.13.13,0,0,1,5.506,5.691Z" transform="translate(1323.904 445.813)" fill="#666"/>
                                                            </g>
                                                        </svg>
                                                    In-active</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                                @endif

                                @if(isset($user_filter))
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($user_filter as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->first_name}} </td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->created_at->format('m/d/Y') }}</td>
                                        <td>{{$item->email}}</td>
                                        @if($item->status=='1')
                                        <td>Active</td>
                                        @else
                                        <td>DeActive</td>
                                        @endif
                                        <td>
                                            <div class="btn-group dropleft custom-dropdown ml-2 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu custom-dropdown-menu">
                                                    <span class="triangle"></span>
                                                    <a href="{{route('user_detail',['id'=>$item->id])}}"  class="dropdown-item">
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
                                                    
                                                    <a href="{{route('user_edit',['id'=>$item->id])}}" class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="11.453" height="11.338" viewBox="0 0 11.453 11.338">
                                                            <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2" d="M10.972,3.7A1.5,1.5,0,0,1,13.1,5.823L5.923,13,3,13.8l.8-2.923Z" transform="translate(-2.6 -2.857)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8"/>
                                                        </svg>
                                                    Edit</a>
                                                    <a  onclick="inactive_me({{$item->id}},{{$item->status}})"  class="dropdown-item" >
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12.871" height="15.428" viewBox="0 0 12.871 15.428">
                                                            <g id="Group_117" data-name="Group 117" transform="translate(-1319.676 -447.839)">
                                                                <g id="user" transform="translate(1319.676 447.839)">
                                                                <path id="Path_87" data-name="Path 87" d="M90.748,7.432a3.6,3.6,0,0,0,2.627-1.089,3.6,3.6,0,0,0,1.089-2.627,3.6,3.6,0,0,0-1.089-2.627,3.715,3.715,0,0,0-5.254,0,3.6,3.6,0,0,0-1.089,2.627A3.6,3.6,0,0,0,88.12,6.343,3.6,3.6,0,0,0,90.748,7.432Zm-1.988-5.7a2.811,2.811,0,0,1,3.976,0,2.686,2.686,0,0,1,.824,1.988A2.686,2.686,0,0,1,92.736,5.7a2.81,2.81,0,0,1-3.976,0,2.686,2.686,0,0,1-.824-1.988,2.686,2.686,0,0,1,.824-1.988Zm0,0" transform="translate(-84.409 0)" fill="#666"/>
                                                                <path id="Path_88" data-name="Path 88" d="M12.84,251.727a9.178,9.178,0,0,0-.125-.975,7.68,7.68,0,0,0-.24-.98,4.842,4.842,0,0,0-.4-.914,3.445,3.445,0,0,0-.607-.792,2.679,2.679,0,0,0-.873-.548,3.016,3.016,0,0,0-1.114-.2,1.131,1.131,0,0,0-.6.256c-.181.118-.393.255-.629.406a3.6,3.6,0,0,1-.814.359,3.161,3.161,0,0,1-1.991,0,3.594,3.594,0,0,1-.813-.359c-.234-.15-.446-.286-.63-.406a1.13,1.13,0,0,0-.6-.256,3.013,3.013,0,0,0-1.114.2,2.677,2.677,0,0,0-.873.548,3.446,3.446,0,0,0-.607.792,4.85,4.85,0,0,0-.4.914,7.7,7.7,0,0,0-.24.98,9.115,9.115,0,0,0-.125.975c-.02.295-.031.6-.031.911a2.562,2.562,0,0,0,.761,1.938,2.739,2.739,0,0,0,1.961.715H10.15a2.739,2.739,0,0,0,1.96-.715,2.561,2.561,0,0,0,.761-1.938c0-.311-.011-.617-.031-.911Zm-1.353,2.194a1.844,1.844,0,0,1-1.337.466H2.721a1.844,1.844,0,0,1-1.337-.466,1.673,1.673,0,0,1-.48-1.283c0-.289.01-.575.029-.849a8.222,8.222,0,0,1,.113-.878,6.79,6.79,0,0,1,.211-.864,3.949,3.949,0,0,1,.328-.743,2.554,2.554,0,0,1,.446-.585,1.777,1.777,0,0,1,.581-.361,2.081,2.081,0,0,1,.712-.137c.032.017.088.049.179.109.186.121.4.259.637.411a4.479,4.479,0,0,0,1.022.457,4.064,4.064,0,0,0,2.547,0,4.486,4.486,0,0,0,1.022-.457c.242-.155.451-.289.636-.41.091-.059.148-.092.179-.109a2.082,2.082,0,0,1,.712.137,1.779,1.779,0,0,1,.581.361,2.548,2.548,0,0,1,.446.585,3.935,3.935,0,0,1,.328.743,6.773,6.773,0,0,1,.211.864,8.291,8.291,0,0,1,.113.878h0c.019.273.029.558.029.848a1.673,1.673,0,0,1-.48,1.283Zm0,0" transform="translate(0 -239.864)" fill="#666"/>
                                                                </g>
                                                                <path id="Icon_ionic-ios-close-circle" data-name="Icon ionic-ios-close-circle" d="M5.075,3.375a1.7,1.7,0,1,0,1.7,1.7A1.7,1.7,0,0,0,5.075,3.375Zm.431,2.316L5.075,5.26l-.431.431a.131.131,0,1,1-.185-.185l.431-.431L4.46,4.644a.131.131,0,1,1,.185-.185l.431.431.431-.431a.131.131,0,1,1,.185.185l-.431.431.431.431a.131.131,0,0,1,0,.185A.13.13,0,0,1,5.506,5.691Z" transform="translate(1323.904 445.813)" fill="#666"/>
                                                            </g>
                                                        </svg>
                                                    In-active</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                                @endif


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
                <p id="data-id"></p>
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to Inactive this user ? </h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                    <input type="submit" class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".userInactivated" data-toggle="modal" value="Yes">
                {{-- <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".userInactivated" data-toggle="modal">Yes</button> --}}
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    function inactive_me ($id,$status){
        
        var user_id = $id;
        var status = $status;
        Swal.fire({

        title: 'Are you sure?',
        text: "You want be Active  this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Activate it!'
        }).then((result) => {

        $.ajax({
            url: "/user_status",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                 id:user_id,
                status:status
            },
            dataType: 'json',
        }).done(function( response ) {
            location.reload();

            console.log(response);
        });
        if (result.isConfirmed) {
            Swal.fire(
            // 'Deleted!',
            'Its Activated.',
            'success'
            )
        }
    })
    }
</script>

@endsection