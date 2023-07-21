<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\LayananController;
use App\Http\Controllers\Backend\PengaturanController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\FasilitasController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\LayananController as FrontendLayananController;
use App\Http\Controllers\Frontend\StrukturOrganisasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/fasilitas', function () {
//     return view('frontend.fasilitas');
// });

Route::get('/', [BerandaController::class, 'index'])->name('frontend.beranda.index');
Route::get('/fasilitas-bojongnegara', [FasilitasController::class, 'index'])->name('frontend.fasilitas.index');
Route::get('/layanan-bojongnegara', [FrontendLayananController::class, 'index'])->name('frontend.layanan.index');
Route::get('/kontak-bojongnegara', [KontakController::class, 'index'])->name('frontend.kontak.index');
Route::get('/berita-bojongnegara', [FrontendBeritaController::class, 'index'])->name('frontend.berita.index');
Route::get('/struktur-organisasi-bojongnegara', [StrukturOrganisasiController::class, 'index'])->name('frontend.strukturOrganisasi.index');

Auth::routes();

/*------------------------------------------
--------------------------------------------
Administrator
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Administrator'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('berita/publish/{berita}', [BeritaController::class, 'publish'])->name('berita.publish');
    Route::post('berita/pending/{berita}', [BeritaController::class, 'pending'])->name('berita.pending');

    // Kategori
    Route::post('/kategori/delete-multiple-kategori', [KategoriController::class, 'deleteMultiple'])->name('delete-multiple-kategori');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Tag
    Route::post('/tag/delete-multiple-tag', [TagController::class, 'deleteMultiple'])->name('delete-multiple-tag');
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::delete('tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

    // Layanan
    Route::post('/layanan/delete-multiple-layanan', [LayananController::class, 'deleteMultiple'])->name('delete-multiple-layanan');
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/tambah', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::post('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Pengguna
    Route::post('/pengguna/delete-multiple-pengguna', [PenggunaController::class, 'deleteMultiple'])->name('delete-multiple-pengguna');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    //Pengaturan
    Route::get('/pengaturan/profile', [PengaturanController::class, 'profile'])->name('pengaturan.profile');
    Route::post('/pengaturan/profile/{profile}', [PengaturanController::class, 'updateProfile'])->name('pengaturan.updateProfile');

    Route::get('/pengaturan/ganti-password', [PengaturanController::class, 'gantiPassword'])->name('pengaturan.gantiPassword');
    Route::post('/pengaturan/ganti-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');

    Route::get('/pengaturan/nonaktif-akun', [PengaturanController::class, 'nonaktif'])->name('pengaturan.nonaktif');
    Route::post('/pengaturan/nonaktif-akun', [PengaturanController::class, 'updateStatus'])->name('pengaturan.updateStatus');
});

/*------------------------------------------
--------------------------------------------
Perangkat
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Perangkat'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('berita/publish/{berita}', [BeritaController::class, 'publish'])->name('berita.publish');
    Route::post('berita/pending/{berita}', [BeritaController::class, 'pending'])->name('berita.pending');

    // Kategori
    Route::post('/kategori/delete-multiple-kategori', [KategoriController::class, 'deleteMultiple'])->name('delete-multiple-kategori');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Tag
    Route::post('/tag/delete-multiple-tag', [TagController::class, 'deleteMultiple'])->name('delete-multiple-tag');
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::delete('tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

    // Layanan
    Route::post('/layanan/delete-multiple-layanan', [LayananController::class, 'deleteMultiple'])->name('delete-multiple-layanan');
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/tambah', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::post('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    //Pengaturan
    Route::get('/pengaturan/profile', [PengaturanController::class, 'profile'])->name('pengaturan.profile');
    Route::post('/pengaturan/profile/{profile}', [PengaturanController::class, 'updateProfile'])->name('pengaturan.updateProfile');

    Route::get('/pengaturan/ganti-password', [PengaturanController::class, 'gantiPassword'])->name('pengaturan.gantiPassword');
    Route::post('/pengaturan/ganti-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');

    Route::get('/pengaturan/nonaktif-akun', [PengaturanController::class, 'nonaktif'])->name('pengaturan.nonaktif');
    Route::post('/pengaturan/nonaktif-akun', [PengaturanController::class, 'updateStatus'])->name('pengaturan.updateStatus');
});
