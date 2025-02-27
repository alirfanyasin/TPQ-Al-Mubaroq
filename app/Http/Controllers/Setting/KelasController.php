<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Kelas;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporNilai;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
        $kelas = Kelas::create([
            'nama' => $request->nama,
            'jilid_id' => $request->jilid_id,
            'asatidz_id' => $request->asatidz_id
        ]);
        Alert::success('Berhasil', 'Kelas berhasil ditambahkan', 'success');
        ActivityLog::create([
            'user_id' => Auth::id(),
            'description' => ActivityLog::MESSAGE['create'] . 'kelas ' . $kelas->nama,
            'type' => $request->method(),
        ]);
        return redirect()->route('settings');
    }


    public function update(Request $request, string $id)
    {
        $data = Kelas::find($id);
        $data->update([
            'nama' => $request->nama,
            'jilid_id' => $request->jilid_id,
            'asatidz_id' => $request->asatidz_id
        ]);
        Alert::success('Berhasil', 'Kelas berhasil diupdate', 'success');
        return redirect()->route('settings');
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            Santri::where('kelas_id', $id)->update(['kelas_id' => null]);

            $raporIds = Rapor::where('kelas_id', $id)->pluck('id');

            RaporNilai::whereIn('rapor_id', $raporIds)->delete();

            Rapor::whereIn('id', $raporIds)->delete();

            Kelas::findOrFail($id)->delete();

            DB::commit();

            Alert::success('Berhasil', 'Kelas berhasil dihapus', 'success');
            return redirect()->route('settings');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('settings')->with('error', 'Gagal menghapus kelas.');
        }
    }
}
