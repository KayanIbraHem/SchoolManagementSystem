<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $fillable=['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classgrade()
    {
        return $this->belongsTo(Classgrade::class, 'classgrade_id');
    }

    public function feetype()
    {
        return $this->belongsTo(FeeType::class, 'feetype_id');
    }
}
