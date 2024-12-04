<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $dataTagihanSantri = Tagihan::find(1);
        $dataJilid = Jilid::all();
        return view('pages.settings', [
            'title' => 'Settings',
            'dataTagihanSantri' => $dataTagihanSantri,
            'dataJilid' => $dataJilid
        ]);
    }
}
