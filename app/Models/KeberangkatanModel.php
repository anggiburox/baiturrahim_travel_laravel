<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeberangkatanModel extends Model
{
    use HasFactory;

    protected $table='keberangkatan';  
    protected $fillable=['ID_Keberangkatan','Kode_Keberangkatan','ID_Jamaah','ID_Paket_Umrah','Tanggal_Keberangkatan','Titik_Kumpul','Tanggal_Kepulangan','Keterangan'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Keberangkatan';

    public static function kode()
    {
        $kode = DB::table('keberangkatan')->max('Kode_Keberangkatan');
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
        $brng = DB::table('keberangkatan')
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
                DB::raw('GROUP_CONCAT(paket_umrah.Harga_Paket_Umrah SEPARATOR ", ") as Harga_Paket_Umrah')
            )
            ->groupBy('keberangkatan.ID_Paket_Umrah', 'keberangkatan.Tanggal_Keberangkatan', 'keberangkatan.Titik_Kumpul',
            'keberangkatan.Tanggal_Kepulangan',
            'keberangkatan.Keterangan')
            ->get();
    
        return $brng;
    }

    public static function keberangkatanjoinwheresession($id){
        $brng = DB::table('keberangkatan')
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
                DB::raw('GROUP_CONCAT(keberangkatan.ID_Keberangkatan SEPARATOR ", ") as ID_Keberangkatan'),
                DB::raw('GROUP_CONCAT(jamaah.NIK SEPARATOR ", ") as NIK'),
                DB::raw('GROUP_CONCAT(jamaah.Nama_Jamaah SEPARATOR ", ") as Nama_Jamaah'),
                DB::raw('GROUP_CONCAT(paket_umrah.Harga_Paket_Umrah SEPARATOR ", ") as Harga_Paket_Umrah')
            )
            ->groupBy('keberangkatan.ID_Paket_Umrah', 'keberangkatan.Tanggal_Keberangkatan', 'keberangkatan.Titik_Kumpul',
            'keberangkatan.Tanggal_Kepulangan',
            'keberangkatan.Keterangan')
            ->where('jamaah.NIK', $id)
            ->get();
    
        return $brng;
    }
    
    

}