<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Tagihan;
use App\Models\Tagihan\Bulanan;
use App\Models\Tagihan\Pendaftaran;
use App\Models\Tagihan\Seragam;
use App\Models\Tagihan\TagihanSantri as TagihanTagihanSantri;
use App\Models\TagihanSantri;
use Illuminate\Http\Request;

class TagihanSantriController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Santri::with(['tagihanPendaftaran', 'tagihanSeragam', 'tagihanBulanan'])->get();

        return view('pages.santri.tagihan', [
            'title' => 'Tagihan Santri',
            'datas' => $data
        ]);
    }

    public function pembayaran(string $id, string $nama_lengkap)
    {
        $data = Tagihan::find(1);
        $tagihanSantri = Santri::find($id);
        return view('pages.santri.pembayaran_tagihan', [
            'title' => 'Pembayaran Santri ' . $nama_lengkap,
            'data' => $data,
            'tagihanSantri' => $tagihanSantri
        ]);
    }

    public function store_pembayaran(Request $request, string $id)
    {
        $tagihan = Tagihan::find(1);
        $dataPendaftaran = Pendaftaran::where('santri_id', $id)->first();
        $dataSeragam = Seragam::where('santri_id', $id)->first();
        $dataBulanan = Bulanan::where('santri_id', $id)->first();

        $updateTagihan = function ($data, $bayar, $totalTagihan) {
            if ($data) {
                $data->update([
                    'bayar' => $bayar,
                    'status' => $bayar >= $totalTagihan ? 'Lunas' : 'Belum Lunas'
                ]);
            }
        };

        $updateTagihan($dataPendaftaran, $request->tagihan_pendaftaran, $tagihan->tagihan_pendaftaran);
        $updateTagihan($dataSeragam, $request->tagihan_seragam, $tagihan->tagihan_biaya_seragam);
        $updateTagihan($dataBulanan, $request->tagihan_bulanan, $tagihan->tagihan_bulanan);

        return redirect()->route('tagihan.index');
    }


    /**
     * Display a listing of the resource.
     */
    public function payment()
    {
        $data = Tagihan::find(1);
        return view('pages.santri.pembayaran_tagihan', [
            'title' => 'Pembayaran Santri',
            'data' => $data
        ]);
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $dataPembayaran = [
    //         'tagihan_pembayaran' => $request->tagihan_pembayaran,
    //         'tagihan_bulanan' => $request->tagihan_bulanan,
    //         'tagihan_biaya_seragam' => $request->tagihan_biaya_seragam,
    //         'santri_id' => session('biodata_santri_id'),
    //     ];
    //     $dataTagihan = Tagihan::find(1);

    //     if ($request->tagihan_pembayaran >= $dataTagihan->tagihan_pembayaran) {
    //         $dataPembayaran['status'] = 'Lunas';
    //     }
    //     if ($request->tagihan_bulanan >= $dataTagihan->tagihan_bulanan) {
    //         $dataPembayaran['status'] = 'Lunas';
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
