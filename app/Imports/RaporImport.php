<?php

namespace App\Imports;

use App\Models\Santri;
use App\Models\Jilid;
use App\Models\Rapor\Rapor as RaporRapor;
use App\Models\Rapor\RaporItem as RaporRaporItem;
use App\Models\Rapor\RaporNilai as RaporRaporNilai;
use App\Models\Rapor\Semester;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RealRashid\SweetAlert\Facades\Alert;

class RaporImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Ambil data Jilid
        $jilidNama = $row['jilid'] ?? null;
        if (!$jilidNama) return null;

        $jilid = Jilid::where('nama', $jilidNama)->first();
        if (!$jilid) return null;

        // Ambil data santri berdasarkan nama
        $santri = Santri::where('nama_lengkap', $row['nama_santri'])->first();
        if (!$santri) return null;

        // Cari atau buat Rapor berdasarkan Santri, Jilid, dan Semester
        $rapor = RaporRapor::firstOrCreate([
            'santri_id'   => $santri->id,
            'jilid_id'    => $jilid->id,
            'semester_id' => Semester::where('nama', $row['semester'])->value('id')
        ]);

        // Daftar header yang tidak diproses
        $excludedHeaders = ['nama_santri', 'jilid', 'semester', 'kelas'];

        // Normalisasi header dari Excel
        $normalizedHeaders = [];
        foreach (array_keys($row) as $header) {
            $formattedHeader = ucwords(str_replace('_', ' ', strtolower(trim($header))));
            $normalizedHeaders[$formattedHeader] = $header;
        }

        // Ambil nama-nama item dari Excel yang relevan
        $items = array_diff(array_keys($normalizedHeaders), $excludedHeaders);

        // Ambil ID Rapor Item berdasarkan nama dan jilid
        $raporItemIds = RaporRaporItem::whereIn('nama', $items)
            ->where('jilid_id', $jilid->id)
            ->pluck('id', 'nama');

        // Loop untuk memperbarui hanya nilai yang 0
        foreach ($raporItemIds as $itemNama => $itemId) {
            $nilaiBaru = $row[$normalizedHeaders[$itemNama]] ?? 0;

            // Ambil nilai saat ini dari database
            $raporNilai = RaporRaporNilai::where('rapor_id', $rapor->id)
                ->where('rapor_item_id', $itemId)
                ->first();

            if ($raporNilai) {
                // Hanya update jika nilai sebelumnya 0
                if ($raporNilai->nilai == 0) {
                    $raporNilai->update(['nilai' => $nilaiBaru]);
                }
            } else {
                // Jika tidak ada, buat baru
                RaporRaporNilai::create([
                    'rapor_id'      => $rapor->id,
                    'rapor_item_id' => $itemId,
                    'nilai'         => $nilaiBaru,
                ]);
            }
        }

        Alert::success('Berhasil', 'Data berhasil diimport', 'success');
    }
}
