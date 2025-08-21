@extends('layouts.app2')

@section('main-content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow rounded-3 w-100" style="max-width: 400px;">
            <h1 class="login-title text-center mb-4 text-color">Reset Password</h1>

            <form method="POST" action="{{ route('employee.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', request()->query('email')) }}" placeholder="Enter your email"
                        required autofocus readonly />
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Enter your new password" required />
                    <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3" id="eye-icon"
                        style="top:50px;cursor: pointer;" onclick="togglePassword()"></i>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 position-relative">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your new password" required />
                    <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3" id="confirm-eye-icon"
                        style="cursor: pointer; top:50px;" onclick="toggleConfirmPassword()"></i>
                </div>

                <button type="submit" class="btn w-100 btn-color">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
@endsection
