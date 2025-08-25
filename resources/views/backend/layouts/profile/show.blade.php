<x-profile-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_10">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Profile Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i
                                        class="fas fa-caret-right"></i>
                                    <a href="{{ route('profile.show') }}"> Profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row g-4  mb-4">
                <div class="col-12 col-md-6">
                    @livewire('update-profile-picture-form')
                    <x-section-border />
                </div>
                <div class="col-12 col-md-6 ">
                    @livewire('profile.update-profile-information-form')
                    <x-section-border />
                </div>
            </div>


            <div class="row g-4">
                <div class="col-12 col-md-6">
                    @livewire('profile.update-password-form')
                    <x-section-border />
                </div>
                <div class="col-12 col-md-6 ">
                    @livewire('profile.logout-other-browser-sessions-form')
                    <x-section-border />
                </div>
            </div>



            {{-- @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::UpdateProfilePictureForm())) --}}

            {{-- @endif --}}

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-5 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif --}}



            {{-- @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="mt-5 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
            @endif --}}
        </div>
    </div>
</x-profile-layout>