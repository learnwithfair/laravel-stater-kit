@extends('backend.layouts.app')
@section('title')
    || View Dynamic Page
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="dashboard_header mb_10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="dashboard_header_title">
                            <h3>View Dynamic Page</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a> 
                                <i class="fas fa-caret-right"></i>
                                <a href="{{ route('dynamic_page.index') }}">Dynamic Pages</a> 
                                <i class="fas fa-caret-right"></i>
                                <span>View</span>
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
                        <h4 class="mb-3">{{ $page->page_title }}</h4>
                        <div class="content-wrapper border p-3 rounded ">
                            {!! $page->page_content !!}
                        </div>

                        <div class="mt-4 text-end">
                            <a href="{{ route('dynamic_page.index') }}" class="btn btn-secondary btn-md">Back to List</a>
                            <a href="{{ route('dynamic_page.edit', $page->id) }}" class="btn btn-primary btn-md ms-2">Edit Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
