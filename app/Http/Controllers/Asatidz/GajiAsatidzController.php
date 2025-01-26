<?php

namespace App\Http\Controllers\Asatidz;

use Exception;
use Carbon\Carbon;
use App\Models\absensi;
use App\Models\Asatidz;
use App\Models\HariAktif;
use Illuminate\Http\Request;
use App\Exports\ExportAsatidz;
use App\Imports\ImportAsatidz;
use App\Models\AbsensiHistory;
use App\Http\Controllers\Controller;
use App\Models\GajiAsatidzBulanan;
use App\Models\GajiAsatidz;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;


class GajiAsatidzController extends Controller
{
    public function checkDuplicate(Request $request)
    {
        $id = $request->input('asatidz_id');

        // Query the database for duplicate records
        $exists = Asatidz::where('asatidz_id', $id)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function index(Request $request)
    {
        $asatidzs = Asatidz::with('gaji', 'absensi')->get();
        $months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        $date = Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM YYYY');
    
        // Membuat dropdown berdasarkan bulan dan tahun yang tersedia
        $bulanArray = GajiAsatidzBulanan::select('tanggal')->get()
            ->map(function ($gaji) use ($months) {
                $dateParts = Carbon::parse($gaji->tanggal);
                $bulan = $months[$dateParts->month - 1];
                $tahun = $dateParts->year;
                return $bulan . ' ' . $tahun;
            })
            ->unique()
            ->values()
            ->toArray();
    
        // Tentukan bulan dan tahun yang akan digunakan (default atau berdasarkan filter)
        if ($request->has('bulan')) {
            // Gunakan bulan dan tahun dari request jika tersedia
            $selectedBulanTahun = $request->bulan;
        } else {
            // Default ke bulan terbaru
            $selectedBulanTahun = end($bulanArray);
        }
    
        // Pisahkan bulan dan tahun yang dipilih
        [$selectedBulanName, $selectedTahun] = explode(' ', $selectedBulanTahun);
        $selectedBulanIndex = array_search($selectedBulanName, $months) + 1;
    
        // Filter data penggajian berdasarkan bulan dan tahun yang dipilih
        $filteredGaji = GajiAsatidzBulanan::whereMonth('tanggal', $selectedBulanIndex)
            ->whereYear('tanggal', $selectedTahun)
            ->get();
    
        // Menggabungkan data asatidz dengan data penggajian
        $asatidzs->each(function ($asatidz) use ($filteredGaji) {
            $latestPenggajian = $filteredGaji->where('asatidz_id', $asatidz->id)->first();
            $asatidz->Gaji = $latestPenggajian;
        });
    
        // Menghitung total gaji bulan ini
        $total_bulan_ini = 0;
        foreach ($asatidzs as $asatidz) {
            if (isset($asatidz->Gaji)) {
                $total_bulan_ini += $asatidz->Gaji->gaji_bruto;
            }
        }
        $total_bulan_ini = 'Rp. ' . number_format($total_bulan_ini, 0, ',', '.');
    
        // Total hadir hari ini
        $totalHadir = AbsensiHistory::where('tanggal', $date)->first();
    
        // Total asatidz
        $totalAsatidz = Asatidz::count();
    
        // Total hari aktif
        $hariAktif = HariAktif::where('bulan_tahun', 'like', '%' . Carbon::now()->format('F Y') . '%')->first();
        $totalHariAktif = $hariAktif->jumlah_hari;
    
        return view('pages.gaji.index', [
            "asatidzModel" => $asatidzs,
            "filteredGaji" => $filteredGaji,
            'setting' => GajiAsatidz::first(),
            'totalHadir' => $totalHadir,
            'totalAsatidz' => $totalAsatidz,
            'totalHariAktif' => $totalHariAktif,
            'bulan' => $bulanArray,
            'selectedBulan' => $selectedBulanTahun,
            'date' => $selectedBulanTahun,
            'total_bulan_ini' => $total_bulan_ini,
        ]);
    }
    

    public function show(Request $id)
    {
        $npa = $id->input('asatidz_id');
        $asatidz = Asatidz::where('asatidz_id', $npa)->first();
        $ttl = $asatidz->tanggal_lahir;
        $umur = Carbon::parse($ttl)->age;
        $bulan_ini = GajiAsatidzBulanan::where('asatidz_id', $npa)->where('tanggal', 'LIKE', Carbon::now()->format('Y-m').'%')->first();
        $totalSesi = absensi::where('asatidz_id', $npa)->whereMonth('created_at', Carbon::now()->month)->sum('jumlah_sesi');
        return view('asatidz.detail_asatidz', ['asatidz' => $asatidz, 'umur' => $umur, 'bulan_ini' => $bulan_ini, 'totalSesi' => $totalSesi]);
    }

    public function edit(Request $request, $id)
    {
        // Mengambil data asatidz dan gaji terbaru
        $asatidz = Asatidz::with(['gaji' => function ($query) {
            $query->orderBy('tanggal', 'desc'); // Sort by the latest date
        }])->findOrFail($id);
        $gaji = $asatidz->Gaji->sortByDesc('tanggal')->first();

        // Menghitung total hari aktif bulan ini
        $hariAktif = HariAktif::where('bulan_tahun', 'like', '%' . Carbon::now()->format('F Y') . '%')->first();
        $totalHariAktif = $hariAktif->jumlah_hari;

        return view('pages.gaji.edit_gaji', [
            'asatidz' => $asatidz, 
            'gaji' => $gaji,
            'hari_aktif_bulan_ini' => $totalHariAktif
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
            'tunjangan_operasional' => 'nullable|numeric',
            'extra' => 'nullable|numeric',
            'kasbon' => 'nullable|numeric',
        ]);

        // Find the latest 'gaji' record for the given asatidz_id
        $gaji = GajiAsatidzBulanan::where('asatidz_id', $id)
            ->orderBy('tanggal', 'desc')
            ->firstOrFail();

        $gaji->update([
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan_jabatan' => $request->tunjangan_jabatan,
            'tunjangan_operasional' => $request->tunjangan_operasional,
            'extra' => $request->extra,
            'kasbon' => $request->kasbon,
        ]);

        return redirect()->route('gaji.asatidz.index')->with('success', 'Data gaji berhasil diperbarui.');
    }


    // public function export()
    // {
    //     $export = new ExportAsatidz();
    //     $fileName = 'Asatidz.xlsx';
    //     $filePath = storage_path('app/public/excel/' . $fileName);

    //     try {
    //         Excel::store($export, 'public/excel/' . $fileName);

    //         // Return a download response for the Excel file
    //         return response()->download($filePath, $fileName)->deleteFileAfterSend(true);
    //     } catch (Exception $e) {
    //         return redirect()->route('settings', ['error' => $e->getMessage()]);
    //     }
    // }

    // public function import(Request $request)
    // {
    //     $data = $request->file('file');
    //     $spreadsheet = IOFactory::load($data);
    //     $sheet = $spreadsheet->getActiveSheet();
    //     try {
    //         Excel::import(new ImportAsatidz($sheet), $data);
    //     } catch (Exception $e) {
    //         $message = str_replace(" ", "-", $e->getMessage());
    //         if (stristr($message, "Undefined-array-key") ==  true) {
    //             $message = str_replace("Undefined-array-key", "tidak-ada-coulumn", $message);
    //         }
    //         return redirect()->route('settings', ['error' => $message]);
    //     }

    //     return redirect()->back()->with('success', 'Data berhasil diimport!');
    // }
    // public function tempAsatidz()
    // {
    //     $filename = 'temp_asatidz.xlsx';
    //     $filePath = 'public/' . $filename;
    //     if (Storage::exists($filePath)) {
    //         $file = Storage::get($filePath);
    //         $mimeType = Storage::mimeType($filePath);

    //         $response = response($file, 200)
    //             ->header('Content-Type', $mimeType)
    //             ->header('Content-Disposition', "attachment; filename=$filename");

    //         return $response;
    //     }
    //     redirect()->back();
    // }
}



// namespace App\Http\Controllers\Asatidz;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// class GajiAsatidzController extends Controller
// {
//     //
//     public function index()
//     {
//         return view('pages.gaji.index');
//     }
// }
