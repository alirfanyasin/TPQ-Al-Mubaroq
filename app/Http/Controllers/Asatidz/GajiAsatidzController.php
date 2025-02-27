<?php

namespace App\Http\Controllers\Asatidz;

use Exception;
use Carbon\Carbon;
use App\Models\absensi;
use App\Models\Asatidz;
use App\Models\HariAktif;
use App\Exports\GajiExport;
use App\Imports\GajiImport;
use App\Models\GajiAsatidz;
use Illuminate\Http\Request;
use App\Exports\ExportAsatidz;
use App\Imports\ImportAsatidz;
use App\Models\AbsensiHistory;
use App\Models\GajiAsatidzBulanan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;


class GajiAsatidzController extends Controller
{
    public function gaji_month()
    {
        $asatidz = Asatidz::all();
        $setting = GajiAsatidz::first();
        $jabatan = [
            'Pembina' => 75000,
            'Kepala TPQ' => 50000,
            'Sekretaris' => 25000,
            'Bendahara' => 25000,
            'Admin' => 25000,
            'Pengajar' => 25000,
        ];
        $operasional = [
            225000,
            125000,
            100000,
            75000,
            50000,
            50000,
            125000,
            125000,
            75000,
            100000,
            100000,
            75000,
            25000,
        ];
        $i = 0;
        foreach ($asatidz as $asatid) {
            $gaji_pokok = 0;
            if ($asatid->status == 'Magang') {
                $gaji_pokok = $setting->gaji_magang;
            } else {
                $gaji_pokok = $setting->gaji_tetap;
            }
            $gaji_bruto = $gaji_pokok + ($asatid->status == 'Magang' ? 0 : $jabatan[$asatid->jabatan]) + ($asatid->status == 'Tetap' ? $operasional[$i] : 0);
            GajiAsatidzBulanan::factory()->create([
                'asatidz_id' => $asatid->id,
                'gaji_pokok' => $gaji_pokok,
                'tunjangan_jabatan' => $jabatan[$asatid->jabatan],
                'tunjangan_operasional' => ($asatid->status == 'Tetap' ? $operasional[$i] : 0),
                'kenaikan' => ($asatid->status == 'Magang' ? 0 : 25000),
                'gaji_bruto' => $gaji_bruto,
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $i++;
        }
    }

    public function checkDuplicate(Request $request)
    {
        $id = $request->input('asatidz_id');

        // Query the database for duplicate records
        $exists = Asatidz::where('asatidz_id', $id)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function index(Request $request)
    {
        $asatidzs = Asatidz::with('gaji', 'absensi')->orderBy('nama_lengkap', 'ASC')->get();
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
    

    // public function show(Request $id)
    // {
    //     $npa = $id->input('asatidz_id');
    //     $asatidz = Asatidz::where('asatidz_id', $npa)->first();
    //     $ttl = $asatidz->tanggal_lahir;
    //     $umur = Carbon::parse($ttl)->age;
    //     $bulan_ini = GajiAsatidzBulanan::where('asatidz_id', $npa)->where('tanggal', 'LIKE', Carbon::now()->format('Y-m').'%')->first();
    //     $totalSesi = absensi::where('asatidz_id', $npa)->whereMonth('created_at', Carbon::now()->month)->sum('jumlah_sesi');
    //     return view('asatidz.detail_asatidz', ['asatidz' => $asatidz, 'umur' => $umur, 'bulan_ini' => $bulan_ini, 'totalSesi' => $totalSesi]);
    // }

    public function edit(Request $request, $id)
    {
        // Ambil bulan yang difilter dari request atau gunakan default bulan ini
        $bulanFilter = $request->input('bulan', Carbon::now()->format('Y m'));

        $months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        
        // Pastikan data hari aktif tersedia
        $bulanFilterParts = explode(' ', $bulanFilter);
        // dd($bulanFilter);
        $bulanName = $bulanFilterParts[0];
        $tahun = $bulanFilterParts[1];
        $bulanIndex = array_search($bulanName, $months) + 1;
        $formattedBulanFilter = Carbon::createFromDate($tahun, $bulanIndex, 1)->format('F Y');

        // Ambil data asatidz
        $asatidz = Asatidz::with(['gaji' => function ($query) use ($formattedBulanFilter) {
            $query->whereYear('tanggal', Carbon::createFromFormat('F Y', $formattedBulanFilter)->year)
                  ->whereMonth('tanggal', Carbon::createFromFormat('F Y', $formattedBulanFilter)->month)
                  ->orderBy('tanggal', 'desc'); // Ambil data gaji berdasarkan bulan
        }])->findOrFail($id);

        // Ambil data gaji bulan yang dipilih
        $gaji = $asatidz->gaji->first(); // Ambil gaji terbaru sesuai filter

        $hariAktif = HariAktif::where('bulan_tahun', 'like', '%' . $formattedBulanFilter . '%')->first();
        $totalHariAktif = $hariAktif ? $hariAktif->jumlah_hari : 0;
    
        return view('pages.gaji.edit_gaji', [
            'asatidz' => $asatidz,
            'gaji' => $gaji,
            'hari_aktif_bulan_ini' => $totalHariAktif,
            'bulanFilter' => $bulanFilter
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

        // Ambil bulan yang difilter dari request atau gunakan default bulan ini
        $bulanFilter = $request->bulan_filter;
        $bulanFilterParts = explode(' ', $bulanFilter);
        $bulanName = $bulanFilterParts[0];
        $tahun = $bulanFilterParts[1];
        $months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        $bulanIndex = array_search($bulanName, $months) + 1;

        // Update data gaji asatidz
        $gaji = GajiAsatidzBulanan::where('asatidz_id', $id)
            ->whereYear('tanggal', $tahun)
            ->whereMonth('tanggal', $bulanIndex)
            ->firstOrFail();

        $gaji->update([
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan_jabatan' => $request->tunjangan_jabatan,
            'tunjangan_operasional' => $request->tunjangan_operasional,
            'extra' => $request->extra,
            'kasbon' => $request->kasbon,
            'gaji_bruto' => $request->gaji_pokok + $request->tunjangan_jabatan + $request->tunjangan_operasional,
        ]);

        return redirect()->route('gaji.asatidz.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function export()
    {
        return Excel::download(new GajiExport, 'gaji.xlsx');
    }

    public function donwload_template()
    {
        return view('pages.import.import_gaji', [
            'title' => 'Template Import Gaji Asatidz'
        ]);
    }


    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    //     ], [
    //         'file.required' => 'File wajib diisi',
    //         'file.mimes' => 'File wajib bertipe xlsx, xls, csv',
    //         'file.max' => 'File maksimal 2 mb',
    //     ]);

    //     if (!$request->hasFile('file')) {
    //         return back()->withErrors(['file' => 'File tidak ditemukan, pastikan Anda memilih file untuk diunggah.']);
    //     }

    //     $file = $request->file('file');

    //     if (!$file->isValid()) {
    //         return back()->withErrors(['file' => 'File tidak valid atau rusak.']);
    //     }

    //     try {
    //         Excel::import(new GajiImport, $file);
    //     } catch (\Exception $e) {
    //         return back()->withErrors(['file' => 'Terjadi kesalahan saat mengimpor file: ' . $e->getMessage()]);
    //     }

    //     return redirect('/asatidz')->with('success', 'Berhasil import data asatidz');
    // }
    
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

    public function import(Request $request)
    {
        try {
            $data = $request->file('file');
            $spreadsheet = IOFactory::load($data);
            $sheet = $spreadsheet->getActiveSheet();
            Excel::import(new GajiImport($sheet), $data);
        } catch (Exception $e) {
            $message = str_replace(" ", "-", $e->getMessage());
            if (stristr($message, "Undefined-array-key") ==  true) {
                $message = str_replace("Undefined-array-key", "tidak-ada-coulumn", $message);
            }
            dd($message);
            return redirect()->route('settings', ['error' => $message]);
        }

        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }

    public function tempGaji()
    {
        $filename = 'template_penggajian.xlsx';
        $filePath = storage_path('app/public/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
        
        return redirect()->back()->with('error', 'File not found.');
    }
}
