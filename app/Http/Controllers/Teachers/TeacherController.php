<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher){
        $this->teacher=$teacher;
    }

    public function index()
    {
     return $this->teacher->getAllTeachers();  
    }

    public function create()
    {
        $specializations= $this->teacher->getSpecialization();
        $genders= $this->teacher->getGender();
        return view('teachers.create',[
            'specializations'=>$specializations,
            'genders'=>$genders
            ]) ;
    }
    
    public function store(Request $request)
    {
        return $this->teacher->storeTeachers($request);
    }
    public function edit($id)
    {
        $teachers=$this->teacher->editTeacher($id);
        $specializations= $this->teacher->getSpecialization();
        $genders= $this->teacher->getGender();
        return view('teachers.edit',[
            'teacher'=>$teachers,
            'specializations'=>$specializations,
            'genders'=>$genders
            ]);
    }
    
    public function update(TeacherRequest $request)
    {
        return $this->teacher->updateTeacher($request);
    }
    public function destroy(Request $request)
    {
        return $this->teacher->deleteTeacher($request);
    }
}
