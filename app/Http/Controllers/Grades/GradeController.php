<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
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
        // if(Grade::where('name->ar',$request->name_ar)->orwhere('name->en',$request->name_en)->exists())
        // {
        //         return redirect()->back()->withErrors('خطأ');
        // }
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
        $grade =Grade::find($request->id)->delete();
        toastr()->warning(trans('messages.delete'));
        return back();
    }
}
