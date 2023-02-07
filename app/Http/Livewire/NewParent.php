<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Blood;

class NewParent extends Component
{
    public $currentStep=1,
    //father
    $email,$password,$father_name_ar,
    $father_name_en,$father_job_ar,
    $father_job_en,$father_nationaid,
    $father_passportid,$father_phone,
    $fathernationality_id,$fatherbloodtype_id,
    $fatherreligion_id,$father_address,
    //mother
    $mother_name_ar,$mother_job_ar,
    $mother_job_en,$mother_nationaid,
    $mother_passportid,$mother_phone,
    $mothernationality_id,$motherbloodtype_id,
    $motherreligion_id,$mother_address
    ;

    public function render()
    {
        return view('livewire.new-parent',[
            'nationalities'=>Nationality::all(),
            'religions'=>Religion::all(),
            'bloods'=>Blood::all()
        ]);
    }

    public function firstStepSubmit(){
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

    public function back($step){

        $this->currentStep = $step;
    }
}
