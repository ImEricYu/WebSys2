@extends('master')

@section('content')
<div class="container">
    <h1 class="mt-3">Students List</h1>

    <form method="GET" action="{{ route('students.index') }}">
        <div class="form-group d-flex">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search by name or student ID" value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <a href="{{ route('students.create') }}" class="btn btn-primary mt-3">Add New Student</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Scan QR Code for Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsWithQr as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{!! $student->qr_code !!}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
