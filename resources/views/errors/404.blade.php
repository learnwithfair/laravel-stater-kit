<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.partials._style')
</head>

<body>

    <div class="erroe_page_wrapper">
        <div class="errow_wrap">
            <div class="container text-center">
                {{-- <img src="img/bak_hovers/sad.html" alt=""> --}}
                <div class="error_heading  text-center">
                    <h3 class="headline font-danger theme_color_6">404</h3>
                </div>
                <div class="col-md-8 offset-md-2 text-center">
                    <p>The page you are attempting to reach is currently not available. This may be because the page
                        does not exist or has been moved.</p>
                </div>
                <div class="error_btn  text-center">
                    <a class=" default_btn theme_bg_6 " href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-arrow-left"></i> &nbsp;Back Dashboard</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
