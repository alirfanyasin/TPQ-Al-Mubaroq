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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TagihanSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Santri::with(['tagihanPendaftaran', 'tagihanSeragam', 'tagihanBulanan' => function ($query) {
            $query->orderBy('date', 'asc');
        }])->get();

        foreach ($data as $santri) {
            $tagihanBulanIni = $santri->tagihanBulanan()->where('status', 'Belum Lunas')
                ->whereMonth('date', Carbon::now()->month)
                ->whereYear('date', Carbon::now()->year)
                ->first();
            $santri->tagihanBulanIni = $tagihanBulanIni;
        }
        return view('pages.tagihan.index', [
            'title' => 'Tagihan Santri',
            'datas' => $data
        ]);
    }

    public function pembayaran(string $id, string $nama_lengkap)
    {
        $data = Tagihan::find(1);
        $tagihanSantri = Santri::find($id);
        $tagihanBulananSantri = Santri::find($id)->tagihanBulanan()
            ->orderBy('date', 'desc')
            ->first();

        return view('pages.tagihan.pembayaran', [
            'title' => 'Pembayaran Santri ' . $nama_lengkap,
            'data' => $data,
            'tagihanSantri' => $tagihanSantri,
            'tagihanBulananSantri' => $tagihanBulananSantri
        ]);
    }

    public function store_pembayaran(Request $request, string $id)
    {
        $tagihan = Tagihan::find(1);
        $dataPendaftaran = Pendaftaran::where('santri_id', $id)->first();
        $dataSeragam = Seragam::where('santri_id', $id)->first();
        $dataBulanan = Bulanan::where('santri_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();;

        $updateTagihan = function ($data, $bayar, $totalTagihan, $santriId) {
            if ($data) {
                $data->update([
                    'bayar' => $bayar,
                    'status' => $bayar >= $totalTagihan ? 'Lunas' : 'Belum Lunas'
                ]);

                // Tambahkan tagihan bulan berikutnya
                if ($bayar >= $totalTagihan && $data instanceof Bulanan) {
                    Bulanan::create([
                        'date' => Carbon::parse($data->date)->addMonth(),
                        'santri_id' => $santriId,
                        'bayar' => 0,
                        'status' => 'Belum Lunas'
                    ]);
                }
            }
        };

        $updateTagihan($dataPendaftaran, $request->tagihan_pendaftaran, $tagihan->tagihan_pendaftaran, $id);
        $updateTagihan($dataSeragam, $request->tagihan_seragam, $tagihan->tagihan_biaya_seragam, $id);
        $updateTagihan($dataBulanan, $request->tagihan_bulanan, $tagihan->tagihan_bulanan, $id);

        return redirect()->route('tagihan.index');
    }



    public function bulk_tagihan_bulanan()
    {
        $dataTagihanBulanan = Bulanan::where('status', 'Belum Lunas')->get();
        $tagihanSantri = Tagihan::find(1);
        $tagihanBulananValue = $tagihanSantri ? $tagihanSantri->tagihan_bulanan : 0;
        return view('pages.tagihan.bulk_tagihan_bulanan', [
            'title' => 'Bulk Tagihan Bulanan',
            'datas' => $dataTagihanBulanan,
            'tagihanSantri' => $tagihanBulananValue
        ]);
    }


    public function bulk_tagihan_bulanan_action(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tagihan.*' => 'nullable|numeric',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            foreach ($validatedData['tagihan'] as $id => $amount) {
                $dataTagihan = Bulanan::find($id);

                if (!$dataTagihan) {
                    throw new \Exception("Data tagihan dengan ID {$id} tidak ditemukan.");
                }

                $tagihanSantri = Tagihan::find(1);


                if ($amount >= $tagihanSantri->tagihan_bulanan) {
                    $dataTagihan->update([
                        'bayar' => $amount,
                        'status' => 'Lunas'
                    ]);
                } else {
                    $dataTagihan->update([
                        'bayar' => $amount,
                        'status' => 'Belum Lunas'
                    ]);
                }



                $nextMonthDate = Carbon::parse($dataTagihan->date)->addMonth();
                $existingNextMonthTagihan = Bulanan::where('santri_id', $dataTagihan->santri_id)
                    ->where('date', $nextMonthDate->format('Y-m-d'))
                    ->exists();

                if (!$existingNextMonthTagihan) {
                    Bulanan::create([
                        'date' => $nextMonthDate,
                        'santri_id' => $dataTagihan->santri_id,
                        'bayar' => 0,
                        'status' => 'Belum Lunas',
                    ]);
                }
            }

            // Commit transaksi jika semua operasi berhasil
            DB::commit();

            // Tampilkan pesan sukses
            Alert::success('Berhasil', 'Tagihan berhasil disimpan');
            return redirect()->route('tagihan.index');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Tampilkan pesan error
            Alert::error('Gagal', 'Tagihan gagal disimpan');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function history_tagihan_bulanan(Request $request)
    {
        $bulan = $request->input('bulan');

        // Jika bulan tidak dipilih atau dipilih "Semua", ambil semua data
        if ($bulan === 'Semua' || !$bulan) {
            $dataTagihanBulanan = Bulanan::orderBy('date', 'asc')->get();
        } else {
            // Filter berdasarkan bulan
            $dataTagihanBulanan = Bulanan::whereMonth('date', $bulan)
                ->orderBy('date', 'asc')
                ->get();
        }

        return view('pages.tagihan.history_bulanan', [
            'title' => 'History Tagihan Bulanan',
            'datas' => $dataTagihanBulanan,
            'bulan' => $bulan, // Untuk menampilkan bulan yang dipilih
        ]);
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

}
