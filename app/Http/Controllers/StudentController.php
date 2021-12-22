<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id_user = Auth::user()->id;
        return Inertia::render('Students/Index', [
            'students' => Student::where('user', $id_user)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student->load('user');
        $student->load('school');
        $student->load('ride');
        return Inertia::render('Students/Show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $schools = DB::table('schools')->get(['id', 'name']);
        $student->load('school');
        $student->load('ride');
        return Inertia::render('Students/Edit', compact('student', 'schools'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
       /* $request->validate([
            'names' => 'required',
            'surnames' => 'required',
        ]);
        $student->update($request->only(
        'names',
        'surnames',
        'typeId',
        'dni',
        'gender',
        'birth_date',
        'school',
        'course',
        'grade',
        'session',
        'address'
        ));*/
        // Image
        if($request->file('image')){
            //$student->updateProfilePhoto(request()->file('image'));
            //dd($student->image);
            $student->image = $request->file('image')->store('students', 'public');
            $student->save();
            dd($student->image);
        }
        return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
