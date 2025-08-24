@extends('backend.layout.app')
@section('title')
    || Dynamic Pages
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_10">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3>Dynamic Pages Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('dynamic_page.index') }}">Dynamic Pages</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="card-title d-inline-block table-title">Page Details</h4>
                        <a href="{{ route('dynamic_page.create') }}" class="btn btn-primary btn-sm mb-3" style="float: right">
                            Add New Page
                        </a>
                        {{-- <p class="card-description" style="float: right">Customize User status </p> --}}
                        <hr />
                        <div class="table-responsive w-100">                           
                                <table class="table reloadDynamicPageTable table-hover" id="data-table">
                                    <thead align="middle">
                                        <tr>
                                            <th>#</th>
                                            <th>Page Title</th>
                                            <th>Page Content</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

    @section('modal')
        @include('backend.layout.modal._delete_confirm')
        @include('backend.settings.dynamic_page._change_status_modal')
    @endsection

    @section('script')
        @include('backend.ajax._dynamicPageJS')
    @endsection