<?php
namespace App\Repository;

interface TeacherRepositoryInterface{
    public function getAllTeachers();
    public function getSpecialization();
    public function getGender();
    public function storeTeachers($request);
    public function editTeacher($id);
    public function updateTeacher($request);
    public function deleteTeacher($request);
}

