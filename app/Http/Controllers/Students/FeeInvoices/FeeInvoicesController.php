<?php

namespace App\Http\Controllers\Students\FeeInvoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\FeeInvoice;
use App\Models\Fees;

class FeeInvoicesController extends Controller
{
    public function index()
    {
        $feeinvoices=FeeInvoice::all();
        return view('Students/feeinvoices.index',compact('feeinvoices'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $feeList=$request->feeList;
        foreach($feeList as $list){
            $fee = new FeeInvoice();
            $fee->invoice_date = date('Y-m-d');
            $fee->student_id = $list['student_id'];
            $fee->grade_id = $request->grade_id;
            $fee->classgrade_id = $request->classgrade_id;;
            $fee->fee_id = $list['fee_id'];
            $fee->amount = $list['amount'];
            $fee->description = $list['description'];
            $fee->save();
            $student = new StudentAccount();
            $student->date=date('Y-m-d');
            $student->student_id = $list['student_id'];
            $student->grade_id = $request->grade_id;
            $student->classgrade_id = $request->classgrade_id;
            $student->feeinvoice_id=$fee->id;
            $student->debit = $list['amount'];
            $student->credit = 0.00;
            $student->description = $list['description'];
            $student->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('feeinvoices.index');
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fees::where('classgrade_id',$student->classgrade_id)->get();
        return view('students.feeinvoices.add',compact('student','fees'));
    }


    public function edit($id)
    {
        $feeinvoices=FeeInvoice::findorfail($id);
        $fees=Fees::where('classgrade_id',$feeinvoices->classgrade_id)->get();
        return view('students.feeinvoices.edit',compact('feeinvoices','fees'));
    }


    public function update(Request $request)
    {
        $fee = FeeInvoice::findorfail($request->id);
        $fee->fee_id = $request->fee_id;
        $fee->amount = $request->amount;
        $fee->description = $request->description;
        $fee->save();
        $studentaccount = StudentAccount::where('feeinvoice_id',$request->id)->first();
        $studentaccount->debit = $request->amount;
        $studentaccount->save();
        toastr()->success(trans('messages.edit'));
        return redirect()->route('feeinvoices.index');
    }


    public function destroy(Request $request)
    {
        FeeInvoice::destroy($request->id);
        toastr()->error(trans('messages.delete'));
        return redirect()->back();
    }
}
