<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classgrade()
    {
        return $this->belongsTo(Classgrade::class, 'classgrade_id');
    }



    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function fees()
    {
        return $this->belongsTo(Fees::class, 'fee_id');
    }
}
