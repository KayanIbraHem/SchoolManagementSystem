<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;
   
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

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function parent()
    {
        return $this->belongsTo(StudentParent::class, 'parent_id');
    }
}
