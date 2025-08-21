{{-- For Title Set --}}
@section('title')
    || Login
@endsection

<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center"
        style="min-height: 100vh; overflow-x: hidden;">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4 ">
                    <!-- sign_in -->
                    <div class="modal-content cs_modal card">
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">Log in</h5>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-danger text-center mt-3" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="modal-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3 position-relative">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password" required autocomplete="current-password">

                                    <!-- Eye Icon -->
                                    <span class="position-absolute" onclick="togglePassword()"
                                        style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; @error('password') top:30% @enderror"">
                                        <i id="togglePasswordIcon" class="fas fa-eye-slash fs-6"></i>
                                    </span>

                                    @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <!-- Login Button -->
                                <button type="submit" class="btn_1 full_width text-center">
                                    {{ __('Log in') }}
                                </button>

                                <!-- Register Link -->
                                <p class="text-center mt-3">
                                    Need an account?
                                    <a href="{{ route('register') }}" class="text-primary">Sign Up</a>
                                </p>

                                <!-- Forgot Password -->
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="pass_forget_btn">
                                            Forget Password?
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div> <!-- modal-body -->
                    </div> <!-- modal-content -->
                </div> <!-- col-lg-6 -->
            </div>
        </div>
    </div>
</x-guest-layout>
