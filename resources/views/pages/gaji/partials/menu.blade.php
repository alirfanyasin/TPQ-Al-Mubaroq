<div class="header-body" style="padding-bottom: 20px;">
  <div class="row">
    {{-- <div class="col-md-4">
      <a href="/asatidz/penggajian" class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: 14px;">Penggajian</h5>
              <span class="h4 font-weight-bold mb-0">{{ $totalAsatidz }} Asatidz</span>
            </div>
            <div class="col-auto">
              <div class="mb-2 stats-icon green">
                <i class="iconly-boldDiscount"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div> --}}
    <div class="col-md-6">
      <a href="{{ route('asatidz.hari_aktif') }}" class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: 20px;">Hari Aktif Bulan ini</h5>
              <span class="h4 font-weight-bold mb-0">{{ $totalHariAktif }} Hari</span>
            </div>
            <div class="col-auto">
              <div class="mb-2 stats-icon red">
                <i class="iconly-boldCalendar"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{ route('absensi.index') }}" class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: 20px;">Absensi Hadir Hari ini</h5>
              <span
                class="h4 font-weight-bold mb-0" style="font-size: 23px;">{{ $totalHadir ? $totalHadir->jumlah_masuk . ' Asatidz' : 'Belum Absen Hari ini' }}
              </span>
            </div>
            <div class="col-auto">
              <div class="mb-2 stats-icon blue">
                <i class="iconly-boldChart"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
