@extends('backend.layout.master')
@section('title')
    || System Settings
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_25">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Setting Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('system.index') }}"> System Settings</a>
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
                                            <input type="file" class="dropify @error('logo') is-invalid @enderror"
                                                name="logo" id="logo"
                                                data-default-file="{{ asset($setting->logo ?? 'backend/assets/img/image_placeholder.png') }}" />
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
                                                data-default-file="{{ asset($setting->favicon ?? 'backend/assets/img/image_placeholder.png') }}" />
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

                                <div class="row">
                                    <div class="mt-3 col-12 ">
                                        <div class="d-flex justify-content-end ">
                                             <a href="{{ route('admin.dashboard') }}"
                                                class="btn btn-danger btn-md me-3">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md ">Submit</button>                                           
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