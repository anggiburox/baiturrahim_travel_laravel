<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JamaahModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\ImageCache;


class JamaahPimpinanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = DB::table('jamaah')->get();
        return view('pages/pimpinan/jamaah/index',['pgw' => $pgw]);
    }

	public function cetak_pdf()
{
    set_time_limit(0); // Tambahkan baris ini
    $pgw = DB::table('jamaah')->get();
    $pdf = PDF::loadview('pages/pimpinan/jamaah/jamaah_pdf', ['pgw' => $pgw]);
    return $pdf->stream('data-jamaah.pdf');
}

	

	public function cetak_pdf_satuan($id)
    {
		set_time_limit(0); 
        $pgw = DB::table('jamaah')->where('ID_Jamaah',$id)->get();
		$pdf = PDF::loadview('pages/pimpinan/jamaah/jamaah_satuan_pdf',['pgw'=>$pgw]);
		return $pdf->download('data-jamaah-satuan.pdf');
    }

	public function downloadfile($id)
    {
	  // Generate path file
	  $path = public_path('assets/Bukti Dokumentasi/' . $id);
	  
	  // Download file
	  return response()->download($path);
    }

	
	public function detail($id)
	{
		// mengambil data jamaah berdasarkan id yang dipilih
		$pgw = DB::table('jamaah')->where('ID_Jamaah',$id)->get();
		$user = JamaahModel::userjoinjamaahwhere($id);
		// passing data jamaah yang didapat ke view edit.blade.php
		return view('pages/pimpinan/jamaah/detail',['pgw' => $pgw, 'user'=>$user]);
	}

}