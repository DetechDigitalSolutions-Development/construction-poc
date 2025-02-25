<!-- resources/views/staff/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Staff</h1>

    <form action="{{ route('staff.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}" required>
            @error('contact')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Staff</button>
    </form>

    <a href="{{ route('staff.index') }}">Back to Staff List</a>
@endsection
