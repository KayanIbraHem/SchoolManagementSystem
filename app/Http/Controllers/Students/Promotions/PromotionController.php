<?php

namespace App\Http\Controllers\Students\Promotions;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionsRepositoryInterface;

class PromotionController extends Controller
{
    
    protected $promotion;

    public function __construct(StudentPromotionsRepositoryInterface $promotion){
        return $this->promotion=$promotion;
    }

    public function index()
    {
        return $this->promotion->index();
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
       return $this->promotion->store($request);
    }

   
    public function show(Promotion $promotion)
    {
        //
    }

   
    public function edit(Promotion $promotion)
    {
        //
    }

    
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    
    public function destroy(Promotion $promotion)
    {
        //
    }
}
