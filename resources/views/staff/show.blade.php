<!-- resources/views/attendance/report.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Attendance Report</h1>

    <form action="{{ route('attendance.report') }}" method="GET">
        <div>
            <label for="staff_id">Staff</label>
            <select id="staff_id" name="staff_id">
                <option value="">All Staff</option>
                @foreach($staff as $member)
                    <option value="{{ $member->id }}" {{ request('staff_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}">
        </div>

        <div>
            <label for="end_date">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}">
        </div>

        <button type="submit">Generate Report</button>
    </form>

    @if($attendances)
        <table>
            <thead>
            <tr>
                <th>Staff</th>
                <th>Date</th>
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
                    <td>{{ $attendance->overtime }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
