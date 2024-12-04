<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kelas',
        ], [
            'nama.required' => 'Nama Kelas wajib diisi',
            'nama.unique' => 'Nama Kelas sudah ada'
        ]);
        Kelas::create([
            'nama' => $request->nama,
            'jilid_id' => $request->jilid_id,
            'asatidz_id' => $request->asatidz_id
        ]);
        return redirect()->route('settings')->with('success', 'Kelas berhasil ditambahkan');
    }


    public function update(Request $request, string $id)
    {
        $data = Kelas::find($id);
        $data->update([
            'nama' => $request->nama,
            'jilid_id' => $request->jilid_id,
            'asatidz_id' => $request->asatidz_id
        ]);
        return redirect()->route('settings')->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return redirect()->route('settings')->with('success', 'Kelas berhasil dihapus');
    }
}
