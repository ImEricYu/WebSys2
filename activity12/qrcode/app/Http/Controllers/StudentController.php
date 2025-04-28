<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('student_id', 'like', "%{$search}%");
            })
            ->get();
    
        $studentsWithQr = $students->map(function ($student) {
            $qrText = "
            Student ID: {$student->student_id} 
                Full Name: {$student->full_name} 
                Birthdate: {$student->birthdate}
                Age: {$student->age}
                Email: {$student->email}
                Phone: {$student->phone_number}
            Address: {$student->address}
            ";
            $student->qr_code = QrCode::size(100)->generate($qrText);
    
            return $student;
        });
    
        return view('students.index', compact('studentsWithQr', 'search'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students',
            'full_name' => 'required',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'email' => 'required|email|unique:students',
            'phone_number' => 'nullable',
            'address' => 'nullable',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Validate the form
        $request->validate([
            'student_id' => 'required|unique:students,student_id,' . $student->id,
            'full_name' => 'required',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_number' => 'nullable',
            'address' => 'nullable',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
