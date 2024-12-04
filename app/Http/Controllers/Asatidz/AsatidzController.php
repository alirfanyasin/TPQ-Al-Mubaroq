<?php

namespace App\Http\Controllers\Asatidz;

use App\Http\Controllers\Controller;
use App\Jobs\CreateNewUserAfter;
use App\Models\Asatidz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AsatidzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget(['biodata_asatid_id', 'form_biodata', 'form_address', 'form_document']);
        return view('pages.asatidz.index', [
            'title' => 'Data Asatidz',
            'datas' => Asatidz::select('id', 'nama_lengkap', 'jenis_kelamin', 'nomor_telepon', 'status')->get(),
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function account()
    {
        $data = Asatidz::all();
        return view('pages.asatidz.account', [
            'title' => 'Akun Asatidz',
            'datas' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_biodata()
    {
        return view('pages.asatidz.asatidz_create_biodata', [
            'title' => 'Data Asatidz'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_address()
    {
        return view('pages.asatidz.asatidz_create_address', [
            'title' => 'Data Asatidz'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_document()
    {
        return view('pages.asatidz.asatidz_create_document', [
            'title' => 'Data Asatidz'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_biodata(Request $request)
    {
        $validatedData  = $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:asatidzs,nik,' . session('biodata_asatid_id'),
            'nomor_pokok_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'pendidikan_terakhir' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|digits:4',
            'nomor_kk' => 'required|unique:asatidzs,nomor_kk,' . session('biodata_asatid_id'),
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_jamsos' => 'required',
            'nomor_rekening' => 'required|unique:asatidzs,nomor_rekening,' . session('biodata_asatid_id'),
            'status' => 'required|in:Tetap,Magang',
            'nomor_telepon' => 'required|unique:asatidzs,nomor_telepon,' . session('biodata_asatid_id'),
            'nama_ibu' => 'required',
            'keterangan' => 'nullable'
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
            'nik.required' => 'NIK wajib di isi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nomor_pokok_anggota.required' => 'Nomor Pokok Anggota wajib di isi',
            'tempat_lahir.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi',
            'agama.required' => 'Agama wajib di isi',
            'jabatan.required' => 'Jabatan wajib di isi',
            'npwp.required' => 'NPWP wajib di isi',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib di isi',
            'jurusan.required' => 'Jurusan wajib di isi',
            'tahun_lulus.required' => 'Tahun Lulus wajib di isi',
            'nomor_kk.required' => 'Nomor Kartu Keluarga wajib di isi',
            'nomor_kk.unique' => 'Nomor Kartu Keluarga sudah terdaftar',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib di isi',
            'nomor_jamsos.required' => 'Nomor Jamsos wajib di isi',
            'nomor_rekening.required' => 'Nomor Rekening wajib di isi',
            'nomor_rekening.unique' => 'Nomor Rekening sudah terdaftar',
            'status.required' => 'Status wajib di isi',
            'nomor_telepon.required' => 'Nomor Telepon wajib di isi',
            'nomor_telepon.unique' => 'Nomor Telepon sudah terdaftar',
            'nama_ibu.required' => 'Nama Ibu wajib di isi',
        ]);


        if (session()->has('biodata_asatid_id')) {
            Asatidz::where('id', session('biodata_asatid_id'))->update($validatedData);
        } else {
            $asatidz = Asatidz::create($validatedData);
            session(['biodata_asatid_id' => $asatidz->id]);
        }
        session(['form_biodata' => $validatedData]);

        return redirect()->route('asatidz.create.address');
    }


    public function store_address(Request $request)
    {
        $validatedAddress  = $request->validate([
            'alamat_lengkap' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
        ], [
            'alamat_lengkap.required' => 'Alamat Lengkap wajib di isi',
            'rt.required' => 'RT wajib di isi',
            'rw.required' => 'RW wajib di isi',
            'desa.required' => 'Kelurahan / Desa wajib di isi',
            'kecamatan.required' => 'Kecamatan wajib di isi',
            'kota.required' => 'Kabupaten / Kota wajib di isi',
        ]);
        if (session()->has('biodata_asatid_id')) {
            Asatidz::where('id', session('biodata_asatid_id'))->update($validatedAddress);
        } else {
            $asatidz = Asatidz::create($validatedAddress);
            session(['biodata_asatid_id' => $asatidz->id]);
        }
        session(['form_address' => $validatedAddress]);

        return redirect()->route('asatidz.create.document');
    }

    public function store_document(Request $request)
    {
        // Validasi input dan upload gambar
        $validatedDocument  = $request->validate([
            'foto_asatidz' => 'required|mimes:jpg,png,jpeg|max:3072',
            'kk_asatidz' => 'required|mimes:jpg,png,jpeg|max:3072',
        ], [
            'foto_asatidz.required' => 'Foto Asatidz wajib diisi',
            'kk_asatidz.required' => 'Foto Kartu Keluarga wajib diisi',
            'foto_asatidz.image' => 'Foto Asatidz harus berupa gambar',
            'kk_asatidz.image' => 'Kartu Keluarga harus berupa gambar',
            'foto_asatidz.mimes' => 'Foto Asatidz harus memiliki ekstensi jpg, jpeg, atau png',
            'kk_asatidz.mimes' => 'Kartu Keluarga harus memiliki ekstensi jpg, jpeg, atau png',
            'foto_asatidz.max' => 'Foto Asatidz tidak boleh lebih dari 3 MB',
            'kk_asatidz.max' => 'Kartu Keluarga tidak boleh lebih dari 3 MB',
        ]);

        $fotoAsatidzPath = $request->file('foto_asatidz')->store('images/foto_asatidz', 'public');
        $kkAsatidzPath = $request->file('kk_asatidz')->store('images/kk_asatidz', 'public');

        $validatedDocument['foto_asatidz'] = $fotoAsatidzPath;
        $validatedDocument['kk_asatidz'] = $kkAsatidzPath;

        if (session()->has('biodata_asatid_id')) {
            // Create new user account
            $userNew = User::create([
                'name' => session('form_biodata.nama_lengkap'),
                'username' => strtolower(str_replace(' ', '', session('form_biodata.nama_lengkap'))) . mt_rand(100, 999),
                'email' => strtolower(str_replace(' ', '', session('form_biodata.nama_lengkap'))) . mt_rand(100, 999) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
            $userNew->assignRole(User::ROLE_ASATIDZ);
            $validatedDocument['user_id'] = $userNew['id'];
            Asatidz::where('id', session('biodata_asatid_id'))->update($validatedDocument);
        } else {

            $asatidz = Asatidz::create($validatedDocument);
            session(['biodata_asatid_id' => $asatidz->id]);
        }
        session(['form_document' => $validatedDocument]);
        session()->forget(['biodata_asatid_id', 'form_biodata', 'form_address', 'form_document']);
        return redirect()->route('asatidz');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Asatidz::find($id);
        return view('pages.asatidz.show', [
            'title' => $data->nama_lengkap,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_biodata(string $id)
    {
        $data = Asatidz::find($id);
        return view('pages.asatidz.edit_biodata', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_address(string $id)
    {
        $data = Asatidz::find($id);
        return view('pages.asatidz.edit_address', [
            'title' => 'Edit ' . $data->nama_lengkap,
            'data' => $data
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit_document(string $id)
    {
        $data = Asatidz::find($id);
        return view('pages.asatidz.edit_document', [
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
            'nomor_pokok_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'agama' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'pendidikan_terakhir' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required|digits:4',
            'nomor_kk' => 'required',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'nomor_jamsos' => 'required',
            'nomor_rekening' => 'required',
            'status' => 'required|in:Tetap,Magang',
            'nomor_telepon' => 'required',
            'nama_ibu' => 'required',
            'keterangan' => 'nullable'
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib di isi',
            'nik.required' => 'NIK wajib di isi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nomor_pokok_anggota.required' => 'Nomor Pokok Anggota wajib di isi',
            'tempat_lahir.required' => 'Tempat Lahir wajib di isi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib di isi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di isi',
            'agama.required' => 'Agama wajib di isi',
            'jabatan.required' => 'Jabatan wajib di isi',
            'npwp.required' => 'NPWP wajib di isi',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib di isi',
            'jurusan.required' => 'Jurusan wajib di isi',
            'tahun_lulus.required' => 'Tahun Lulus wajib di isi',
            'nomor_kk.required' => 'Nomor Kartu Keluarga wajib di isi',
            'nomor_kk.unique' => 'Nomor Kartu Keluarga sudah terdaftar',
            'kewarganegaraan.required' => 'Kewarganegaraan wajib di isi',
            'nomor_jamsos.required' => 'Nomor Jamsos wajib di isi',
            'nomor_rekening.required' => 'Nomor Rekening wajib di isi',
            'nomor_rekening.unique' => 'Nomor Rekening sudah terdaftar',
            'status.required' => 'Status wajib di isi',
            'nomor_telepon.required' => 'Nomor Telepon wajib di isi',
            'nomor_telepon.unique' => 'Nomor Telepon sudah terdaftar',
            'nama_ibu.required' => 'Nama Ibu wajib di isi',
        ]);


        if (session()->has('biodata_asatid_id')) {
            Asatidz::where('id', session('biodata_asatid_id'))->update($validatedData);
        } else {
            $asatidz = Asatidz::find($id);
            $asatidz->update($validatedData);
            session(['biodata_asatid_id' => $asatidz->id]);
        }
        session(['form_biodata' => $validatedData]);
        return redirect()->route('asatidz.edit_address', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_address(Request $request, string $id)
    {
        $validatedAddress  = $request->validate([
            'alamat_lengkap' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
        ], [
            'alamat_lengkap.required' => 'Alamat Lengkap wajib di isi',
            'rt.required' => 'RT wajib di isi',
            'rw.required' => 'RW wajib di isi',
            'desa.required' => 'Kelurahan / Desa wajib di isi',
            'kecamatan.required' => 'Kecamatan wajib di isi',
            'kota.required' => 'Kabupaten / Kota wajib di isi',
        ]);
        if (session()->has('biodata_asatid_id')) {
            Asatidz::where('id', session('biodata_asatid_id'))->update($validatedAddress);
        } else {
            $asatidz = Asatidz::find($id);
            $asatidz->update($validatedAddress);
            session(['biodata_asatid_id' => $asatidz->id]);
        }
        session(['form_address' => $validatedAddress]);
        return redirect()->route('asatidz.edit_document', ['id' => $id]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_document(Request $request, string $id)
    {
        // Validasi input
        $validatedDocument = $request->validate([
            'foto_asatidz' => 'nullable|mimes:jpg,png,jpeg|max:3072',
            'kk_asatidz' => 'nullable|mimes:jpg,png,jpeg|max:3072',
        ], [
            'foto_asatidz.required' => 'Foto Asatidz wajib diisi',
            'kk_asatidz.required' => 'Foto Kartu Keluarga wajib diisi',
            'foto_asatidz.image' => 'Foto Asatidz harus berupa gambar',
            'kk_asatidz.image' => 'Kartu Keluarga harus berupa gambar',
            'foto_asatidz.mimes' => 'Foto Asatidz harus memiliki ekstensi jpg, jpeg, atau png',
            'kk_asatidz.mimes' => 'Kartu Keluarga harus memiliki ekstensi jpg, jpeg, atau png',
            'foto_asatidz.max' => 'Foto Asatidz tidak boleh lebih dari 3 MB',
            'kk_asatidz.max' => 'Kartu Keluarga tidak boleh lebih dari 3 MB',
        ]);

        // Ambil data asatidz berdasarkan ID
        $asatidz = Asatidz::findOrFail($id);

        // Pengolahan foto_asatidz
        if ($request->hasFile('foto_asatidz')) {
            // Hapus file lama jika ada
            if ($asatidz->foto_asatidz && Storage::disk('public')->exists($asatidz->foto_asatidz)) {
                Storage::disk('public')->delete($asatidz->foto_asatidz);
            }

            // Upload file baru
            $fotoAsatidzPath = $request->file('foto_asatidz')->store('images/foto_asatidz', 'public');
            $validatedDocument['foto_asatidz'] = $fotoAsatidzPath;
        } else {
            // Gunakan file lama jika tidak ada file baru
            $validatedDocument['foto_asatidz'] = $asatidz->foto_asatidz;
        }

        // Pengolahan kk_asatidz
        if ($request->hasFile('kk_asatidz')) {
            // Hapus file lama jika ada
            if ($asatidz->kk_asatidz && Storage::disk('public')->exists($asatidz->kk_asatidz)) {
                Storage::disk('public')->delete($asatidz->kk_asatidz);
            }

            // Upload file baru
            $kkAsatidzPath = $request->file('kk_asatidz')->store('images/kk_asatidz', 'public');
            $validatedDocument['kk_asatidz'] = $kkAsatidzPath;
        } else {
            // Gunakan file lama jika tidak ada file baru
            $validatedDocument['kk_asatidz'] = $asatidz->kk_asatidz;
        }

        // Update data asatidz
        $asatidz->update($validatedDocument);

        // Bersihkan session setelah selesai
        session()->forget(['biodata_asatid_id', 'form_biodata', 'form_address', 'form_document']);

        return redirect()->route('asatidz')->with('success', 'Dokumen berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asatidz = Asatidz::find($id);
        if ($asatidz->user) {
            $asatidz->user->delete();
        }
        if (!$asatidz) {
            return redirect()->route('asatidz')->with('error', 'Asatidz tidak ditemukan!');
        }
        if ($asatidz->foto_asatidz && Storage::disk('public')->exists($asatidz->foto_asatidz)) {
            Storage::disk('public')->delete($asatidz->foto_asatidz);
        }

        if ($asatidz->kk_asatidz && Storage::disk('public')->exists($asatidz->kk_asatidz)) {
            Storage::disk('public')->delete($asatidz->kk_asatidz);
        }
        $asatidz->delete();
        return redirect()->route('asatidz')->with('success', 'Data Asatidz berhasil dihapus!');
    }
}
