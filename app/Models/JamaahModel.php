<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JamaahModel extends Model
{
    use HasFactory;

    protected $table='jamaah';  
    protected $fillable=['ID_Jamaah','NIK','Nama_Jamaah','Tempat_Lahir','Tanggal_Lahir','Jenis_Kelamin','Alamat','Nomor_Telepon','Pekerjaan','Asal_Kota','Golongan_Darah','Pendidikan','Foto_Jamaah','Bukti_Dokumentasi','Tanggal_Daftar'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_Jamaah';

    public static function kode()
    {
        $kode = DB::table('jamaah')->max('ID_Jamaah');
        $addNol = '';
        $kode = str_replace("IJA-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
    
        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode == 3)) {
            $addNol = "0";
        }
    
        $kodeBaru = "IJA-".$addNol.$incrementKode;
        return $kodeBaru;
    }

    public static function userjoinjamaahwhere($id){
        $brng =  DB::table('users')
        ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'users.ID_Jamaah')
        ->where('users.ID_Jamaah',$id)
        ->get();
        return $brng;
    }   
}