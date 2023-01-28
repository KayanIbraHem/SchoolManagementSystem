<?php

namespace App\Http\Controllers\Classgrade;

use App\Models\Grade;
use App\Models\Classgrade;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Http\Controllers\Controller;

class ClassgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::all();
        $classes=Classgrade::all();

        return view('classes.classes',['grades'=>$grades,'classes'=>$classes]);
    }

    public function store(ClassRequest $request)
    {
        $dataList=$request->data_list;
        foreach($dataList as $data){
            $classes=new Classgrade();
            $classes->name=[
                'ar'=>$data['name_ar'],
                'en'=>$data['name_en']
            ];
            $classes->grade_id=$data['grade_id'];
            $classes->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function update(ClassRequest $request)
    {
        $class=Classgrade::findorfail($request->id);
        $class->update([
            $class->name=['ar'=>$request->name_ar,'en'=>$request->name_en],
            $class->grade_id=$request->grade_id
        ]);
        toastr()->success(trans('messages.edit'));
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $class =Classgrade::find($request->id)->delete();
        toastr()->warning(trans('messages.delete'));
        return back();
    }
}
