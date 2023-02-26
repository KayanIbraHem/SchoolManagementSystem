<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers(){
       $teachers=Teacher::all();
       return view('teachers.teachers',compact('teachers'));
    }

    public function getSpecialization()
    {
       return Specialization::all();    
    }

    public function getGender()
    {
        return Gender::all();
    }
    
    public function storeTeachers($request)
    {
        $teacher= new Teacher();
        $teacher->email=$request->email;
        $teacher->password= Hash::make($request->password);
        $teacher->name=['ar'=>$request->teacher_name_ar,'en'=>$request->teacher_name_en];
        $teacher->specialization_id=$request->specialization_id;
        $teacher->gender_id=$request->gender_id;
        $teacher->joining_date=$request->joining_date;
        $teacher->address=$request->address;
        $teacher->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('teachers.index');
    }

    public function editTeacher($id)
    {
        return Teacher::findorfail($id);    
    }

    public function updateTeacher($request)
    {
        $teacher=Teacher::findorfail($request->id);
        if($teacher->password !=$request->password){
            $teacher->password=Hash::make($request->password);
        }
        $teacher->update([
        $teacher->email=$request->email,
        $teacher->name=['ar'=>$request->teacher_name_ar,'en'=>$request->teacher_name_en],
        $teacher->specialization_id=$request->specialization_id,
        $teacher->gender_id=$request->gender_id,
        $teacher->joining_date=$request->joining_date,
        $teacher->address=$request->address, 
        ]);
        toastr()->success(trans('messages.edit'));
        return redirect()->route('teachers.index');    
    }

    public function deleteTeacher($request)
    { 
       Teacher::findorFail($request->id)->delete(); 
       toastr()->success(trans('messages.delete'));
       return redirect()->route('teachers.index');
    }
}
