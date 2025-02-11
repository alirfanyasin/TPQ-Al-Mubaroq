<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Asatidz;
use App\Models\HariAktif;
use Illuminate\Http\Request;
use App\Models\GajiAsatidzBulanan;

class HariAktifController extends Controller
{
    public function handleMonthChange()
    {
        // Get the current date
        $now = Carbon::now();

        // get 6 months ago
        $sixMonthsAgo = $now->copy()->subMonths(6);

        // delete hari aktif where $sixMonthsAgo
        HariAktif::where('bulan_tahun', '=', $sixMonthsAgo->format('F Y'))->delete();

        // get 7 months from now
        $sevenMonthsFromNow = $now->copy()->addMonths(7);

        // create new hari aktif where $sevenMonthsFromNow
        if (!HariAktif::where('bulan_tahun', '=', $sevenMonthsFromNow->format('F Y'))->exists()) {
            HariAktif::create([
                'bulan_tahun' => $sevenMonthsFromNow->format('F Y'),
                'jumlah_hari' => $sevenMonthsFromNow->daysInMonth,
            ]);
        }

        return true;
    }

    public function index()
    {
        return view('pages.gaji.hari_aktif', [
            'hari_aktif' => HariAktif::all()
        ]);
    }

    public function update(Request $request)
    {
        $hari_aktif = HariAktif::findOrFail($request->id);
        $dateformat = Carbon::createFromFormat('M Y',$hari_aktif->bulan_tahun);
        $dateObject = $dateformat->format('Y-m');

        $hari_aktif->update([
            'jumlah_hari' => $request->hari_aktif,
        ]);

        // handle panggajian update
        $asatidzs = Asatidz::all();

        foreach ($asatidzs as $asatidz) {
            $penggajian = GajiAsatidzBulanan::where('asatidz_id', $asatidz->id)->where('tanggal', 'LIKE', $dateObject.'%')->first();
            if($penggajian){
                $penggajian->lembur = max(0, $penggajian->jumlah_hari_efektif - $request->hari_aktif);
                $penggajian->save();
            }
        }

        return redirect()->route('asatidz.hari_aktif');
    }
}
