<!-- resources/views/attendance/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Record Attendance</h1>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div>
            <label for="staff_id">Staff</label>
            <select id="staff_id" name="staff_id" required>
                <option value="">Select Staff</option>
                @foreach($staff as $member)
                    <option value="{{ $member->id }}" {{ old('staff_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
            @error('staff_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="attendance_date">Date</label>
            <input type="date" id="attendance_date" name="attendance_date" value="{{ old('attendance_date') }}" required>
            @error('attendance_date')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="check_in">Check-in Time</label>
            <input type="time" id="check_in" name="check_in" value="{{ old('check_in') }}" required>
            @error('check_in')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="check_out">Check-out Time</label>
            <input type="time" id="check_out" name="check_out" value="{{ old('check_out') }}" required>
            @error('check_out')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="overtime">Overtime</label>
            <input type="time" id="overtime" name="overtime" value="{{ old('overtime') }}">
            @error('overtime')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Record Attendance</button>
    </form>

    <a href="{{ route('attendance.index') }}">Back to Attendance List</a>
@endsection
