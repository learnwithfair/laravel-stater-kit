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
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="EdenProse" class="logo mb-3" />
            </div>

            <!-- Right Login Card -->
            <div class="col-md-8">
                <div class="login-card login-width
                mx-auto">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('home') }}"><i class="fa fa-chevron-left secondary-color"></i></a>
                        </div>
                        <div class="float-end text-end ">
                            <h5 class="mb-0 text-h3 secondary-color">Create Account</h5>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        {{-- <button class="btn btn-green btn-toggle button-one py-1">CLIENT</button>
                        <button class="btn btn-outline-dark btn-toggle secondary-color button-one py-1">STAFF</button> --}}
                    </div>

                    <form method="POST" action="{{ route('clientRegister.store') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-2">
                            <label class="form-label body-text-two">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="py-1 form-control quaternary-bg-color body-text-three @error('name') is-invalid @enderror"
                                placeholder="Enter your name" required />
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-2">
                            <label class="form-label body-text-two">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="py-1 form-control quaternary-bg-color body-text-three @error('email') is-invalid @enderror"
                                placeholder="Enter your email" required />
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number Field -->
                        <div class="mb-2">
                            <label class="form-label body-text-two">Phone Number</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}"
                                class="py-1 form-control quaternary-bg-color body-text-three @error('phone_number') is-invalid @enderror"
                                placeholder="Enter your phone number" required />
                            @error('phone_number')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
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

                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label class="form-label body-text-two">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation"
                                    class="py-1 form-control quaternary-bg-color body-text-three"
                                    placeholder="Re-enter your password" id="confirmPasswordInput" required />
                                <span class="input-group-text quaternary-bg-color" id="toggleConfirmPassword"
                                    style="cursor: pointer;">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-green button-one py-1">Create</button>
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
                        <a href="{{ route('clientSignin') }}" class="text-decoration-none">
                            <button class="btn btn-light-green button-one py-1 w-100">Sign in</button>
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

    <!-- Main Content -->
    {{-- <div class="main-content d-flex justify-content-center align-items-center min-vh-100 mb-5">
        <div class="card p-4 shadow rounded-3 w-100" style="max-width: 600px;">
            <h1 class="login-title text-center mb-4 text-color">Sign up</h1>

            <form method="POST" action="{{ route('employeeRegister') }}">
                @csrf

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" placeholder="Enter your name" required autofocus />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Enter your email" required />
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" required />
                    @error('phone')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Company Code Field -->
                <div class="mb-3">
                    <label for="company_code" class="form-label">Company Code</label>
                    <input type="text" class="form-control @error('company_code') is-invalid @enderror" id="company_code"
                        name="company_code" value="{{ old('company_code') }}" placeholder="Enter your company code"
                        required />
                    @error('company_code')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Role Field -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" id="role"
                        name="role" value="{{ old('role') }}" placeholder="Enter your role" required />
                    @error('role')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Employee Type Field with Dropdown -->
                <div class="mb-3">
                    <label for="employee_type" class="form-label">Employee Type</label>
                    <select class="form-select @error('employee_type') is-invalid @enderror" id="employee_type"
                        name="employee_type" required>
                        <option value="">Select employee type</option>
                        <option value="onsite" {{ old('employee_type') == 'onsite' ? 'selected' : '' }}>Onsite</option>
                        <option value="remote" {{ old('employee_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                    @error('employee_type')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror pe-5" id="password"
                        name="password" placeholder="Enter your password" required />
                    <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3" id="eye-icon"
                        style="cursor: pointer; top:50px;" onclick="togglePassword()"></i>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3 position-relative">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control pe-5" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password" required />
                    <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3" id="confirm-eye-icon"
                        style="cursor: pointer; top:50px;" onclick="toggleConfirmPassword()"></i>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn w-100 btn-color">
                    Create &rarr;
                </button>
            </form>

            <!-- Login Link -->
            <p class="mt-3 text-center">
                You have an account?
                <a href="{{ route('employeeLogin.show') }}">Login</a>
            </p>
        </div>
    </div> --}}
@endsection
