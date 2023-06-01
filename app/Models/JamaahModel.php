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


    public static function fetchdata($id){
        // Jika ID materi tidak diberikan, ambil semua data materi
        if ($id == null) {
            return JamaahModel::all();
        }
    
        // Ambil data materi berdasarkan ID
        // return JamaahModel::where('ID_Jamaah', $id)->first();
        }
}