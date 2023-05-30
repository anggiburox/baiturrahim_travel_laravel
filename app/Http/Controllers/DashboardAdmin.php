<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PasienModel;
use App\Models\DokterModel;
use App\Models\PerawatModel;
use App\Models\KasirModel;
use Illuminate\Support\Facades\DB;

class DashboardAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        // $pasien = PasienModel::count();
        // $dokter = DokterModel::count();
        // $perawat = PerawatModel::count();
        // $kasir = KasirModel::count();

        return view('pages/admin/dashboard',  []);
    }
}