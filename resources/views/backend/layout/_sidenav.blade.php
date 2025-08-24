<!-- sidebar  -->
<nav id="sidebar" class="sidebar dark_sidebar">

    <!-- Logo  -->
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route('admin.dashboard') }}"><img
                src="{{ asset($systemSetting->logo ?? 'backend/assets/images/logo-default.svg') }}" alt="" /></a>
        <a class="small_logo" href="{{ route('admin.dashboard') }}">
            <img class="rounded-circle"
                src="{{ asset($systemSetting->favicon ?? 'backend/assets/images/logo-minimize.svg') }}" alt="logo"
                style="height: 50px;width:50px;" />
        </a>

        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        <li class="">
            <a href="/admin/dashboard" aria-expanded="false" class="active">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/1.svg') }}" alt="" />
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>

        <li class="">
            <a href="/admin/users" aria-expanded="false" class="active">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/4.svg') }}" alt="" />
                </div>
                <div class="nav_title">
                    <span>User List</span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('backend/assets/img/menu-icon/settings.png') }}" alt="" />

                </div>
                <div class="nav_title">
                    <span>Settings</span>
                </div>
            </a>
            <ul>
                <li> <a href="/user/profile">Profile Settings</a> </li>
                <li> <a href="/admin/system-setting">System Settings</a> </li>
                <li> <a href="/admin/social-media">Social Settings</a> </li>
                <li> <a href="/admin/dynamic-page">Dynamic Page</a> </li>
                <li> <a href="/admin/mail-setting">Mail Settings</a> </li>
            </ul>
        </li>
    </ul>
</nav>
<!--/ sidebar  -->