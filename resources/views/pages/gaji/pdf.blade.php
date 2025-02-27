<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf</title>
  <link rel="stylesheet" href="/template/assets/css/main/app.css">
  <style>
    /* styles.css */

    /* Style for the container and margin-top */
    .container-fluid {
      margin-top: 20px;
    }

    /* Center the content in the row */
    .row.justify-content-center {
      justify-content: center;
    }

    /* Style for the card */
    .card {
      margin-bottom: 5px;
    }

    /* Style for the table and font color */
    .table.table-flush {
      color: rgba(14, 14, 16, 1);
    }

    /* Center the text in the table cells */
    td {
      text-align: center;
    }

    /* Style for the total gaji badge */
    .mnony .badge-lg {
      display: inline-block;
      background-color: #926C15;
      padding: 5px 10px;
      border-radius: 5px;
      color: white;
    }

    /* Style for the edit button */
    .edit-button {
      cursor: pointer;
      border: none;
      background-color: transparent;
    }

    /* Add space between table rows */
    tr {
      margin-bottom: 5px;
    }

    /* Add border to the table */
    table {
      border-collapse: collapse;
      border: 1px solid #000;
    }

    /* Add border to table headers and cells */
    th,
    td {
      border: 1px solid #000;
      padding: 8px;
    }
  </style>
</head>

<body>
  <h4 style="text-align: center">Rekap Penggajian Al-Mubaarok {{$bulan}}</h4>

  <div class="container-fluid" style="margin-top: 20px">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card mb-5">
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic" style="color: rgba(14, 14, 16, 1)">
              <thead>
                <tr>
                  <th>Npa</th>
                  <th>Nama</th>
                  <th>Total gaji yang didapat</th>
                  <th>Gaji Tambahan</th>
                  <th>Gaji Lembur</th>
                  <th>Kasbon</th>
                  <th>Sembako</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($gaji as $row)
                  @php
                    $lembur = 0;
                    $gajiPokok = 0;
                    if ($row->status == 'Magang') {
                        $lembur = $setting->lembur_magang * $row->lembur;

                        if ($row->jumlah_hari_efektif < $hari_aktif_bulan_ini) {
                              $gajiPokok = $row->jumlah_hari_efektif * $setting->lembur_magang;
                        } else {
                              $gajiPokok = $setting->gaji_magang;
                        }
                    $total_gaji = $gajiPokok + $row->tunjangan_jabatan + $row->tunjangan_operasional + $lembur + $row->extra - $row->kasbon;
                    } else {
                        $lembur = $setting->lembur_tetap * $row->lembur;
                        if ($row->jumlah_hari_efektif < $hari_aktif_bulan_ini) {
                              $gajiPokok = $row->jumlah_hari_efektif * $setting->lembur_tetap;
                        } else {
                              $gajiPokok = $setting->gaji_tetap;
                        }
                    $total_gaji = $gajiPokok + $row->tunjangan_jabatan + $row->tunjangan_operasional + $lembur + $row->extra + $setting->kenaikan - $row->kasbon;
                    }
                  @endphp
                  <tr>
                    <td style="text-align: center">{{ $row->id }}</td>
                    <td style="text-align: center">{{ $row->nama_lengkap }}</td>
                    <td class="mnony text-center">
                        <span class="badge bg-primary" style="display: inline-block; background-color: #4d4fdc; border-radius: 3px; padding: 5px 10px; color: white;">
                        Rp. {{ number_format($total_gaji, 0, ',', '.') }}
                      </span>
                    </td>
                    <td style="text-align: center">Rp. {{ number_format($row->extra, 0, ',', '.') }}</td>
                    <td style="text-align: center">Rp. {{ number_format($lembur, 0, ',', '.') }}</td>
                    <td style="text-align: center">Rp. {{ number_format($row->kasbon, 0, ',', '.') }}</td>
                    <td style="text-align: center">
                      {{ ($row->jumlah_hari_efektif / $hari_aktif_bulan_ini) * 100 > 80 ? 'YA' : 'TIDAK' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/template/assets/js/bootstrap.js"></script>
  <script src="/template/assets/js/app.js"></script>
</body>

</html>
