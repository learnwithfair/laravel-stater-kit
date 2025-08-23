@extends('backend.layout.master')
@section('title')
    || Dynamic Pages
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_25">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Update Dynamic Pages</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('dynamic_page.index') }}"> Dynamic Pages</a>
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
                               

                                <div class="row">
                                    <div class="mt-3 col-12 ">
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ route('dynamic_page.index') }}"
                                                class="btn btn-danger btn-md me-3">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md ">Update</button>
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