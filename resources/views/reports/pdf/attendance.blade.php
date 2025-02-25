{{-- resources/views/reports/pdf/attendance.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
</head>
<body>
<h1>Attendance Report ({{ $startDate }} to {{ $endDate }})</h1>

<table border="1" cellpadding="5" cellspacing="0">
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
</body>
</html>
