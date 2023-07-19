<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KeberangkatanModel;
use App\Models\JamaahModel;
use App\Models\PaketUmrahModel;
use Illuminate\Support\Facades\DB;
use PDF;

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
	// DB::table('keberangkatan')->insert([
	// 	'Kode_Keberangkatan' => $request->kode,
	// 	'ID_Jamaah' => $request->id_jamaah,
    //     'ID_Paket_Umrah' => $request->id_paket_umrah,
    //     'Tanggal_Keberangkatan' => $request->tanggal_keberangkatan,
    //     'Titik_Kumpul' => $request->titik_kumpul
	// ]);
	foreach ($request->input('id_jamaah') as $id_jamaah) {
        DB::table('keberangkatan')->insert([
            'Kode_Keberangkatan' => $request->kode,
			'ID_Jamaah' => $id_jamaah,
			'ID_Paket_Umrah' => $request->id_paket_umrah,
			'Tanggal_Keberangkatan' => $request->tanggal_keberangkatan,
			'Titik_Kumpul' => $request->titik_kumpul,
			'Tanggal_Kepulangan' => $request->tanggal_kepulangan,
			'Keterangan' => $request->keterangan,
        ]);
    }

	// alihkan halaman ke halaman keberangkatan
	return redirect('/admin/keberangkatan/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data keberangkatan berdasarkan id yang dipilih
		$pgw = DB::table('keberangkatan')
        ->select('Kode_Keberangkatan', 'Tanggal_Keberangkatan','Titik_Kumpul','Tanggal_Kepulangan','Keterangan','ID_Paket_Umrah','ID_Jamaah')
        ->distinct()
        ->where('Kode_Keberangkatan', $id)
        ->get();
		$paket = PaketUmrahModel::get();
		$jamaah = JamaahModel::get();
		// passing data keberangkatan yang didapat ke view edit.blade.php
		return view('pages/admin/keberangkatan/edit',['pgw' => $pgw, 'paket'=>$paket, 'jamaah'=>$jamaah]);
	}

	public function cetak_pdf_satuan($id)
    {
		$pgw = DB::table('keberangkatan')
		->join('jamaah', 'jamaah.ID_Jamaah', '=', 'keberangkatan.ID_Jamaah')
        ->join('paket_umrah', 'paket_umrah.ID_Paket_Umrah', '=', 'keberangkatan.ID_Paket_Umrah')
		->select(
			'keberangkatan.ID_Paket_Umrah',
			'keberangkatan.Tanggal_Keberangkatan',
			'keberangkatan.Titik_Kumpul',
			'keberangkatan.Tanggal_Kepulangan',
			'keberangkatan.Keterangan',
			'keberangkatan.Tanggal_Kepulangan',
			'keberangkatan.Keterangan',
			DB::raw('GROUP_CONCAT(DISTINCT keberangkatan.Kode_Keberangkatan SEPARATOR ", ") as Kode_Keberangkatan'),
			DB::raw('GROUP_CONCAT(DISTINCT paket_umrah.Nama_Paket_Umrah SEPARATOR ", ") as Nama_Paket_Umrah'),
			DB::raw('GROUP_CONCAT(jamaah.NIK SEPARATOR ", ") as NIK'),
			DB::raw('GROUP_CONCAT(jamaah.Nama_Jamaah SEPARATOR ", ") as Nama_Jamaah'),
			DB::raw('GROUP_CONCAT(jamaah.Nomor_Telepon SEPARATOR ", ") as Nomor_Telepon'),
			DB::raw('GROUP_CONCAT(jamaah.Alamat SEPARATOR ", ") as Alamat'),
			DB::raw('GROUP_CONCAT(paket_umrah.Harga_Paket_Umrah SEPARATOR ", ") as Harga_Paket_Umrah')
		)
		->groupBy('keberangkatan.ID_Paket_Umrah', 'keberangkatan.Tanggal_Keberangkatan', 'keberangkatan.Titik_Kumpul',
		'keberangkatan.Tanggal_Kepulangan',
		'keberangkatan.Keterangan')
		->where('Kode_Keberangkatan', $id)
        ->get();
		$pdf = PDF::loadview('pages/admin/keberangkatan/cetak_pdf',['pgw'=>$pgw]);
		return $pdf->download('data-keberangkatan-satuan.pdf');
    }

	// update data keberangkatan
	public function update(Request $request){
		// update data keberangkatan
		

		$result = DB::table('keberangkatan')
		->where('Kode_Keberangkatan', $request->kode)
		->delete();
	
	if ($result) {
		foreach ($request->input('id_jamaah') as $id_jamaah) {
			DB::table('keberangkatan')->insert([
				'Kode_Keberangkatan' => $request->kode,
				'ID_Jamaah' => $id_jamaah,
				'ID_Paket_Umrah' => $request->id_paket_umrah,
				'Tanggal_Keberangkatan' => $request->tanggal_keberangkatan,
				'Titik_Kumpul' => $request->titik_kumpul,
				'Tanggal_Kepulangan' => $request->tanggal_kepulangan,
				'Keterangan' => $request->keterangan,
			]);
		}
    }
		// alihkan halaman ke halaman keberangkatan
		return redirect('/admin/keberangkatan')->withSuccess('Data berhasil diperbaharui');
    }

	public function detail($id)
	{
		// mengambil data jamaah berdasarkan id yang dipilih
		// $pgw = DB::table('keberangkatan')
		// ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'keberangkatan.ID_Jamaah')
        // ->join('paket_umrah', 'paket_umrah.ID_Paket_Umrah', '=', 'keberangkatan.ID_Paket_Umrah')
		// ->distinct()
		// ->where('Kode_Keberangkatan',$id)->get();

		$pgw = DB::table('keberangkatan')
		->join('jamaah', 'jamaah.ID_Jamaah', '=', 'keberangkatan.ID_Jamaah')
        ->join('paket_umrah', 'paket_umrah.ID_Paket_Umrah', '=', 'keberangkatan.ID_Paket_Umrah')
		->select(
			'keberangkatan.ID_Paket_Umrah',
			'keberangkatan.Tanggal_Keberangkatan',
			'keberangkatan.Titik_Kumpul',
			'keberangkatan.Tanggal_Kepulangan',
			'keberangkatan.Keterangan',
			DB::raw('GROUP_CONCAT(DISTINCT keberangkatan.Kode_Keberangkatan SEPARATOR ", ") as Kode_Keberangkatan'),
			DB::raw('GROUP_CONCAT(DISTINCT paket_umrah.Nama_Paket_Umrah SEPARATOR ", ") as Nama_Paket_Umrah'),
			DB::raw('GROUP_CONCAT(jamaah.NIK SEPARATOR ", ") as NIK'),
			DB::raw('GROUP_CONCAT(jamaah.Nama_Jamaah SEPARATOR ", ") as Nama_Jamaah'),
			DB::raw('GROUP_CONCAT(jamaah.Nomor_Telepon SEPARATOR ", ") as Nomor_Telepon'),
			DB::raw('GROUP_CONCAT(jamaah.Alamat SEPARATOR ", ") as Alamat'),
			DB::raw('GROUP_CONCAT(paket_umrah.Harga_Paket_Umrah SEPARATOR ", ") as Harga_Paket_Umrah')
		)
		->groupBy('keberangkatan.ID_Paket_Umrah', 'keberangkatan.Tanggal_Keberangkatan', 'keberangkatan.Titik_Kumpul')
		->where('Kode_Keberangkatan', $id)
        ->get();
		// passing data jamaah yang didapat ke view edit.blade.php
		return view('pages/admin/keberangkatan/detail',['pgw' => $pgw]);
	}

	// method untuk hapus data keberangkatan
	public function hapus($id){
		// menghapus data keberangkatan berdasarkan id yang dipilih
		DB::table('keberangkatan')->where('Kode_Keberangkatan',$id)->delete();
		
		// alihkan halaman ke halaman keberangkatan
		return redirect('/admin/keberangkatan')->withDanger('Data berhasil dihapus');
	}
}