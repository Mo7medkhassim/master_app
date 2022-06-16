<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\SectionReq;
use App\Models\Admin\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return view('admin.section.sections', compact('sections'));
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
    public function store(SectionReq $request)
    {

        // $validated = $request->validated();
        $title = 'add';

        Section::create([
            'section_name' => $request['section_name'],
            'section_desc' => $request['section_desc'],
            'create_by' => (Auth::user()->name),
        ]);

        return redirect('admin/section')->with('success','Opertions has '.$title.' successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(SectionReq $request)
    {
        $validated = $request->validated();
        $title = 'edite';

        $id = $request->section_id;

        $secttion = Section::find($id);

        $secttion->update([
            'section_name' => $request['section_name'],
            'section_desc' => $request['section_desc'],
        ]);


        return redirect('admin/section')->with('success', 'Operation has '.$title.' successfully !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return "122";
    }
}
