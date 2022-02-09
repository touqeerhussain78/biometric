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
                        <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Feedbacks</h3>
                        <div class="text-center mt-5">
                            <img src="assets/images/not-found.png" alt="" class="img-fluid">
                            <h2 class="font-25 mt-3 font-brinnan-regular d-grey-text">No Record Found!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
