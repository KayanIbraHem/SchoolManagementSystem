<?php
namespace App\Repository;

interface StudentRepositoryInterface{

   public function getAllStudents(); 
   public function createStudent(); 
   public function storeStudent($request);
   public function showStudent($id);
   public function editStudent($id);
   public function updateStudent($request);
   public function deleteStudent($request);
   public function uploadAttachment($request,$student_name,$student_id);
   public function downloadAttachment($student_name,$file_name);
   public function deleteAttachment($request);
   public function getClassID($id);
   public function getSectionID($id);
}

