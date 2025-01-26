<?php

namespace App\Http\Controllers\Asatidz;

use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Asatidz;
use App\Models\HariAktif;
use Illuminate\Http\Request;
use App\Models\AbsensiHistory;
use App\Models\GajiAsatidzBulanan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $date = Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM YYYY');

        $absensis = AbsensiHistory::with('absensi');

        // bulan
        $months = array(
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        );

        // Buat array bulan
        $bulanArray = $absensis->get()
            ->map(function ($x) use ($months) {
                $date_parts = explode(" ", $x->tanggal);

                // Ambil bulan dan tahun
                $bulan = array_search($date_parts[2], $months) + 1;
                $tahun = $date_parts[3];

                return $months[$bulan - 1] . ' ' . $tahun;
            })
            ->unique()
            ->values()
            ->toArray();
        
        // Filter berdasarkan bulan
        if ($request->bulan != "Semua") {
            $selectedBulanTahun = $request->bulan;
            $absensis = $absensis->where('tanggal', 'LIKE', '%' . $selectedBulanTahun . '%');
        }
        else {
            $absensis = AbsensiHistory::with('absensi');
        }

        $absensis = $absensis->get();

        // Check if there is any AbsensiHistory for the selected bulan_tahun
        $absensiHistory = $absensis->where('tanggal', $date)->first();


        return view('pages.asatidz.absensi', [
            'absensi' => $absensis,
            'date' => $date,
            'absensiHistory' => $absensiHistory ? true : false,
            'bulan' => $bulanArray,
        ]);
    }

    public function create()
    {
        $absensi = Asatidz::with('absensi')->get();
        $date = Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM YYYY');

        // is there any absensi history for today?
        $absensiHistory = AbsensiHistory::where('tanggal', $date)->first();

        if ($absensiHistory) {
            return redirect()->route('absensi.edit', ['id' => $absensiHistory->id]);
        }

        return view('pages.asatidz.input_absensi', ['absensi' => $absensi, 'date' => $date, 'absensiHistory' => $absensiHistory]);
    }

    public function store(Request $request)
    {
        //total hari aktif bulan ini
        $hariAktif = HariAktif::where('bulan_tahun', 'like', '%' . Carbon::now()->format('F Y') . '%')->first();
        $totalHariAktif = $hariAktif->jumlah_hari;

        $absensiData = $request->input('absensi');
        $date = Carbon::now()->locale('id_ID')->isoFormat('dddd, D MMMM YYYY');
        $dateObject = Carbon::now()->format('Y-m');
        $totalMasuk = 0;
        $totalTidakMasuk = 0;
        $jumlahSesi = 0;
        $absensiRecords = [];

        foreach ($absensiData as $userId => $data) {
            $user_id = $userId;
            $jumlah_sesi = $data['jumlah_sesi'];
            $jumlahSesi += $jumlah_sesi;
            $status = $data['status'];

            $absensiRecord = [
                'id' => null,
                'asatidz_id' => $user_id,
                'jumlah_masuk' => 0,
                'jumlah_tidak' => 0,
            ];

            if ($status == 'masuk') {
                $totalMasuk++;
                $absensiRecord['jumlah_masuk'] = 1;
                $absensiRecord['jumlah_sesi'] = $jumlah_sesi;
            } else if ($status == 'tidak_masuk') {
                $totalTidakMasuk++;
                $absensiRecord['jumlah_tidak'] = 1;
                $absensiRecord['jumlah_sesi'] = 0;
            }

            $absensiRecords[] = $absensiRecord;
        }

        $historyData = [
            'tanggal' => $date,
            'jumlah_masuk' => $totalMasuk,
            'jumlah_tidak' => $totalTidakMasuk,
            'jumlah_sesi' => $jumlahSesi,
        ];

        $history = AbsensiHistory::create($historyData);
        $history->absensi()->createMany($absensiRecords);

        $bulan = Carbon::now()->locale('id_ID')->isoFormat('MMMM YYYY');
        $historys = AbsensiHistory::where('tanggal', 'LIKE', '%' . $bulan)->get();
        $absen = [];

        foreach ($historys as $history) {
            $absensiData = Absensi::where('absensi_history_id', $history->id)->get();

            foreach ($absensiData as $absensi) {
                $npa = $absensi->asatidz_id;
                $jumlahSesiNpa = $absensi->jumlah_sesi;

                if (!isset($absen[$npa])) {
                    $absen[$npa] = 0;
                }
                $penggajian = GajiAsatidzBulanan::where('asatidz_id', $absensi->asatidz_id)->whereRaw("SUBSTRING(tanggal, 1, 7) = ?", [$dateObject])->first();
                $penggajian->jumlah_hari_efektif += $jumlahSesiNpa;
                $penggajian->lembur = ($penggajian->jumlah_hari_efektif > $totalHariAktif ? $penggajian->jumlah_hari_efektif - $totalHariAktif : 0);
                $penggajian->save();
            }
        }
        return redirect()->route('absensi.index');
    }

    public function edit()
    {
        $absensiHistory = AbsensiHistory::with('absensi')->find(request()->input('id'));
        $absensiData = Absensi::where('absensi_history_id', $absensiHistory->id)->get();

        return view('pages.asatidz.edit_absensi', ['absensiH' => $absensiHistory, 'absensi' => $absensiData, 'date' => $absensiHistory->tanggal]);
    }
    

    public function update(Request $request, $id)
    {
        //total hari aktif
        $hariAktif = HariAktif::where('bulan_tahun', 'like', '%' . Carbon::now()->format('F Y') . '%')->first();
        $totalHariAktif = $hariAktif->jumlah_hari;

        $absensiData = $request->input('absensi');
        $tanggalParts = explode(" ", $request->input('tanggal'));

        $dateString = $tanggalParts[2] . ' ' . $tanggalParts[3];
        $translatedDate = $this->translateMonth($dateString);
        $date0bject = Carbon::createFromFormat('M Y', $translatedDate);
        $dateObject = $date0bject->format('Y-m');
        $bulanTahun = $tanggalParts[2] . " " . $tanggalParts[3];
        $totalMasuk = 0;
        $totalTidakMasuk = 0;
        $jumlahSesi = 0;
        $absensiRecords = [];

        foreach ($absensiData as $userId => $data) {
            $user_id = $userId;
            $jumlah_sesi = $data['jumlah_sesi'];
            $jumlahSesi += $jumlah_sesi;
            $status = $data['status'];

            $absensiRecord = [
                'npa' => $user_id,
                'jumlah_masuk' => 0,
                'jumlah_tidak' => 0,
                'jumlah_sesi' => 0,
            ];

            if ($status == 'masuk') {
                $totalMasuk++;
                $absensiRecord['jumlah_masuk'] = 1;
                $absensiRecord['jumlah_sesi'] = $jumlah_sesi;
            } else if ($status == 'tidak_masuk') {
                $totalTidakMasuk++;
                $absensiRecord['jumlah_tidak'] = 1;
            }

            $absensiRecords[] = $absensiRecord;
        }

        $historyData = [
            'jumlah_masuk' => $totalMasuk,
            'jumlah_tidak' => $totalTidakMasuk,
            'jumlah_sesi' => $jumlahSesi,
        ];

        // Assuming you have retrieved the AbsensiHistory record you want to update.
        $history = AbsensiHistory::findOrFail($id);
        $history->update($historyData);

        foreach ($absensiRecords as $absensiRecord) {
            $npa = $absensiRecord['npa'];
            $absensiData = [
                'jumlah_masuk' => $absensiRecord['jumlah_masuk'],
                'jumlah_tidak' => $absensiRecord['jumlah_tidak'],
                'jumlah_sesi' => $absensiRecord['jumlah_sesi'],
            ];

            // select from absensi where id = $id and npa = $npa
            if (absensi::where('absensi_history_id', $id)->where('asatidz_id', $npa)->exists()) {
                absensi::where('absensi_history_id', $id)->where('asatidz_id', $npa)->update($absensiData);
            }
        }

        $historys = AbsensiHistory::where('tanggal', 'LIKE', '%' . $bulanTahun)->get();
        $absen = [];

        foreach ($historys as $history) {
            $absensiData = Absensi::where('absensi_history_id', $history->id)->get();

            foreach ($absensiData as $absensi) {
                $npa = $absensi->asatidz_id;
                $jumlahSesiNpa = $absensi->jumlah_sesi;

                if (!isset($absen[$npa])) {
                    $absen[$npa] = 0;
                }

                // Accumulate the jumlah_sesi for each npa
                $absen[$npa] += $jumlahSesiNpa;
            }
        }

        // Now update the penggajian records based on the accumulated values
        foreach ($absen as $npa => $totalSesi) {
            $penggajian = GajiAsatidzBulanan::where('asatidz_id', $npa)->whereRaw("SUBSTRING(tanggal, 1, 7) = ?", [$dateObject])->first();
            $penggajian->jumlah_hari_efektif = $totalSesi;
            // You need to define this variable
            $penggajian->lembur = ($penggajian->jumlah_hari_efektif > $totalHariAktif) ? ($penggajian->jumlah_hari_efektif - $totalHariAktif) : 0;

            $penggajian->save();
        }

        return redirect()->route('absensi.index');
    }

    public function translateMonth($dateString)
    {
        $indonesianMonths = array(
            'januari', 'februari', 'maret', 'april', 'mei', 'juni',
            'juli', 'agustus', 'september', 'oktober', 'november', 'desember'
        );

        $englishMonths = array(
            'january', 'february', 'march', 'april', 'may', 'june',
            'july', 'august', 'september', 'october', 'november', 'december'
        );

        $translatedString = str_ireplace($indonesianMonths, $englishMonths, $dateString);

        return $translatedString;
    }

    public function get_month(Request $request)
    {
        $bulan = Carbon::createFromFormat('Y-m', $request->input('month'))->format('m-Y');
        $absensis = absensi::with('asatidzModel')->get();

        foreach ($absensis as $absensi) {
            $bulanData = Carbon::parse($absensi->tanggal)->format('m-Y');
        }

        if (request()->ajax()) {
            return response()->json(['absensi' => $bulanData]);;
        }
        return view('asatidz.absensi', ['absensi' => $absensis]);
    }
}
