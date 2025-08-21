{{-- For Title Set --}}
@section('title')
    || Register
@endsection

<x-guest-layout>
    <div class="main_content_iner d-flex justify-content-center align-items-center"
        style="min-height: 100vh; overflow-x: hidden;">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <!-- Register -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Register</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('admin.store') }}">
                                            @csrf

                                            <!-- Name -->
                                            <div class="mb-3">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" value="{{ old('name') }}"
                                                    placeholder="Full Name" required autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" value="{{ old('email') }}"
                                                    placeholder="Enter your email" required>
                                                @error('email')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-3 position-relative">
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="Password" required
                                                    autocomplete="new-password">
                                                <span class="position-absolute"
                                                    onclick="togglePasswordVisibility('password', 'togglePasswordIcon')"
                                                    style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; @error('password') top:30% @enderror">
                                                    <i id="togglePasswordIcon" class="fas fa-eye-slash fs-6"></i>
                                                </span>
                                                @error('password')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mb-3 position-relative">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="password_confirmation" placeholder="Confirm Password" required
                                                    autocomplete="new-password">
                                                <span class="position-absolute"
                                                    onclick="togglePasswordVisibility('password_confirmation', 'toggleConfirmPasswordIcon')"
                                                    style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;">
                                                    <i id="toggleConfirmPasswordIcon" class="fas fa-eye-slash fs-6"></i>
                                                </span>
                                            </div>

                                            <!-- Checkbox (optional) -->
                                            {{-- <div class="cs_check_box mb-3">
                                                <input type="checkbox" id="check_box" class="common_checkbox"
                                                    name="updates" required>
                                                <label class="form-label" for="check_box">
                                                    Keep me up to date
                                                </label>
                                            </div> --}}

                                            <!-- Submit -->
                                            <button type="submit" class="btn_1 full_width text-center">Sign Up</button>

                                            <!-- Login Link -->
                                            <p class="text-center mt-3">
                                                Already have an account?
                                                <a href="{{ route('login') }}">Log in</a>
                                            </p>
                                        </form>
                                    </div>
                                </div> <!-- modal-content -->
                            </div>
                        </div>
                    </div> <!-- white_box -->
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
