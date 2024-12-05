<?php

namespace App\Http\Controllers\Rapor;

use App\Http\Controllers\Controller;
use App\Models\Rapor\Rapor;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function index()
    {
        return view('pages.rapor.index', [
            'title' => 'Rapor',
            'datas' => Rapor::all(),
        ]);
    }
}
