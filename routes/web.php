<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\Asatidz\AsatidzController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HariAktifController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BiodataLembagaController;
use App\Http\Controllers\Class\ClassController;
use App\Http\Controllers\Setting\GajiController;
use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\Setting\JilidController;
use App\Http\Controllers\Setting\KelasController;
use App\Http\Controllers\Setting\RaporController;
use App\Http\Controllers\Asatidz\AbsensiController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Setting\TagihanController;
use App\Http\Controllers\Setting\RaporItemController;
use App\Http\Controllers\Asatidz\GajiAsatidzController;
use App\Http\Controllers\Santri\TagihanSantriController;
use App\Http\Controllers\Rapor\RaporController as RaporRaporController;
use App\Models\BiodataLembaga;
use App\Models\Tagihan;

// Before autentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

// After autentication
Route::middleware('auth')->group(function () {
    // Hari Aktif
    Route::get('/hari-aktif', [HariAktifController::class, 'index'])->name('asatidz.hari_aktif');
    Route::put('/hari-aktif/update', [HariAktifController::class, 'update'])->name('hari_aktif.update');

    // Dashboard Route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/edit', [DashboardController::class, 'edit'])->name('edit.dashboard');
    Route::put('/{id}/update', [DashboardController::class, 'update'])->name('update.dashboard');

    // Santri Route
    Route::prefix('santri')->group(function () {
        Route::get('/', [SantriController::class, 'index'])->name('santri');
        // Create route
        Route::get('/create/biodata', [SantriController::class, 'create_biodata'])->name('santri.create_biodata');
        Route::get('/create/address', [SantriController::class, 'create_address'])->name('santri.create_address');
        Route::get('/create/biodata-father', [SantriController::class, 'create_biodata_father'])->name('santri.create_biodata_father');
        Route::get('/create/biodata-mother', [SantriController::class, 'create_biodata_mother'])->name('santri.create_biodata_mother');
        Route::get('/create/document', [SantriController::class, 'create_document'])->name('santri.create_document');

        // Store route
        Route::post('/store/biodata', [SantriController::class, 'store_biodata'])->name('santri.store_biodata');
        Route::post('/store/address', [SantriController::class, 'store_address'])->name('santri.store_address');
        Route::post('/store/biodata-father', [SantriController::class, 'store_biodata_father'])->name('santri.store_biodata_father');
        Route::post('/store/biodata-mother', [SantriController::class, 'store_biodata_mother'])->name('santri.store_biodata_mother');
        Route::post('/store/document', [SantriController::class, 'store_document'])->name('santri.store_document');

        // Show route
        Route::get('/{id}/show', [SantriController::class, 'show'])->name('santri.show');

        // Edit route
        Route::get('/{id}/edit/biodata', [SantriController::class, 'edit_biodata'])->name('santri.edit_biodata');
        Route::get('/{id}/edit/address', [SantriController::class, 'edit_address'])->name('santri.edit_address');
        Route::get('/{id}/edit/biodata-father', [SantriController::class, 'edit_biodata_father'])->name('santri.edit_biodata_father');
        Route::get('/{id}/edit/biodata-mother', [SantriController::class, 'edit_biodata_mother'])->name('santri.edit_biodata_mother');
        Route::get('/{id}/edit/document', [SantriController::class, 'edit_document'])->name('santri.edit_document');

        // Route update
        Route::patch('/{id}/update/biodata', [SantriController::class, 'update_biodata'])->name('santri.update_biodata');
        Route::patch('/{id}/update/address', [SantriController::class, 'update_address'])->name('santri.update_address');
        Route::patch('/{id}/update/biodata-father', [SantriController::class, 'update_biodata_father'])->name('santri.update_biodata_father');
        Route::patch('/{id}/update/biodata-mother', [SantriController::class, 'update_biodata_mother'])->name('santri.update_biodata_mother');
        Route::patch('/{id}/update/document', [SantriController::class, 'update_document'])->name('santri.update_document');

        // Destroy route
        Route::delete('{id}/destroy', [SantriController::class, 'destroy'])->name('santri.destroy');

        // Tagihan route
        Route::patch('/student-bill', [TagihanController::class, 'update'])->name('santri.student_bill');
        Route::get('/payment', [TagihanSantriController::class, 'payment'])->name('santri.payment');
        Route::post('/payment', [TagihanSantriController::class, 'store'])->name('santri.store_payment');



        // Export 
        Route::get('/export/excel', [SantriController::class, 'export'])->name('santri.export');

        // Import
        Route::get('/donwload_template', [SantriController::class, 'donwload_template'])->name('santri.donwload_template');
        Route::post('/import', [SantriController::class, 'import'])->name('santri.import');
    });


    // Asatidz Route
    Route::prefix('asatidz')->group(function () {
        Route::get('/', [AsatidzController::class, 'index'])->name('asatidz');
        Route::get('/create/biodata', [AsatidzController::class, 'create_biodata'])->name('asatidz.create.biodata');
        Route::get('/create/address', [AsatidzController::class, 'create_address'])->name('asatidz.create.address');
        Route::get('/create/document', [AsatidzController::class, 'create_document'])->name('asatidz.create.document');
        Route::post('/store/biodata', [AsatidzController::class, 'store_biodata'])->name('asatidz.store_biodata');
        Route::post('/store/address', [AsatidzController::class, 'store_address'])->name('asatidz.store_address');
        Route::post('/store/document', [AsatidzController::class, 'store_document'])->name('asatidz.store_document');
        Route::get('/{id}/show', [AsatidzController::class, 'show'])->name('asatidz.show');
        Route::get('/{id}/edit/biodata', [AsatidzController::class, 'edit_biodata'])->name('asatidz.edit_biodata');
        Route::get('/{id}/edit/address', [AsatidzController::class, 'edit_address'])->name('asatidz.edit_address');
        Route::get('/{id}/edit/document', [AsatidzController::class, 'edit_document'])->name('asatidz.edit_document');
        Route::patch('/{id}/update/biodata', [AsatidzController::class, 'update_biodata'])->name('asatidz.update_biodata');
        Route::patch('/{id}/update/address', [AsatidzController::class, 'update_address'])->name('asatidz.update_address');
        Route::patch('/{id}/update/document', [AsatidzController::class, 'update_document'])->name('asatidz.update_document');
        Route::delete('/{id}/destroy', [AsatidzController::class, 'destroy'])->name('asatidz.destroy');
        Route::get('/account', [AsatidzController::class, 'account'])->name('asatidz.account');

        // Export
        Route::get('/export/excel', [AsatidzController::class, 'export'])->name('asatidz.export');
        // Import
        Route::get('/donwload_template', [AsatidzController::class, 'donwload_template'])->name('asatidz.donwload_template');
        Route::post('/import', [AsatidzController::class, 'import'])->name('asatidz.import');

        // Salary setting
        Route::patch('/asatidz-salary', [GajiController::class, 'update'])->name('asatidz.salary');
    });


    Route::prefix('class')->group(function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::post('/enroll', [ClassController::class, 'enroll'])->name('class.enroll');
        Route::get('/room/{id}/{nama}', [ClassController::class, 'class_room'])->name('class.room');
        Route::post('/leave-multiple', [ClassController::class, 'leave_multiple'])->name('class.leave_multiple');
    });


    Route::prefix('rapor')->group(function () {
        Route::get('/', [RaporRaporController::class, 'index'])->name('rapor.index');
        Route::post('/update-semeter', [RaporRaporController::class, 'update_semeter'])->name('rapor.update_semeter');
        // Route::patch('/{id}/update', [RaporRaporController::class, 'update'])->name('rapor.update');
        // Route::delete('/{id}/destroy', [RaporRaporController::class, 'destroy'])->name('rapor.destroy');
        // Route::post('/{id}/generate-item-penilaian', [RaporRaporController::class, 'generate_item_penilaian'])->name('rapor.generate_item_penilaian');
        // Route::get('/{id}/item-penilaian', [RaporRaporController::class, 'item_penilaian'])->name('rapor.item_penilaian');

        Route::get('/{id}/item-penilaian', [RaporRaporController::class, 'item_penilaian'])->name('rapor.item_penilaian');
        Route::patch('/{id}/simpan-nilai', [RaporRaporController::class, 'simpan_nilai'])->name('rapor.simpan_nilai');
        Route::get('/{id}/show', [RaporRaporController::class, 'show'])->name('rapor.show');
        Route::get('/{id}/print-one', [RaporRaporController::class, 'print_one'])->name('rapor.print_one');
        Route::post('/print', [RaporRaporController::class, 'print'])->name('rapor.print');

        // Export
        Route::get('/export-rapors', [RaporRaporController::class, 'export_rapor'])->name('rapors.export');
        Route::get('/import-rapors', [RaporRaporController::class, 'import_rapor_view'])->name('rapors.import-view');
        Route::post('/import-rapors', [RaporRaporController::class, 'import_rapor'])->name('rapors.import-post');
    });

    // Gaji Asatidz Route
    Route::prefix('gaji-asatidz')->group(function () {
        Route::match(['get', 'post'], '/', [GajiAsatidzController::class, 'index'])->name('gaji.asatidz.index');
        Route::get('/{id}/edit', [GajiAsatidzController::class, 'edit'])->name('gaji-asatidz.edit');
        Route::PATCH('/{id}/edit', [GajiAsatidzController::class, 'update'])->name('gaji-asatidz.update');

        // Export
        Route::get('/export/excel', [GajiAsatidzController::class, 'export'])->name('gaji.export');
        Route::get('/export/pdf', [GajiAsatidzController::class, 'exportpdf'])->name('gaji.pdf');

        // Import
        Route::get('/donwload_template', [GajiAsatidzController::class, 'donwload_template'])->name('gaji.donwload_template');
        Route::get('/gaji_template', [GajiAsatidzController::class, 'tempGaji'])->name('gaji.template');
        Route::post('/gaji_template/import', [GajiAsatidzController::class, 'import'])->name('gaji.import');
    });

    // Tagihan Route
    Route::prefix('tagihan')->group(function () {
        Route::get('/', [TagihanSantriController::class, 'index'])->name('tagihan.index');
        Route::get('/{id}/pembayaran/{nama_lengkap}', [TagihanSantriController::class, 'pembayaran'])->name('tagihan.pembayaran');
        Route::patch('/{id}/pembayaran', [TagihanSantriController::class, 'store_pembayaran'])->name('tagihan.store_pembayaran');
        Route::match(['get', 'post'], '/history-tagihan-bulanan', [TagihanSantriController::class, 'history_tagihan_bulanan'])->name('santri.history_tagihan_bulanan');

        // Route::post('/history-tagihan-bulanan', [TagihanSantriController::class, 'history_tagihan_bulanan'])->name('santri.history_tagihan_bulanan');

        Route::get('/bulk/tagihan-bulanan', [TagihanSantriController::class, 'bulk_tagihan_bulanan'])->name('tagihan.bulk.tagihan_bulanan');
        Route::post('/bulk/tagihan-bulanan', [TagihanSantriController::class, 'bulk_tagihan_bulanan_action'])->name('tagihan.bulk.tagihan_bulanan.action');

        Route::get('/bulk/tagihan-pendaftaran', [TagihanSantriController::class, 'bulk_tagihan_pendaftaran'])->name('tagihan.bulk.tagihan_pendaftaran');
        Route::get('/bulk/tagihan-seragam', [TagihanSantriController::class, 'bulk_tagihan_seragam'])->name('tagihan.bulk.tagihan_seragam');
    });

    // Absensi Asatitdz
    Route::match(['get', 'post'], '/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/new', [AbsensiController::class, 'create'])->name('asatidz.create');
    Route::post('/absensi/new', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{id}/edit', [AbsensiController::class, 'update'])->name('absensi.update');

    // Settings Route
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/setting/jilid/store', [JilidController::class, 'store'])->name('setting.store_jilid');
    Route::patch('/setting/jilid/{id}/update', [JilidController::class, 'update'])->name('setting.update_jilid');
    Route::delete('/setting/jilid/{id}/destroy', [JilidController::class, 'destroy'])->name('setting.destroy_jilid');

    Route::post('/kelas/store', [KelasController::class, 'store'])->name('setting.store_kelas');
    Route::patch('/kelas/{id}/update', [KelasController::class, 'update'])->name('setting.update_kelas');
    Route::delete('/kelas/{id}/destroy', [KelasController::class, 'destroy'])->name('setting.destroy_kelas');

    Route::post('/setting/rapor', [RaporController::class, 'store'])->name('setting.store_rapor');
    Route::patch('/setting/rapor/{id}/update', [RaporController::class, 'update'])->name('setting.update_rapor');
    Route::delete('/setting/rapor/{id}/destroy', [RaporController::class, 'destroy'])->name('setting.destroy_rapor');

    Route::post('/setting/store/item-rapor', [RaporItemController::class, 'store'])->name('setting.rapor.store_item');
    Route::delete('/setting/{id}/destroy/item-rapor', [RaporItemController::class, 'destroy'])->name('setting.rapor.destroy_item');
    Route::patch('/setting/{id}/update/item-rapor', [RaporItemController::class, 'update'])->name('setting.rapor.update_item');

    Route::patch('/setting/biodata-lembaga', [BiodataLembagaController::class, 'update_biodata_lembaga'])->name('setting.biodata_lembaga.update');
    Route::patch('/setting/biodata-kepala', [BiodataLembagaController::class, 'update_biodata_kepala'])->name('setting.biodata_kepala.update');
    Route::patch('/setting/operasional-lembaga', [BiodataLembagaController::class, 'update_operasional_lembaga'])->name('setting.operasional_lembaga.update');
    Route::patch('/setting/alamat-lembaga', [BiodataLembagaController::class, 'update_alamat_lembaga'])->name('setting.alamat_lembaga.update');



    // Account Setting
    Route::prefix('account')->group(function () {
        Route::get('/index', [AccountSettingController::class, 'index'])->name('account.index');
        Route::get('/setting', [AccountSettingController::class, 'setting'])->name('account.setting');
        Route::patch('/update', [AccountSettingController::class, 'update'])->name('account.update');

        Route::get('/update-password', [AccountSettingController::class, 'update_password'])->name('account.update_password');
        Route::patch('/update-password', [AccountSettingController::class, 'update_password_post'])->name('account.update_password_post');
    });










    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
