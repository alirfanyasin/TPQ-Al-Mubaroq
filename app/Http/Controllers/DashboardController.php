<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Asatidz;
use App\Models\Dashboard;
use App\Models\Kelas;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSantri = Santri::count();
        $totalAsatidz = Asatidz::count();
        $totalKelas = Kelas::count();
        $activityLog = ActivityLog::orderBy('created_at', 'desc')->limit(10)->get();
        $jumlahLaki = Santri::where('jenis_kelamin', 'Laki-Laki')->count();
        $jumlahPerempuan = Santri::where('jenis_kelamin', 'Perempuan')->count();

        // Ambil total tagihan per bulan (12 bulan terakhir)
        $tagihanBulanan = DB::table('tagihan_bulanans')
            ->select(
                DB::raw('DATE_FORMAT(date, "%Y-%m") as bulan'),
                DB::raw('SUM(bayar) as total')
            )
            ->groupBy('bulan')
            ->orderByDesc('bulan')
            ->limit(12)
            ->get()
            ->sortBy('bulan'); // agar urut dari bulan lama ke baru

        $bulan = [];
        $total = [];

        foreach ($tagihanBulanan as $row) {
            $bulan[] = Carbon::createFromFormat('Y-m', $row->bulan)->translatedFormat('F Y');
            $total[] = $row->total;
        }

        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'total_santri' => $totalSantri,
            'total_asatidz' => $totalAsatidz,
            'total_kelas' => $totalKelas,
            'activity_logs' => $activityLog,
            'bulan' => $bulan,
            'total' => $total,
            'jumlah_laki' => $jumlahLaki,
            'jumlah_perempuan' => $jumlahPerempuan,
        ]);
    }
}
