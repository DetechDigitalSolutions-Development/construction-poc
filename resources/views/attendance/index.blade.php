<!-- resources/views/staff/report.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Staff List</h1>
    <a href="{{ route('staff.create') }}">Add Staff</a>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staff as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->contact }}</td>
                <td>{{ $member->address }}</td>
                <td>
                    <a href="{{ route('staff.edit', $member) }}">Edit</a>
                    <form action="{{ route('staff.destroy', $member) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
