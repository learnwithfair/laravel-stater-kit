@extends('layouts.app2')

@section('main-content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow rounded-3 w-100" style="max-width: 400px;">
            <h1 class="login-title text-center mb-4 text-color">Forgot Password?</h1>
            <p class="text-center">Enter your email to receive a password reset link.</p>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('employee.password.email') }}">
                @csrf

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

                <button type="submit" class="btn w-100 btn-color">
                    Send Password Reset Link
                </button>
            </form>

            <p class="mt-3 text-center">
                Remember your password? <a href="{{ route('employeeLogin') }}">Login</a>
            </p>
        </div>
    </div>
@endsection
