@extends('backend.layout.master')
@section('title')
    || Mail Settings
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_25">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Mail Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('mail.setting') }}"> Mail Settings</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 card-style">
                        <div class="card card-body">
                            <form method="POST" action="{{ route('mail.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="mt-4 mt-md-0 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_mailer">MAIL MAILER:</label>
                                            <input type="text" placeholder="Enter mail mailer" id="mail_mailer"
                                                class="form-control @error('mail_mailer') is-invalid @enderror"
                                                name="mail_mailer" value="{{ env('MAIL_MAILER') }}" />
                                            @error('mail_mailer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-0 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_host">MAIL HOST:</label>
                                            <input type="text" placeholder="Enter mail host" id="mail_host"
                                                class="form-control @error('mail_host') is-invalid @enderror"
                                                name="mail_host" value="{{ env('MAIL_HOST') }}" />
                                            @error('mail_host')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_port">MAIL PORT:</label>
                                            <input type="text" placeholder="Enter mail port" id="mail_port"
                                                class="form-control @error('mail_port') is-invalid @enderror"
                                                name="mail_port" value="{{ env('MAIL_PORT') }}" />
                                            @error('mail_port')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_username">MAIL USERNAME:</label>
                                            <input type="text" placeholder="Enter mail username" id="mail_username"
                                                class="form-control @error('mail_username') is-invalid @enderror"
                                                name="mail_username" value="{{ env('MAIL_USERNAME') }}" />
                                            @error('mail_username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_password">MAIL PASSWORD:</label>
                                            <input type="text" placeholder="Enter mail password" id="mail_password"
                                                class="form-control @error('mail_password') is-invalid @enderror"
                                                name="mail_password" value="{{ env('MAIL_PASSWORD') }}" />
                                            @error('mail_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_encryption">MAIL ENCRYPTION:</label>
                                            <input type="text" placeholder="Enter mail encryption" id="mail_encryption"
                                                class="form-control @error('mail_encryption') is-invalid @enderror"
                                                name="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}" />
                                            @error('mail_encryption')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4 col-md-6">
                                        <div class="input-style-1">
                                            <label for="mail_from_address">MAIL FROM ADDRESS:</label>
                                            <input type="text" placeholder="Enter mail from address" id="mail_from_address"
                                                class="form-control @error('mail_from_address') is-invalid @enderror"
                                                name="mail_from_address" value="{{ env('MAIL_FROM_ADDRESS') }}" />
                                            @error('mail_from_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="mt-4 col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-lg me-2">Cancel</a>
                                </div> --}}

                                <div class="row">
                                    <div class="mt-4 col-12 ">
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-md me-3"
                                                title="Cancel and go back to the dashboard">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md"
                                                title="Submit the form">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection