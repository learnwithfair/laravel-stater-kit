<!-- header area started -->
<nav class="navbar navbar-expand-lg bg-body-tertiary position-relative">
    <div class="container-fluid px-4">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="assets/img/logo.png" alt="Logo" style="height: 40px;">
        </a>

        <!-- Hamburger Icon -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Center menu -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link body-text-two link-underline link-underline-opacity-100-hover {{ request()->routeIs('home') ? 'active active-btn' : '' }}"
                        aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle body-text-two {{ request()->routeIs('services') ? 'active-btn' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services &amp; Pricing
                    </a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item body-text-two {{ request()->routeIs('services') ? 'active-btn' : '' }}"
                                href="{{ route('services') }}">Services</a></li>
                        <li><a class="dropdown-item body-text-two" href="#">Option 2</a></li>
                        <li><a class="dropdown-item body-text-two" href="#">Option 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link body-text-two link-underline link-underline-opacity-100-hover {{ request()->routeIs('blog') ? 'active-btn' : '' }}"
                        href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link body-text-two link-underline link-underline-opacity-100-hover {{ request()->routeIs('workForUs') ? 'active-btn' : '' }}"
                        href="{{ route('workForUs') }}">Work for Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link body-text-two link-underline link-underline-opacity-100-hover {{ request()->routeIs('about') ? 'active-btn' : '' }}"
                        href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link body-text-two link-underline link-underline-opacity-100-hover {{ request()->routeIs('contact') ? 'active-btn' : '' }}"
                        href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>

            <!-- Right button -->
            <div class="d-flex justify-content-center">
                <a href="{{ route('clientSignin') }}" class="text-decoration-none">
                    <button
                        class="btn btn-design-one secondary-bg-color text-white body-text-two d-flex align-items-center justify-content-center"
                        type="button">
                        Log in / Create account
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- header area ended -->
