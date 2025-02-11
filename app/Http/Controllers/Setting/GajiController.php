<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\GajiAsatidz;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function update(Request $request)
    {
        $dataGajian = GajiAsatidz::find(1);
        $data = [
            'gaji_tetap' => $request->gaji_tetap,
            'gaji_magang' => $request->gaji_magang,
            'lembur_tetap' => $request->lembur_tetap,
            'lembur_magang' => $request->lembur_magang,
            'kenaikan' => $request->kenaikan,
        ];
        $dataGajian->update($data);
        return redirect()->route('settings');
    }
}
