<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    public $translatable = ['name'];
    protected $fillable=['name','grade_id','classgrade_id'];
    use HasFactory, HasTranslations;

    public function classgrade(){
        return $this->belongsTo(Classgrade::class,'classgrade_id');
    }
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
}
