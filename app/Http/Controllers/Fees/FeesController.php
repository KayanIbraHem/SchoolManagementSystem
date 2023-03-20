<?php

namespace App\Http\Controllers\Fees;

use App\Models\Fees;
use App\Models\FeeType;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeesController extends Controller
{

    public function index()
    {
        $fees=Fees::all();
        $grades=Grade::all();
        return view('fees.index',compact('fees','grades'));
    }


    public function create()
    {
       return view('fees.create',['grades'=>Grade::all(),'feetype'=>FeeType::all()]);
    }


    public function store(Request $request)
    {
            $fees = new Fees();
            $fees->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $fees->amount  =$request->amount;
            $fees->grade_id  =$request->grade_id;
            $fees->classgrade_id  =$request->classgrade_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->feetype_id =$request->feetype_id;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('fees.create');
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {
        $fee=Fees::findorfail($id);
        $grades=Grade::all();
        return view('fees.edit',compact('fee','grades'));
    }


    public function update(Request $request)
    {
        $fees = Fees::findorfail($request->id);
        $fees->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $fees->amount  =$request->amount;
        $fees->grade_id  =$request->grade_id;
        $fees->classgrade_id  =$request->classgrade_id;
        $fees->description  =$request->description;
        $fees->year  =$request->year;
        $fees->save();
        toastr()->success(trans('messages.edit'));
        return redirect()->route('fees.index');
    }


    public function destroy(Request $request)
    {
        Fees::destroy($request->id);
        toastr()->error(trans('messages.delete'));
        return redirect()->back();
    }
}
