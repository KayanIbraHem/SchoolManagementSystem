<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Classgrade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index()
    {
        $allSections=Section::all();
        $grades=Grade::with(['sections'])->get();
        $gradeList=Grade::all();
        $teachers=Teacher::all();
        return view('sections.sections',[
            'grades'=>$grades,
            'gradeList'=>$gradeList,
            'allSections'=>$allSections,
            'teachers'=>$teachers
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $section=new Section();
        $section->name=['ar'=>$request->name_s_ar,'en'=>$request->name_s_en];
        $section->status=1;
        $section->grade_id=$request->grade_id;
        $section->classgrade_id=$request->class_id;
        $section->save();
        $section->teachers()->attach($request->teacher_id);
        toastr()->success(trans('messages.success'));
        return redirect()->route('sections.index');
    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
       //
    }

    public function update(Request $request)
    {
        $section=Section::findorFail($request->id);
        $section->update([
        $section->name=['ar'=>$request->name_s_ar,'en'=>$request->name_s_en],
        $section->grade_id=$request->grade_id,
        $section->classgrade_id=$request->class_id,
        ]);
        if(isset($request->status)){
            $section->status=1;
        }else{
            $section->status=2;
        }
        if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }
        $section->save();
        toastr()->success(trans('messages.edit'));
        return redirect()->route('sections.index');
    }

    public function destroy(Request $request)
    {
        Section::findorfail($request->sectionID)->delete();
        toastr()->warning(trans('messages.delete'));
        return redirect()->route('sections.index');
    }

    public function getClass($gradeID){
        $selectClass=Classgrade::where('grade_id',$gradeID)->pluck('name','id');
        return response()->json($selectClass);
    }
}
