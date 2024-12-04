<?php

namespace App\Http\Controllers\EnrollClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollClassController extends Controller
{
    public function index()
    {
        return view('pages.enroll_class.index', [
            'title' => 'Enroll Kelas'
        ]);
    }

    public function class()
    {
        return view('pages.enroll_class.class', [
            'title' => 'Kelas'
        ]);
    }
}
