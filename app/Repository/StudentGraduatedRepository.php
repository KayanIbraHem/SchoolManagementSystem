<?php

namespace App\Repository;
use App\Models\Grade;
use App\Models\Student;


class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface{

    public function index()
    {
        return view('students.graduated.index',['students'=>Student::onlyTrashed()->get()]);
    }

    public function create()
    {
        return view('students.graduated.create',['grades'=>Grade::all()]);
    }

    public function graduate($request)
    {
        $students=Student::where([
            ['grade_id',$request->grade_id],
            ['classgrade_id',$request->classgrade_id],
            ['section_id',$request->section_id],])
            ->get();
        if(count($students)<1){
            toastr()->error(trans('messages.error'));
            return redirect()->back();
        }
        foreach($students as $student){
         $IDS=explode(',',$student->id);
         Student::wherein('id',$IDS)->delete();
        }
            toastr()->success(trans('messages.success'));
            return redirect()->route('graduated.index');
    }

    public function restore($request)
    {
        Student::withTrashed('id',$request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        Student::onlyTrashed('id',$request->id)->first()->forceDelete();
        toastr()->success(trans('messages.delete'));
        return redirect()->back();
    }

}
