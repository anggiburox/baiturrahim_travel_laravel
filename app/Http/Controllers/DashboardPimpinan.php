<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PaketUmrahModel;
use App\Models\JamaahModel;
use App\Models\KeberangkatanModel;
use Illuminate\Support\Facades\DB;

class DashboardPimpinan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   

        $paket = PaketUmrahModel::count();
        $jamaah = JamaahModel::count();

        $jamaahPerBulan = JamaahModel::select(DB::raw('MONTH(Tanggal_Daftar) as bulan'), DB::raw('YEAR(Tanggal_Daftar) as tahun'), DB::raw('count(*) as total'))
        ->groupBy('bulan', 'tahun')
        ->get();


        $keberangkatan = KeberangkatanModel::count();
        $keberangkatanPerBulan = KeberangkatanModel::select(DB::raw('MONTH(Tanggal_Keberangkatan) as bulan'), DB::raw('YEAR(Tanggal_Keberangkatan) as tahun'), DB::raw('count(*) as total'))
        ->groupBy('bulan', 'tahun')
        ->get();

        return view('pages/pimpinan/dashboard',  ['paket'=>$paket, 'jamaah'=>$jamaah, 'keberangkatan'=>$keberangkatan, 
        'jamaahPerBulan' => $jamaahPerBulan, 
        'keberangkatanPerBulan' => $keberangkatanPerBulan]);
    }
}