<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = DB::table('sections')->get();
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
            'section_name' => 'required',
        ]);
        $target = new Section;
        $target->class_id = $request->class_id;
        $target->section_name = $request->section_name;
        if($target->save()){
            return response('Section Added Successfully');
        }
        else{
            return response('Somethis went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sections')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required',
        ]);
        $target = Section::find($id);
        $target->class_id = $request->class_id;
        $target->section_name = $request->section_name;
        if($target->save()){
            return response('Section Updated Successfully');
        }
        else{
            return response('Somethis went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sections')->where('id',$id)->delete();
        return response('Section Deleted Successfully');
    }
}
