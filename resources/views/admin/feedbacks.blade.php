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
                <div class="col-12">
                    <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Feedbacks</h4>
                </div>
                <div class="col-12 d-flex justify-content-end align-items-end">
                    <div class="text-field width-260 mr-3">
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
                <div class="row align-items-end">
                    <form action="{{route('feedback_filter')}}" method="POST">
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
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                        $i=1;
                                    @endphp
                                    @if(isset($feedbacks))
                                      @foreach ($feedbacks as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>
                                            <div class="btn-group custom-dropdown ml-2 mb-1">
                                                <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu last-drop">
                                                    <a href="{{route('feedback_detail',['id'=>$item->id])}}" class="dropdown-item">
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
                                                  <a href="#_" onclick="delete_me({{$item->id}})"  class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12.503" height="15.395" viewBox="0 0 12.503 15.395">
                                                            <g id="delete" transform="translate(0.003 0.001)">
                                                                <path id="Path_89" data-name="Path 89" d="M222.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,0,0,.721,0v-6.814A.361.361,0,0,0,222.759,154.7Zm0,0" transform="translate(-214.383 -149.127)" fill="#768289"/>
                                                                <path id="Path_90" data-name="Path 90" d="M104.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,104.759,154.7Zm0,0" transform="translate(-100.637 -149.127)" fill="#768289"/>
                                                                <path id="Path_91" data-name="Path 91" d="M1.021,4.582v8.883a1.989,1.989,0,0,0,.529,1.372,1.775,1.775,0,0,0,1.288.557H9.659a1.775,1.775,0,0,0,1.288-.557,1.989,1.989,0,0,0,.529-1.372V4.582a1.377,1.377,0,0,0-.353-2.708H9.277V1.423A1.416,1.416,0,0,0,7.849,0h-3.2A1.416,1.416,0,0,0,3.22,1.423v.451H1.374a1.377,1.377,0,0,0-.353,2.708Zm8.638,10.09H2.838a1.142,1.142,0,0,1-1.1-1.208V4.613h9.013v8.851a1.142,1.142,0,0,1-1.1,1.208ZM3.941,1.423a.695.695,0,0,1,.707-.7h3.2a.695.695,0,0,1,.707.7v.451H3.941ZM1.374,2.594h9.749a.649.649,0,0,1,0,1.3H1.374a.649.649,0,0,1,0-1.3Zm0,0" transform="translate(0 0)" fill="#768289"/>
                                                                <path id="Path_92" data-name="Path 92" d="M163.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,163.759,154.7Zm0,0" transform="translate(-157.51 -149.127)" fill="#768289"/>
                                                            </g>
                                                        </svg>
                                                    Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    @php
                                        $i=1;
                                    @endphp
                                    @if(isset($feedback_filter))
                                      @foreach ($feedback_filter as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
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
                                                      <a href="#_" onclick="delete_me({{$item->id}})"  class="dropdown-item">
                                                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="12.503" height="15.395" viewBox="0 0 12.503 15.395">
                                                            <g id="delete" transform="translate(0.003 0.001)">
                                                                <path id="Path_89" data-name="Path 89" d="M222.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,0,0,.721,0v-6.814A.361.361,0,0,0,222.759,154.7Zm0,0" transform="translate(-214.383 -149.127)" fill="#768289"/>
                                                                <path id="Path_90" data-name="Path 90" d="M104.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,104.759,154.7Zm0,0" transform="translate(-100.637 -149.127)" fill="#768289"/>
                                                                <path id="Path_91" data-name="Path 91" d="M1.021,4.582v8.883a1.989,1.989,0,0,0,.529,1.372,1.775,1.775,0,0,0,1.288.557H9.659a1.775,1.775,0,0,0,1.288-.557,1.989,1.989,0,0,0,.529-1.372V4.582a1.377,1.377,0,0,0-.353-2.708H9.277V1.423A1.416,1.416,0,0,0,7.849,0h-3.2A1.416,1.416,0,0,0,3.22,1.423v.451H1.374a1.377,1.377,0,0,0-.353,2.708Zm8.638,10.09H2.838a1.142,1.142,0,0,1-1.1-1.208V4.613h9.013v8.851a1.142,1.142,0,0,1-1.1,1.208ZM3.941,1.423a.695.695,0,0,1,.707-.7h3.2a.695.695,0,0,1,.707.7v.451H3.941ZM1.374,2.594h9.749a.649.649,0,0,1,0,1.3H1.374a.649.649,0,0,1,0-1.3Zm0,0" transform="translate(0 0)" fill="#768289"/>
                                                                <path id="Path_92" data-name="Path 92" d="M163.759,154.7a.361.361,0,0,0-.361.361v6.814a.361.361,0,1,0,.721,0v-6.814A.361.361,0,0,0,163.759,154.7Zm0,0" transform="translate(-157.51 -149.127)" fill="#768289"/>
                                                            </g>
                                                        </svg>
                                                    Delete</a>
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

<div class="modal fade deleteFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body-content text-center px-lg-5 px-4">
                <img src="assets/images/qusetion.png" alt="" class="img-fluid">
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to delete this?</h3>
                <div class="d-sm-flex align-items-center justify-content-center">
                    <button class="site-btn mt-3 px-5 py-2" data-dismiss="modal" aria-label="Close" data-target=".feedbackDeleted" data-toggle="modal">Yes</button>
                    <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade feedbackDeleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Feedback Deleted Successfully!</h3>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    function delete_me ($id){
        
        var feedback_id = $id;

        Swal.fire({

        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        $.ajax({
            url: "{{route('feedback_delete')}}",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                 id:feedback_id
            },
            dataType: 'json',
        }).done(function( response ) {
            location.reload();
            console.log(response);
        });
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
    })
    }
</script>
@endsection