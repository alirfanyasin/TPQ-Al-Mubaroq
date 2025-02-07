<?php

namespace App\Exports;

use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporItem;
use App\Models\Rapor\RaporNilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class RaporExport implements FromCollection, WithHeadings, WithMapping
{
    protected $jilidId;
    protected $kelasId;

    public function __construct($jilidId, $kelasId)
    {
        $this->jilidId = $jilidId;
        $this->kelasId = $kelasId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $rapors = Rapor::where('jilid_id', $this->jilidId)
            ->where('kelas_id', $this->kelasId)
            ->with(['santri', 'semester', 'jilid', 'raporNilai.raporItem'])
            ->get();

        $data = [];

        foreach ($rapors as $rapor) {
            $row = [
                'Nama Santri' => $rapor->santri->nama_lengkap ?? '',
                'Semester' => $rapor->semester->nama,
                'Jilid' => $rapor->jilid->nama,
                'Kelas' => $rapor->kelas->nama ?? '',
            ];

            foreach ($rapor->raporNilai as $nilai) {
                $row[$nilai->raporItem->nama] = $nilai->nilai;
            }

            $data[] = $row;
        }

        return collect($data);
    }

    /**
     * @return array
     */
    public function headings(): array
    {

        $penilaianTypes = RaporItem::where('jilid_id', $this->jilidId)
            ->select('nama')
            ->distinct()
            ->pluck('nama');

        $headings = ['Nama Santri', 'Semester', 'Jilid', 'Kelas'];

        foreach ($penilaianTypes as $type) {
            $headings[] = $type;
        }

        return $headings;
    }

    /**
     * @param array $row
     *
     * @return array
     */
    public function map($row): array
    {
        return $row;
    }
}
