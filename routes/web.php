<?php

use App\Http\Controllers\Asatidz\AsatidzController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollClass\EnrollClassController;
use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\Santri\TagihanSantriController;
use App\Http\Controllers\Setting\JilidController;
use App\Http\Controllers\Setting\KelasController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Setting\TagihanController;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Route;




// Before autentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/autenticate', [LoginController::class, 'autenticate'])->name('autenticate');
});


// After autentication
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
        Route::get('/payment', [TagihanSantriController::class, 'index'])->name('santri.payment');
        Route::post('/payment', [TagihanSantriController::class, 'store'])->name('santri.store_payment');
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
    });

    // Enroll Route
    Route::prefix('enroll')->group(function () {
        Route::get('/class', [EnrollClassController::class, 'index'])->name('enroll-class');
        Route::get('/class/{name}', [EnrollClassController::class, 'class'])->name('class');
    });


    // Settings Route
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/setting/jilid/store', [JilidController::class, 'store'])->name('setting.store_jilid');
    Route::patch('/setting/jilid/{id}/update', [JilidController::class, 'update'])->name('setting.update_jilid');
    Route::delete('/setting/jilid/{id}/destroy', [JilidController::class, 'destroy'])->name('setting.destroy_jilid');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('setting.store_kelas');
    Route::patch('/kelas/{id}/update', [KelasController::class, 'update'])->name('setting.update_kelas');
    Route::delete('/kelas/{id}/destroy', [KelasController::class, 'destroy'])->name('setting.destroy_kelas');





    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
