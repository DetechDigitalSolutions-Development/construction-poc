<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Attendance;
use Illuminate\Http\Request;
use PDF; // We will use PDF facade later

class ReportController extends Controller
{
    public function generateAttendanceReport(Request $request)
    {
        $startDate = $request->start_date;  // Get the start date
        $endDate = $request->end_date;      // Get the end date

        // Get all staff members and their attendance within the date range
        $staffMembers = Staff::with(['attendance' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }])->get();

        // Return the view with attendance data
        return view('reports.attendance_report', compact('staffMembers', 'startDate', 'endDate'));
    }

    public function exportAttendanceReport(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $staffMembers = Staff::with(['attendance' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }])->get();

        $pdf = PDF::loadView('reports.pdf.attendance', compact('staffMembers', 'startDate', 'endDate'));
        return $pdf->download('attendance_report.pdf');
    }
}
