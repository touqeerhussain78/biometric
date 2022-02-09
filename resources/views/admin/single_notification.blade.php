<?php $title = "Notifications";
$pg = 'Notifications';
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
                        <h3 class="font-30 color-dark-33 font-brinnan-bold main-top-heading">Notifications</h3>
                        {{-- @foreach($notifications as $notification) --}}
                        <div class="noti-card mt-4 p-sm-4 p-3">
                            <div class="media">
                                <svg id="Group_90" data-name="Group 90" xmlns="http://www.w3.org/2000/svg" width="25.644" height="31.254" viewBox="0 0 25.644 31.254">
                                    <path id="Icon_material-notifications" data-name="Icon material-notifications" d="M18.822,35A3.215,3.215,0,0,0,22.028,31.8H15.617A3.2,3.2,0,0,0,18.822,35Zm9.617-9.617V17.374c0-4.921-2.629-9.04-7.212-10.13V6.154a2.4,2.4,0,1,0-4.808,0v1.09c-4.6,1.09-7.212,5.193-7.212,10.13v8.014L6,28.593v1.6H31.644v-1.6Z" transform="translate(-6 -3.75)" fill="#d41876"/>
                                </svg>
                                <div class="media-body ml-3">
                                    <p class="grey-text mb-0">{{ json_decode($notifications->data, false)->message }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-14 mb-0 color-pink">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notifications->created_at))->diffForHumans() }}</p>
                            </div>
                        </div>
                         {{-- @endforeach --}}
                        {{-- <div class="media">
                            <i class="fa fa-circle"></i>
                            <div class="media-body">
                                <p>No Notification Yet!</p>
                            </div>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection