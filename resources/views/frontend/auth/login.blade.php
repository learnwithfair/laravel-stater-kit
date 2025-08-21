@extends('layouts.guest2')
@push('styles')
    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .form-control,
        .btn,
        .form-select {
            border-radius: 6px;
        }

        .form-control::placeholder {
            color: #aaa;
        }
    </style>
@endpush
@section('main-content')
    <div class="container login-container">
        <div class="row align-items-center justify-content-center g-2">
            <!-- Left Logo -->
            <div class="col-md-5 text-center">
                <img src="assets/img/logo.png" alt="EdenProse" class="logo mb-3" />
            </div>

            <!-- Right Login Card -->
            <div class="col-md-7">
                <div class="login-card login-width
                mx-auto">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#"><i class="fa fa-chevron-left secondary-color"></i></a>
                        </div>
                        <div class="float-end text-end ">
                            <h5 class="mb-0 text-h3 secondary-color">Sign in</h5>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        {{-- <button class="btn btn-green btn-toggle button-one py-1">CLIENT</button>
                        <button class="btn btn-outline-dark btn-toggle secondary-color button-one py-1">STAFF</button> --}}


                    </div>
                    @if (session('success'))
                        <script></script>
                        <div class="alert alert-success text-center">
                            {{ session('success') }}

                        </div>
                    @endif

                    <form method="POST" action="{{ route('clientLogin.store') }}">
                        @csrf

                        <!-- Email or Phone Input -->
                        <div class="mb-2">
                            <label class="form-label body-text-two">Email or phone number</label>
                            <input type="text" name="login" value="{{ old('login') }}"
                                class="py-1 form-control quaternary-bg-color body-text-three @error('login') is-invalid @enderror"
                                placeholder="Enter your email or phone number" required />
                            @error('login')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-2">
                            <label class="form-label body-text-two">Password</label>
                            <div class="input-group">
                                <input type="password" name="password"
                                    class="py-1 form-control quaternary-bg-color body-text-three @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" id="passwordInput" required />
                                <span class="input-group-text quaternary-bg-color" id="togglePassword"
                                    style="cursor: pointer;">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Toggle JS -->
                        <script>
                            const passwordInput = document.getElementById("passwordInput");
                            const togglePassword = document.getElementById("togglePassword");
                            const icon = togglePassword.querySelector("i");

                            togglePassword.addEventListener("click", () => {
                                const isPassword = passwordInput.type === "password";
                                passwordInput.type = isPassword ? "text" : "password";
                                icon.classList.toggle("fa-eye-slash");
                                icon.classList.toggle("fa-eye");
                            });
                        </script>

                        <div class="text-end mb-2">
                            <a href="#" class="text-decoration-none text-muted small">Forgot password?</a>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-green button-one py-1 w-100">Sign in</button>
                        </div>
                    </form>


                    <p class="body-text-three text-muted text-center mb-2">By continuing, you agree to Conditions of Use
                        and
                        Privacy Notice.</p>

                    <p class="text-center body-text-three mb-2">Or login with</p>

                    <div class="d-grid mb-3">
                        <button class="btn google-btn body-text-two py-1">
                            <img src="https://img.icons8.com/color/16/000000/google-logo.png" />
                            Sign in with Google
                        </button>
                    </div>

                    <div class="d-grid mb-1">
                        <a href="{{ route('clientRegister') }}">
                            <button class="btn btn-light-green button-one py-1 w-100">Create new account</button>
                        </a>
                    </div>

                    <div class="d-flex justify-content-between body-text-three">
                        <a href="#" class="text-muted text-decoration-none">Conditions of Use</a>
                        <a href="#" class="text-muted text-decoration-none">Privacy Notice</a>
                        <a href="#" class="text-muted text-decoration-none">Help</a>
                    </div>

                    <p class="text-center body-text-two text-muted mt-1 mb-0 ">© 2025, EdenProse</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow rounded-3 w-100" style="max-width: 400px;">
            <h1 class="login-title text-center mb-4 text-color">Sign in</h1>

            <form method="POST" action="{{ route('employeeLogin') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', Cookie::get('employee_email')) }}"
                        placeholder="Enter your email" required autofocus />
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror pe-5" id="password"
                        name="password" placeholder="Enter your password" required
                        value="{{ old('password', Cookie::get('employee_password')) }}" />
                    <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3" id="eye-icon"
                        style="top:50px;cursor: pointer;" onclick="togglePassword()"></i>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember"
                            {{ old('remember', Cookie::get('remember_me')) ? 'checked' : '' }} />
                        <label for="remember" class="form-check-label">Remember me</label>
                    </div>
                    <a href="{{ route('employee.password.request') }}" class="text-decoration-none">Forgot password?</a>

                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn w-100 btn-color">
                    Login &rarr;
                </button>
            </form>

            <!-- Registration Link -->
            <p class="mt-3 text-center">
                Don’t have an account?
                <a href="{{ route('employeeRegister.show') }}">Create New</a>
            </p>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script> --}}
@endsection
