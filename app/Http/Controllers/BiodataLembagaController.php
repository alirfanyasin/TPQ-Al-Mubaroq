<?php

namespace App\Http\Controllers;

use App\Models\BiodataLembaga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataLembagaController extends Controller
{
  public function update_biodata_lembaga(Request $request)
  {
    $data = BiodataLembaga::find(1);
    $validated = $request->validate([
      'nama_satuan' => 'required',
      'npsn' => 'required',
      'bentuk_pendidikan' => 'required',
      'tempat_lembaga' => 'required',
      'nomor_telepon_lembaga' => 'required',
      'cabang_nomor_rekening' => 'required',
      'nomor_rekening' => 'required',
      'nama_nomor_rekening' => 'required',
      'nama_ketua_yayasan' => 'required',
      'kepemilikan_lembaga' => 'required',
      'sumber_dana' => 'required',
      'status_kepemilikan' => 'required',
      'tanggal_sk_berdiri' => 'required',
      'metode_pembelajaran' => 'required',
      'jumlah_kelompok_belajar' => 'required',
      'nomor_sk_pendirian' => 'required',
    ], [
      'nama_satuan.required' => 'Nama Satuan wajib diisi',
      'npsn.required' => 'NPSN wajib diisi',
      'bentuk_pendidikan.required' => 'Bentuk Pendidikan wajib diisi',
      'tempat_lembaga.required' => 'Tempat Lembaga wajib diisi',
      'nomor_telepon_lembaga.required' => 'Nomor Telepon Lembaga wajib diisi',
      'cabang_nomor_rekening.required' => 'Cabang Nomor Rekening wajib diisi',
      'nomor_rekening.required' => 'Nomor Rekening wajib diisi',
      'nama_nomor_rekening.required' => 'Nama Nomor Rekening wajib diisi',
      'nama_ketua_yayasan.required' => 'Nama Ketua Yayasan wajib diisi',
      'kepemilikan_lembaga.required' => 'Kepemilikan Lembaga wajib diisi',
      'sumber_dana.required' => 'Sumber Dana wajib diisi',
      'status_kepemilikan.required' => 'Status Kepemilikan wajib diisi',
      'tanggal_sk_berdiri.required' => 'Tanggal SK Berdiri wajib diisi',
      'metode_pembelajaran.required' => 'Metode Pembelajaran wajib diisi',
      'jumlah_kelompok_belajar.required' => 'Jumlah Kelompok Belajar wajib diisi',
      'nomor_sk_pendirian.required' => 'Nomor SK Pendirian wajib diisi',
    ]);

    $data->update($validated);
    Alert::success('Berhasil', 'Data berhasil diupdate', 'success');
    return redirect()->back()->with('success', 'Data berhasil diubah');
  }


  public function update_biodata_kepala(Request $request)
  {

    $data = BiodataLembaga::find(1);
    $validated = $request->validate([
      'nama_kepala' => 'required',
      'alamat_kepala' => 'required',
      'nik_kepala' => 'required',
      'npwp_kepala' => 'required',
      'nomor_telepon_kepala' => 'required',
    ], [
      'nama_kepala.required' => 'Nama Kepala wajib diisi',
      'alamat_kepala.required' => 'Alamat Kepala wajib diisi',
      'nik_kepala.required' => 'NIK Kepala wajib diisi',
      'npwp_kepala.required' => 'NPWP Kepala wajib diisi',
      'nomor_telepon_kepala.required' => 'Nomor Telepon Kepala wajib diisi',
    ]);
    $data->update($validated);
    Alert::success('Berhasil', 'Data berhasil diupdate', 'success');
    return redirect()->back()->with('success', 'Data berhasil diubah');
  }



  public function update_operasional_lembaga(Request $request)
  {
    $data = BiodataLembaga::find(1);
    $validated = $request->validate([
      'jam_operasional' => 'required',
      'biaya_operasional' => 'required',
      'tanggal_izin_operasional' => 'required',
      'nomor_izin_operasional' => 'required',
      'tanggal_mulai_izin_operasional' => 'required',
      'tanggal_selesai_izin_operasional' => 'required',
      'hari_operasional' => 'required',
      'nomor_statistik' => 'required',
    ], [
      'jam_operasional.required' => 'Jam Operasional wajib diisi',
      'biaya_operasional.required' => 'Biaya Operasional wajib diisi',
      'tanggal_izin_operasional.required' => 'Tanggal Izin Operasional wajib diisi',
      'nomor_izin_operasional.required' => 'Nomor Izin Operasional wajib diisi',
      'tanggal_mulai_izin_operasional.required' => 'Tanggal Mulai Izin Operasional wajib diisi',
      'tanggal_selesai_izin_operasional.required' => 'Tanggal Selesai Izin Operasional wajib diisi',
      'hari_operasional.required' => 'Hari Operasional wajib diisi',
      'nomor_statistik.required' => 'Nomor Statistik wajib diisi',
    ]);
    $data->update($validated);
    Alert::success('Berhasil', 'Data berhasil diupdate', 'success');
    return redirect()->back()->with('success', 'Data berhasil diubah');
  }


  public function update_alamat_lembaga(Request $request)
  {
    $data = BiodataLembaga::find(1);
    $validate = $request->validate([
      'detail_alamat' => 'required',
      'kelurahan_or_desa' => 'required',
      'rt' => 'required',
      'rw' => 'required',
      'kecamatan' => 'required',
      'kabupaten' => 'required',
      'garis_bujur' => 'nullable',
      'garis_lintang' => 'nullable',
    ], [
      'detail_alamat.required' => 'Detail Alamat wajib diisi',
      'kelurahan_or_desa.required' => 'Kelurahan / Desa wajib diisi',
      'rt.required' => 'RT wajib diisi',
      'rw.required' => 'RW wajib diisi',
      'kecamatan.required' => 'Kecamatan wajib diisi',
      'kebupaten.required' => 'Kabupaten wajib diisi',
      'garis_bujur.required' => 'Garis Bujur wajib diisi',
      'garis_lintang.required' => 'Garis Lintang wajib diisi'
    ]);
    $data->update($validate);
    Alert::success('Berhasil', 'Data berhasil diupdate', 'success');
    return redirect()->back()->with('success', 'Data berhasil diubah');
  }
}
