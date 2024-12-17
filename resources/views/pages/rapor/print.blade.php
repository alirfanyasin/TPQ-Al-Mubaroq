<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="/template/assets/css/main/app.css">
  <script>
    print()
  </script>
</head>

<body>
  @foreach ($dataRapor as $rapor)
    @php
      // Group data rapor berdasarkan jenis penilaian
      $groupedData = $rapor->raporNilai->groupBy(fn($nilai) => $nilai->raporItem->jenis_penilaian);
      $totalNilai = $rapor->raporNilai->sum('nilai');
      $totalRow = $rapor->raporNilai->count();
      $average = $totalRow > 0 ? $totalNilai / $totalRow : 0;
      $grade = match (true) {
          $average >= 90 && $average <= 100 => 'A',
          $average >= 80 && $average < 90 => 'B+',
          $average >= 70 && $average < 80 => 'B',
          $average >= 60 && $average < 70 => 'C',
          $average < 60 => 'D',
          default => null,
      };
    @endphp

    <!-- Header -->
    <header>
      <h3 class="text-center fw-bold">
        Lembar Penilaian Munaqosah Semester {{ $rapor->semester->nama ?? '-' }}<br>
        TPQ Al Mubaarok <br> Tahun Ajaran {{ date('Y') . '/' . (date('Y') + 1) }}
      </h3>
      <hr>
      <div class="row">
        <div class="col-6">
          <table>
            <tr>
              <td>Nama</td>
              <td style="padding-left: 20px;">:</td>
              <td>{{ $rapor->santri->nama_lengkap }}</td>
            </tr>
            <tr>
              <td>Nomor Induk</td>
              <td style="padding-left: 20px;">:</td>
              <td>{{ $rapor->santri->nomor_induk }}</td>
            </tr>
          </table>
        </div>
        <div class="col-6">
          <table>
            <tr>
              <td>Wali Kelas</td>
              <td style="padding-left: 20px;">:</td>
              <td>{{ $rapor->santri->kelas->asatidz->nama_lengkap ?? '-' }}</td>
            </tr>
            <tr>
              <td>Jilid</td>
              <td style="padding-left: 20px;">:</td>
              <td>{{ $rapor->jilid->nama ?? '-' }}</td>
            </tr>
          </table>
        </div>
      </div>
      <hr>
    </header>

    <!-- Penilaian -->
    <div class="row">
      @foreach ($groupedData as $jenisPenilaian => $nilaiGroup)
        <div class="mb-4 col-6">
          <h6 class="">{{ $jenisPenilaian }}</h6>
          <table>
            <tbody>
              @foreach ($nilaiGroup as $nilai)
                <tr>
                  <td>{{ $nilai->raporItem->nama }}</td>
                  <td style="padding: 0 10px;"> : </td>
                  <td>{{ $nilai->nilai }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endforeach
    </div>

    <!-- Total Nilai -->
    <div class="row">
      <div class="col-6">
        <table class="w-100">
          <tr style="border-bottom: 1px solid black;">
            <td class="h6" style="width: 160px;">Total Nilai</td>
            <td class="h6">:</td>
            <td class="h6">{{ number_format($totalNilai, 0, ',', '.') }}</td>
          </tr>
          <tr>
            <td class="h6" style="width: 160px;">Rata-Rata Nilai</td>
            <td class="h6">:</td>
            <td class="h6">{{ number_format($average, 1) }}</td>
          </tr>
          <tr>
            <td class="h6" style="width: 160px;">Grade</td>
            <td class="h6">:</td>
            <td class="h6">{{ $grade }}</td>
          </tr>
        </table>
      </div>
    </div>

    <p class="text-center fw-semibold" style="margin-top: 50px;">
      "Sesungguhnya Kamilah yang menurunkan Al-Qur'an dan <br> pasti Kami (pula) yang memeliharanya." [Q.S Al-Hijr:9]
    </p>
    <div class="row" style="display: flex; margin-bottom: 300px;">
      <div class="text-center col-6">
        <div style="margin-bottom: 40px"></div>
        <p>Wali Kelas,</p>
        <img
          src="https://www.shutterstock.com/image-vector/fake-autograph-samples-handdrawn-signatures-260nw-2332469589.jpg"
          width="200px" alt="Signature">
        <p>{{ $rapor->santri->kelas->asatidz->nama_lengkap }}</p>
      </div>
      <div class="text-center col-6">
        <p class="text-center">
          Surabaya, {{ now()->format('d M Y') }}
        </p>
        <p>Ketua TPQ,</p>
        <img
          src="https://www.shutterstock.com/image-vector/fake-autograph-samples-handdrawn-signatures-260nw-2332469589.jpg"
          width="200px" alt="Signature">
        <p>{{ $rapor->santri->kelas->asatidz->nama_lengkap }}</p>
      </div>
    </div>
  @endforeach

  <script src="/template/assets/js/bootstrap.js"></script>
  <script src="/template/assets/js/app.js"></script>
</body>

</html>
