<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget(['biodata_santri_id', 'form_biodata_santri', 'form_address_santri', 'form_biodata_father', 'form_biodata_mother', 'form_document_ssntri']);
        return view('pages.santri.index', [
            'title' => 'Data Santri'
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
            $asatidz = Santri::create($validatedData);
            session(['biodata_santri_id' => $asatidz->id]);
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

        if (session()->has('biodata_santri_id')) {
            Santri::where('id', session('biodata_santri_id'))->update($validatedData);
        } else {
            $asatidz = Santri::create($validatedData);
            session(['biodata_santri_id' => $asatidz->id]);
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
            $asatidz = Santri::create($validatedData);
            session(['biodata_santri_id' => $asatidz->id]);
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
            $asatidz = Santri::create($validatedData);
            session(['biodata_santri_id' => $asatidz->id]);
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

            $asatidz = Santri::create($validatedDocument);
            session(['biodata_santri_id' => $asatidz->id]);
        }
        session(['form_document_ssntri' => $validatedDocument]);
        return redirect()->route('asatidz');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.santri.show', [
            'title' => 'Detail Data Santri'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
