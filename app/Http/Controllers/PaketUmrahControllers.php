<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PaketUmrahModel;
use Illuminate\Support\Facades\DB;

class PaketUmrahControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = DB::table('paket_umrah')->get();
        return view('pages/admin/paket_umrah/index',['pgw' => $pgw]);
    }

    public function tambah(){
		$kode = PaketUmrahModel::kode();
        return view('pages/admin/paket_umrah/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request){
		
	$harga_paket_umrah = preg_replace('/\D/', '', $request->harga_paket_umrah);
	// insert data ke table paket_umrah
	DB::table('paket_umrah')->insert([
		'ID_Paket_Umrah' => $request->id_paket_umrah,
		'Nama_Paket_Umrah' => $request->nama_paket_umrah,
        'Harga_Paket_Umrah' => $harga_paket_umrah
	]);

	// alihkan halaman ke halaman paket_umrah
	return redirect('/admin/paket_umrah/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data paket_umrah berdasarkan id yang dipilih
		$pgw = DB::table('paket_umrah')->where('ID_Paket_Umrah',$id)->get();
		// passing data paket_umrah yang didapat ke view edit.blade.php
		return view('pages/admin/paket_umrah/edit',['pgw' => $pgw]);
	}

	// update data paket_umrah
	public function update(Request $request){
		// update data paket_umrah
		
	$harga_paket_umrah = preg_replace('/\D/', '', $request->harga_paket_umrah);
		DB::table('paket_umrah')->where('ID_Paket_Umrah',$request->id_paket_umrah)->update([
            'Nama_Paket_Umrah' => $request->nama_paket_umrah,
            'Harga_Paket_Umrah' => $harga_paket_umrah
        ]);
		// alihkan halaman ke halaman paket_umrah
		return redirect('/admin/paket_umrah')->withSuccess('Data berhasil diperbaharui');
    }

	// method untuk hapus data paket_umrah
	public function hapus($id){
		// menghapus data paket_umrah berdasarkan id yang dipilih
		DB::table('paket_umrah')->where('ID_Paket_Umrah',$id)->delete();
		
		// alihkan halaman ke halaman paket_umrah
		return redirect('/admin/paket_umrah')->withDanger('Data berhasil dihapus');
	}
}