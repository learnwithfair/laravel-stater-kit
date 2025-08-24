<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $adminsDetails = User::where('id', '!=', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
        return response(view('backend.admin.index', compact('adminsDetails')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = Validator::make($request->all(), [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validated->fails()) {
            return redirect()->back()
                ->withErrors($validated)
                ->withInput();
        }

        // Create the user
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please wait for approval!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $adminDetails = User::find($id);
        if ($adminDetails) {
            // return response()->json( $adminDetails );
            return view('backend.hr.policy', compact('adminDetails'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = User::findOrFail($id)->update([
            'role' => $request->role,
        ]);
        if ($update) {
            return response()->json(['status' => "success"]);
        } elseif (!$update) {
            return response()->json(['status' => "error"]);
        } else {
            return response()->json($update);
        }
    }

    public function accoutStatus(Request $request, $id)
    {
        $update = User::findOrFail($id)->update([
            'is_enabled' => $request->is_enabled,
        ]);
        if ($update) {
            return response()->json(['status' => "success"]);
        } elseif (!$update) {
            return response()->json(['status' => "error"]);
        } else {
            return response()->json($update);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = 'uploads/profileImages/';
        $data = User::find($id);
        $oldPicture = $data->image;
        if ($oldPicture != '') {
            if (File::exists(public_path($path . $oldPicture))) {
                File::delete(public_path($path . $oldPicture));
            }
        }

        $delete = $data->delete();

        if ($delete) {
            return response()->json(['status' => "success"]);
        } elseif (!$delete) {
            return response()->json(['status' => "error"]);
        } else {
            return response()->json($delete);
        }
    }
    public function profile()
    {
        return view('backend.admin.index', compact('adminDetails', 'messageInfo'));
    }
   
}
