@extends('backend.app')
@section('title', 'System Settings')
@section('page-content')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div class="flex-wrap container-fluid d-flex flex-stack flex-sm-nowrap">
        <!--begin::Info-->
        <div class="flex-wrap d-flex flex-column align-items-start justify-content-center me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold fs-2">
                @yield('title' ?? "Dashboard") <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base" style="padding: 0 0 0 5px;">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        Home </a>
                </li>

                <li class="breadcrumb-item text-muted">
                    @yield('title' ?? "Dashboard") </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Toolbar-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-4 card-style">
                <div class="card card-body">
                    <form method="POST" action="{{ route('system.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="title">Title:</label>
                                    <input type="text" placeholder="Enter Title" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $setting->title ?? '' }}" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="email">Email:</label>
                                    <input type="email" placeholder="Enter Email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $setting->email ?? '' }}" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="system_name">System Name:</label>
                                    <input type="text" placeholder="System Name" id="system_name"
                                        class="form-control @error('system_name') is-invalid @enderror"
                                        name="system_name" value="{{ $setting->system_name ?? '' }}" />
                                    @error('system_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="copyright_text">Copy Rights Text:</label>
                                    <input type="text" placeholder="Copy Rights Text" id="copyright_text"
                                        class="form-control @error('copyright_text') is-invalid @enderror"
                                        name="copyright_text" value="{{ $setting->copyright_text ?? '' }}" />
                                    @error('copyright_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="logo">Logo:</label>
                                    <input type="file" class="dropify @error('logo') is-invalid @enderror" name="logo"
                                        id="logo"
                                        data-default-file="{{ asset($setting->logo ?? 'backend/assets/images/image_placeholder.png') }}" />
                                </div>

                                @error('logo')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-3 col-md-6">
                                <div class="input-style-1">
                                    <label for="favicon">Favicon:</label>
                                    <input type="file" class="dropify @error('favicon') is-invalid @enderror"
                                        name="favicon" id="favicon"
                                        data-default-file="{{ asset($setting->favicon ?? 'backend/assets/images/image_placeholder.png') }}" />
                                </div>
                                @error('favicon')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3 col-12">
                                <div class="input-style-1">
                                    <label for="description">About System:</label>
                                    <textarea placeholder="Type here..." id="summernote" name="description"
                                        class="form-control @error('description') is-invalid @enderror">
                                            {{ $setting->description ?? '' }}
                                        </textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 col-12">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2 btn-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection