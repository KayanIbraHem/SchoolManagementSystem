<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacher;
    public function __construct(TeacherRepositoryInterface $teacher){

        $this->teacher=$teacher;

    }
    public function index()
    {

        $test=$this->teacher->getAllTeachers();
        dd($test);

    }
}
