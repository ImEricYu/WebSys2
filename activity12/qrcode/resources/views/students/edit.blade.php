@extends('master')

@section('content')
<div class="container">
    <div class="card bg-white shadow-lg mt-3">
        <div class="card-header">
            <h1>Edit Student</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student->student_id }}" required>
                </div>

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $student->full_name }}" required>
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $student->birthdate }}" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $student->phone_number }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address">{{ $student->address }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
