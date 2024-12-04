<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use App\Models\TagihanSantri;
use Illuminate\Http\Request;

class TagihanSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tagihan::find(1);
        return view('pages.santri.payment', [
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
    public function store(Request $request)
    {
        $dataPembayaran = [
            'tagihan_pembayaran' => $request->tagihan_pembayaran,
            'tagihan_bulanan' => $request->tagihan_bulanan,
            'tagihan_biaya_seragam' => $request->tagihan_biaya_seragam,
            'santri_id' => session('biodata_santri_id'),
        ];
        $dataTagihan = Tagihan::find(1);

        if ($request->tagihan_pembayaran >= $dataTagihan->tagihan_pembayaran) {
            $dataPembayaran['status'] = 'Lunas';
        }
        if ($request->tagihan_bulanan >= $dataTagihan->tagihan_bulanan) {
            $dataPembayaran['status'] = 'Lunas';
        }
    }

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
