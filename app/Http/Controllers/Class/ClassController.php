<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $dataKelas = Kelas::withCount('santri')->orderBy('jilid_id', 'asc')->get();
        $dataSantri = Santri::select('id', 'nama_lengkap', 'jenis_kelamin', 'nomor_telepon', 'kelas_id')->where('kelas_id', NULL)->get();
        return view('pages.class.index', [
            'title' => 'Kelas',
            'dataKelas' => $dataKelas,
            'dataSantri' => $dataSantri
        ]);
    }

    public function class_room(string $id, $nama)
    {
        $dataKelas = Kelas::find($id);
        $dataSantri = Santri::where('kelas_id', $id)->get();
        return view('pages.class.class_room', [
            'title' => 'Kelas',
            'datas' => $dataSantri,
            'dataKelas' => $dataKelas,
        ]);
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'selected_santri' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);
        $santriIds = explode(',', $request->selected_santri);
        $kelasId = $request->kelas_id;
        foreach ($santriIds as $santriId) {
            $santri = Santri::find($santriId);
            if ($santri) {
                $santri->update(['kelas_id' => $kelasId]);
            }
        }
        return redirect()->route('class.index')->with('success', 'Santri berhasil di-enroll.');
    }

    public function leave_multiple(Request $request)
    {
        $request->validate([
            'selected_santri' => 'required|array|min:1',
            'selected_santri.*' => 'exists:santris,id',
        ]);
        $santriIds = $request->selected_santri;
        Santri::whereIn('id', $santriIds)->update(['kelas_id' => NULL]);
        return redirect()->route('class.index')->with('success', 'Santri berhasil dikeluarkan.');
    }
}
