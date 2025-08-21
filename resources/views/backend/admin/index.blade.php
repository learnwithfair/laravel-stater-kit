@extends('backend.layout.master')
@section('title')
    || Admin
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
                                        href="{{ route('users.index') }}"> Admin list</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Main Content Start  --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-inline-block text-info">User Details</h4>
                        <p class="card-description" style="float: right">Customize admin status </p>
                        <hr />
                        <div class="table-responsive w-100">
                            <table class="table reloadAdminTable table-hover" id="dataTable">
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
                                    @foreach ($adminsDetails as $adminDetails)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td align="left">{{ $adminDetails->name }}</td>
                                            <td align="left">
                                                <a href="mailto:{{ $adminDetails->email }}" target="_blank">
                                                    {{ $adminDetails->email }}
                                                </a>
                                            </td>

                                            <td>
                                                @if ($adminDetails->role ==='admin')
                                                    <span class="text-info"> Admin</span>
                                                @else
                                                    <span class="text-success"> User</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($adminDetails->role ==='admin')
                                                    <a data-id={{ $adminDetails->id }} data-status="user"
                                                        data-title="Do you want to Set as a User?"
                                                        data-description="He don't access All!!" class="change_admin_status"
                                                        data-toggle="modal" data-target="#adminStatusmodal">
                                                        <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </a>
                                                @else
                                                    <a data-id={{ $adminDetails->id }} data-status="admin"
                                                        data-title="Do you want to Set as a Admin?"
                                                        data-description="He will be Access Dashboard!!"
                                                        class="change_admin_status" data-toggle="modal"
                                                        data-target="#adminStatusmodal">
                                                        <label class="switch">
                                                            <input type="checkbox">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($adminDetails->is_enabled == 1)
                                                    <a data-id={{ $adminDetails->id }} data-status="0"
                                                        data-title="Do you want to Disable it?"
                                                        data-description="He don't access All!!"
                                                        class="change_account_status" data-toggle="modal"
                                                        data-target="#accountStatusmodal">
                                                        <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </a>
                                                @else
                                                    <a data-id={{ $adminDetails->id }} data-status="1"
                                                        data-title="Do you want to Enable it??"
                                                        data-description="He will be Access Dashboard!!"
                                                        class="change_account_status" data-toggle="modal"
                                                        data-target="#accountStatusmodal">
                                                        <label class="switch">
                                                            <input type="checkbox">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </a>
                                                @endif
                                            </td>


                                            <td>
                                                <a class="text-danger cursor-pointer deletebtn"
                                                    data-id={{ $adminDetails->id }} data-type="delete_admin"
                                                    data-toggle="modal" data-target="#deletemodal" style="cursor:pointer">
                                                    <li class="fas fa-trash-alt fs-5"></li>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Main Content End  --}}
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
