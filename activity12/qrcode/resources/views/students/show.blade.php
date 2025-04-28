@extends('master')

@section('content')
<div class="container">
    <div class="card bg-white shadow-lg mt-3">
        <div class="card-header">
            <h1>Student Details</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Student ID</th>
                    <td>{{ $student->student_id }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $student->full_name }}</td>
                </tr>
                <tr>
                    <th>Birthdate</th>
                    <td>{{ $student->birthdate }}</td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td>{{ $student->age }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $student->phone_number }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $student->address }}</td>
                </tr>
            </table>

            <div class="d-flex">
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary" style="margin-right: 5px;">Edit</a>

                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline; margin-right: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary mr-2">Delete</button>
                </form>

                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
