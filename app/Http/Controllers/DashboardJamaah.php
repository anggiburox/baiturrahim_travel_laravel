<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PaketUmrahModel;
use App\Models\JamaahModel;
use App\Models\KeberangkatanModel;
use Illuminate\Support\Facades\DB;
use PDF;

class DashboardJamaah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   

		$pgw = KeberangkatanModel::keberangkatanjoinwheresession(session()->get('nik'));
        return view('pages/jamaah/dashboard', ['pgw'=>$pgw]);
    }

    public function cetak_pdf_satuan($id)
    {
        $nik = session('nik');
    
        $pgw = DB::table('keberangkatan')
            ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'keberangkatan.ID_Jamaah')
            ->join('paket_umrah', 'paket_umrah.ID_Paket_Umrah', '=', 'keberangkatan.ID_Paket_Umrah')
            ->where('keberangkatan.ID_Keberangkatan', $id)
            ->get();
    
        $pdf = PDF::loadview('pages/jamaah/cetak_pdf', ['pgw' => $pgw]);
        return $pdf->download('data-keberangkatan-satuan.pdf');
    }
    
}