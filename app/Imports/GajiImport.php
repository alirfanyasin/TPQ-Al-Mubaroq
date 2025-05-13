<?php

namespace App\Imports;

use Exception;
use Carbon\Carbon;
use App\Models\GajiAsatidzBulanan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared\Date as PhpSpreadsheetDate;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class GajiImport implements ToModel,  WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;

    protected $header;
    protected $sheet;
    public function __construct(Worksheet $sheet)
    {
        $this->sheet = $sheet;
    }
    public function model(array $row)
    {
        if(!$this->header){
            $this->header = $row;
        }
        foreach ($row as $key => $value) {
            if (stripos($key, 'tanggal') !== false && is_numeric($value)) {
                $excelDateNumber = $value;
                $dateTime = PhpSpreadsheetDate::excelToDateTimeObject($excelDateNumber);
                // $dateTime = PHPExcel_Shared_Date::ExcelToPHPObject($excelDateNumber);
                $formattedDate = $dateTime->format('Y-m-d');
                $row[$key] = $formattedDate;
            }
            if (strpos($value, '=') === 0) {
                $calculatedValue = $this->calculateFormula($key, $row);
                $row[$key] = $calculatedValue;
            }
        }
        $arrayTable = array('asatidz_id','nama_lengkap','gaji_pokok','masa_kerja',
                                'sesi_lembur','extra','kenaikan','kasbon','tunjangan_operasional',
                                'tunjangan_jabatan','jumlah_sesi_efektif','tanggal'
                            );
        foreach ($arrayTable as $value) {
            if (!isset($this->header[$value])) {
                throw new Exception('Nama tabel tidak valid. '.$this->header[$value]);
            }
        }
        // Cari data penggajian berdasarkan asatidz_id dan tanggal
        $date = Carbon::createFromFormat('Y-m-d',$row['tanggal']);
        $date = $date->format('Y-m');
        $gaji = GajiAsatidzBulanan::where('asatidz_id', $row['asatidz_id'])
                        ->where('tanggal', 'LIKE',$date.'%')
                        ->first();

        if ($gaji) {
            // Jika data penggajian sudah ada, lakukan update
            $gaji->update([
                'asatidz_id' => $row['asatidz_id'],
                'gaji_pokok' => $row['gaji_pokok'],
                'masa_kerja' => $row['masa_kerja'],
                'lembur' => $row['sesi_lembur'],
                'extra' => $row['extra'],
                'kenaikan' => $row['kenaikan'],
                'kasbon' => $row['kasbon'],
                'tunjangan_operasional' => $row['tunjangan_operasional'],
                'tunjangan_jabatan' => $row['tunjangan_jabatan'],
                'jumlah_hari_efektif' => $row['jumlah_sesi_efektif'],
            ]);
        } else {
            // Jika data penggajian belum ada, buat data baru
            $gaji = new GajiAsatidzBulanan([
                'asatidz_id' => $row['asatidz_id'],
                'gaji_pokok' => $row['gaji_pokok'],
                'masa_kerja' => $row['masa_kerja'],
                'lembur' => $row['sesi_lembur'],
                'extra' => $row['extra'],
                'kenaikan' => $row['kenaikan'],
                'kasbon' => $row['kasbon'],
                'tunjangan_operasional' => $row['tunjangan_operasional'],
                'tunjangan_jabatan' => $row['tunjangan_jabatan'],
                'jumlah_hari_efektif' => $row['jumlah_sesi_efektif'],
                'tanggal' => $row['tanggal'],
            ]);
        $gaji->save();
        }
        return $gaji;
    }

    protected function calculateFormula($key, $row)
    {
        $cellValue = $this->sheet->getCell($key)->getCalculatedValue();

        if (strpos($cellValue, '=') === 0) {
            $calculatedValue = $this->calculateFormula($cellValue, $row);
            return $calculatedValue;
        }

        return $cellValue;
    }
}
