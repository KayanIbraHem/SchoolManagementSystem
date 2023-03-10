<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use App\Models\Classgrade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{

    public function index()
    {
        $grades=Grade::all();
        return view('grades.grades',['grades'=>$grades]);
    }

    public function store(GradeRequest $request)
    { 
        $grade=new Grade();
        $grade->name=[
            'ar'=>$request->name_ar,
            'en'=>$request->name_en
        ];
        $grade->description=$request->description;
        $grade->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('grades.index');
    }

    public function update(GradeRequest $request)
    {
        $grade =Grade::find($request->id);
        $grade->update([
            $grade->name=['ar'=>$request->name_ar ,'en'=>$request->name_en],
            $grade->description=$request->description
        ]);
        toastr()->success(trans('messages.edit'));
        return redirect()->route('grades.index');
    }

    public function destroy(Request $request)
    {
        $check=Classgrade::where('grade_id',$request->id)->pluck('grade_id');
        if(!$check->count()){
            $grade =Grade::find($request->id)->delete();
            toastr()->warning(trans('messages.delete'));
            return redirect()->back();
        }
            toastr()->error(trans('schoolgrade.delete_error'));
            return redirect()->back();
    }
}
