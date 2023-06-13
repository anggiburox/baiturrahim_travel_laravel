<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KeberangkatanModel;
use App\Models\JamaahModel;
use App\Models\PaketUmrahModel;
use Illuminate\Support\Facades\DB;
use PDF;

class KeberangkatanPimpinanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = KeberangkatanModel::keberangkatanjoin();
        return view('pages/pimpinan/keberangkatan/index',['pgw' => $pgw]);
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
		$pdf = PDF::loadview('pages/pimpinan/keberangkatan/cetak_pdf',['pgw'=>$pgw]);
		return $pdf->download('data-keberangkatan-satuan.pdf');
    }
}