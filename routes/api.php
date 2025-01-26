<?php

use App\Models\Jilid;
use App\Models\Kelas;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/rapor', function () {
    $datas = Cache::remember('rapor_datas', 300, function () {
        return Rapor::orderBy('jilid_id', 'asc')->get();
    });

    $semesters = Cache::remember('rapor_semesters', 300, function () {
        return Semester::all();
    });

    $jilids = Cache::remember('rapor_jilids', 300, function () {
        return Jilid::all();
    });

    $classes = Cache::remember('rapor_classes', 300, function () {
        return Kelas::orderBy('nama', 'asc')->get();
    });

    // Return the view with cached data
    return view('pages.rapor.index', [
        'title' => 'Rapor',
        'datas' => $datas,
        'semesters' => $semesters,
        'jilids' => $jilids,
        'classes' => $classes
    ]);
});
