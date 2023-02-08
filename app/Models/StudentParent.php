<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['father_name','mother_name','father_job','mother_job'];
    protected $guarded=[];
}
