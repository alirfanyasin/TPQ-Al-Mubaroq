<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Asatidz;
use App\Models\Jilid;
use App\Models\Kelas;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $dataTagihanSantri = Tagihan::find(1);
        $dataJilid = Jilid::all();
        $dataAsatidz = Asatidz::select('id', 'nama_lengkap')->get();
        $dataKelas = Kelas::all();
        return view('pages.settings', [
            'title' => 'Settings',
            'dataTagihanSantri' => $dataTagihanSantri,
            'dataJilid' => $dataJilid,
            'dataAsatidz' => $dataAsatidz,
            'dataKelas' => $dataKelas
        ]);
    }
}
