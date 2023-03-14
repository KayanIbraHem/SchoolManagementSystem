<?php
namespace App\Repository;

interface StudentPromotionsRepositoryInterface{

   public function index();
   public function store($request);
   public function create();
   public function destory($request);

   
}

