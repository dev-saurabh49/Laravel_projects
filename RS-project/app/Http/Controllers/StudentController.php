<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    
    public function index()
    {
        // $students = Student::all();
        $students = Student::simplepaginate(7);
        // $students = Student::find(2,['name','email']);
        // $students = Student::count();
        // $students = Student::where('city','Delhi')->get();
        // return $students;
        // foreach($students as $student)
        // {
        //     echo $student->name . "</br>";
        // }
        return view('home',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $student = new Student;
        
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->age = $request->age;
        // $student->city = $request->city;

        // $student->save();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required|alpha'
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city
        ]);

        return redirect()
        ->route('student.index')
        ->with('status','New user added success');
    }

    
    public function show(Student $student)
    {
        $students = Student::find($student->id);
        return view('viewuser',compact('students'));
    }

    
    public function edit(Student $student)
    {
        $students = Student::find($student->id);
        return view('updateuser',compact('students'));
    }

    
    public function update(Request $request, Student $student)
    {
        // $student = Student::find($student->id);

        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->age = $request->age;
        // $student->city = $request->city;

        // $student->save();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|numeric',
            'city' => 'required|alpha'
        ]);

        $student = Student::where('id',$student->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city
        ]);

        return redirect()
        ->route('student.index')
        ->with('status','User Data Updated Success success');

    }

    public function destroy(Student $student)
    {
        // method - 1

        $students = Student::find($student->id);
        $students->delete();

        // Student::destroy($student->id);
        // Student::truncate();


        return redirect()
        ->route('student.index')
        ->with('status','User Data Deleted Success success');

    }
}
