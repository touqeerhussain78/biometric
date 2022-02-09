@extends('layouts.myapp')
@extends('layouts.sidebar')
@section('content')

<style>
    #mychart{
  width: 350px;
  height: 200px;
}
</style>
    <div id="page-content-wrapper" data-scrollbar>
        <div id="configuration">
            <div class="dashboard custom-card">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Dashboard</h3>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="dashboard-top-card">
                            <div class="chart-box">
                                <h4 class="font-arial-regular mb-0">100%</h4>
                            </div>
                            <div class="chart-detail-box ml-2 ml-xl-5">
                                <h6 class="font-16 text-white font-brinnan-regular ">Total Users</h6>
                                <h5 class="font-18 color-pink font-brinnan-regular ">{{$users}}</h5>
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
                                <h5 class="font-18 color-pink font-brinnan-regular ">{{$course_enroll}}</h5>
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
                                <h5 class="font-18 color-pink font-brinnan-regular ">${{$payment}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="">

                <div class="row my-5 align-items-center">
                    <div class="col-md-6">
                        <h4 class="font-24 color-dark-33 font-brinnan-regular mb-0">Amount Analytics</h4>
                    </div>
                    <div class="col-md-6 text-right">
                     <select name="year" id="selectYear">
                        <option value="">Select year</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                    </select>
                    </div>
                </div>
                <div class="box">
                    <div class="chart-main position-relative">
                        <div class="row">
                            <div class="col-12">
                                
                                 <div class="chart-container">
                                    <div class="pie-chart-container">
                                    <canvas id="pie-chart"></canvas>
                                    </div>
                                </div>
                                {{-- <div id="mychart"></div> --}}
                                {{-- <div id="bars_basic" class="height-400 echart-container"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                {{-- <div class="row no-gutters">
                    <div class="col-12">
                        <h5 class="amount">Amount</h5>
                        <img class="w-100" src="./assets/images/chart.png" alt="">
                        <h5 class="year">Year</h5>
                    </div>
                </div> --}}
                <div class="row my-5 align-items-end">
                    <div class="col-md-6">
                        <h4 class="font-24 color-dark-33 font-brinnan-regular mb-0">Recent Payments</h4>
                    </div>
                    {{-- <div class="col-md-6 d-flex justify-content-end align-items-end">
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
                    </div> --}}
                </div>

                <div class="grey-bg">
                    <div class="row  align-items-end">
                        <form action="{{route('dashboard_payment_filter')}}" method="POST">
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
                                    @if(isset($payments_log))
                                      @foreach ($payments_log as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->user_enroll->user->first_name}}</td>
                                        <td>{{$item->user_enroll->user->last_name}}</td>
                                        <td>{{$item->user_enroll->course->title}}</td>
                                        <td>Course</td>
                                        <td>{{$item->created_at->format('m/d/Y')}}</td>
                                        <td>${{$item->cost}}</td>
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
                                        <td>${{$item->cost}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    {{-- {{asset('assets/admin/assets/js/echarts.min.js')}} --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.min.js"></script> --}}

     {{-- <script src="{{ asset('assets/admin/assets/js/echarts.min.js') }}" type="text/javascript"></script> --}}

<script type="text/javascript">
  

        // $( document ).ready(function() {
        //     $('#selectYear').change();

        // });

        // $('#selectYear').on('change', function() {
       
        //     var year = this.value;

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type:'POST',
        //         url:"{{ route('get-chart') }}",
        //         data:{ year:year },
        //         success:function(data){
        //             var bars_basic_element = document.getElementById('bars_basic');
        //             if (bars_basic_element) {
        //                 var bars_basic = echarts.init(bars_basic_element);
        //                 bars_basic.setOption({
        //                     color: ['#3398DB'],
        //                     tooltip: {
        //                         trigger: 'axis',
        //                         axisPointer: {
        //                             type: 'shadow'
        //                         }
        //                     },
        //                     grid: {
        //                         left: '3%',
        //                         right: '4%',
        //                         bottom: '3%',
        //                         containLabel: true
        //                     },
        //                     xAxis: [
        //                         {
        //                             type: 'category',
        //                             data: ['Jan', 'Feb','March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        //                             axisTick: {
        //                                 alignWithLabel: true
        //                             }
        //                         }
        //                     ],
        //                     yAxis: [
        //                         {
        //                             type: 'value'
        //                         }
        //                     ],
        //                     series: [
        //                         {
        //                             name: 'Valuation Requests',
        //                             type: 'bar',
        //                             barWidth: '30%',
        //                             data: data.valuation_request_Counts
        //                         }
        //                     ]
        //                 });
        //             }

        //         }
        //     });


        // });



</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
 <script>

      $( document ).ready(function() {
            $('#selectYear').change();

        });

        $('#selectYear').on('change', function() {
            
            var year = this.value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:"{{ route('get-chart') }}",
                data:{ year:year },
                success:function(data){
                    console.log(data)
                    // var bars_basic_element = document.getElementById('bars_basic');
                    var cData = data;
                    // console.log(cData.chart_data.label);

                    var ctx = $("#pie-chart");

                        //pie chart data
                    var data = {
                        labels: cData.chart_data.label,
                        datasets: [
                        {
                            label: "Revenue",
                            data: cData.chart_data.data,
                            backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                            ],
                            borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                            ],
                            borderWidth: [1, 1, 1, 1, 1,1,1]
                        }
                        ]
                    };
                
                    //options   
                    var options = {
                        responsive: true,
                        title: {
                        display: true,
                        position: "top",
                        text: "This Year Payment ",
                        fontSize: 18,
                        fontColor: "#111"
                        },
                        legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                        }
                    };
                
                    //create Pie Chart class object
                    var chart1 = new Chart(ctx, {
                        type: "bar",
                        data: data,
                        options: options
                    });
                }
            });

        });

  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Revenue",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "This Year Payment ",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });
 
  });
</script>

@endsection