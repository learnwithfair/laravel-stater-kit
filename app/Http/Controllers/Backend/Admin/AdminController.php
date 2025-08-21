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
    public function hrPolicy()
    {

        $hrPolicy = User::find(Auth::user()->id);
        if ($hrPolicy) {
            return view('backend.hr.policy', compact('hrPolicy'));
        }
    }

    public function hrPolicyUpdate(Request $request, $id)
    {

        $validatedData = $request->validate([
            'company_code' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'start_time'   => 'nullable',
            'end_time'     => 'nullable',
            'location'     => 'nullable|string',
        ]);

        // Convert location string into an array
        $locationsArray = array_map('trim', explode("\n", $validatedData['location']));

        $update = User::findOrFail($id)->update([
            'company_code' => $validatedData['company_code'],
            'company_name' => $validatedData['company_name'],
            'email'        => $validatedData['email'],
            'start_time'   => $validatedData['start_time'],
            'end_time'     => $validatedData['end_time'],
            'location'     => json_encode($locationsArray), // Store location as JSON
        ]);

        // Return a response
        if ($update) {
            return response()->json(['status' => "success"]);
        } elseif (!$update) {
            return response()->json(['status' => "error"]);
        } else {
            return response()->json($update);
        }
    }

    public function search($employeeId, $startDate, $endDate)
    {
        $attendanceDetails = [];
        $employeeId = $employeeId;
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $attendance = Attendance::where('employee_id', $employeeId)
                ->whereDate('created_at', $date->format('Y-m-d'))
                ->first();

            $attendanceDetails[] = [
                'date'          => $date->format('Y-m-d'),
                'checkin'       => $attendance->checkin ?? 'No Check-In',
                'checkout'      => $attendance->checkout ?? 'No Check-Out',
                'working_hours' => $attendance && $attendance->checkin && $attendance->checkout
                    ? Carbon::parse($attendance->checkout)->diff(Carbon::parse($attendance->checkin))->format('%HH :%IM :%SS')
                    : '0 Hour',
            ];
        }

        return $attendanceDetails;
    }

    public function hrDashboard(Request $request)
    {

        $employeeId = $request->query('employee_id');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $attendanceDetails = [];
        $dateRange = [];

        if ($employeeId && $startDate && $endDate) {
            $dateRange = [
                'employee_id' => $employeeId,
                'start_date'  => $startDate,
                'end_date'    => $endDate,
            ];

            $attendanceDetails = $this->search($employeeId, $startDate, $endDate);
        }

        $companyCode = Auth::user()->company_code;

        $employeeDetails = Employee::select('id', 'name')
            ->where('company_code', $companyCode)
            ->orderBy('name', 'asc')
            ->get();

        return view('backend.hr.hr_dashboard', compact('employeeDetails', 'attendanceDetails', 'dateRange'));
    }

    public function exportAttendanceCsv(Request $request)
    {

        $employeeId = $request->input('employeeId'); // or $request->employeeId
        $startDate = $request->input('startDate'); // or $request->startDate
        $endDate = $request->input('endDate');

        $attendanceDetails = [];

        if ($employeeId && $startDate && $endDate) {

            $attendanceDetails = $this->search($employeeId, $startDate, $endDate);
        }

        if (!$attendanceDetails) {
            abort(404, 'No attendance data found.');
        }

        $filename = 'attendance_' . now()->format('Y_m_d') . '.csv';
        $headers = [
            "Content-Type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Cache-Control"       => "no-cache, must-revalidate",
        ];

        $columns = ['S/L', 'Date', 'Check-In', 'Check-Out', 'Working Hours'];

        $callback = function () use ($attendanceDetails, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($attendanceDetails as $key => $attendance) {

                fputcsv($file, [
                    $key + 1,
                    $attendance['date'],
                    $attendance['checkin'],
                    $attendance['checkin'],
                    $attendance['working_hours'],

                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
