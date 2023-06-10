<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\DashboardJamaah;
use App\Http\Controllers\ProfileJamaah;
use App\Http\Controllers\PaketUmrahControllers;
use App\Http\Controllers\JamaahControllers;
use App\Http\Controllers\KeberangkatanControllers;
use App\Http\Controllers\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);
Route::get('/', [Auth::class, 'index'])->name('login');
Route::get('lupa_password', [Auth::class, 'forgot']);
Route::post('/auth/lupa_password/updatelupapassword/',[Auth::class, 'updatelupapassword']);

Route::middleware(['auth','admin'])->group(function () {

//route admin dashboard    
Route::get('/admin/dashboard', [DashboardAdmin::class, 'index']);
  
//route admin paket umrah
Route::get('/admin/paket_umrah/', [PaketUmrahControllers::class, 'index']);
Route::get('/admin/paket_umrah/tambah', [PaketUmrahControllers::class, 'tambah']);
Route::post('/admin/paket_umrah/store', [PaketUmrahControllers::class, 'store']);
Route::get('/admin/paket_umrah/edit/{id}',[PaketUmrahControllers::class, 'edit']);
Route::post('/admin/paket_umrah/update',[PaketUmrahControllers::class, 'update']);
Route::get('/admin/paket_umrah/hapus/{id}',[PaketUmrahControllers::class, 'hapus']);

//route admin jamaah
Route::get('/admin/jamaah/', [JamaahControllers::class, 'index']);
Route::get('/admin/jamaah/tambah', [JamaahControllers::class, 'tambah']);
Route::post('/admin/jamaah/store', [JamaahControllers::class, 'store']);
Route::get('/admin/jamaah/edit/{id}',[JamaahControllers::class, 'edit']);
Route::post('/admin/jamaah/update',[JamaahControllers::class, 'update']);
Route::get('/admin/jamaah/hapus/{id}',[JamaahControllers::class, 'hapus']);
Route::get('/admin/jamaah/detail/{id}',[JamaahControllers::class, 'detail']);
Route::get('/admin/jamaah/cetak_pdf',[JamaahControllers::class, 'cetak_pdf']);
Route::get('/admin/jamaah/cetak_pdf_satuan/{id}',[JamaahControllers::class, 'cetak_pdf_satuan']);
Route::get('/admin/jamaah/downloadfile/{id}',[JamaahControllers::class, 'downloadfile']);

//route admin keberangkatan
Route::get('/admin/keberangkatan/', [KeberangkatanControllers::class, 'index']);
Route::get('/admin/keberangkatan/tambah', [KeberangkatanControllers::class, 'tambah']);
Route::post('/admin/keberangkatan/store', [KeberangkatanControllers::class, 'store']);
Route::get('/admin/keberangkatan/edit/{id}',[KeberangkatanControllers::class, 'edit']);
Route::post('/admin/keberangkatan/update',[KeberangkatanControllers::class, 'update']);
Route::get('/admin/keberangkatan/detail/{id}',[KeberangkatanControllers::class, 'detail']);
Route::get('/admin/keberangkatan/hapus/{id}',[KeberangkatanControllers::class, 'hapus']);
Route::get('/admin/keberangkatan/cetak_pdf_satuan/{id}',[KeberangkatanControllers::class, 'cetak_pdf_satuan']);

});

Route::middleware(['auth','jamaah'])->group(function () {

Route::get('/jamaah/profile', [ProfileJamaah::class, 'index']);
Route::post('/jamaah/profile/{id}',[ProfileJamaah::class, 'editprofile']);

//route jamaah dashboard    
Route::get('/jamaah/dashboard', [DashboardJamaah::class, 'index']);
Route::get('/jamaah/cetak_pdf_satuan/{id}',[DashboardJamaah::class, 'cetak_pdf_satuan']);
});