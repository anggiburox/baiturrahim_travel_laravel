<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PaketUmrahModel;
use Illuminate\Support\Facades\DB;

class PaketUmrahPimpinanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = DB::table('paket_umrah')->get();
        return view('pages/pimpinan/paket_umrah/index',['pgw' => $pgw]);
    }
}