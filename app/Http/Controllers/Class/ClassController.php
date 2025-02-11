<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Kelas;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporItem;
use App\Models\Rapor\RaporNilai;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();
        try {
            foreach ($santriIds as $santriId) {
                $santri = Santri::find($santriId);
                if (!$santri) {
                    throw new \Exception("Santri dengan ID {$santriId} tidak ditemukan.");
                }

                // Update kelas santri
                $santri->update(['kelas_id' => $kelasId]);

                // Buat rapor untuk santri
                $rapor = Rapor::create([
                    'santri_id' => $santriId,
                    'jilid_id' => $santri->kelas->jilid_id,
                    'kelas_id' => $kelasId,
                    'semester_id' => 1
                ]);

                // Ambil item rapor yang sesuai dengan jilid dan semester
                $raporItems = RaporItem::where('semester_id', $rapor->semester_id)
                    ->where('jilid_id', $rapor->jilid_id)
                    ->get();

                // Tambahkan nilai rapor
                foreach ($raporItems as $item) {
                    RaporNilai::updateOrCreate(
                        [
                            'rapor_id'      => $rapor->id,
                            'rapor_item_id' => $item->id,
                        ],
                        [
                            'nilai' => 0.0,
                        ]
                    );
                }
            }

            DB::commit();
            Alert::success('Berhasil', 'Siswa berhasil dienroll', 'success');
            ActivityLog::create([
                'user_id' => Auth::id(),
                'description' => ActivityLog::MESSAGE['in_class'],
                'type' => $request->method(),
            ]);
            return redirect()->route('class.index')->with('success', 'Santri berhasil di-enroll.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal enroll santri: ' . $e->getMessage());
        }
    }

    public function leave_multiple(Request $request)
    {
        $request->validate([
            'selected_santri' => 'required|array|min:1',
            'selected_santri.*' => 'exists:santris,id',
        ]);
        $santriIds = $request->selected_santri;
        Santri::whereIn('id', $santriIds)->update(['kelas_id' => NULL]);
        Rapor::whereIn('santri_id', $santriIds)->delete();
        Alert::success('Berhasil', 'Siswa berhasil keluarkan', 'success');
        return redirect()->route('class.index')->with('success', 'Santri berhasil dikeluarkan.');
    }
}
