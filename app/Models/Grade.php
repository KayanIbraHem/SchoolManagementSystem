<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'description'
    ];

    public function classgrade(){
        return $this->hasMany(Classgrade::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
