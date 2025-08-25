@extends('backend.app')

@section('title', 'Facebook settings')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bold my-1 fs-2">
                    Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary"> Home </a>
                    </li>

                    <li class="breadcrumb-item text-muted"> Setting </li>
                    <li class="breadcrumb-item text-muted"> Facebook </li>

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Toolbar-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="card-style mb-4">
                    <div class="card card-body">
                        <form method="POST" action="{{ route('facebook.update') }}">
                            @csrf
                            <div class="input-style-1">
                                <label for="FACEBOOK_CLIENT_ID">FACEBOOK CLIENT ID:</label>
                                <input type="text" placeholder="Enter facebook id" id="FACEBOOK_CLIENT_ID"
                                    class="form-control @error('FACEBOOK_CLIENT_ID') is-invalid @enderror"
                                    name="FACEBOOK_CLIENT_ID" value="{{ env('FACEBOOK_CLIENT_ID') }}" />
                                @error('FACEBOOK_CLIENT_ID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-style-1 mt-4">
                                <label for="FACEBOOK_CLIENT_SECRET">FACEBOOK CLIENT SECRET:</label>
                                <input type="text" placeholder="Enter facebook secret" id="FACEBOOK_CLIENT_SECRET"
                                    class="form-control @error('FACEBOOK_CLIENT_SECRET') is-invalid @enderror"
                                    name="FACEBOOK_CLIENT_SECRET" value="{{ env('FACEBOOK_CLIENT_SECRET') }}" />
                                @error('FACEBOOK_CLIENT_SECRET')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="input-style-1 mt-4">
                                <label for="FACEBOOK_REDIRECT_URI">FACEBOOK REDIRECT URI:</label>
                                <input type="text" placeholder="Enter google uri" id="FACEBOOK_REDIRECT_URI"
                                    class="form-control @error('FACEBOOK_REDIRECT_URI') is-invalid @enderror"
                                    name="FACEBOOK_REDIRECT_URI" value="{{ env('FACEBOOK_REDIRECT_URI') }}" />
                                @error('FACEBOOK_REDIRECT_URI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
