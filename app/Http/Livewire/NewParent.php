<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Blood;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;

class NewParent extends Component
{
    public $successMessage='';
    public $currentStep=1,
    //father
    $email,$password,$father_name_ar,
    $father_name_en,$father_job_ar,
    $father_job_en,$father_nationaid,
    $father_passportid,$father_phone,
    $fathernationality_id,$fatherbloodtype_id,
    $fatherreligion_id,$father_address,
    //mother
    $mother_name_ar,$mother_name_en,
    $mother_job_ar, $mother_job_en,
    $mother_nationaid,$mother_passportid,
    $mother_phone,$mothernationality_id,
    $motherbloodtype_id,$motherreligion_id,
    $mother_address
    ;

    public function render()
    {
        return view('livewire.new-parent',[
            'nationalities'=>Nationality::all(),
            'religions'=>Religion::all(),
            'bloods'=>Blood::all()
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'password'=>'required|min:6|max:14',
            'father_nationaid'=>'required|string|unique:student_parents,father_nationaid|min:10|max:10|regex:/[0-9]{9}/',
            'father_passportid'=>'required|string|unique:student_parents,father_passportid|min:10|max:10|regex:/[0-9]{9}/',
            'father_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_nationaid'=>'required|string|unique:student_parents,mother_nationaid|min:10|max:10|regex:/[0-9]{9}/',
            'mother_passportid'=>'required|string|unique:student_parents,mother_passportid|min:10|max:10|regex:/[0-9]{9}/',
            'mother_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email'=>'required|unique:student_parents,email',
            'password'=>'required|min:6|max:14',
            'father_name_ar'=>'required|min:6',
            'father_name_en'=>'required|min:6',
            'father_job_ar'=>'required|min:6',
            'father_job_en'=>'required|min:6',
            'father_nationaid'=>'required|string|unique:student_parents,father_nationaid|min:10|max:10|regex:/[0-9]{9}/',
            'father_passportid'=>'required|string|unique:student_parents,father_passportid|min:10|max:10|regex:/[0-9]{9}/',
            'father_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'fathernationality_id'=>'required',
            'fatherbloodtype_id'=>'required',
            'fatherreligion_id'=>'required',
            'father_address'=>'required|min:6',
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'mother_name_ar'=>'required|min:6',
            'mother_name_en'=>'required|min:6',
            'mother_job_ar'=>'required|min:6',
            'mother_job_en'=>'required|min:6',
            'mother_nationaid'=>'required|string|unique:student_parents,mother_nationaid|min:10|max:10|regex:/[0-9]{9}/',
            'mother_passportid'=>'required|string|unique:student_parents,mother_passportid|min:10|max:10|regex:/[0-9]{9}/',
            'mother_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mothernationality_id'=>'required',
            'motherbloodtype_id'=>'required',
            'motherreligion_id'=>'required',
            'mother_address'=>'required|min:6',
        ]);
        $this->currentStep = 3;
    }
    public function SaveParent()
    {
        $parent=new StudentParent();
        $parent->email=$this->email;
        $parent->password=Hash::make($this->password);
        $parent->father_name=['ar'=>$this->father_name_ar,'en'=>$this->father_name_en];
        $parent->father_nationaid=$this->father_nationaid;
        $parent->father_passportid=$this->father_passportid;
        $parent->father_phone=$this->father_phone;
        $parent->father_job=['ar'=>$this->father_job_ar,'en'=>$this->father_job_en];
        $parent->fathernationality_id=$this->fathernationality_id;
        $parent->fatherbloodtype_id=$this->fatherbloodtype_id;
        $parent->fatherreligion_id=$this->fatherreligion_id;
        $parent->father_address=$this->father_address;
        $parent->mother_name=['ar'=>$this->mother_name_ar,'en'=>$this->mother_name_en];
        $parent->mother_nationaid=$this->mother_nationaid;
        $parent->mother_passportid=$this->mother_passportid;
        $parent->mother_phone=$this->mother_phone;
        $parent->mother_job=['ar'=>$this->mother_job_ar,'en'=>$this->mother_job_en];
        $parent->mothernationality_id=$this->mothernationality_id;
        $parent->motherbloodtype_id=$this->motherbloodtype_id;
        $parent->motherreligion_id=$this->motherreligion_id;
        $parent->mother_address=$this->mother_address;
        $parent->save();
        $this->successMessage = trans('messages.success');
        $this->clearForm();
        $this->currentStep = 1;


    }
    public function clearForm()
    {
        $this->email='';
        $this->password='';
        $this->father_name_ar='';
        $this->father_name_en='';
        $this->father_nationaid='';
        $this->father_passportid='';
        $this->father_phone='';
        $this->father_job_ar='';
        $this->father_job_en='';
        $this->fathernationality_id='';
        $this->fatherbloodtype_id='';
        $this->fatherreligion_id='';
        $this->father_address='';
        $this->mother_name_ar='';
        $this->mother_name_en='';
        $this->mother_nationaid='';
        $this->mother_passportid='';
        $this->mother_phone='';
        $this->mother_job_ar='';
        $this->mother_job_en='';
        $this->mothernationality_id='';
        $this->motherbloodtype_id='';
        $this->motherreligion_id='';
        $this->mother_address='';

    }
    public function back($step){
        $this->currentStep = $step;
    }
}
