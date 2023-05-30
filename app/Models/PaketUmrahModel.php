<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaketUmrahModel extends Model
{
    use HasFactory;

    protected $table='paket_umrah';  
    protected $fillable=['ID_Paket_Umrah','Nama_Paket_Umrah','Harga_Paket_Umrah'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Paket_Umrah';

    public static function kode()
    {
        $kode = DB::table('paket_umrah')->max('ID_Paket_Umrah');
        $addNol = '';
        $kode = str_replace("IPKT-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IPKT-".$addNol.$incrementKode;
        return $kodeBaru;
    }

}