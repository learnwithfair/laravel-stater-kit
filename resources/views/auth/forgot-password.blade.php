{{-- For Title Set --}}
@section('title')
    || Forgot-Password
@endsection
<x-guest-layout>
    
    <x-authentication-card>
        {{-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}
        <div class="modal-header theme_bg_1 justify-content-center m-0">
            <h5 class="modal-title text_white">Forgot Password</h5>
        </div>
       <div class="p-4">
         <div class="mb-4 text-sm">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full  form-control p_input" type="email" name="email"
                    :value="old('email')" required autofocus />
            </div>

            <div class="d-flex items-center mt-4 justify-content-end">
                <x-button class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
       </div>

    </x-authentication-card>

</x-guest-layout>