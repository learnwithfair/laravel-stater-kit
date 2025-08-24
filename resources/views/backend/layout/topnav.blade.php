<style>
    a#themeToggleBtn,
    a#fullscreenBtn {
        font-size: 16px;
        color: #0d6efd;
        cursor: pointer;
    }
</style>


<!-- menu  -->
<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src="{{ asset('backend/assets/img/line_img.png') }}" alt="" />
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">

                        <!-- Full Screen Toggle Button -->
                        <li class="fullscreen-toggle">
                            <a id="fullscreenBtn">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>


                        <!-- Theme Toggle Button -->
                        <li class="theme-toggle">
                            <a id="themeToggleBtn">
                                <i class="ti-rss-alt"></i> <!-- Default icon -->
                            </a>
                        </li>

                        <li>
                            <a class="bell_notification_clicker nav-link-notify" href="#">
                                <img src="{{ asset('backend/assets/img/icon/bell.svg') }}" alt="" />
                                {{-- <span>8</span> --}}
                            </a>
                            <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#">
                                                <img src="{{ asset('backend/assets/img/staf/2.png') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Marketing</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('backend/assets/img/staf/4.png') }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#">
                                                <img src="{{ asset('backend/assets/img/staf/3.png') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('backend/assets/img/staf/2.png') }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Marketing</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('backend/assets/img/staf/4.png') }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('backend/assets/img/staf/3.png') }}"
                                                    alt="" /></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1 green">See More</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                        </li>
                    </div>
                    <div class="profile_info d-flex align-items-center">
                        <div class="profile_thumb mr_20">

                            @php
                                $profilePhoto = Auth::user()->profile_photo_url;
                                $Photo = Auth::user()->image;
                            @endphp
                            @if ($Photo == null)
                                <img class="img-xs rounded-circle admin_picture" src="{{ $profilePhoto }}" alt="" />
                            @else
                                <img class="img-xs rounded-circle admin_picture"
                                    src="{{ asset("uploads/profileImages/$Photo") }}" alt="" />
                            @endif

                        </div>
                        <div class="profile_info_iner card">
                            <div class="profile_author_name">
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="{{ route('profile.show') }}">My Profile </a>
                                <form method="POST" action="{{ route('logout') }}" x-data class="d-inline">
                                    @csrf
                                    <button @click.prevent="$root.submit();"
                                        class="btn text-sm text-danger text-decoration-none p-0 m-0 align-baseline">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ menu  -->