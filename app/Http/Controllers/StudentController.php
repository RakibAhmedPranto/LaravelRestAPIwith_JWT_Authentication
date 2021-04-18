<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = DB::table('students')->get();
        return response()->json($target);
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
        $validate = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $target = new Student;
        $target->class_id = $request->class_id;
        $target->section_id = $request->section_id;
        $target->name = $request->name;
        $target->phone = $request->phone;
        $target->email = $request->email;
        $target->password = $request->password;
        $target->address = $request->address;
        $target->gender = $request->gender;
        if($target->save()){
            return response('Student Added Successfully');
        }
        else{
            return response('Student went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('students')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $target = Student::find($id);
        $target->class_id = $request->class_id;
        $target->section_id = $request->section_id;
        $target->name = $request->name;
        $target->phone = $request->phone;
        $target->email = $request->email;
        $target->password = $request->password;
        $target->address = $request->address;
        $target->gender = $request->gender;
        if($target->save()){
            return response('Student Updated Successfully');
        }
        else{
            return response('Student went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return response('Student Deleted Successfully');
    }
}
