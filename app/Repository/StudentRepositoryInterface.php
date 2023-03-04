<?php
namespace App\Repository;

interface StudentRepositoryInterface{

   public function getAllStudents(); 
   public function createStudent(); 
   public function storeStudent($request);
   public function getClassID($id);
   public function getSectionID($id);
   public function editStudent($id);
   public function updateStudent($request);
   public function deleteStudent($request);
}

