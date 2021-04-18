<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = DB::table('subjects')->get();
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
            'subject_name' => 'required',
        ]);
        $target = new Subject;
        $target->class_id = $request->class_id;
        $target->subject_name = $request->subject_name;
        $target->subject_code = $request->subject_code;
        if($target->save()){
            return response('Subject Added Successfully');
        }
        else{
            return response('Subject went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('subjects')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
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
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required',
        ]);
        $target = Subject::find($id);
        $target->class_id = $request->class_id;
        $target->subject_name = $request->subject_name;
        $target->subject_code = $request->subject_code;
        if($target->save()){
            return response('Subject Updated Successfully');
        }
        else{
            return response('Subject went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subjects')->where('id',$id)->delete();
        return response('Subject Deleted Successfully');
    }
}
