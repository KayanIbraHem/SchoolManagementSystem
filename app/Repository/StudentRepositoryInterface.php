<?php
namespace App\Repository;

interface StudentRepositoryInterface{

   public function createStudent(); 
   public function storeStudent($request);
   public function getClass($id);
   public function getSection($id);
}

