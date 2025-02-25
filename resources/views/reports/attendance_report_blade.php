{{-- resources/views/reports/attendance_report.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendance Report ({{ $startDate }} to {{ $endDate }})</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Staff Name</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($staffMembers as $staff)
        @foreach ($staff->attendance as $attendance)
        <tr>
            <td>{{ $staff->name }}</td>
            <td>{{ $attendance->date->format('Y-m-d') }}</td>
            <td>{{ $attendance->status }}</td>
        </tr>
        @endforeach
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('export.attendance') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="btn btn-primary">Export to PDF</a>
</div>
@endsection
