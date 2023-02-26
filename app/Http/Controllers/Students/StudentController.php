<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepositoryInterface $student){
        return $this->student=$student;
    }

    public function index()
    {
        //
    }

    
    public function create()
    {
        return $this->student->createStudent();
    }
   
    public function store(Request $request)
    {
        return $this->student->storeStudent($request);
    }
   
    public function show(Student $student)
    {
        //
    }
   
    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
    public function getClass($id)
    {
        return $this->student->getClass($id);
    }
    public function getSection($id)
    {
        return $this->student->getSection($id);
    }
}
