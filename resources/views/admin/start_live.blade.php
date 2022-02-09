<?php $title = "Course Details";
$pg = 'Courses';
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
                    <h4 class="font-30 color-dark-33 font-brinnan-bold mb-0">Live</h4>
                    <div class="course-card">
                        <div class="position-relative mt-3">
                            <img src="assets/images/live-video.png" alt="" class="img-fluid w-100 live-video">
                            <div class="live-tag">
                                <div class="tag-inner pink-tag">Live</div>
                            </div>
                            <button class="transparent-btn close-video"><i class="fas fa-times white-text"></i></button>
                        </div>
                        <div class="p-3 d-flex align-items-center justify-content-center flex-wrap">
                            <button class="live-btn mr-2">
                                <svg id="mute" xmlns="http://www.w3.org/2000/svg" width="12.541" height="19.631" viewBox="0 0 12.541 19.631">
                                    <g id="Group_230" data-name="Group 230" transform="translate(2.437)">
                                        <g id="Group_229" data-name="Group 229">
                                            <path id="Path_120" data-name="Path 120" d="M159.86,0a3.838,3.838,0,0,0-3.833,3.833v6.514a3.833,3.833,0,1,0,7.666-.022V3.833A3.837,3.837,0,0,0,159.86,0Zm2.5,10.325a2.5,2.5,0,1,1-5.007.022V3.833a2.5,2.5,0,1,1,5.007,0Z" transform="translate(-156.027)" fill="#333" />
                                        </g>
                                    </g>
                                    <g id="Group_232" data-name="Group 232" transform="translate(5.606 16.108)">
                                        <g id="Group_231" data-name="Group 231">
                                            <rect id="Rectangle_98" data-name="Rectangle 98" width="1.329" height="3.013" fill="#333" />
                                        </g>
                                    </g>
                                    <g id="Group_234" data-name="Group 234" transform="translate(2.858 18.302)">
                                        <g id="Group_233" data-name="Group 233" transform="translate(0)">
                                            <path id="Path_121" data-name="Path 121" d="M173.167,477.327h-5.5a.665.665,0,0,0,0,1.329h5.5a.665.665,0,0,0,0-1.329Z" transform="translate(-167.007 -477.327)" fill="#333" />
                                        </g>
                                    </g>
                                    <g id="Group_236" data-name="Group 236" transform="translate(0 7.068)">
                                        <g id="Group_235" data-name="Group 235">
                                            <path id="Path_122" data-name="Path 122" d="M104.337,184.343a.665.665,0,0,0-.665.665v2.615a4.941,4.941,0,0,1-9.882,0v-2.615a.665.665,0,1,0-1.329,0v2.615a6.27,6.27,0,0,0,12.541,0v-2.615A.665.665,0,0,0,104.337,184.343Z" transform="translate(-92.461 -184.343)" fill="#333" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button class="live-btn mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.577" height="18.211" viewBox="0 0 23.577 18.211">
                                    <g id="Group_407" data-name="Group 407" transform="translate(-883.894 -907.895)">
                                        <path id="video-camera" d="M21.515,1.222a.461.461,0,0,0-.456-.008L16.071,3.937V2.3a2.306,2.306,0,0,0-2.3-2.3H2.3A2.306,2.306,0,0,0,0,2.3V11.4a2.306,2.306,0,0,0,2.3,2.3H13.768a2.306,2.306,0,0,0,2.3-2.3v-1.6l4.988,2.724a.461.461,0,0,0,.681-.4V1.618a.46.46,0,0,0-.226-.4ZM15.149,11.4a1.383,1.383,0,0,1-1.382,1.382H2.3A1.383,1.383,0,0,1,.922,11.4V2.3A1.383,1.383,0,0,1,2.3.921H13.768A1.384,1.384,0,0,1,15.15,2.3Zm5.67-.062L16.071,8.742V4.987l4.748-2.592Zm0,0" transform="translate(885.73 910.15)" fill="#333" />
                                        <line id="Line_13" data-name="Line 13" x1="19.2" y2="16.8" transform="translate(884.6 908.6)" fill="none" stroke="#333" stroke-linecap="round" stroke-width="1" />
                                    </g>
                                </svg>
                            </button>
                            <button class="live-btn mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24.687" height="9.745" viewBox="0 0 24.687 9.745">
                                    <path id="Icon_material-call-end" data-name="Icon material-call-end" d="M11.844,12.474a14.716,14.716,0,0,0-4.54.711v3.06a.994.994,0,0,1-.553.888,11.361,11.361,0,0,0-2.625,1.826.969.969,0,0,1-.691.276.984.984,0,0,1-.7-.286L.286,16.5A.944.944,0,0,1,0,15.81a.984.984,0,0,1,.286-.7,16.795,16.795,0,0,1,23.115,0,1,1,0,0,1,0,1.4l-2.448,2.448a.984.984,0,0,1-.7.286,1.013,1.013,0,0,1-.691-.276,11.124,11.124,0,0,0-2.635-1.826.983.983,0,0,1-.553-.888v-3.06A14.326,14.326,0,0,0,11.844,12.474Z" transform="translate(0.5 -10)" fill="none" stroke="#333" stroke-width="1" />
                                </svg>
                            </button>
                            <button class="live-btn mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17.235" viewBox="0 0 26 17.235">
                                    <g id="user_1_" data-name="user (1)" transform="translate(0.4 0.4)">
                                        <g id="Group_218" data-name="Group 218" transform="translate(8.765 0)">
                                            <g id="Group_217" data-name="Group 217" transform="translate(0 0)">
                                                <circle id="Ellipse_21" data-name="Ellipse 21" cx="3.835" cy="3.835" r="3.835" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                        <g id="Group_220" data-name="Group 220" transform="translate(17.53 4.383)">
                                            <g id="Group_219" data-name="Group 219" transform="translate(0 0)">
                                                <circle id="Ellipse_22" data-name="Ellipse 22" cx="2.739" cy="2.739" r="2.739" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                        <g id="Group_222" data-name="Group 222" transform="translate(2.269 4.383)">
                                            <g id="Group_221" data-name="Group 221" transform="translate(0 0)">
                                                <circle id="Ellipse_23" data-name="Ellipse 23" cx="2.739" cy="2.739" r="2.739" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                        <g id="Group_224" data-name="Group 224" transform="translate(5.478 8.765)">
                                            <g id="Group_223" data-name="Group 223" transform="translate(0 0)">
                                                <path id="Path_117" data-name="Path 117" d="M113.788,256a7.13,7.13,0,0,0-7.122,7.122.548.548,0,0,0,.548.548h13.148a.548.548,0,0,0,.548-.548A7.13,7.13,0,0,0,113.788,256Z" transform="translate(-106.666 -256)" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                        <g id="Group_226" data-name="Group 226" transform="translate(0 10.957)">
                                            <g id="Group_225" data-name="Group 225" transform="translate(0 0)">
                                                <path id="Path_118" data-name="Path 118" d="M5.953,298.785a4.915,4.915,0,0,0-1.022-.118A4.936,4.936,0,0,0,0,303.6a.548.548,0,0,0,.548.548H4.483a1.624,1.624,0,0,1-.1-.548A8.166,8.166,0,0,1,5.953,298.785Z" transform="translate(0 -298.667)" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                        <g id="Group_228" data-name="Group 228" transform="translate(19.247 10.957)">
                                            <g id="Group_227" data-name="Group 227" transform="translate(0 0)">
                                                <path id="Path_119" data-name="Path 119" d="M375.785,298.667a4.913,4.913,0,0,0-1.022.118,8.166,8.166,0,0,1,1.57,4.812,1.625,1.625,0,0,1-.1.548h3.936a.548.548,0,0,0,.548-.548A4.936,4.936,0,0,0,375.785,298.667Z" transform="translate(-374.763 -298.667)" fill="none" stroke="#333" stroke-width="0.8" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button class="live-btn">
                                <svg id="speech-bubble" xmlns="http://www.w3.org/2000/svg" width="23.325" height="20.956" viewBox="0 0 23.325 20.956">
                                    <path id="Path_124" data-name="Path 124" d="M246.456,100a.456.456,0,1,0,.456.456A.456.456,0,0,0,246.456,100Zm0,0" transform="translate(-234.793 -95.444)" fill="#333" />
                                    <path id="Path_125" data-name="Path 125" d="M80.456,260.911a.456.456,0,1,0-.456-.456A.456.456,0,0,0,80.456,260.911Zm0,0" transform="translate(-76.356 -248.155)" fill="#333" />
                                    <path id="Path_126" data-name="Path 126" d="M15.307,0c-4.1,0-7.467,2.828-7.728,6.389C3.673,6.585,0,9.4,0,13.211a6.366,6.366,0,0,0,1.777,4.357,2.771,2.771,0,0,1-.732,2.61.456.456,0,0,0,.322.778,5.025,5.025,0,0,0,3.482-1.407,10.381,10.381,0,0,0,3.17.5c4.1,0,7.467-2.827,7.728-6.388a10.244,10.244,0,0,0,2.731-.486,5.025,5.025,0,0,0,3.482,1.407.456.456,0,0,0,.322-.778,2.771,2.771,0,0,1-.732-2.61,6.366,6.366,0,0,0,1.777-4.357C23.325,2.875,19.369,0,15.307,0ZM8.018,19.133A9.209,9.209,0,0,1,4.9,18.6a.456.456,0,0,0-.5.116,4.111,4.111,0,0,1-2.045,1.213,3.684,3.684,0,0,0,.278-2.711.455.455,0,0,0-.111-.193,5.475,5.475,0,0,1-1.6-3.81c0-3.21,3.254-5.922,7.107-5.922,3.638,0,6.833,2.53,6.833,5.922,0,3.266-3.065,5.922-6.833,5.922Zm12.793-8.491a.457.457,0,0,0-.111.193,3.684,3.684,0,0,0,.278,2.711,4.109,4.109,0,0,1-2.045-1.213.456.456,0,0,0-.5-.116,8.974,8.974,0,0,1-2.684.526A6.521,6.521,0,0,0,13.282,8.2h5.942a.456.456,0,1,0,0-.911H11.883a8.5,8.5,0,0,0-3.39-.9c.262-3.06,3.218-5.48,6.814-5.48,3.852,0,7.107,2.712,7.107,5.922a5.475,5.475,0,0,1-1.6,3.81Zm0,0" transform="translate(0 0)" fill="#333" />
                                    <path id="Path_127" data-name="Path 127" d="M126.2,260h-5.74a.456.456,0,0,0,0,.911h5.74a.456.456,0,0,0,0-.911Zm0,0" transform="translate(-114.533 -248.155)" fill="#333" />
                                    <path id="Path_128" data-name="Path 128" d="M88.018,320H80.456a.456.456,0,0,0,0,.911h7.562a.456.456,0,0,0,0-.911Zm0,0" transform="translate(-76.356 -305.422)" fill="#333" />
                                    <path id="Path_129" data-name="Path 129" d="M292.2,100h-5.74a.456.456,0,1,0,0,.911h5.74a.456.456,0,0,0,0-.911Zm0,0" transform="translate(-272.971 -95.444)" fill="#333" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@endsection
{{-- <?php include('footer.php'); ?> --}}