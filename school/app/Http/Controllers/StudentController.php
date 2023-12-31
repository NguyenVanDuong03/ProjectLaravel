<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $students = Student::all();
    //     $students = Student::orderByDesc('student_id')->get();
    //     return view('index', compact('students'));
    // }
    public function index(Request $request)
    {
         //
         $numberOfRecord = Student::count();
         $perPage = 10;
         $numberOfPage = $numberOfRecord % $perPage == 0?
            (int) $numberOfRecord / $perPage: (int) $numberOfRecord / $perPage + 1;
         $pageIndex = 1;
         if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
         if($pageIndex < 1) $pageIndex = 1;
         if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
         //
         $students = Student::orderByDesc('student_id')
            ->skip(($pageIndex-1)*$perPage)
            ->take($perPage)
            ->get();
         // dd($arr);
         return view('index', compact( 'students', 'numberOfPage', 'pageIndex'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     return view('students.create');
    // }
    public function create()
    {
        //
        $students = Course::all();
        return view('students.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $validator = $request->validate([
    //         'name' => 'required',
    //         'gender' => 'required',
    //         'birthday' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //     ]);
    //     $student = new student();
    //     $student->name = $validator['name'];
    //     $student->gender = $validator['gender'];
    //     $student->birthday = $validator['birthday'];
    //     $student->phone = $validator['phone'];
    //     $student->save();
    //     return redirect()->route('students.index')->with('success', 'student Created successfully!');
    // }
    public function store(Request $request)
    {
        //check

        //add
        Student::create($request->all());
        return redirect()->route('students.index')->with('mes', 'Thêm thành công');

    }


    /**
     * Display the specified resource.
     */
    // public function show(Student $student)
    // {
    //     //
    //     return view('students.show', compact('student'));
    // }
    public function show(Student $student, Request $request)
    {
        //page index
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // show
        $course = Course::where('course_id', $student->course_id)->first();
        return view('students.show', compact('student', 'course', 'pageIndex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Student $student)
    // {
    //     //
    //     return view('students.edit', compact('student'));
    // }
    public function edit(Student $student, Request $request)
    {
        // pageIndex
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // show form edit
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses', 'pageIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $student_id)
    // {
    //     //
    //     $validator = $request->validate([
    //         'name' => 'required',
    //         'gender' => 'required',
    //         'birthday' => 'required',
    //         'address' => 'required',
    //     ]);
    //     $student = student::find($student_id);
    //     $student->name = $validator['name'];
    //     $student->gender = $validator['gender'];
    //     $student->birthday = $validator['birthday'];
    //     $student->address = $validator['address'];
    //     $student->phone = $validator['phone'];
    //     $student->save();
    //     return redirect()->route('students.index')->with('success', 'student Updated successfully!');
    // }
    public function update(Request $request, Student $student)
    {
        // pageIndex
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // echo $pageIndex;
        // update
        $student->update($request->all());
        return redirect()->route('students.index', ['pageIndex' => $pageIndex])->with('mes', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Student $student)
    // {
    //     //
    //     $student->delete();
    //     return redirect()->route('students.index')->with('success', 'student deleted successfully');
    // }
    public function destroy(Student $student, Request $request)
    {
        //
        $pageIndex = 1;
        if($request->has('pageIndex'))  $pageIndex = $request->input('pageIndex');
        $student->delete();
        return redirect()->route('students.index', ['pageIndex' => $pageIndex])->with('mes', 'Xóa thành công');
    }
}
