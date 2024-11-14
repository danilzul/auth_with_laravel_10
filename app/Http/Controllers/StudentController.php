<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $std = Student::get();
        return view('student.index', compact('std'));
    }

    public function create(){
        $edit = false;
        return view('student.form', compact('edit'));
    }

    public function edit($StudentID)
    {
        $edit = true;
        $student = Student::where('StudentID', $StudentID)->first();

        return view('student.form', compact('student', 'edit'));
    }

    public function store(Request $request)
{

    // Insert the student record into the database
    Student::insert([
        'StudentID' => $request->StudentID,
        'Name' => $request->Name,
        'DateOfBirth' => $request->DateOfBirth,
        'Gender' => $request->Gender,
        'ContactNumber' => $request->ContactNumber,
        'EmailAddress' => $request->EmailAddress,
        'Semester1GPA' => $request->Semester1GPA,
        'Semester2GPA' => $request->Semester2GPA,
        'Semester3GPA' => $request->Semester3GPA,
        'Semester4GPA' => $request->Semester4GPA,
        'FinalCGPA' => $request->FinalCGPA,

    ]);

    // Redirect back to the student list with a success message
    return redirect()->route('student.index')->with('success', 'Student added successfully!');
}

public function destroy($StudentID)
{
    // Find the vehicle by its ID
    $student = Student::find($StudentID);

    if (!$student) {
        // Redirect back with an error message if vehicle not found
        return redirect()->route('student.index')->with('error', 'Student not found!');
    }

    // Delete the vehicle
    $student->delete();

    // Redirect back with a success message
    return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
}

public function update(Request $request, $StudentID)
{
    Student::where('StudentID', $StudentID)->update([
        'StudentID' => $request->StudentID,
        'Name' => $request->Name,
        'DateOfBirth' => $request->DateOfBirth,
        'Gender' => $request->Gender,
        'ContactNumber' => $request->ContactNumber,
        'EmailAddress' => $request->EmailAddress,
        'Semester1GPA' => $request->Semester1GPA,
        'Semester2GPA' => $request->Semester2GPA,
        'Semester3GPA' => $request->Semester3GPA,
        'Semester4GPA' => $request->Semester4GPA,
        'FinalCGPA' => $request->FinalCGPA,

        'updated_at' => now(),
    ]);

    return redirect()->route('student.index')->with('success', 'Student updated successfully!');
}

}

