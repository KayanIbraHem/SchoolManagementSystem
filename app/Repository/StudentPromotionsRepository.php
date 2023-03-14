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

    public function create()
    {
        
        return view('students.promotions.promotion_management',['promotions'=>Promotion::all()]);
    }

    public function store($request)
    { 
        $students=Student::where([
            ['grade_id',$request->grade_id],
            ['classgrade_id',$request->classgrade_id],
            ['section_id',$request->section_id],
            ['academic_year',$request->from_academic_year]
            ])
            
             ->get();
        if(count($students)<1){
            toastr()->error(trans('messages.error'));
            return redirect()->route('promotions.index');
        }
        foreach($students as $student){
            $IDS=explode(',',$student->id);
            Student::wherein('id',$IDS)->update([
                'grade_id'=>$request->newgrade_id,
                'classgrade_id'=>$request->newclassgrade_id,
                'section_id'=>$request->newsection_id,
                'academic_year'=>$request->to_academic_year
            ]);
            Promotion::updateOrCreate([
                'student_id'=>$student->id,
                'from_grade'=>$request->grade_id,
                'from_classgrade'=>$request->classgrade_id,
                'from_section'=>$request->section_id,
                'from_academic_year'=>$request->from_academic_year,
                'to_grade'=>$request->newgrade_id,
                'to_classgrade'=>$request->newclassgrade_id,
                'to_section'=>$request->newsection_id,
                'to_academic_year'=>$request->to_academic_year, 
            ]);
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('promotions.index');
    }

    public function destory($request)
    {
        $promotions=Promotion::all();
            if($request->page_id==1){
                foreach($promotions as $promotion){
                $IDS=explode(',',$promotion->student_id);
                Student::wherein('id',$IDS)->update([
                    'grade_id'=>$promotion->from_grade,
                    'classgrade_id'=>$promotion->from_classgrade,
                    'section_id'=>$promotion->from_section,
                    'academic_year'=>$promotion->from_academic_year
                ]);
                Promotion::truncate();
                }
                toastr()->error(trans('messages.delete'));
                return redirect()->back();
            }
    }
}
