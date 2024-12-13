<?php

namespace App\Http\Controllers\Santri;

use App\Exports\SantrisExport;
use App\Http\Controllers\Controller;
use App\Imports\SantrisImport;
use App\Models\Santri;
use App\Models\Tagihan\Bulanan as TagihanBulanan;
use App\Models\Tagihan\Pendaftaran as TagihanPendaftaran;
use App\Models\Tagihan\Seragam as TagihanSeragam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget(['biodata_santri_id', 'form_biodata_santri', 'form_address_santri', 'form_biodata_father', 'form_biodata_mother', 'form_document_santri']);
        confirmDelete('Hapus Kelas', 'Apakah Anda yakin?');
        return view('pages.santri.index', [
            'title' => 'Data Santri',
            'datas' => Santri::select('id', 'nama_lengkap', 'jenis_kelamin', 'nomor_telepon')->orderBy('nama_lengkap', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_biodata()
    {
        return view('pages.santri.create_biodata', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_address()
    {
        return view('pages.santri.create_address', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_biodata_father()
    {
        return view('pages.santri.create_biodata_father', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_biodata_mother()
    {
        return view('pages.santri.create_biodata_mother', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_document()
    {
        return view('pages.santri.create_document', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_payment()
    {
        return view('pages.santri.create_payment', [
            'title' => 'Tambah Data Santri'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_biodata(Request $request)
    {
        $validatedData  = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:santris,nik,' . session('biodata_santri_id'),
            'nomor_induk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required',
            'jenis_tempat_tinggal' => 'required',
            'anak_ke' => 'required',
            'abk' => 'required',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_telepon' => 'required|unique:santris,nomor_telepon,' . session('biodata_santri_id'),
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
            'nik.required' => 'NIK wajib di isi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nomor_induk.required' => 'Nomor Induk wajib di isi',
            'tempat_lahir.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi',
            'agama.required' => 'Agama wajib di isi',
            'jenis_tempat_tinggal.required' => 'Jenis Tempat Tinggal wajib di isi',
            'anak_ke.required' => 'Anak Ke wajib di isi',
            'abk.required' => 'Anak Berkebutuhan Khusus wajib di isi',
            'kewarganegaraan.required' => 'Jurusan wajib di isi',
            'nomor_telepon.required' => 'Nomor Telepon wajib di isi',
            'nomor_telepon.unique' => 'Nomor Telepon sudah terdaftar',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::create($validatedData);
            session(['biodata_santri_id' => $santri->id]);

            // Create tagihan
            TagihanPendaftaran::create([
                'status' => 'Belum Lunas',
                'santri_id' => $santri->id
            ]);
            TagihanSeragam::create([
                'status' => 'Belum Lunas',
                'santri_id' => $santri->id
            ]);
            TagihanBulanan::create([
                'status' => 'Belum Lunas',
                'date' => Carbon::now(),
                'santri_id' => $santri->id
            ]);
        }
        session(['form_biodata_santri' => $validatedData]);
        return redirect()->route('santri.create_address');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_address(Request $request)
    {
        $validatedData  = $request->validate([
            'alamat_lengkap_domisili' => 'required',
            'rt_domisili' => 'required',
            'rw_domisili' => 'required',
            'desa_domisili' => 'required',
            'kecamatan_domisili' => 'required',
            'kota_domisili' => 'required',
            'alamat_lengkap_kk' => 'required',
            'rt_kk' => 'required',
            'rw_kk' => 'required',
            'desa_kk' => 'required',
            'kecamatan_kk' => 'required',
            'kota_kk' => 'required',
        ], [
            'alamat_lengkap_domisili.required' => 'Alamat Lengkap wajib di isi',
            'rt_domisili.required' => 'RT wajib di isi',
            'rw_domisili.required' => 'RW wajib di isi',
            'desa_domisili.required' => 'Desa wajib di isi',
            'kecamatan_domisili.required' => 'Kecamatan wajib di isi',
            'kota_domisili.required' => 'Kabupaten / Kota wajib di isi',
            'alamat_lengkap_kk.required' => 'Alamat Lengkap wajib di isi',
            'rt_kk.required' => 'RT wajib di isi',
            'rw_kk.required' => 'RW wajib di isi',
            'desa_kk.required' => 'Desa wajib di isi',
            'kecamatan_kk.required' => 'Kecamatan wajib di isi',
            'kota_kk.required' => 'Kabupaten / Kota wajib di isi',
        ]);

        $validatedData['tanggal_masuk'] = now();

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::create($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_address_santri' => $validatedData]);
        return redirect()->route('santri.create_biodata_father');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store_biodata_father(Request $request)
    {
        $validatedData  = $request->validate([
            'nama_lengkap_ayah' => 'required',
            'nik_ayah' => 'required',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'status_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nomor_telepon_ayah' => 'required',
        ], [
            'nama_lengkap_ayah.required' => 'Nama Lengkap wajib di isi',
            'nik_ayah.required' => 'NIK wajib di isi',
            'tempat_lahir_ayah.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir_ayah.required' => 'Tanggal Lahir wajib di isi',
            'agama_ayah.required' => 'Agama wajib di isi',
            'status_ayah.required' => 'Status wajib di isi',
            'pekerjaan_ayah.required' => 'Pekerjaan wajib di isi',
            'penghasilan_ayah.required' => 'Penghasilan wajib di isi',
            'nomor_telepon_ayah.required' => 'Nomor Telepon wajib di isi',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::create($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_biodata_father' => $validatedData]);
        return redirect()->route('santri.create_biodata_mother');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store_biodata_mother(Request $request)
    {
        $validatedData  = $request->validate([
            'nama_lengkap_ibu' => 'required',
            'nik_ibu' => 'required',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'status_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'nomor_telepon_ibu' => 'required',
        ], [
            'nama_lengkap_ibu.required' => 'Nama Lengkap wajib di isi',
            'nik_ibu.required' => 'NIK wajib di isi',
            'tempat_lahir_ibu.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir_ibu.required' => 'Tanggal Lahir wajib di isi',
            'agama_ibu.required' => 'Agama wajib di isi',
            'status_ibu.required' => 'Status wajib di isi',
            'pekerjaan_ibu.required' => 'Pekerjaan wajib di isi',
            'penghasilan_ibu.required' => 'Penghasilan wajib di isi',
            'nomor_telepon_ibu.required' => 'Nomor Telepon wajib di isi',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::create($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_biodata_mother' => $validatedData]);
        return redirect()->route('santri.create_document');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store_document(Request $request)
    {
        // Validasi input dan upload gambar
        $validatedDocument  = $request->validate([
            'foto_santri' => 'required|mimes:jpg,png,jpeg|max:3072',
            'kk_santri' => 'required|mimes:jpg,png,jpeg|max:3072',
        ], [
            'foto_santri.required' => 'Foto wajib diisi',
            'kk_santri.required' => 'Foto Kartu Keluarga wajib diisi',
            'foto_santri.image' => 'Foto harus berupa gambar',
            'kk_santri.image' => 'Kartu Keluarga harus berupa gambar',
            'foto_santri.mimes' => 'Foto harus memiliki ekstensi jpg, jpeg, atau png',
            'kk_santri.mimes' => 'Kartu Keluarga harus memiliki ekstensi jpg, jpeg, atau png',
            'foto_santri.max' => 'Foto tidak boleh lebih dari 3 MB',
            'kk_santri.max' => 'Kartu Keluarga tidak boleh lebih dari 3 MB',
        ]);

        $fotoAsatidzPath = $request->file('foto_santri')->store('images/foto_santri', 'public');
        $kkAsatidzPath = $request->file('kk_santri')->store('images/kk_santri', 'public');

        $validatedDocument['foto_santri'] = $fotoAsatidzPath;
        $validatedDocument['kk_santri'] = $kkAsatidzPath;

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedDocument);
        } else {

            $santri = Santri::create($validatedDocument);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_document_santri' => $validatedDocument]);
        return redirect()->route('santri.payment');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.santri.show', [
            'title' => 'Detail Data Santri',
            'data' => Santri::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_biodata(string $id)
    {
        $data = Santri::find($id);
        return view('pages.santri.edit_biodata', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit_address(string $id)
    {
        $data = Santri::find($id);
        return view('pages.santri.edit_address', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_biodata_father(string $id)
    {
        $data = Santri::find($id);
        return view('pages.santri.edit_biodata_father', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_biodata_mother(string $id)
    {
        $data = Santri::find($id);
        return view('pages.santri.edit_biodata_mother', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_document(string $id)
    {
        $data = Santri::find($id);
        return view('pages.santri.edit_document', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_biodata(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'nomor_induk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required',
            'jenis_tempat_tinggal' => 'required',
            'anak_ke' => 'required',
            'abk' => 'required',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_telepon' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
            'nik.required' => 'NIK wajib di isi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nomor_induk.required' => 'Nomor Induk wajib di isi',
            'tempat_lahir.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi',
            'agama.required' => 'Agama wajib di isi',
            'jenis_tempat_tinggal.required' => 'Jenis Tempat Tinggal wajib di isi',
            'anak_ke.required' => 'Anak Ke wajib di isi',
            'abk.required' => 'Anak Berkebutuhan Khusus wajib di isi',
            'kewarganegaraan.required' => 'Jurusan wajib di isi',
            'nomor_telepon.required' => 'Nomor Telepon wajib di isi',
            'nomor_telepon.unique' => 'Nomor Telepon sudah terdaftar',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::find($id);
            $santri->update($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_biodata_santri' => $validatedData]);
        return redirect()->route('santri.edit_address', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_address(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'alamat_lengkap_domisili' => 'required',
            'rt_domisili' => 'required',
            'rw_domisili' => 'required',
            'desa_domisili' => 'required',
            'kecamatan_domisili' => 'required',
            'kota_domisili' => 'required',
            'alamat_lengkap_kk' => 'required',
            'rt_kk' => 'required',
            'rw_kk' => 'required',
            'desa_kk' => 'required',
            'kecamatan_kk' => 'required',
            'kota_kk' => 'required',
        ], [
            'alamat_lengkap_domisili.required' => 'Alamat Lengkap wajib di isi',
            'rt_domisili.required' => 'RT wajib di isi',
            'rw_domisili.required' => 'RW wajib di isi',
            'desa_domisili.required' => 'Desa wajib di isi',
            'kecamatan_domisili.required' => 'Kecamatan wajib di isi',
            'kota_domisili.required' => 'Kabupaten / Kota wajib di isi',
            'alamat_lengkap_kk.required' => 'Alamat Lengkap wajib di isi',
            'rt_kk.required' => 'RT wajib di isi',
            'rw_kk.required' => 'RW wajib di isi',
            'desa_kk.required' => 'Desa wajib di isi',
            'kecamatan_kk.required' => 'Kecamatan wajib di isi',
            'kota_kk.required' => 'Kabupaten / Kota wajib di isi',
        ]);

        $validatedData['tanggal_masuk'] = now();

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::find($id);
            $santri->update($validatedData);

            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_address_santri' => $validatedData]);
        return redirect()->route('santri.edit_biodata_father', ['id' => $id]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_biodata_father(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'nama_lengkap_ayah' => 'required',
            'nik_ayah' => 'required',
            'tempat_lahir_ayah' => 'required',
            'tanggal_lahir_ayah' => 'required',
            'agama_ayah' => 'required',
            'status_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nomor_telepon_ayah' => 'required',
        ], [
            'nama_lengkap_ayah.required' => 'Nama Lengkap wajib di isi',
            'nik_ayah.required' => 'NIK wajib di isi',
            'tempat_lahir_ayah.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir_ayah.required' => 'Tanggal Lahir wajib di isi',
            'agama_ayah.required' => 'Agama wajib di isi',
            'status_ayah.required' => 'Status wajib di isi',
            'pekerjaan_ayah.required' => 'Pekerjaan wajib di isi',
            'penghasilan_ayah.required' => 'Penghasilan wajib di isi',
            'nomor_telepon_ayah.required' => 'Nomor Telepon wajib di isi',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::find($id);
            $santri->update($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_biodata_father' => $validatedData]);
        return redirect()->route('santri.edit_biodata_mother', ['id' => $id]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_biodata_mother(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'nama_lengkap_ibu' => 'required',
            'nik_ibu' => 'required',
            'tempat_lahir_ibu' => 'required',
            'tanggal_lahir_ibu' => 'required',
            'agama_ibu' => 'required',
            'status_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'nomor_telepon_ibu' => 'required',
        ], [
            'nama_lengkap_ibu.required' => 'Nama Lengkap wajib di isi',
            'nik_ibu.required' => 'NIK wajib di isi',
            'tempat_lahir_ibu.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir_ibu.required' => 'Tanggal Lahir wajib di isi',
            'agama_ibu.required' => 'Agama wajib di isi',
            'status_ibu.required' => 'Status wajib di isi',
            'pekerjaan_ibu.required' => 'Pekerjaan wajib di isi',
            'penghasilan_ibu.required' => 'Penghasilan wajib di isi',
            'nomor_telepon_ibu.required' => 'Nomor Telepon wajib di isi',
        ]);

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $santri = Santri::find($id);
            $santri->update($validatedData);
            session(['biodata_santri_id' => $santri->id]);
        }
        session(['form_biodata_mother' => $validatedData]);
        return redirect()->route('santri.edit_document', ['id' => $id]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_document(Request $request, string $id)
    {

        // Validasi input
        $validatedDocument = $request->validate([
            'foto_santri' => 'nullable|mimes:jpg,png,jpeg|max:3072',
            'kk_santri' => 'nullable|mimes:jpg,png,jpeg|max:3072',
        ], [
            'foto_santri.mimes' => 'Foto Santri harus memiliki ekstensi jpg, jpeg, atau png',
            'kk_santri.mimes' => 'Kartu Keluarga harus memiliki ekstensi jpg, jpeg, atau png',
            'foto_santri.max' => 'Foto Santri tidak boleh lebih dari 3 MB',
            'kk_santri.max' => 'Kartu Keluarga tidak boleh lebih dari 3 MB',
        ]);

        // Ambil data asatidz berdasarkan ID
        $santri = Santri::findOrFail($id);

        // Pengolahan foto_santri
        if ($request->hasFile('foto_santri')) {
            // Hapus file lama jika ada
            if ($santri->foto_santri && Storage::disk('public')->exists($santri->foto_santri)) {
                Storage::disk('public')->delete($santri->foto_santri);
            }

            // Upload file baru
            $fotoSantriPath = $request->file('foto_santri')->store('images/foto_santri', 'public');
            $validatedDocument['foto_santri'] = $fotoSantriPath;
        } else {
            // Gunakan file lama jika tidak ada file baru
            $validatedDocument['foto_santri'] = $santri->foto_santri;
        }

        // Pengolahan kk_santri
        if ($request->hasFile('kk_santri')) {
            // Hapus file lama jika ada
            if ($santri->kk_santri && Storage::disk('public')->exists($santri->kk_santri)) {
                Storage::disk('public')->delete($santri->kk_santri);
            }

            // Upload file baru
            $kkSantriPath = $request->file('kk_santri')->store('images/kk_santri', 'public');
            $validatedDocument['kk_santri'] = $kkSantriPath;
        } else {
            // Gunakan file lama jika tidak ada file baru
            $validatedDocument['kk_santri'] = $santri->kk_santriz;
        }

        // Update data asatidz
        $santri->update($validatedDocument);

        // Bersihkan session setelah selesai
        session()->forget(['biodata_santri_id', 'form_biodata_santri', 'form_address_santri', 'form_biodata_father', 'form_biodata_mother', 'form_document_santri']);


        return redirect()->route('santri')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $santri = Santri::find($id);

        if (!$santri) {
            return redirect()->route('santri')->with('error', 'santri tidak ditemukan!');
        }
        if ($santri->foto_santri && Storage::disk('public')->exists($santri->foto_santri)) {
            Storage::disk('public')->delete($santri->foto_santri);
        }

        if ($santri->kk_santri && Storage::disk('public')->exists($santri->kk_santri)) {
            Storage::disk('public')->delete($santri->kk_santri);
        }
        $santri->delete();
        return redirect()->route('santri')->with('success', 'Data Santri berhasil dihapus!');
    }


    public function export()
    {
        return Excel::download(new SantrisExport, 'santris.xlsx');
    }

    public function donwload_template()
    {
        return view('pages.import.import_santri', [
            'title' => 'Template Import  Santri',

        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ], [
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'File wajib bertipe xlsx, xls, csv',
            'file.max' => 'File maksimal 2 mb',
        ]);

        if (!$request->hasFile('file')) {
            return back()->withErrors(['file' => 'File tidak ditemukan, pastikan Anda memilih file untuk diunggah.']);
        }

        $file = $request->file('file');

        if (!$file->isValid()) {
            return back()->withErrors(['file' => 'File tidak valid atau rusak.']);
        }

        try {
            Excel::import(new SantrisImport, $file);
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Terjadi kesalahan saat mengimpor file: ' . $e->getMessage()]);
        }

        return redirect('/santri')->with('success', 'Berhasil import data santri');
    }
}
