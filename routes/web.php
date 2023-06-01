<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\ProfileAdmin;
use App\Http\Controllers\PaketUmrahControllers;
use App\Http\Controllers\JamaahControllers;
use App\Http\Controllers\KeberangkatanControllers;

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

Route::get('/', function () {
    return view('layout/admin');
});


Route::get('/admin/profile', [ProfileAdmin::class, 'index']);
Route::post('/admin/profile/{id}',[ProfileAdmin::class, 'editprofile']);

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
Route::get('/admin/jamaah/downloadfile/{id}',[JamaahControllers::class, 'downloadfile']);

//route admin keberangkatan
Route::get('/admin/keberangkatan/', [KeberangkatanControllers::class, 'index']);
Route::get('/admin/keberangkatan/tambah', [KeberangkatanControllers::class, 'tambah']);
Route::post('/admin/keberangkatan/store', [KeberangkatanControllers::class, 'store']);
Route::get('/admin/keberangkatan/edit/{id}',[KeberangkatanControllers::class, 'edit']);
Route::post('/admin/keberangkatan/update',[KeberangkatanControllers::class, 'update']);
Route::get('/admin/keberangkatan/hapus/{id}',[KeberangkatanControllers::class, 'hapus']);