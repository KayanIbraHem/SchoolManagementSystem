<?php

namespace App\Repository;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionsRepository implements StudentPromotionsRepositoryInterface{

    public function index()
    {
        return view('students.promotions.index',['grades'=>Grade::all()]);
    }

    public function store($request)
    { 
        $students=Student::where([['grade_id',$request->grade_id],['classgrade_id',$request->classgrade_id],['section_id',$request->section_id]])->get();
        if(count($students)<1){
            toastr()->error(trans('messages.error'));
            return redirect()->route('promotions.index');
        }
        foreach($students as $student){
            $IDS=explode(',',$student->id);
            Student::wherein('id',$IDS)->update([
                'grade_id'=>$request->newgrade_id,
                'classgrade_id'=>$request->newclassgrade_id,
                'section_id'=>$request->newsection_id
            ]);
            Promotion::updateOrCreate([
                'student_id'=>$student->id,
                'from_grade'=>$request->grade_id,
                'from_classgrade'=>$request->classgrade_id,
                'from_section'=>$request->section_id,
                'to_grade'=>$request->newgrade_id,
                'to_classgrade'=>$request->newclassgrade_id,
                'to_section'=>$request->newsection_id
            ]);
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('promotions.index');
    }
}
