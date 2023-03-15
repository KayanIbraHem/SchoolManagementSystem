<?php
namespace App\Repository;

interface StudentGraduatedRepositoryInterface{

    public function index();
    public function create();
    public function graduate($request);
    public function restore($request);
    public function destroy($request);
}

