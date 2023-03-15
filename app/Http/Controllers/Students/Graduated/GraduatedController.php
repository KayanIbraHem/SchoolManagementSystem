<?php

namespace App\Http\Controllers\Students\Graduated;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\StudentGraduatedRepositoryInterface;

class GraduatedController extends Controller
{
    protected $graduate;

    public function __construct(StudentGraduatedRepositoryInterface $graduate){
        return $this->graduate=$graduate;
    }

    public function index()
    {
        return $this->graduate->index();
    }

    public function create()
    {
        return $this->graduate->create();
    }

    public function store(Request $request)
    {
        return $this->graduate->graduate($request);
    }

    public function update(Request $request)
    {
        return $this->graduate->restore($request);
    }

    public function destroy(Request $request)
    {
        return $this->graduate->destroy($request);
    }
}
