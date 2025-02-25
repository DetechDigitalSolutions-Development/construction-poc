<!-- resources/views/staff/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Staff</h1>

    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $staff->name) }}" required>
        </div>

        <div>
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $staff->contact) }}" required>
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address', $staff->address) }}" required>
        </div>

        <button type="submit">Update Staff</button>
    </form>

    <a href="{{ route('staff.index') }}">Back to Staff List</a>
@endsection
