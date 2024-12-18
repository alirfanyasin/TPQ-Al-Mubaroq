<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Asatidz;
use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Dashboard::first();
        $santri_total = Santri::all()->count();
        $asatidz_total = Asatidz::all()->count();

        return view('pages.dashboards.dashboard', [
            'title' => 'Dashboard', 
            'data' => $data,
            'santri_total' => $santri_total, 
            'asatidz_total' => $asatidz_total
        ]);

    }

    public function edit(Dashboard $data)
    {
        $data = Dashboard::first();
        return view('pages.dashboards.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = Dashboard::first();
        $data->update([
            // Biodata
            'no_izin_operasional' => $request->no_izin_operasional,
            'tgl_izin_operasional' => $request->tgl_izin_operasional,
            'tgl_mulai_izin_operasional' => $request->tgl_mulai_izin_operasional,
            'tgl_selesai_izin_operasional' => $request->tgl_selesai_operasional,
            'tgl_sk_pendirian' => $request->tgl_sk_pendirian,
            'jam_operasional' => $request->jam_operasional,
            'jumlah_kelompok_belajar' => $request->jumlah_kelompok_belajar,
            'biaya_operasional' => $request->biaya_operasional,
            'status_kepemilikan' => $request->status_kepemilikan,
            'nama_ketua_yayasan' => $request->nama_ketua_yayasan,
            'alamat_kepala' => $request->alamat_kepala,
            'nama_kepala' => $request->nama_kepala,
            'nama_norek' => $request->nama_norek,
            'norek' => $request->norek,
            'no_telp' => $request->no_telp,
            'no_statistik' => $request->no_statistik,
            'no_sk_pendirian' => $request->no_sk_pendirian,
            'hari_operasional' => $request->hari_operasional,
            'metode_pembelajaran' => $request->metode_pembelajaran,
            'sumber_dana' => $request->sumber_dana,
            'tempat_lembaga' => $request->tempat_lembaga,
            'kepemilikan_lembaga' => $request->kepemilikan_lembaga,
            'no_hp_kepala' => $request->no_hp_kepala,
            'nik_kepala' => $request->nik_kepala,
            'npwp' => $request->npwp,
            'cabang_norek' => $request->cabang_norek,
            'bentuk_pendidikan' => $request->bentuk_pendidikan,
            'npsn' => $request->npsn,
            'nama_satuan' => $request->nama_satuan,
            // ALAMAT
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'bujur' => $request->bujur,
            'lintang' => $request->lintang,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        session()->flash('success', 'Data TPQ berhasil diperbarui.');

        return redirect()->route('dashboard');
    }

}
