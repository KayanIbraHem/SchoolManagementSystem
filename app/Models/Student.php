<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function classgrade(){
        return $this->belongsTo(Classgrade::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }

}
