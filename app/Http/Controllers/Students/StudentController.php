<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepositoryInterface $student){
        return $this->student=$student;
    }

    public function index()
    {
       return $this->student->getAllStudents();
    }

    public function create()
    {
        return $this->student->createStudent();
    }
   
    public function store(Request $request)
    {
        return $this->student->storeStudent($request);
    }
   
    public function show($id)
    {
       return $this->student->showStudent($id);
    }
   
    public function edit($id)
    {
        return $this->student->editStudent($id);
    }

    public function update(Request $request)
    {
       return $this->student->updateStudent($request);
    }

    public function destroy(Request $request)
    {
        return $this->student->deleteStudent($request);
    }

    public function uploadAttachment(Request $request,$student_name,$student_id)
    {
        return $this->student->uploadAttachment($request,$student_name,$student_id);
    }

    public function downloadAttachment($student_name,$file_name)
    {
        return $this->student->downloadAttachment($student_name,$file_name);
    }

    public function deleteAttachment(Request $request)
    {
        return $this->student->deleteAttachment($request);
    }
    
    public function getClass($id)
    {
        return $this->student->getClassID($id);
    }
    
    public function getSection($id)
    {
        return $this->student->getSectionID($id);
    }
}
