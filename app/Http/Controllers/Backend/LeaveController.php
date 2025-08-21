<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $companyCode = Auth::user()->company_code;

        $leaveMessageInfo = Leave::whereHas( 'employee', function ( $query ) use ( $companyCode ) {
            $query->where( 'company_code', $companyCode );
        } )
            ->whereNotNull( 'is_supervisor_approve' )
            ->with( 'employee:id,name as userName,email,company_code,image as profileImage' )
            ->orderBy( 'leave.id', 'DESC' )
            ->get();
        return view( 'backend.messages.messages', compact( 'leaveMessageInfo' ) );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $path = 'uploads/leaveAttachment/';
        $validated = Validator::make( $request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'subject'     => 'required|string',
            'description' => 'required|string|max:500',
            'attachment'  => 'nullable|file|mimes:pdf|max:2048',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',

        ] );

        if ( $validated->fails() ) {
            return response()->json( ['status' => 'error', 'payload' => $validated->errors()], 422 );
        }

        $data = $validated->validated();

        if ( $request->hasFile( 'attachment' ) ) {
            $file = $request->file( 'attachment' );
            $new_name = 'attachment_' . date( 'Ymd' ) . uniqid() . '.pdf';

            $upload = $file->move( public_path( $path ), $new_name );

            if ( !$upload ) {
                return response()->json( ['status' => 0, 'msg' => 'Something went wrong, upload new picture failed.'] );
            } else {

                $oldAttachment = Leave::where( 'employee_id', $request->input( 'employee_id' ) )->pluck( 'attachment' );

                if ( $oldAttachment != '' ) {
                    if ( File::exists( public_path( $path . $oldAttachment ) ) ) {
                        File::delete( public_path( $path . $oldAttachment ) );
                    }
                }

            }
            $data['attachment'] = $new_name;

        }

        return createAndRespond( Leave::class, $data );

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id ) {
        $update = Leave::where( [
            ['id', $id],
            ['read_at', 0],
        ] )->update( [
            'read_at' => 1,
        ] );
        return redirect()->route( 'leaves.index' );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        $action = $request->action;

        // For Read Messages
        if ( $action == "read_at" ) {
            $update = Leave::where( [
                ['id', $id],
                ['read_at', 0],
            ] )->update( [
                'read_at' => 1,
            ] );

        }

        // For Status Messages
        elseif ( $action == "status" ) {
            $is_admin_approve = $request->is_admin_approve;
            $update = Leave::findOrFail( $id )->update( [
                'is_admin_approve' => $is_admin_approve,
            ] );

        }
        if ( $update ) {
            return response()->json( ['status' => "success"] );
        } else {
            return response()->json( ['status' => "error"] );
        }
    }

    // Leave messages approve by supervisor
    public function approveLeaveBySupervisor( Request $request, $id ) {
        // Validate the request

        $validated = Validator::make( $request->all(), [
            'is_supervisor_approve' => 'required|boolean',

        ] );

        if ( $validated->fails() ) {
            return response()->json( ['status' => 'error', 'payload' => $validated->errors()], 422 );
        }

        $leave = Leave::findOrFail( $id );

        $leave->is_supervisor_approve = $request->input( 'is_supervisor_approve' );
        $leave->save();

        return response()->json( [
            'message' => 'Leave approval status updated successfully',
            'data'    => $leave,
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id ) {
        $path = 'uploads/leaveAttachment/';
        $oldAttachment = Leave::where( 'id', $$id )->pluck( 'attachment' );

        if ( $oldAttachment != '' ) {
            if ( File::exists( public_path( $path . $oldAttachment ) ) ) {
                File::delete( public_path( $path . $oldAttachment ) );
            }
        }

        return deleteById( Leave::class, $id );
    }
}
