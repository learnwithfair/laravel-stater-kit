<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Users list page (view only).
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query()
                ->select(['id', 'name', 'email', 'role', 'is_enabled'])
                ->where('id', '!=', Auth::id())
                ->orderByDesc('id');

            return DataTables::of($query)
                ->addIndexColumn() // adds DT_RowIndex
                ->editColumn('email', function (User $u) {
                    return '<a href="mailto:' . e($u->email) . '" target="_blank">' . e($u->email) . '</a>';
                })
                ->addColumn('role_label', function (User $u) {
                    return $u->role === 'admin'
                        ? '<span class="text-info">Admin</span>'
                        : '<span class="text-success">User</span>';
                })
                ->addColumn('set_admin', function (User $u) {
                    $next = $u->role === 'admin' ? 'user' : 'admin';
                    $checked = $u->role === 'admin' ? 'checked' : '';
                    return '
                    <a href="#" class="change_admin_status"
                       data-id="' . $u->id . '"
                       data-role="' . $next . '"
                       data-title="Do you want to set as a ' . ucfirst($next) . '?"
                       data-description="' . ($next === 'admin' ? 'He will access Dashboard!!' : "He won't access all!!") . '"
                       data-bs-toggle="modal" data-bs-target="#adminStatusmodal">
                        <label class="switch">
                            <input type="checkbox" ' . $checked . '>
                            <span class="slider round"></span>
                        </label>
                    </a>';
                })
                ->addColumn('is_active', function (User $u) {
                    $next = $u->is_enabled ? 0 : 1;
                    $checked = $u->is_enabled ? 'checked' : '';
                    return '
                    <a href="#" class="change_account_status"
                       data-id="' . $u->id . '"
                       data-enabled="' . $next . '"
                       data-title="Do you want to ' . ($next ? 'Enable' : 'Disable') . ' it?"
                       data-description="' . ($next ? 'He will access Dashboard!!' : "He won't access all!!") . '"
                       data-bs-toggle="modal" data-bs-target="#accountStatusmodal">
                        <label class="switch">
                            <input type="checkbox" ' . $checked . '>
                            <span class="slider round"></span>
                        </label>
                    </a>';
                })
                ->addColumn('action', function (User $u) {
                    return '
                    <a class="text-danger cursor-pointer deletebtn"
                       data-id="' . $u->id . '" style="cursor:pointer">
                        <i class="fas fa-trash-alt fs-5"></i>
                    </a>';
                })
                ->rawColumns(['email', 'role_label', 'set_admin', 'is_active', 'action'])
                ->make(true);
        }

        return view('backend.admin.index');
    }

    /**
     * Register .
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

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please wait for approval!');
    }
    public function show(Request $request) {}
    /**
     * Update role (admin/user).
     */
    public function updateRole(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $updated = $user->update(['role' => $request->string('role')]);

        return response()->json(['status' => $updated ? 'success' : 'error']);
    }

    /**
     * Update account enabled/disabled.
     */
    public function updateAccountStatus(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'is_enabled' => 'required|boolean',
        ]);

        $updated = $user->update(['is_enabled' => (bool) $request->input('is_enabled')]);

        return response()->json(['status' => $updated ? 'success' : 'error']);
    }



    /**
     * Delete user.
     */
    public function destroy(User $user): JsonResponse
    {
        $path = 'uploads/profileImages/';
        if ($user->image) {
            $full = public_path($path . $user->image);
            if (File::exists($full)) {
                File::delete($full);
            }
        }

        $deleted = $user->delete();

        return response()->json(['status' => $deleted ? 'success' : 'error']);
    }
}
