@extends('backend.layout.master')
@section('title')
    || Logo
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Admin Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i> <a
                                        href="{{ route('logo') }}"> Logo</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-6 col-md-6 col-sm-12 grid-margin stretch-card">
                @include('backend.logo._upload_logo')
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12 grid-margin stretch-card">
                @include('backend.logo._manage_logo')
            </div>
        </div>

    </div>
@endsection
@section('modal')
    @include('backend.layout.modal._delete_confirm')
    @include('backend.logo._logo_change_status_modal')
@endsection
@section('script')
    @include('backend.ajax._logoJS')
@endsection
