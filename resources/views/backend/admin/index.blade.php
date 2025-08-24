@extends('backend.layout.app')
@section('title')
    || Admin
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_10">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Users Info</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('users.index') }}"> Users list</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Main Content Start --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-inline-block table-title">User Details</h4>
                        <p class="card-description" style="float: right">Customize User status </p>
                        <hr />
                        <div class="table-responsive w-100">
                            <table class="table reloadAdminTable table-hover" id="data-table">
                                <thead>
                                    <tr align="middle">
                                        <th>S\L</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Set Admin</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody align="middle">

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Main Content End --}}
    </div>
@endsection
@section('modal')
    @include('backend.admin._change_status_modal')
    @include('backend.admin._change_account_status_modal')
    @include('backend.layout.modal._delete_confirm')
@endsection
@section('script')
    @include('backend.ajax._adminJS')
@endsection