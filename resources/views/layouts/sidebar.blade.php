<?php
$pg="";
?>
<div id="wrapper" class="active">
  <div class="top-nav-bar">
    <ul id="sidebar-logo">
      <li class="navbar-logo">
        <a href="{{route('dashboard')}}" class="navbar-logo-img"> <img src="{{asset('assets/images/fav-icon.png')}}"> </a>
      </li>
    </ul>
    <div class="top-nav-bar-inner">
      <div class="sidebar-brand">
        <a id="menu-toggle" href="#"> <img src="./assets/images/menu-toggle.png" alt=""> </a>
      </div>
      <div class="mobile-logo">
        <a href="{{route('dashboard')}}" class="navbar-logo-img"> <img src="assets/images/fav-icon.png"> </a>
      </div>
      <div class="mobile-toggle">
        <div class="dropdown">
          <button type="button" class="dropdown-toggle" id="DropdownToggle">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
          </button>

        </div>
      </div>
      <div class="toggle-items">
        <div class="top-bar-right-icon">
          <div class="notification-div mr-4">
            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell"></i><span class="three">{{count(auth()->user()->notifications)}}</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <span class="triangle"></span>
                <div class="notification-scroll" data-scrollbar>
                  <div class="dropdownbar">
                    {{-- @forelse(auth()->user()->notifications as $notification)
                    <a href="{{ route('admin.notifications.show', $notification->id) }}">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i class="fa fa-circle"></i> </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">{{ json_decode($notification->data, false)->subject }}!</h6>
                                                    <p class="notification-text font-small-3 text-muted">{{ json_decode($notification->data, false)->message }}</p> <small>
                                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</time>
                                                </small> </div>
                                            </div>
                                          </a>
                                          @empty
                                          <div class="media-body">
                                            <p class="notification-text">
                                              No notification yet</p>
                                            </div>
                                            @endforelse --}}
                    @forelse(auth()->user()->notifications as $notification)
                    <div class="notification-msg d-flex">
                        <i class="fas fa-bell color-pink font-20 pt-1 mr-3"></i>
                        <a href="{{ route('single_notification', $notification->id) }}">
                            <p class="color-dark-66 font-16 font-brinnan-light m-0">{{ json_decode($notification->data, false)->message }}/p>
                            <h6 class="text-right color-pink font-12 font-brinnan-light m-0">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</h6>
                          </a>
                    </div>
                      @empty
                      <div class="media-body">
                          <p class="notification-text">
                            No notification yet</p>
                      </div>
                    @endforelse
                  </div>
                </div>

                <div class="dropdownbar text-right">
                  <a href="{{ route('notifications') }}"class="background-pink font-12 font-brinnan-light view-all">View All</a>
                </div>
              </div>
            </div>

          </div>
          <div class="profile-dropdown">

            <div class="dropdown">
              <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('images')}}/{{Auth::user()->image}}" alt="">
                <div class="text">
                {{-- {{ Auth::user()->name }} --}}
                Marry <span>Admin</span>
                </div>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <span class="triangle"></span>
                <a class="dropdown-item" href="{{route('profile')}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 16.75">
                    <g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(-5.5 -4)">
                      <path id="Path_75" data-name="Path 75" d="M20,27.75V26a3.5,3.5,0,0,0-3.5-3.5h-7A3.5,3.5,0,0,0,6,26v1.75" transform="translate(0 -7.5)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                      <path id="Path_76" data-name="Path 76" d="M19,8a3.5,3.5,0,1,1-3.5-3.5A3.5,3.5,0,0,1,19,8Z" transform="translate(-2.5 0)" fill="none" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                    </g>
                  </svg>
                  Profile</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".logOut"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 10.633">
                    <g id="logout_1_" data-name="logout (1)" transform="translate(0 -58.95)">
                      <g id="Group_86" data-name="Group 86" transform="translate(0 58.95)">
                        <path id="Path_79" data-name="Path 79" d="M0,60.723V67.81a1.777,1.777,0,0,0,1.773,1.773H7.5A1.777,1.777,0,0,0,9.274,67.81V66.662a.351.351,0,1,0-.7,0V67.81A1.076,1.076,0,0,1,7.5,68.884H1.773A1.076,1.076,0,0,1,.7,67.81V60.723A1.076,1.076,0,0,1,1.773,59.65H7.5a1.076,1.076,0,0,1,1.074,1.074v1.148a.351.351,0,1,0,.7,0V60.723A1.777,1.777,0,0,0,7.5,58.95H1.773A1.775,1.775,0,0,0,0,60.723Z" transform="translate(0 -58.95)" fill="#666" />
                        <path id="Path_80" data-name="Path 80" d="M211.414,154.338a.352.352,0,0,0,.5,0l2.4-2.4a.348.348,0,0,0,0-.494l-2.4-2.4a.349.349,0,0,0-.494.494l1.8,1.8h-6.565a.351.351,0,0,0,0,.7h6.562l-1.8,1.8A.345.345,0,0,0,211.414,154.338Z" transform="translate(-200.409 -146.38)" fill="#666" />
                      </g>
                    </g>
                  </svg>
                  Log Out</a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
              </div>
            </div>
            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul> --}}
          </div>
        </div>
      </div>

    </div>

  </div>
  <div class="modal fade logOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body-content text-center">
          <img src="assets/images/qusetion.png" alt="" class="img-fluid">
          <h3 class="font-30 color-dark-33 font-brinnan-regular mt-4">Are you sure you want to log out ?</h3>
          <div class="d-sm-flex align-items-center justify-content-center">
            {{-- <button class="site-btn mt-3 px-5 py-2" >Yes</button> --}}
            <a class="site-btn mt-3 px-5 py-2" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Yes') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <button class="site-btn mt-3 ml-sm-3 green-btn px-5 py-2" data-dismiss="modal" aria-label="Close">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="sidebar-wrapper">
    <ul id="sidebar-items" data-scrollbar>
      <li class="nav-item <?php if ($pg == "Dashboard") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('dashboard')}}">
          <svg id="Group_403" data-name="Group 403" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 15.999 16">
            <g id="Group_4" data-name="Group 4">
              <path id="Path_7" data-name="Path 7" d="M6.333,5.333H1a1,1,0,0,1-1-1V1A1,1,0,0,1,1,0H6.333a1,1,0,0,1,1,1V4.333A1,1,0,0,1,6.333,5.333ZM1,.667A.334.334,0,0,0,.667,1V4.333A.334.334,0,0,0,1,4.667H6.333a.334.334,0,0,0,.333-.333V1A.334.334,0,0,0,6.333.667Z" fill="#fff" />
            </g>
            <g id="Group_5" data-name="Group 5" transform="translate(0 6.667)">
              <path id="Path_8" data-name="Path 8" d="M6.333,19.333H1a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1H6.333a1,1,0,0,1,1,1v7.333A1,1,0,0,1,6.333,19.333ZM1,10.667A.334.334,0,0,0,.667,11v7.333A.334.334,0,0,0,1,18.667H6.333a.334.334,0,0,0,.333-.333V11a.334.334,0,0,0-.333-.333Z" transform="translate(0 -10)" fill="#fff" />
            </g>
            <g id="Group_6" data-name="Group 6" transform="translate(8.666 10.667)">
              <path id="Path_9" data-name="Path 9" d="M19.333,21.333H14a1,1,0,0,1-1-1V17a1,1,0,0,1,1-1h5.333a1,1,0,0,1,1,1v3.333A1,1,0,0,1,19.333,21.333ZM14,16.667a.334.334,0,0,0-.333.333v3.333a.334.334,0,0,0,.333.333h5.333a.334.334,0,0,0,.333-.333V17a.334.334,0,0,0-.333-.333Z" transform="translate(-13 -16)" fill="#fff" />
            </g>
            <g id="Group_7" data-name="Group 7" transform="translate(8.666)">
              <path id="Path_10" data-name="Path 10" d="M19.333,9.333H14a1,1,0,0,1-1-1V1a1,1,0,0,1,1-1h5.333a1,1,0,0,1,1,1V8.333A1,1,0,0,1,19.333,9.333ZM14,.667A.334.334,0,0,0,13.667,1V8.333A.334.334,0,0,0,14,8.667h5.333a.334.334,0,0,0,.333-.333V1a.334.334,0,0,0-.333-.333Z" transform="translate(-13)" fill="#fff" />
            </g>
          </svg><span>Dashboard</span> </a>
      </li>
      <li class="nav-item <?php if ($pg == "Users") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('users')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20.556 17">
            <g id="Icon_feather-users" data-name="Icon feather-users" transform="translate(-1 -4)">
              <path id="Path_17" data-name="Path 17" d="M15.722,27.833V26.056A3.556,3.556,0,0,0,12.167,22.5H5.056A3.556,3.556,0,0,0,1.5,26.056v1.778" transform="translate(0 -7.333)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
              <path id="Path_18" data-name="Path 18" d="M14.611,8.056A3.556,3.556,0,1,1,11.056,4.5,3.556,3.556,0,0,1,14.611,8.056Z" transform="translate(-2.444)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
              <path id="Path_19" data-name="Path 19" d="M32.667,27.913V26.135A3.556,3.556,0,0,0,30,22.7" transform="translate(-11.611 -7.413)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
              <path id="Path_20" data-name="Path 20" d="M24,4.7a3.556,3.556,0,0,1,0,6.889" transform="translate(-9.167 -0.079)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
            </g>
          </svg> <span>Users</span> </a>
      </li>
      <li class="nav-item <?php if ($pg == "Courses") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('courses')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20.667 16">
            <g id="Online_course" data-name="Online course" transform="translate(-8 -64)">
              <path id="Path_21" data-name="Path 21" d="M27,64H12.333A1.669,1.669,0,0,0,10.7,65.362,1.671,1.671,0,0,0,9.362,66.7,1.669,1.669,0,0,0,8,68.333v10A1.669,1.669,0,0,0,9.667,80H24.333a1.669,1.669,0,0,0,1.638-1.362A1.671,1.671,0,0,0,27.3,77.3a1.669,1.669,0,0,0,1.362-1.638v-10A1.669,1.669,0,0,0,27,64ZM8.667,68.333a1,1,0,0,1,1-1H24.333a1,1,0,0,1,1,1v.333H8.667Zm16.667,10a1,1,0,0,1-1,1H9.667a1,1,0,0,1-1-1v-9H25.333ZM26.667,77a1,1,0,0,1-.667.943V68.333a1.669,1.669,0,0,0-1.667-1.667H10.057A1,1,0,0,1,11,66H25.667a1,1,0,0,1,1,1ZM28,75.667a1,1,0,0,1-.667.943V67a1.669,1.669,0,0,0-1.667-1.667H11.391a1,1,0,0,1,.943-.667H27a1,1,0,0,1,1,1Z" fill="#fff" />
              <circle id="Ellipse_4" data-name="Ellipse 4" cx="0.369" cy="0.369" r="0.369" transform="translate(9.292 67.637)" fill="#fff" />
              <circle id="Ellipse_5" data-name="Ellipse 5" cx="0.369" cy="0.369" r="0.369" transform="translate(10.583 67.637)" fill="#fff" />
              <ellipse id="Ellipse_6" data-name="Ellipse 6" cx="0.277" cy="0.369" rx="0.277" ry="0.369" transform="translate(12.06 67.637)" fill="#fff" />
              <path id="Path_22" data-name="Path 22" d="M128.333,222h7.333a.333.333,0,0,0,.333-.333v-5.333a.333.333,0,0,0-.333-.333h-7.333a.333.333,0,0,0-.333.333v5.333A.333.333,0,0,0,128.333,222Zm.333-5.333h6.667v4.667h-6.667Z" transform="translate(-115 -145.667)" fill="#fff" />
              <path id="Path_23" data-name="Path 23" d="M200.171,242.623a.333.333,0,0,0,.337-.007l1.625-1a.333.333,0,0,0,0-.568l-1.625-1a.333.333,0,0,0-.508.284v2A.333.333,0,0,0,200.171,242.623Zm.5-1.694.656.4-.656.4Z" transform="translate(-184 -168.666)" fill="#fff" />
              <path id="Path_24" data-name="Path 24" d="M165,304.333h-.667a.333.333,0,0,0-.667,0h-3.333a.333.333,0,0,0,0,.667h3.333a.333.333,0,1,0,.667,0H165a.333.333,0,0,0,0-.667Z" transform="translate(-145.667 -230)" fill="#fff" />
              <path id="Path_25" data-name="Path 25" d="M128.333,368.667h7.333a.333.333,0,1,0,0-.667h-7.333a.333.333,0,0,0,0,.667Z" transform="translate(-115 -291.333)" fill="#fff" />
              <path id="Path_26" data-name="Path 26" d="M128.333,392.667H133a.333.333,0,0,0,0-.667h-4.667a.333.333,0,0,0,0,.667Z" transform="translate(-115 -314.333)" fill="#fff" />
              <path id="Path_27" data-name="Path 27" d="M264.667,392h-.333a.333.333,0,0,0,0,.667h.333a.333.333,0,0,0,0-.667Z" transform="translate(-245.333 -314.333)" fill="#fff" />
            </g>
          </svg> <span>Courses</span> </a>
      </li>
      <li class="nav-item <?php if ($pg == "Categories") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('webinars')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20.527 16">
            <g id="webinar" transform="translate(0 -56.463)">
              <path id="Path_28" data-name="Path 28" d="M19.994,69.722H18.965a1.694,1.694,0,0,0,.393-1.079V58.161a1.7,1.7,0,0,0-1.7-1.7h-6.7a.3.3,0,1,0,0,.6h6.7a1.1,1.1,0,0,1,1.1,1.1V68.643a1.106,1.106,0,0,1-.9,1.079H2.672a1.106,1.106,0,0,1-.9-1.079V58.161a1.1,1.1,0,0,1,1.1-1.1h6.7a.3.3,0,1,0,0-.6h-6.7a1.7,1.7,0,0,0-1.7,1.7V68.643a1.693,1.693,0,0,0,.393,1.079H.534A.536.536,0,0,0,0,70.259v.81a1.39,1.39,0,0,0,1.383,1.394H19.144a1.39,1.39,0,0,0,1.383-1.394v-.81A.536.536,0,0,0,19.994,69.722Zm-12.335.6h5.211v.243a.185.185,0,0,1-.18.185H7.839a.185.185,0,0,1-.18-.185Zm12.268.745a.788.788,0,0,1-.782.793H1.383A.788.788,0,0,1,.6,71.069v-.745H7.057v.243a.785.785,0,0,0,.782.787h4.851a.785.785,0,0,0,.782-.787v-.243h6.455Z" transform="translate(0 0)" fill="#fff" />
              <path id="Path_29" data-name="Path 29" d="M154.138,178.661a.3.3,0,0,0,.3-.3v-3.974a.3.3,0,0,0-.6,0v.009l-1.076.5v-.407a1.108,1.108,0,0,0-1.107-1.107h-4.962a1.108,1.108,0,0,0-1.107,1.107v3.76a1.108,1.108,0,0,0,1.107,1.107h4.962a1.108,1.108,0,0,0,1.107-1.107v-.407l1.076.5v.009A.3.3,0,0,0,154.138,178.661Zm-1.978-.408a.506.506,0,0,1-.506.506h-4.962a.506.506,0,0,1-.506-.506v-3.76a.506.506,0,0,1,.506-.506h4.962a.506.506,0,0,1,.506.506C152.16,174.886,152.16,177.832,152.16,178.253Zm.6-1.071v-1.618l1.076-.5v2.627Z" transform="translate(-139.748 -112.235)" fill="#fff" />
              <path id="Path_30" data-name="Path 30" d="M373.976,152.917a.969.969,0,1,0,.969-.969A.97.97,0,0,0,373.976,152.917Zm1.336,0a.368.368,0,1,1-.368-.368A.368.368,0,0,1,375.313,152.917Z" transform="translate(-358.982 -91.657)" fill="#fff" />
              <path id="Path_31" data-name="Path 31" d="M208.7,211.55l-1.29-.88a.616.616,0,0,0-.963.509v1.76a.616.616,0,0,0,.963.509l1.29-.88A.616.616,0,0,0,208.7,211.55Zm-.339.521-1.29.88a.014.014,0,0,1-.023-.012v-1.76a.014.014,0,0,1,.023-.012l1.29.88A.014.014,0,0,1,208.357,212.07Z" transform="translate(-198.166 -147.921)" fill="#fff" />
              <path id="Path_32" data-name="Path 32" d="M75.845,93.569a.3.3,0,0,0,.3-.3V88.092a.552.552,0,0,0-.551-.551H61.018a.552.552,0,0,0-.551.551V98.36a.552.552,0,0,0,.551.551H75.595a.552.552,0,0,0,.551-.551V94.671a.3.3,0,0,0-.6,0V98.31H61.068V89.629H75.545v3.639A.3.3,0,0,0,75.845,93.569ZM62.1,89.028H61.068v-.886H62.1Zm.6,0v-.886H75.545v.886Z" transform="translate(-58.043 -29.832)" fill="#fff" />
            </g>
          </svg><span>Webinars</span></a>
      </li>
      <li class="nav-item <?php if ($pg == "Live") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('blogs')}}">
          <svg id="blog" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 19.645 19.645">
            <g id="Group_14" data-name="Group 14" transform="translate(0 0)">
              <g id="Group_13" data-name="Group 13">
                <path id="Path_33" data-name="Path 33" d="M17.918,0H1.727A1.729,1.729,0,0,0,0,1.727V17.918a1.729,1.729,0,0,0,1.727,1.727H17.918a1.729,1.729,0,0,0,1.727-1.727V1.727A1.729,1.729,0,0,0,17.918,0Zm.576,17.918a.576.576,0,0,1-.576.576H1.727a.576.576,0,0,1-.576-.576V5.755H18.494Zm0-13.314H1.151V1.727a.576.576,0,0,1,.576-.576H17.918a.576.576,0,0,1,.576.576Z" fill="#fff" />
              </g>
            </g>
            <g id="Group_16" data-name="Group 16" transform="translate(2.281 2.361)">
              <g id="Group_15" data-name="Group 15" transform="translate(0 0)">
                <ellipse id="Ellipse_7" data-name="Ellipse 7" cx="0.6" cy="0.54" rx="0.6" ry="0.54" fill="#fff" />
              </g>
            </g>
            <g id="Group_18" data-name="Group 18" transform="translate(4.561 2.361)">
              <g id="Group_17" data-name="Group 17" transform="translate(0 0)">
                <ellipse id="Ellipse_8" data-name="Ellipse 8" cx="0.6" cy="0.54" rx="0.6" ry="0.54" fill="#fff" />
              </g>
            </g>
            <g id="Group_20" data-name="Group 20" transform="translate(6.962 2.361)">
              <g id="Group_19" data-name="Group 19" transform="translate(0 0)">
                <circle id="Ellipse_9" data-name="Ellipse 9" cx="0.54" cy="0.54" r="0.54" fill="#fff" />
              </g>
            </g>
            <g id="Group_22" data-name="Group 22" transform="translate(2.302 6.906)">
              <g id="Group_21" data-name="Group 21">
                <path id="Path_34" data-name="Path 34" d="M66.331,180H60.576a.576.576,0,0,0-.576.576v4.681a.576.576,0,0,0,.576.576h5.755a.576.576,0,0,0,.576-.576v-4.681A.576.576,0,0,0,66.331,180Zm-.576,4.681h-4.6v-3.53h4.6Z" transform="translate(-60 -180)" fill="#fff" />
              </g>
            </g>
            <g id="Group_24" data-name="Group 24" transform="translate(10.36 11.587)">
              <g id="Group_23" data-name="Group 23">
                <path id="Path_35" data-name="Path 35" d="M276.408,302h-5.832a.576.576,0,1,0,0,1.151h5.832a.576.576,0,1,0,0-1.151Z" transform="translate(-270 -302)" fill="#fff" />
              </g>
            </g>
            <g id="Group_26" data-name="Group 26" transform="translate(10.36 9.247)">
              <g id="Group_25" data-name="Group 25">
                <path id="Path_36" data-name="Path 36" d="M276.408,241h-5.832a.576.576,0,0,0,0,1.151h5.832a.576.576,0,0,0,0-1.151Z" transform="translate(-270 -241)" fill="#fff" />
              </g>
            </g>
            <g id="Group_28" data-name="Group 28" transform="translate(2.302 13.89)">
              <g id="Group_27" data-name="Group 27">
                <path id="Path_37" data-name="Path 37" d="M74.465,362H60.576a.576.576,0,1,0,0,1.151h13.89a.576.576,0,1,0,0-1.151Z" transform="translate(-60 -362)" fill="#fff" />
              </g>
            </g>
            <g id="Group_30" data-name="Group 30" transform="translate(2.302 16.192)">
              <g id="Group_29" data-name="Group 29">
                <path id="Path_38" data-name="Path 38" d="M74.465,422H60.576a.576.576,0,1,0,0,1.151h13.89a.576.576,0,1,0,0-1.151Z" transform="translate(-60 -422)" fill="#fff" />
              </g>
            </g>
          </svg><span>Blogs</span></a>
      </li>
      {{-- <li class="nav-item <?php if ($pg == "content_management") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('content_management')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18.985 19">
            <g id="landing-page" transform="translate(-0.205)">
              <g id="Group_79" data-name="Group 79" transform="translate(0.205)">
                <path id="Path_60" data-name="Path 60" d="M378.335,52.981a.371.371,0,0,0-.371-.371h0a.371.371,0,1,0,.373.371Z" transform="translate(-363.587 -50.658)" fill="#fff" />
                <path id="Path_61" data-name="Path 61" d="M432.276,52.981a.371.371,0,0,0-.371-.371h0a.371.371,0,1,0,.373.371Z" transform="translate(-415.527 -50.658)" fill="#fff" />
                <path id="Path_62" data-name="Path 62" d="M324.422,52.981a.371.371,0,0,0-.371-.371h0a.371.371,0,1,0,.373.371Z" transform="translate(-311.675 -50.658)" fill="#fff" />
                <path id="Path_63" data-name="Path 63" d="M60.438,52.981a.371.371,0,0,0,.371.371H66.38a.371.371,0,0,0,0-.742H60.809a.371.371,0,0,0-.371.371Z" transform="translate(-58.203 -50.658)" fill="#fff" />
                <path id="Path_64" data-name="Path 64" d="M18,0H6.4a.371.371,0,0,0,0,.742H18a.448.448,0,0,1,.448.447V3.9H.947V1.189A.448.448,0,0,1,1.394.742h1.67a.371.371,0,0,0,0-.742H1.394A1.191,1.191,0,0,0,.2,1.189v16.62A1.191,1.191,0,0,0,1.394,19H18a1.192,1.192,0,0,0,1.191-1.191V1.189A1.191,1.191,0,0,0,18,0Zm0,18.258H1.394a.448.448,0,0,1-.447-.448V4.647h17.5V17.809A.449.449,0,0,1,18,18.258Z" transform="translate(-0.205)" fill="#fff" />
                <path id="Path_65" data-name="Path 65" d="M53.537,382.613a1.546,1.546,0,1,0,1.545,1.546A1.548,1.548,0,0,0,53.537,382.613Zm0,2.349a.8.8,0,1,1,.8-.8A.8.8,0,0,1,53.537,384.962Z" transform="translate(-50.069 -368.415)" fill="#fff" />
                <path id="Path_66" data-name="Path 66" d="M161.787,382.613a1.546,1.546,0,1,0,1.545,1.546A1.547,1.547,0,0,0,161.787,382.613Zm0,2.349a.8.8,0,1,1,.8-.8A.8.8,0,0,1,161.787,384.962Z" transform="translate(-154.303 -368.415)" fill="#fff" />
                <path id="Path_67" data-name="Path 67" d="M270.009,382.613a1.546,1.546,0,1,0,1.546,1.546A1.547,1.547,0,0,0,270.009,382.613Zm0,2.349a.8.8,0,1,1,.8-.8A.8.8,0,0,1,270.009,384.962Z" transform="translate(-258.509 -368.415)" fill="#fff" />
                <path id="Path_68" data-name="Path 68" d="M378.231,382.613a1.546,1.546,0,1,0,1.545,1.546A1.548,1.548,0,0,0,378.231,382.613Zm0,2.349a.8.8,0,1,1,.8-.8A.8.8,0,0,1,378.231,384.962Z" transform="translate(-362.714 -368.415)" fill="#fff" />
                <path id="Path_69" data-name="Path 69" d="M51.993,160.6a.374.374,0,0,0,.37.345h8.306a.375.375,0,0,0,.372-.371v-6.281a.371.371,0,0,0-.371-.371H52.363a.371.371,0,0,0-.371.371V160.6Zm6.152-.4-.691-1.09.925-1.457,1.616,2.547Zm-.879,0H53.038l2.114-3.331ZM60.3,154.66v4.632l-1.607-2.532a.371.371,0,0,0-.627,0l-1.051,1.656-1.548-2.44a.371.371,0,0,0-.313-.172h0a.371.371,0,0,0-.313.172l-2.105,3.317V154.66Z" transform="translate(-50.07 -148.206)" fill="#fff" />
                <path id="Path_70" data-name="Path 70" d="M328.416,154.66h4.139a.371.371,0,0,0,0-.742h-4.139a.371.371,0,0,0,0,.742Z" transform="translate(-315.879 -148.206)" fill="#fff" />
                <path id="Path_71" data-name="Path 71" d="M328.416,210.076h4.139a.371.371,0,0,0,0-.742h-4.139a.371.371,0,1,0,0,.742Z" transform="translate(-315.879 -201.566)" fill="#fff" />
                <path id="Path_72" data-name="Path 72" d="M328.416,265.465h4.139a.371.371,0,0,0,0-.742h-4.139a.371.371,0,1,0,0,.742Z" transform="translate(-315.879 -254.899)" fill="#fff" />
                <path id="Path_73" data-name="Path 73" d="M328.416,320.852h4.139a.371.371,0,0,0,0-.742h-4.139a.371.371,0,0,0,0,.742Z" transform="translate(-315.879 -308.231)" fill="#fff" />
                <path id="Path_74" data-name="Path 74" d="M112.54.742h0a.371.371,0,1,0-.373-.371A.37.37,0,0,0,112.542.742Z" transform="translate(-108.014)" fill="#fff" />
              </g>
            </g>
          </svg><span>Content Management</span></a>
      </li> --}}
      <li class="nav-item <?php if ($pg == "payments") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('payments')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 21.019 15.126">
            <g id="credit-card_1_" data-name="credit-card (1)" transform="translate(-2 -11.812)">
              <path id="Path_45" data-name="Path 45" d="M17.1,24.369H3.1A1.1,1.1,0,0,1,2,23.276V12.908a1.1,1.1,0,0,1,1.1-1.1H19.52a1.1,1.1,0,0,1,1.1,1.1v8.128a.3.3,0,0,1-.6,0V12.908a.5.5,0,0,0-.5-.5H3.1a.5.5,0,0,0-.5.5V23.276a.494.494,0,0,0,.5.492h14a.3.3,0,0,1,0,.6Z" transform="translate(0 0)" fill="#fff" />
              <path id="Path_46" data-name="Path 46" d="M20.316,21.935H2.3a.3.3,0,0,1-.3-.3V19.612a.3.3,0,0,1,.3-.3H20.316a.3.3,0,0,1,.3.3v2.023A.3.3,0,0,1,20.316,21.935ZM2.6,21.335H20.016V19.913H2.6Z" transform="translate(0 -5.248)" fill="#fff" />
              <path id="Path_47" data-name="Path 47" d="M12.405,39.639H8.588a.3.3,0,0,1-.3-.3V37.529a.3.3,0,0,1,.3-.3h3.817a.3.3,0,0,1,.3.3v1.809A.3.3,0,0,1,12.405,39.639Zm-3.517-.6H12.1V37.83H8.889Z" transform="translate(-4.4 -17.785)" fill="#fff" />
              <path id="Path_48" data-name="Path 48" d="M54.365,47.668a3.115,3.115,0,1,1,3.115-3.115A3.115,3.115,0,0,1,54.365,47.668Zm0-5.63a2.515,2.515,0,1,0,2.515,2.515A2.515,2.515,0,0,0,54.365,42.039Z" transform="translate(-34.462 -20.73)" fill="#fff" />
              <path id="Path_49" data-name="Path 49" d="M57.564,50.24a.3.3,0,0,1-.212-.088l-.639-.639a.3.3,0,1,1,.425-.425l.427.426,1.551-1.551a.3.3,0,1,1,.425.425l-1.763,1.763A.3.3,0,0,1,57.564,50.24Z" transform="translate(-38.223 -25.235)" fill="#fff" />
            </g>
          </svg> <span>Payment Logs</span></a>
      </li>
      <li class="nav-item <?php if ($pg == "feedback") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('feedbacks')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 21 18.375">
            <g id="chat" transform="translate(0 -32)">
              <g id="Group_40" data-name="Group 40" transform="translate(4.375 35.5)">
                <g id="Group_39" data-name="Group 39">
                  <path id="Path_50" data-name="Path 50" d="M121.979,117.333h-2.187v.875h2.187a.438.438,0,0,1,.438.438v10.5a.438.438,0,0,1-.438.438h-6.125a.438.438,0,0,0-.309.128l-1,1v-.694a.438.438,0,0,0-.438-.438h-6.125a.438.438,0,0,1-.438-.437v-1.313h-.875v1.313a1.312,1.312,0,0,0,1.313,1.312h5.688v1.313a.437.437,0,0,0,.747.309l1.622-1.622h5.944a1.313,1.313,0,0,0,1.313-1.312v-10.5A1.313,1.313,0,0,0,121.979,117.333Z" transform="translate(-106.667 -117.333)" fill="#fff" />
                </g>
              </g>
              <g id="Group_42" data-name="Group 42" transform="translate(0 32)">
                <g id="Group_41" data-name="Group 41">
                  <path id="Path_51" data-name="Path 51" d="M15.312,32h-14A1.313,1.313,0,0,0,0,33.312v10.5a1.313,1.313,0,0,0,1.312,1.313H7.437v1.313a.437.437,0,0,0,.747.309l1.622-1.622h5.506a1.313,1.313,0,0,0,1.312-1.312v-10.5A1.313,1.313,0,0,0,15.312,32Zm.438,11.812a.438.438,0,0,1-.438.438H9.625a.438.438,0,0,0-.309.128l-1,1v-.694a.438.438,0,0,0-.438-.438H1.312a.438.438,0,0,1-.438-.438v-10.5a.438.438,0,0,1,.438-.438h14a.438.438,0,0,1,.438.438Z" transform="translate(0 -32)" fill="#fff" />
                </g>
              </g>
              <g id="Group_44" data-name="Group 44" transform="translate(2.187 35.5)">
                <g id="Group_43" data-name="Group 43">
                  <rect id="Rectangle_25" data-name="Rectangle 25" width="4.812" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_46" data-name="Group 46" transform="translate(2.187 38.125)">
                <g id="Group_45" data-name="Group 45">
                  <rect id="Rectangle_26" data-name="Rectangle 26" width="12.25" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_48" data-name="Group 48" transform="translate(2.187 40.75)">
                <g id="Group_47" data-name="Group 47">
                  <rect id="Rectangle_27" data-name="Rectangle 27" width="12.25" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_50" data-name="Group 50" transform="translate(13.563 35.5)">
                <g id="Group_49" data-name="Group 49">
                  <rect id="Rectangle_28" data-name="Rectangle 28" width="0.875" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_52" data-name="Group 52" transform="translate(11.812 35.5)">
                <g id="Group_51" data-name="Group 51">
                  <rect id="Rectangle_29" data-name="Rectangle 29" width="0.875" height="0.875" fill="#fff" />
                </g>
              </g>
            </g>
          </svg><span>Feedbacks</span></a>
      </li>
       <li class="nav-item <?php if ($pg == "hand_on") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="{{route('hand_on')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 21 18.375">
            <g id="chat" transform="translate(0 -32)">
              <g id="Group_40" data-name="Group 40" transform="translate(4.375 35.5)">
                <g id="Group_39" data-name="Group 39">
                  <path id="Path_50" data-name="Path 50" d="M121.979,117.333h-2.187v.875h2.187a.438.438,0,0,1,.438.438v10.5a.438.438,0,0,1-.438.438h-6.125a.438.438,0,0,0-.309.128l-1,1v-.694a.438.438,0,0,0-.438-.438h-6.125a.438.438,0,0,1-.438-.437v-1.313h-.875v1.313a1.312,1.312,0,0,0,1.313,1.312h5.688v1.313a.437.437,0,0,0,.747.309l1.622-1.622h5.944a1.313,1.313,0,0,0,1.313-1.312v-10.5A1.313,1.313,0,0,0,121.979,117.333Z" transform="translate(-106.667 -117.333)" fill="#fff" />
                </g>
              </g>
              <g id="Group_42" data-name="Group 42" transform="translate(0 32)">
                <g id="Group_41" data-name="Group 41">
                  <path id="Path_51" data-name="Path 51" d="M15.312,32h-14A1.313,1.313,0,0,0,0,33.312v10.5a1.313,1.313,0,0,0,1.312,1.313H7.437v1.313a.437.437,0,0,0,.747.309l1.622-1.622h5.506a1.313,1.313,0,0,0,1.312-1.312v-10.5A1.313,1.313,0,0,0,15.312,32Zm.438,11.812a.438.438,0,0,1-.438.438H9.625a.438.438,0,0,0-.309.128l-1,1v-.694a.438.438,0,0,0-.438-.438H1.312a.438.438,0,0,1-.438-.438v-10.5a.438.438,0,0,1,.438-.438h14a.438.438,0,0,1,.438.438Z" transform="translate(0 -32)" fill="#fff" />
                </g>
              </g>
              <g id="Group_44" data-name="Group 44" transform="translate(2.187 35.5)">
                <g id="Group_43" data-name="Group 43">
                  <rect id="Rectangle_25" data-name="Rectangle 25" width="4.812" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_46" data-name="Group 46" transform="translate(2.187 38.125)">
                <g id="Group_45" data-name="Group 45">
                  <rect id="Rectangle_26" data-name="Rectangle 26" width="12.25" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_48" data-name="Group 48" transform="translate(2.187 40.75)">
                <g id="Group_47" data-name="Group 47">
                  <rect id="Rectangle_27" data-name="Rectangle 27" width="12.25" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_50" data-name="Group 50" transform="translate(13.563 35.5)">
                <g id="Group_49" data-name="Group 49">
                  <rect id="Rectangle_28" data-name="Rectangle 28" width="0.875" height="0.875" fill="#fff" />
                </g>
              </g>
              <g id="Group_52" data-name="Group 52" transform="translate(11.812 35.5)">
                <g id="Group_51" data-name="Group 51">
                  <rect id="Rectangle_29" data-name="Rectangle 29" width="0.875" height="0.875" fill="#fff" />
                </g>
              </g>
            </g>
          </svg><span>Hand On Experience</span></a>
      </li>
      {{-- <li class="nav-item <?php if ($pg == "") {
                            echo "active";
                          } ?>">
        <a class="navbar-links" href="hands-on-experience.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18.998 19">
            <g id="user-experience" transform="translate(-0.5 -0.002)">
              <path id="Path_52" data-name="Path 52" d="M18.216,9.5a13.207,13.207,0,0,0,.933-2.388c.685-2.474.353-4.545-.934-5.832S14.856-.335,12.383.35A13.218,13.218,0,0,0,10,1.283,12.667,12.667,0,0,0,7.054.212C4.832-.275,2.959.106,1.78,1.285A4.633,4.633,0,0,0,.511,4.359a9.394,9.394,0,0,0,.661,3.758,1.762,1.762,0,0,0,0,2.77,9.394,9.394,0,0,0-.661,3.758A4.634,4.634,0,0,0,1.78,17.719,4.735,4.735,0,0,0,5.242,19a7.787,7.787,0,0,0,.892-.053A11.7,11.7,0,0,0,10,17.721a13.211,13.211,0,0,0,2.386.932A8.929,8.929,0,0,0,14.753,19a4.74,4.74,0,0,0,3.461-1.283c1.179-1.179,1.56-3.052,1.073-5.274A12.669,12.669,0,0,0,18.216,9.5ZM12.532.888c2.272-.629,4.15-.348,5.289.791s1.42,3.017.791,5.289a12.364,12.364,0,0,1-.719,1.926,18.256,18.256,0,0,0-1.971-2.839,1.763,1.763,0,0,0,.005-2.171l-.44.342a1.2,1.2,0,0,1,.254.741,1.207,1.207,0,1,1-.592-1.039l.285-.479a1.763,1.763,0,0,0-1.989.129,18.275,18.275,0,0,0-2.839-1.971A12.378,12.378,0,0,1,12.532.888ZM2.174,1.679C3.682.171,6.446.228,9.387,1.605A18.994,18.994,0,0,0,5.258,4.763a19.515,19.515,0,0,0-2.5,3.044,1.781,1.781,0,0,0-.5-.071,1.761,1.761,0,0,0-.6.105C.7,5.209.88,2.973,2.174,1.679ZM5.256,18.44a4.232,4.232,0,0,1-3.082-1.115C.88,16.031.7,13.8,1.665,11.162a1.762,1.762,0,0,0,1.1.034,19.5,19.5,0,0,0,2.5,3.045A19,19,0,0,0,9.386,17.4,9.962,9.962,0,0,1,5.257,18.44ZM10,17.095a18.209,18.209,0,0,1-4.343-3.248A18.981,18.981,0,0,1,3.27,10.953,1.765,1.765,0,0,0,4.031,9.5c0-.052,0-.105-.007-.157l-.555.049c0,.036,0,.072,0,.108a1.207,1.207,0,1,1-.127-.541l.5-.25a1.768,1.768,0,0,0-.573-.662A18.991,18.991,0,0,1,5.653,5.157,18.2,18.2,0,0,1,10,1.908a17.486,17.486,0,0,1,3.068,2.078,1.765,1.765,0,0,0,2.448,2.448A17.49,17.49,0,0,1,17.591,9.5a18.211,18.211,0,0,1-3.248,4.345c-.149.148-.3.3-.455.441a1.763,1.763,0,0,0-2.222-.047l.342.44a1.2,1.2,0,0,1,.741-.254,1.208,1.208,0,1,1-1.039.592l-.479-.285a1.764,1.764,0,0,0-.065,1.681q-.586.374-1.169.68Zm7.825.23c-1.139,1.139-3.017,1.42-5.289.791a12.375,12.375,0,0,1-1.924-.718q.441-.246.88-.528a1.765,1.765,0,0,0,2.764-2.16c.164-.154.327-.311.485-.469a19,19,0,0,0,3.158-4.129c1.377,2.941,1.434,5.705-.074,7.213Zm0,0" transform="translate(0 0)" fill="#fff" />
              <path id="Path_53" data-name="Path 53" d="M244.607,260.844h-.576v-1.4a1.4,1.4,0,0,0-1.016-1.342l-.208-.059-.151.537.208.059a.839.839,0,0,1,.609.8v1.4h-1v-.762h-.557v.762H239.4v.558h5.2Zm0,0" transform="translate(-230.037 -248.462)" fill="#fff" />
              <path id="Path_54" data-name="Path 54" d="M138.721,112.9l1.162.328.151-.537-1.139-.321v-.74a1.951,1.951,0,0,0,.855-1.613V109.2a1.952,1.952,0,1,0-3.9,0v.818a1.951,1.951,0,0,0,.855,1.613v.74l-1.884.531a1.4,1.4,0,0,0-1.016,1.342v1.4h-.576v.558h3.383v-.558h-.688v-.762h-.558v.762h-1v-1.4a.839.839,0,0,1,.609-.8l1.907-.538a1.25,1.25,0,0,0,1.844,0Zm-.922-5.1a1.4,1.4,0,0,1,1.394,1.394v.311l-.586-.775h-2.122a1.4,1.4,0,0,1,1.314-.929Zm-1.394,2.212v-.725h1.924l.817,1.081a1.394,1.394,0,0,1-2.742-.356Zm.855,2.475v-.6a1.94,1.94,0,0,0,1.078,0v.6a.693.693,0,0,1-1.078,0Zm0,0" transform="translate(-127.801 -103.265)" fill="#fff" />
              <path id="Path_55" data-name="Path 55" d="M275.734,275.324l-.785-.222.151-.537.785.221Zm0,0" transform="translate(-264.264 -264.375)" fill="#fff" />
              <path id="Path_56" data-name="Path 56" d="M311.243,284.737l-.151.537-.537-.151.151-.537Zm0,0" transform="translate(-298.549 -274.023)" fill="#fff" />
              <path id="Path_57" data-name="Path 57" d="M371.129,126.281h.558v.558h-.558Zm0,0" transform="translate(-356.875 -121.593)" fill="#fff" />
              <path id="Path_58" data-name="Path 58" d="M323.047,413.77h.558v.558h-.558Zm0,0" transform="translate(-310.577 -398.413)" fill="#fff" />
              <path id="Path_59" data-name="Path 59" d="M40.566,248.488h.558v.558h-.558Zm0,0" transform="translate(-38.58 -239.265)" fill="#fff" />
            </g>
          </svg> <span>Hands-on Experience</span></a>
      </li> --}}
    </ul>
  </div>

