<x-form-section submit="updatePassword" style="padding:15px 15px;" class="card">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <div class="position-relative">
                <input id="current_password" type="password" class="mt-1 block w-full form-control"
                    wire:model.defer="state.current_password" autocomplete="current-password" />
                <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3 toggle-password  transform -translate-y-1/2"
                    style="top:50%; cursor: pointer; right: 10px;" toggle="#current_password"></i>
            </div>
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="password" value="{{ __('New Password') }}" />
            <div class="position-relative">
                <input id="password" type="password" class="mt-1 block w-full form-control"
                    wire:model.defer="state.password" autocomplete="new-password" />

                <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3 toggle-password  transform -translate-y-1/2"
                    style="top:50%; cursor: pointer; right: 10px;" toggle="#password"></i>
            </div>
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <div class="position-relative">
                <input id="password_confirmation" type="password" class="mt-1 block w-full form-control"
                    wire:model.defer="state.password_confirmation" autocomplete="new-password" />


                <i class="fa-solid fa-eye-slash position-absolute end-0 translate-middle-y me-3 toggle-password  transform -translate-y-1/2"
                    style="top:50%; cursor: pointer; right: 10px;" toggle="#password_confirmation"></i>
            </div>
            <x-input-error for="password_confirmation" class="mt-2" />
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleIcons = document.querySelectorAll('.toggle-password');
        toggleIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const input = document.querySelector(this.getAttribute('toggle'));
                const isPassword = input.getAttribute('type') === 'password';
                input.setAttribute('type', isPassword ? 'text' : 'password');
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>