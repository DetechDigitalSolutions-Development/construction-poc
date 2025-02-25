<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('staff')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $staff = Staff::all();
        return view('attendance.create', compact('staff'));
    }

    public function store(Request $request)
    {
        Attendance::create($request->validate([
            'staff_id' => 'required',
            'attendance_date' => 'required|date',
            'check_in' => 'required|date_format:H:i',
            'check_out' => 'required|date_format:H:i',
            'overtime' => 'nullable|date_format:H:i',
        ]));
        return redirect()->route('attendance.index');
    }

    public function generateReport(Request $request)
    {
        $attendances = Attendance::query();

        if ($request->has('staff_id') && $request->staff_id != '') {
            $attendances->where('staff_id', $request->staff_id);
        }

        if ($request->has('start_date') && $request->start_date != '') {
            $attendances->where('attendance_date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date != '') {
            $attendances->where('attendance_date', '<=', $request->end_date);
        }

        $attendances = $attendances->get();

        // Fetch staff members for the dropdown list
        $staff = Staff::all();

        return view('attendance.report', compact('attendances', 'staff'));
    }
}
