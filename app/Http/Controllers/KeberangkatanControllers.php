<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KeberangkatanModel;
use App\Models\JamaahModel;
use App\Models\PaketUmrahModel;
use Illuminate\Support\Facades\DB;

class KeberangkatanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = KeberangkatanModel::keberangkatanjoin();
        return view('pages/admin/keberangkatan/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = KeberangkatanModel::kode();
		$paket = PaketUmrahModel::get();
		$jamaah = JamaahModel::get();
        return view('pages/admin/keberangkatan/tambah', ['kode'=>$kode, 'paket'=>$paket, 'jamaah'=>$jamaah]);
    }

    public function store(Request $request){
	// insert data ke table keberangkatan
	DB::table('keberangkatan')->insert([
		'ID_Keberangkatan' => $request->id_keberangkatan,
		'ID_Jamaah' => $request->id_jamaah,
        'ID_Paket_Umrah' => $request->id_paket_umrah,
        'Tanggal_Keberangkatan' => $request->tanggal_keberangkatan,
        'Titik_Kumpul' => $request->titik_kumpul
	]);

	// alihkan halaman ke halaman keberangkatan
	return redirect('/admin/keberangkatan/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('keberangkatan')->where('ID_keberangkatan',$id)->get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/keberangkatan/edit',['pgw' => $pgw]);
	}

	// update data keberangkatan
	public function update(Request $request){
		// update data keberangkatan
		
	$harga_keberangkatan = preg_replace('/\D/', '', $request->harga_keberangkatan);
		DB::table('keberangkatan')->where('ID_keberangkatan',$request->id_keberangkatan)->update([
            'Nama_keberangkatan' => $request->nama_keberangkatan,
            'Harga_keberangkatan' => $harga_keberangkatan
        ]);
		// alihkan halaman ke halaman keberangkatan
		return redirect('/admin/keberangkatan')->withSuccess('Data berhasil diperbaharui');
    }

	// method untuk hapus data keberangkatan
	public function hapus($id){
		// menghapus data keberangkatan berdasarkan id yang dipilih
		DB::table('keberangkatan')->where('ID_keberangkatan',$id)->delete();
		
		// alihkan halaman ke halaman keberangkatan
		return redirect('/admin/keberangkatan')->withDanger('Data berhasil dihapus');
	}
}