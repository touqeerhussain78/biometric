<?php $title = "Dashboard";
$pg = 'Dashboard';
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
                        <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Quick Stats</h3>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="dashboard-top-card">
                            <div class="chart-box">
                                <h4 class="font-arial-regular mb-0">100%</h4>
                            </div>
                            <div class="chart-detail-box ml-2 ml-xl-5">
                                <h6 class="font-16 text-white font-brinnan-regular ">Total Users</h6>
                                <h5 class="font-18 color-pink font-brinnan-regular ">{{$total_user_enroll}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="dashboard-top-card">
                            <div class="chart-box">
                                <h4 class="font-arial-regular mb-0">100%</h4>
                            </div>
                            <div class="chart-detail-box ml-2 ml-xl-5">
                                <h6 class="font-16 text-white font-brinnan-regular ">Total Course Enrollments</h6>
                                <h5 class="font-18 color-pink font-brinnan-regular ">{{$total_course_enroll}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dashboard-top-card">
                            <div class="chart-box">
                                <h4 class="font-arial-regular mb-0">100%</h4>
                            </div>
                            <div class="chart-detail-box ml-2 ml-xl-5">
                                <h6 class="font-16 text-white font-brinnan-regular ">Total Amount</h6>
                                <h5 class="font-18 color-pink font-brinnan-regular ">${{$total_amount}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row my-5 align-items-end">
                    <form action="{{route('payment_filter_month')}}" method="POST">
                            @csrf
                    <div class="col-12">
                        <h4 class="font-24 color-dark-33 font-brinnan-regular">Payment Logs</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="width-180">
                            <label for="" class="d-block ml-2 font-16 color-dark-33 font-brinnan-light mb-1">Select Month</label>
                            <input type="month" name="month"  placeholder="Search here..." class="w-100 site-input px-3 font-14 py-2 green-input rounded-pill">
                        </div>                    
                    </div>
                    <br>
                    <div class="col-md-4">
                           <input type="submit" class="site-btn px-3 py-2" >
                    </div>
                    
                    </form>
                </div> --}}

                <div class="grey-bg">
                    <div class="row  align-items-end">
                       <form action="{{route('payment_filter')}}" method="POST">
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
                                        <th>User First Name</th>
                                        <th>User Last Name</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                        $i=1;
                                    @endphp
                                    @if(isset($payments))
                                      @foreach ($payments as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->user_enroll->user->first_name}}</td>
                                        <td>{{$item->user_enroll->user->last_name}}</td>
                                        <td>{{$item->user_enroll->course->title}}</td>
                                        <td>Course</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>{{$item->cost}}</td>
                                    </tr>
                                    @endforeach
                                    @endif

                                     @if(isset($payment_filter))
                                      @foreach ($payment_filter as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->user_enroll->user->first_name}}</td>
                                        <td>{{$item->user_enroll->user->last_name}}</td>
                                        <td>{{$item->user_enroll->course->title}}</td>
                                        <td>Course</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>{{$item->cost}}</td>
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

@endsection