<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::all();
        $students = student::orderByDesc('student_id')->get();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = student::all();
        return view('students.create', compact('students'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'student_name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'course_id' => 'required',
        ]);
        $student = new student();
        $student->student_name = $validator['student_name'];
        $student->gender = $validator['gender'];
        $student->birthday = $validator['birthday'];
        $student->address = $validator['address'];
        $student->save();
        return redirect()->route('students.index')->with('success', 'Thêm thành công!');

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
        $students = student::all();
        return view('students.edit', compact('student', 'students'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $student_id)
    {
        $validator = $request->validate([
            'student_name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
        ]);
        $student = student::find($student_id);
        $student->student_name = $validator['student_name'];
        $student->gender = $validator['gender'];
        $student->birthday = $validator['birthday'];
        $student->address = $validator['address'];
        $student->save();
        return redirect()->route('students.index')->with('success', 'Sửa thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Xóa thành công!');

    }
}
