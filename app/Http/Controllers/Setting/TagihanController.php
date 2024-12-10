<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function update(Request $request)
    {
        $dataTagihan = Tagihan::find(1);
        $data = [
            'tagihan_pendaftaran' => $request->tagihan_pendaftaran,
            'tagihan_bulanan' => $request->tagihan_bulanan,
            'tagihan_biaya_seragam' => $request->tagihan_biaya_seragam,
        ];
        $dataTagihan->update($data);
        return redirect()->route('settings');
    }
}
