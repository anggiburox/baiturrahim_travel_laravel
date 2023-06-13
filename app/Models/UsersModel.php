<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    use HasFactory;

    protected $table='users';  
    protected $fillable=['ID_User','ID_Jamaah','Username','Password','ID_User_Roles'];  
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'ID_User';
    
    public static function fetchusers($id)
    {
        $brng =  DB::table('users')
        ->where('users.ID_User',$id)
        ->first();
        return $brng;
    }

    public static function fetchUser($id)
    {   
        $brng =  DB::table('users')
        ->where('users.Username', $id)
        ->get();
        return $brng;
    }

    public static function fetchUserID($id)
    {   
        $brng =  DB::table('users')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchUserJamaah($id)
    {   
        $brng =  DB::table('users')
        ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'users.ID_Jamaah')
        ->where('users.ID_User', $id)
        ->get();
        return $brng;
    }

    public static function fetchUserJoinJamaah($id)
    {   
        $brng =  DB::table('users')
        ->join('jamaah', 'jamaah.ID_Jamaah', '=', 'users.ID_Jamaah')
        ->where('users.ID_User', $id)
        ->first();
        return $brng;
    }
}