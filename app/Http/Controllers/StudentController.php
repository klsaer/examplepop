<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::paginate(10);

        return view('students.index',compact('students'));
    }

    public function destroy(Student $student){
        $student -> delete();
        return redirect()->back();
    }

    public function store (Request $request, Student $student)
    {
        $data = $request -> validate([
            'fname'=>'string',
            'lname'=>'string',
            'age'=>'integer'
        ]);
        $student->create($data);
        return redirect()->back();
    }

    public function show(Student $student){
        return view('students.show',compact('student'));
    }
}
