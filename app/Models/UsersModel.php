<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table='users';  
    protected $fillable=['ID_User','ID_Perawat','ID_Dokter','ID_Pasien','ID_Kasir','Username','Password','ID_User_Roles'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_User';

    public static function fetchUserJoinPegawai($id)
    {   
        $brng =  DB::table('users')
        ->join('pegawai', 'pegawai.ID_Pegawai', '=', 'users.ID_Pegawai')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }
    public static function isUniqueUsername($username, $id)
{
    return !static::where('username', $username)
            ->where('ID_User', '<>', $id)
            ->exists();
}
    
    public static function fetchusers($id)
    {
        $brng =  DB::table('users')
        ->where('users.ID_User',$id)
        ->first();
        return $brng;
    }

    public static function fetchjoinpasien($id)
    {
        $brng =  DB::table('users')
        ->join('pasien', 'pasien.ID_Pasien', '=', 'users.ID_Pasien')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }

    public static function fetchUserJoinPeasien($id)
    {   
        $brng =  DB::table('users')
        ->join('pasien', 'pasien.ID_Pasien', '=', 'users.ID_Pasien')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }
    

    public static function fetchjoinpasienleftjoin($id)
    {
        $brng =  DB::table('users')
        ->leftJoin('pasien', 'pasien.ID_Pasien', '=', 'users.ID_Pasien')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }
    

    public static function fetchjoinperawat($id)
    {
        $brng =  DB::table('users')
        ->join('perawat', 'perawat.ID_Perawat', '=', 'users.ID_Perawat')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }

    public static function fetchUserJoinPerawat($id)
    {   
        $brng =  DB::table('users')
        ->join('perawat', 'perawat.ID_Perawat', '=', 'users.ID_Perawat')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchjoindokter($id)
    {
        $brng =  DB::table('users')
        ->join('dokter', 'dokter.ID_Dokter', '=', 'users.ID_Dokter')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }
    
    public static function fetchUserJoinDokter($id)
    {   
        $brng =  DB::table('users')
        ->join('dokter', 'dokter.ID_Dokter', '=', 'users.ID_Dokter')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchjoinkasir($id)
    {
        $brng =  DB::table('users')
        ->join('kasir', 'kasir.ID_Kasir', '=', 'users.ID_Kasir')
        ->where('ID_User',$id)
        ->first();
        return $brng;
    }

    public static function fetchUserJoinKasir($id)
    {   
        $brng =  DB::table('users')
        ->join('kasir', 'kasir.ID_Kasir', '=', 'users.ID_Kasir')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }
}