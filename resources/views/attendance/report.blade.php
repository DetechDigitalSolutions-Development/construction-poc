<!-- resources/views/attendance/attendance -->

@extends('layouts.app')

@section('content')
    <h1>Attendance Report</h1>
    <table>
        <thead>
        <tr>
            <th>Staff Name</th>
            <th>Attendance Date</th>
            <th>Check-in Time</th>
            <th>Check-out Time</th>
            <th>Overtime</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->staff->name }}</td>
                <td>{{ $attendance->attendance_date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
                <td>{{ $attendance->overtime ?? 'N/A' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
