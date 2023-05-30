<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeberangkatanModel extends Model
{
    use HasFactory;

    protected $table='keberangkatan';  
    protected $fillable=['ID_Keberangkatan','ID_Jamaah','ID_Paket_Umrah','Tanggal_Keberangkatan','Titik_Kumpul'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Keberangkatan';

    public static function kode()
    {
        $kode = DB::table('keberangkatan')->max('ID_keberangkatan');
        $addNol = '';
        $kode = str_replace("IKB-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IKB-".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public static function keberangkatanjoin(){
        $brng =  DB::table('keberangkatan')
        ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'keberangkatan.ID_Jamaah')
        ->join('paket_umrah', 'paket_umrah.ID_Paket_Umrah', '=', 'keberangkatan.ID_Paket_Umrah')
        ->get();
        return $brng;
    }   

}