@extends('backend.app')
@section('title', 'Dynamic Pages')
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
                    <form method="POST" action="{{ route('dynamic_page.update', ['id' => $data->id]) }}">
                        @csrf
                        <div class="mt-4 mt-md-0 input-style-1">
                            <label for="page_title">Title:</label>
                            <input type="text" placeholder="Enter Title" id="page_title"
                                class="form-control @error('page_title') is-invalid @enderror" name="page_title"
                                value="{{ old('page_title', $data->page_title) }}" />
                            @error('page_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-4 input-style-1">
                            <label for="page_content">Content:</label>
                            <textarea placeholder="Type here..." id="summernote" name="page_content"
                                class="form-control @error('page_content') is-invalid @enderror">
                                    {{ old('page_content', $data->page_content) }}
                                </textarea>
                            @error('page_content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-4 col-12">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            <a href="{{ route('dynamic_page.index') }}" class="btn btn-danger btn-lg me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection