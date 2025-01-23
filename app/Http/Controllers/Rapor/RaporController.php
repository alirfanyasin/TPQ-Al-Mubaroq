<?php

namespace App\Http\Controllers\Rapor;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
use App\Models\Kelas;
use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporItem;
use App\Models\Rapor\RaporNilai;
use App\Models\Rapor\Semester;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class RaporController extends Controller
{
    public function index()
    {
        $datas = Cache::remember('rapor_datas', 300, function () {
            return Rapor::orderBy('jilid_id', 'asc')->get();
        });

        $semesters = Cache::remember('rapor_semesters', 300, function () {
            return Semester::all();
        });

        $jilids = Cache::remember('rapor_jilids', 300, function () {
            return Jilid::all();
        });

        $classes = Cache::remember('rapor_classes', 300, function () {
            return Kelas::orderBy('nama', 'asc')->get();
        });

        // Return the view with cached data
        return view('pages.rapor.index', [
            'title' => 'Rapor',
            'datas' => $datas,
            'semesters' => $semesters,
            'jilids' => $jilids,
            'classes' => $classes
        ]);
    }
    public function show(string $id)
    {
        $dataRapor = Rapor::with(['raporNilai.raporItem', 'santri'])->findOrFail($id);

        $groupedData = optional($dataRapor->raporNilai)->groupBy(fn($nilai) => optional($nilai->raporItem)->jenis_penilaian) ?? collect();

        $totalNilai = $dataRapor->raporNilai ? $dataRapor->raporNilai->sum('nilai') : 0;
        $totalRow = $dataRapor->raporNilai ? $dataRapor->raporNilai->count() : 0;

        $average = $totalRow > 0 ? ($totalNilai / $totalRow) : 0;
        $grade = match (true) {
            $average >= 90 && $average <= 100 => 'A',
            $average >= 80 && $average < 90 => 'B+',
            $average >= 70 && $average < 80 => 'B',
            $average >= 60 && $average < 70 => 'C',
            $average < 60 => 'D',
            default => null,
        };

        return view('pages.rapor.rapor_santri', [
            'title' => 'Rapor Santri ' . optional($dataRapor->santri)->nama_lengkap,
            'data' => $dataRapor,
            'groupedData' => $groupedData,
            'totalNilai' => $totalNilai,
            'totalRow' => $totalRow,
            'grade' => $grade,
        ]);
    }


    public function print_one(string $id)
    {
        $dataRapor = Rapor::with(['raporNilai.raporItem', 'santri'])->findOrFail($id);

        $groupedData = optional($dataRapor->raporNilai)->groupBy(fn($nilai) => optional($nilai->raporItem)->jenis_penilaian) ?? collect();

        $totalNilai = $dataRapor->raporNilai ? $dataRapor->raporNilai->sum('nilai') : 0;
        $totalRow = $dataRapor->raporNilai ? $dataRapor->raporNilai->count() : 0;

        $average = $totalRow > 0 ? ($totalNilai / $totalRow) : 0;
        $grade = match (true) {
            $average >= 90 && $average <= 100 => 'A',
            $average >= 80 && $average < 90 => 'B+',
            $average >= 70 && $average < 80 => 'B',
            $average >= 60 && $average < 70 => 'C',
            $average < 60 => 'D',
            default => null,
        };

        return view('pages.rapor.print_one', [
            'title' => 'Rapor Santri | ' . $dataRapor->santri->nama_lengkap,
            'data' => $dataRapor,
            'groupedData' => $groupedData,
            'totalNilai' => $totalNilai,
            'totalRow' => $totalRow,
            'grade' => $grade,
        ]);
    }

    public function update_semeter(Request $request)
    {
        Rapor::query()->update(['semester_id' => $request->semester_id]);
        return redirect()->back()->with('success', 'Semester telah berhasil diperbarui.');
    }

    public function generate_item_penilaian(string $id)
    {
        $dataRapor = Rapor::findOrFail($id);
        $raporItems = RaporItem::where('semester_id', $dataRapor->semester_id)
            ->where('jilid_id', $dataRapor->jilid_id)
            ->get();

        foreach ($raporItems as $item) {
            $existingRaporNilai = RaporNilai::where('rapor_id', $id)
                ->where('rapor_item_id', $item->id)
                ->exists();

            if (!$existingRaporNilai) {
                RaporNilai::create([
                    'rapor_id' => $id,
                    'rapor_item_id' => $item->id,
                    'nilai' => 0.0,
                ]);
            }
        }

        return redirect()->route('rapor.item_penilaian', ['id' => $id]);
    }




    public function item_penilaian(string $id)
    {
        $dataRapor = Rapor::find($id);
        return view('pages.rapor.penilaian', [
            'title' => 'Penilaian Rapor ' . $dataRapor->santri->nama_lengkap,
            'datas' => RaporNilai::where('rapor_id', $id)->get(),
            'rapor' => $dataRapor
        ]);
    }


    public function simpan_nilai(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nilai.*' => 'required|numeric|min:0|max:100', // Contoh validasi nilai
        ]);

        // Iterasi nilai yang dikirim dari form
        foreach ($request->nilai as $raporItemId => $nilai) {
            // Perbarui nilai pada database
            RaporNilai::where('id', $raporItemId)
                ->where('rapor_id', $id)
                ->update(['nilai' => $nilai]);
        }

        return redirect()->route('rapor.index')->with('success', 'Nilai berhasil disimpan.');
    }

    public function print(Request $request)
    {
        if ($request->kelas === 'semua') {
            $dataRapor = Rapor::with(['raporNilai.raporItem', 'santri.kelas.asatidz', 'jilid'])->get();
        } else {
            $dataRapor = Rapor::with(['raporNilai.raporItem', 'santri.kelas.asatidz', 'jilid'])
                ->whereHas('santri.kelas', function ($query) use ($request) {
                    $query->where('id', $request->kelas);
                })->get();
        }

        return view('pages.rapor.print', [
            'dataRapor' => $dataRapor, // Kirim semua data rapor
            'title' => 'Rapor Santri',
        ]);
    }
}
