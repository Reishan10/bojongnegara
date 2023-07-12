<?php

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\PengaturanController;
use App\Http\Controllers\Backend\TagController;
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

Route::get('/', function () {
    return view('welcome');
});

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

    //Pengaturan
    Route::get('/pengaturan/profile', [PengaturanController::class, 'profile'])->name('pengaturan.profile');
    Route::post('/pengaturan/profile/{profile}', [PengaturanController::class, 'updateProfile'])->name('pengaturan.updateProfile');

    Route::get('/pengaturan/ganti-password', [PengaturanController::class, 'gantiPassword'])->name('pengaturan.gantiPassword');
    Route::post('/pengaturan/ganti-password', [PengaturanController::class, 'updatePassword'])->name('pengaturan.updatePassword');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Perangkat'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
