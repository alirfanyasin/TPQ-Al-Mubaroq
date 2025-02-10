<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Asatidz;
use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSantri = Santri::count();
        $totalAsatidz = Asatidz::count();
        $totalKelas = Kelas::count();
        $activityLog = ActivityLog::orderBy('created_at', 'desc')->limit(10)->get();

        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'total_santri' => $totalSantri,
            'total_asatidz' => $totalAsatidz,
            'total_kelas' => $totalKelas,
            'activity_logs' => $activityLog
        ]);
    }
}
