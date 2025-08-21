@php
    //Database Connection
    $obj = new DatabaseConnection(); // create class
    $logo = $obj->HeaderLogo(); //Get Footer Logo
    $miniLogo = $obj->MiniLogo(); //Get Mini Logo
    $miniLogoText = $obj->miniLogoConnection(); //Get Mini Logo
@endphp


{{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div
        class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top reload-logo-area">
        @foreach ($logo as $logo)
            <a class="sidebar-brand brand-logo" href="{{ route('dashboard') }}"><img
                    src="{{ asset('uploads/logo/' . $logo->image) }}" alt="logo" /></a>
        @endforeach
        <a class="sidebar-brand brand-logo-mini" href="{{ route('dashboard') }}">
            @if ($miniLogo)
                <img class="rounded-circle" src="{{ asset('uploads/logo/' . $miniLogo->image) }}" alt="logo"
                    style="height: 50px;width:50px;" />
            @else
                <img class="rounded-circle"
                    src="https://ui-avatars.com/api/?name={{ $miniLogoText }}&background=191c24&color=ffffff&rounded=true&size=64&bold=true"
                    alt="logo" style="height: 50px;width:50px;border:1px solid white;" />
            @endif
        </a>
    </div>
    <ul class="nav" id="menuItems">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator" style="width:35px !important">
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
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->company_name }}</h5>
                        @if (Auth::user()->admin_type == 0)
                            <span>HR</span>
                        @else
                            <span>Admin</span>
                        @endif
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                        class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="{{ route('profile.show') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('profile.show') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->admin_type == 1)
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-convert"></i>
                    </span>
                    <span class="menu-title">Company</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('logo') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-chemical-weapon"></i>
                    </span>
                    <span class="menu-title">Logo</span>
                </a>
            </li>
        @endif

        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#hr" aria-expanded="false"
                aria-controls="home-slider">
                <span class="menu-icon">
                    <i class="mdi mdi-apple-keyboard-command"></i>

                </span>
                <span class="menu-title">HR</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="hr">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">Dashboard</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="">Office Setting</a>
                    </li>

                </ul>
            </div>
        </li>


        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('leaves.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-email"></i>
                </span>
                <span class="menu-title">Leave</span>
            </a>
        </li>
    </ul>
</nav> --}}



<!-- sidebar  -->
<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        @if ($logo)
            <a class="large_logo" href="index.html"><img src="{{ asset('uploads/logo/' . $logo->image) }}"
                    alt = "" /></a>
        @endif
        <a class="small_logo" href="index.html">
            @if ($miniLogo)
                <img class="rounded-circle" src="{{ asset('uploads/logo/' . $miniLogo->image) }}" alt="logo"
                    style="height: 50px;width:50px;" />
            @else
                <img class="rounded-circle"
                    src="https://ui-avatars.com/api/?name={{ $miniLogoText }}&background=191c24&color=ffffff&rounded=true&size=64&bold=true"
                    alt="logo" style="height: 50px;width:50px;border:1px solid white;" />
            @endif
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/1.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Dashboard </span>
                </div>
            </a>
            <ul>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Light Sidebar</a></li>
                <li><a href="index.html">Dark Sidebar</a></li>
            </ul>
        </li>
        <li class="">
            <a href="/admin/users" aria-expanded="false" class="active">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/4.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Admin List</span>
                </div>
            </a>
        </li>

        <li>
            <a href="/admin/logo" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/14.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Logo</span>
                </div>
            </a>
        </li>


        <li class="">
            <a href="buy_sell.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/3.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Buy & Sell</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="Trader_Profile.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/4.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Trader Profile</span>
                </div>
            </a>
        </li>
        <li class="">
            <a href="crypto_stats.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/5.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Crypto Stats</span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/6.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Transactions</span>
                </div>
            </a>
            <ul>
                <li><a href="Request.html">Request</a></li>
                <li><a href="tan_cancel.html">Cancel</a></li>
                <li><a href="Refound.html">Refound</a></li>
                <li><a href="Payment_details.html">Payment details</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/7.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Tickers</span>
                </div>
            </a>
            <ul>
                <li><a href="ticker_dark.html">Ticker Dark</a></li>
                <li><a href="Ticker_Light.html">Ticker Light</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/8.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Apps </span>
                </div>
            </a>
            <ul>
                <li><a href="editor.html">Editor</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="Builder.html">Builder</a></li>
                <li><a href="calender.html">Calander</a></li>
                <li><a href="Board.html">Board</a></li>
                <li><a href="basic_card.html">Basic Card</a></li>
                <li><a href="theme_card.html">Theme Card</a></li>
                <li><a href="dargable_card.html">Draggable Card</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/Pages.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Pages</span>
                </div>
            </a>
            <ul>
                <li><a href="role_permissions.html">Role & Permissions</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="resister.html">Register</a></li>
                <li><a href="error_400.html">Error 404</a></li>
                <li><a href="error_500.html">Error 500</a></li>
                <li><a href="forgot_pass.html">Forgot Password</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="module_setting.html">Module Setting</a></li>
                <li><a href="Products.html">Products</a></li>
                <li><a href="Product_Details.html">Product Details</a></li>
                <li><a href="Cart.html">Cart</a></li>
                <li><a href="Checkout.html">Checkout</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/General.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>General</span>
                </div>
            </a>
            <ul>
                <li><a href="Minimized_Aside.html">Minimized Aside</a></li>
                <li><a href="empty_page.html">Empty page</a></li>
                <li><a href="fixed_footer.html">Fixed Footer</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/Mail_Box.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Mail Box </span>
                </div>
            </a>
            <ul>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="compose.html">Compose</a></li>
                <li><a href="important_mail.html">Important Mail</a></li>
                <li><a href="mail_trash.html">Mail Trash</a></li>
                <li><a href="chat.html">Chat</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/icon.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Icons</span>
                </div>
            </a>
            <ul>
                <li><a href="Fontawesome_Icon.html">Fontawesome Icon</a></li>
                <li><a href="themefy_icon.html">themefy icon</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/18.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>UI Elements </span>
                </div>
            </a>
            <ul>
                <li><a href="colors.html">colors</a></li>
                <li><a href="Alerts.html">Alerts</a></li>
                <li><a href="buttons.html">Buttons</a></li>
                <li><a href="modal.html">modal</a></li>
                <li><a href="dropdown.html">Droopdowns</a></li>
                <li><a href="Badges.html">Badges</a></li>
                <li><a href="Loading_Indicators.html">Loading Indicators</a></li>
                <li><a href="color_plate.html">Color Plate</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="datepicker.html">Date Picker</a></li>
                <li><a href="wow_animation.html">Animate</a></li>
                <li><a href="Scroll_Reveal.html">Scroll Reveal</a></li>
                <li><a href="tilt.html">Tilt Animation</a></li>
                <li><a href="navs.html">Navs</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/forms.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>forms</span>
                </div>
            </a>
            <ul>
                <li><a href="Basic_Elements.html">Basic Elements</a></li>
                <li><a href="Groups.html">Groups</a></li>
                <li><a href="Max_Length.html">Max Length</a></li>
                <li><a href="Layouts.html">Layouts</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/14.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Widgets</span>
                </div>
            </a>
            <ul>
                <li><a href="accordion.html">Accordions</a></li>
                <li><a href="Scrollable.html">Scrollable</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="carousel.html">Carousel</a></li>
                <li><a href="Pagination.html">Pagination</a></li>
                <li><a href="profilebox.html">Profile Box</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/17.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Table</span>
                </div>
            </a>
            <ul>
                <li><a href="data_table.html">Data Tables</a></li>
                <li><a href="bootstrap_table.html">Bootstrap</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/16.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Charts</span>
                </div>
            </a>
            <ul>
                <li><a href="chartjs.html">ChartJS</a></li>
                <li><a href="apex_chart.html">Apex Charts</a></li>
                <li><a href="chart_sparkline.html">Chart sparkline</a></li>
                <li><a href="am_chart.html">am-charts</a></li>
                <li><a href="nvd3_charts.html">nvd3 charts.</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/map.svg') }}" alt = "" />
                </div>
                <div class="nav_title">
                    <span>Maps</span>
                </div>
            </a>
            <ul>
                <li><a href="mapjs.html">Maps JS</a></li>
                <li><a href="vector_map.html">Vector Maps</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!--/ sidebar  -->
