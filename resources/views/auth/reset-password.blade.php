<x-guest-layout>
    <div class="main_content_iner d-flex justify-content-center align-items-center"
        style="min-height: 100vh; overflow-x: hidden;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="mb_30">
                        <div class="row justify-content-center g-2">
                            <div class="col-lg-4 card p-0 border-0">

                                <div class="modal-header theme_bg_1 justify-content-center m-0">
                                    <h5 class="modal-title text_white">Reset Password</h5>
                                </div>
                                <div class="p-4">

                                    <x-validation-errors class="mb-4" />

                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-group">
                                            <x-label for="email" value="{{ __('Email') }}" />
                                            <x-input id="email" class="block mt-1 w-full form-control p_input"
                                                type="email" name="email" readonly
                                                :value="old('email', $request->email)" required autofocus
                                                autocomplete="username" />
                                        </div>

                                        {{--
                                        <div class="form-group mt-4">
                                            <x-label for="password" value="{{ __('Password') }}" />
                                            <x-input id="password" class="block mt-1 w-full form-control p_input"
                                                type="password" name="password" required autocomplete="new-password" />
                                        </div>

                                        <div class="form-group mt-4">
                                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-input id="password_confirmation"
                                                class="block mt-1 w-full form-control p_input" type="password"
                                                name="password_confirmation" required autocomplete="new-password" />
                                        </div>

                                        --}}

                                        <div class="form-group mt-4">
                                            <x-label for="password" value="{{ __('Password') }}" />
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
                                        </div>

                                        <div class="form-group mt-4">
                                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
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
                                        </div>


                                        <div class="d-flex items-center justify-content-end mt-4">
                                            <x-button class="btn btn-warning">
                                                {{ __('Reset Password') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>