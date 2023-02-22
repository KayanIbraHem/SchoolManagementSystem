<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];
    protected $fillable=['name'];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

   
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }

}
