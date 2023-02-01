<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classgrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::with(['sections'])->get();
        $gradeList=Grade::all();
        return view('sections.sections',[
            'grades'=>$grades,
            'gradeList'=>$gradeList
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
        $section=new Section();
        $section->name=['ar'=>$request->name_s_ar,'en'=>$request->name_s_en];
        $section->status=1;
        $section->grade_id=$request->grade_id;
        $section->classgrade_id=$request->class_id;
        $section->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }

    public function getClass($gradeID){
        $selectClass=Classgrade::where('grade_id',$gradeID)->pluck('name','id');
        return response()->json($selectClass);
    }
}
