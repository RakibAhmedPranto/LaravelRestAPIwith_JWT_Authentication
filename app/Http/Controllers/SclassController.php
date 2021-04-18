<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SclassController extends Controller
{
    public function index()
    {
        $sClass = DB::table('sclasses')->get();
        return response()->json($sClass);
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
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('sclasses')->insert($data);
        return response('Class Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sclasses')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('sclasses')->where('id',$id)->update($data);
        return response('Class Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sclasses')->where('id',$id)->delete();
        return response('Class Deleted Successfully');
    }
}
