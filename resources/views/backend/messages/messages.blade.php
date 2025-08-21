@extends('backend.layout.master')
@section('title')
    || Leave
@endsection

<style>
    .b-w {
        width: 6.5rem;
        padding: 8px 2px !important;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Leave Messages Area </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('leaves.index') }}">Leave</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Leave-Area</li>
                </ol>
            </nav>
        </div>
        {{-- Body section --}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-inline-block text-info">Manage Leave</h4>
                        <p class="card-description" style="float:right">Customize Employee's Messages </p>
                        <hr>
                        <div class="table-responsive message-table w-100">
                            <table class="table table-hover table-striped reloadmessagesTable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> S/L </th>
                                        <th> Name & Email </th>
                                        <th> Subject </th>
                                        <th> Description </th>
                                        <th> Query</th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($leaveMessageInfo as $leaveMessages)
                                        @php
                                            $date = $leaveMessages->created_at;
                                            $date = Carbon\Carbon::parse($date);
                                            $elapsed = $date->diffForHumans();
                                        @endphp
                                        <tr @if ($leaveMessages->read_at == 0) style="background-color:#363a49;" @endif>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="alignleft">
                                                <p>
                                                    <b>Name: &nbsp;&nbsp;</b> {{ $leaveMessages->employee->userName }}
                                                </p>
                                                <p class="mb-0">
                                                    <b>Email: &nbsp;&nbsp;</b> <a
                                                        href="mailto:+  {{ $leaveMessages->employee->email }}">
                                                        {{ $leaveMessages->employee->email }}</a>
                                                </p>
                                            </td>
                                            <td class="alignleft">
                                                {{ $leaveMessages->subject }}

                                                <p class="text-muted mb-0 mt-2"> {{ $elapsed }} </p>
                                            </td>
                                            {{-- For Display Password & date Info Start --}}
                                            <td class="alignleft">
                                                <p>
                                                    @php
                                                        echo str_split($leaveMessages->description, 10)[0] . '..  ';

                                                        $description = str_replace(
                                                            [' ', "\n", "\r"],
                                                            '__',
                                                            $leaveMessages->description,
                                                        );
                                                        $name = str_replace(' ', '__', $leaveMessages->userName);
                                                    @endphp

                                                    <a class="text-primary view-description cursor-pointer"
                                                        style="cursor: pointer" data-id={{ $leaveMessages->id }}
                                                        data-name={{ $name }}
                                                        data-read_at={{ $leaveMessages->read_at }}
                                                        data-description={{ $description }}
                                                        data-image={{ $leaveMessages->profileImage }}
                                                        data-type="@if ($leaveMessages->profileImage == null) 0
                                                        @else
                                                             1 @endif"
                                                        data-toggle="modal" data-target="#message_view_modal">
                                                        more
                                                    </a>
                                                </p>


                                                <b>Attachment: </b>
                                                @if ($leaveMessages->attachment)
                                                    <a href="{{ asset('uploads/leaveAttachment/' . $leaveMessages->attachment) }}"
                                                        target="_blank">View</a>
                                                @else
                                                    N/A
                                                @endif

                                            </td>

                                            <td class="text-start">
                                                <p>
                                                    <b>Supv. Status: </b>
                                                    @if ($leaveMessages->is_supervisor_approve == 1)
                                                        <span class="text-success">&nbsp;Accepted</span>
                                                    @else
                                                        <span class="text-danger">&nbsp;Rejected</span>
                                                    @endif
                                                </p>
                                                <p><b> Start Date: &nbsp;</b> {{ $leaveMessages->start_date }}</p>
                                                <p><b>End Date: &nbsp;</b> {{ $leaveMessages->end_date }}</p>

                                            </td>


                                            <td>
                                                @if (is_null($leaveMessages->is_admin_approve))
                                                    <a data-id={{ $leaveMessages->id }} data-status="1"
                                                        data-title="Do you want to Accept it?"
                                                        data-description="He will be gone to leave!!"
                                                        class="change_leave_status text-decoration-none me-2"
                                                        data-toggle="modal" data-target="#leaveStatusmodal">
                                                        <button class="btn btn-warning b-w">Accept</button>
                                                    </a>

                                                    <a data-id={{ $leaveMessages->id }} data-status="0"
                                                        data-title="Do you want to Cancel it??"
                                                        data-description="Cancel his leave application!!"
                                                        class="change_leave_status text-decoration-none" data-toggle="modal"
                                                        data-target="#leaveStatusmodal">
                                                        <button class="btn btn-danger b-w">Cancel</button>
                                                    </a>
                                                @else
                                                    @if ($leaveMessages->is_admin_approve == 1)
                                                        <p class="text-success">Accepted</p>
                                                    @else
                                                        <p class="text-danger">Rejected</p>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $leaveMessages->id }}"
                                                        id="deleteMessageId">
                                                    <a class="text-danger deletebtn" style="cursor: pointer"
                                                        data-id={{ $leaveMessages->id }} data-type="delete_message"
                                                        data-toggle="modal" data-target="#deletemodal">
                                                        <li class="fas fa-trash-alt" style="font-size: 26px"></li>
                                                    </a>
                                                </form>
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
    @endsection
    @section('modal')
        @include('backend.messages._change_status_modal')
        @include('backend.messages._messageViewModal')
        @include('backend.layout.modal._delete_confirm')
    @endsection
    @section('script')
        @include('backend.ajax._messagesJS')
    @endsection
