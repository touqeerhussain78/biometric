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
                    <div class="col-12">
                        <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">User Details</h4>
                        <div class="profile-card px-lg-5 p-4">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div class="profile-pic-sm">
                                    @if(isset($user_record->image))                                        
                                    <img src="{{asset('images')}}/{{$user_record->image}}"  alt="" class="img-fluid">
                                    @endif
                                </div>
                                <a  href="{{route('user_edit_single',['id'=>$user_record->id])}}" class="site-btn green-btn px-5 py-2 mt-sm-0 mt-3">Edit</a>
                            </div>
                            <div class="row">
                                <div class="col-xl-5 col-lg-7">
                                    <div class="row">
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 d-grey-text font-20">First Name :</p>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 grey-text font-18">{{$user_record->first_name}}</p>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 d-grey-text font-20">Last Name :</p>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 grey-text font-18">{{$user_record->first_name}}</p>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 d-grey-text font-20">Email Address :</p>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="mb-0 grey-text font-18">{{$user_record->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 align-items-end">
                    <div class="col-md-6">
                        <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">User's Payment Logs</h4>
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
                          <form action="{{route('payment_log_filter')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user_record->id}}">
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="date-field width-180">
                                <label for="" class="d-block ml-2 font-16 color-dark-33 font-brinnan-light mb-1">Sort by date</label>
                                 <input type="date" required name="start_date" id="" class="w-100">
                            </div>
                            <div class="date-field width-180 ml-4">
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
                            </div> --}}
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
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                @if(isset($payment_log))
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($payment_log as $item)                                        
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->course->title}}</td>
                                        <td>{{$item->payment_type}}</td>
                                         <td>{{$item->created_at->format('m/d/Y') }}</td>
                                        <td>{{$item->cost}}</td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif 
                                
                                @if(isset($payment_log_filter))
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($payment_log_filter as $item)                                        
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->course->title}}</td>
                                        <td>{{$item->payment_type}}</td>
                                         <td>{{$item->created_at->format('m/d/Y') }}</td>
                                        <td>{{$item->cost}}</td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item"><a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4.417" height="7.153" viewBox="0 0 4.417 7.153">
                                        <path id="Icon_material-keyboard-arrow-left" data-name="Icon material-keyboard-arrow-left" d="M16.417,14.563l-2.73-2.736,2.73-2.736-.84-.84L12,11.827,15.577,15.4Z" transform="translate(-12 -8.25)" fill="#002a36"/>
                                    </svg>
                                </a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="4.417" height="7.153" viewBox="0 0 4.417 7.153">
                                        <path id="Icon_material-keyboard-arrow-left" data-name="Icon material-keyboard-arrow-left" d="M12,14.563l2.73-2.736L12,9.09l.84-.84,3.577,3.577L12.84,15.4Z" transform="translate(-12 -8.25)" fill="#002a36"/>
                                    </svg>
                                </a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- <?php include('footer.php'); ?> --}}