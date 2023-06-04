<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\StudentParent;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Blood;
use App\Models\Student;
use App\Models\Classgrade;
use App\Models\Section;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface
{

    public function getAllStudents()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function createStudent()
    {
        $data['grades'] = Grade::all();
        $data['parents'] = StudentParent::all();
        $data['genders'] = Gender::all();
        $data['nationalites'] = Nationality::all();
        $data['bloods'] = Blood::all();
        return view('students.create', $data);
    }

    public function storeStudent($request)
    {
        $student = new Student();
        $student->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->gender_id = $request->gender_id;
        $student->nationality_id = $request->nationality_id;
        $student->blood_id = $request->blood_id;
        $student->grade_id = $request->grade_id;
        $student->classgrade_id = $request->classgrade_id;
        $student->date_birth = $request->dateOfBirth;
        $student->section_id = $request->section_id;
        $student->parent_id = $request->parent_id;
        $student->academic_year = $request->academic_year;
        $student->save();

        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/' . $student->name, $name, 'student_attachments');
                $image = new Image();
                $image->name = $name;
                $image->imageable_id = $student->id;
                $image->imageable_type = 'App\Models\Student';
                $image->save();
            }
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('students.create');
    }

    public function showStudent($id)
    {
        $student = Student::findorfail($id);
        return view('students.show', compact('student'));
    }


    public function editStudent($id)
    {
        $data['grades'] = Grade::all();
        $data['parents'] = StudentParent::all();
        $data['genders'] = Gender::all();
        $data['nationalites'] = Nationality::all();
        $data['bloods'] = Blood::all();
        $student = Student::findorfail($id);
        return view('students.edit', $data, ['student' => $student]);
    }

    public function updateStudent($request)
    {
        $student = Student::findorfail($request->id);
        if ($student->password != $request->password) {
            $student->password = Hash::make($request->password);
        }
        $student->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $student->email = $request->email;
        $student->gender_id = $request->gender_id;
        $student->nationality_id = $request->nationality_id;
        $student->blood_id = $request->blood_id;
        $student->grade_id = $request->grade_id;
        $student->classgrade_id = $request->classgrade_id;
        $student->date_birth = $request->dateOfBirth;
        $student->section_id = $request->section_id;
        $student->parent_id = $request->parent_id;
        $student->academic_year = $request->academic_year;
        $student->save();
        toastr()->success(trans('messages.edit'));
        return redirect()->route('students.index');
    }

    public function deleteStudent($request)
    {
        Student::findorFail($request->id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->route('students.index');
    }

    public function uploadAttachment($request, $student_name, $student_id)
    {
        if ($request->hasfile('photos')) {
            foreach ($request->file('photos') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/' . $student_name, $name, 'student_attachments');
                $image = new Image();
                $image->name = $name;
                $image->imageable_id = $student_id;
                $image->imageable_type = 'App\Models\Student';
                $image->save();
            }
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('students.show', $student_id);
    }

    public function downloadAttachment($student_name, $file_name)
    {
        return response()->download(public_path('attachments/students/' . $student_name . '/' . $file_name));
    }

    public function deleteAttachment($request)
    {
        Storage::disk('student_attachments')->delete('attachments/students/' . $request->student_name . '/' . $request->filename);
        Image::where([['id', $request->id], ['name', $request->filename]])->delete();
        toastr()->error(trans('messages.delete'));
        return redirect()->route('students.show', $request->student_id);
    }

    public function getClassID($id)
    {
        $selectClass = Classgrade::where('grade_id', $id)->pluck('name', 'id');
        return response()->json($selectClass);
    }

    public function getSectionID($id)
    {
        $selectSection = Section::where('classgrade_id', $id)->pluck('name', 'id');
        return response()->json($selectSection);
    }
}
