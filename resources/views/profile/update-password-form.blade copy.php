<x-form-section submit="updatePassword" style="padding:15px 15px;" class="card">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full form-control"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>
{{-- 
        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full form-control"
                wire:model.defer="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full form-control"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div> --}}

        <!-- Password -->
        <div class="mb-3 position-relative">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required
                autocomplete="new-password">
            <span class="position-absolute" onclick="togglePasswordVisibility('password', 'togglePasswordIcon')"
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
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                placeholder="Confirm Password" required autocomplete="new-password">
            <span class="position-absolute"
                onclick="togglePasswordVisibility('password_confirmation', 'toggleConfirmPasswordIcon')"
                style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;">
                <i id="toggleConfirmPasswordIcon" class="fas fa-eye-slash fs-6"></i>
            </span>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="btn btn-primary">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>