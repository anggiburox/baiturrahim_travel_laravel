<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilePimpinan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table 
		$pgw = UsersModel::fetchUserID(session()->get('id_user'));
    	// mengirim data ke view index
        return view('pages/pimpinan/profile', ['pgw'=>$pgw]);
    }

    public function editprofile(Request $request){
        $user = UsersModel::find($request->id_user);

		if($user){
            $username_lama = $user->Username;
            $validatedData = $request->validate([
                'username' => $username_lama == $request->username ? '' : 'unique:users,Username',
			]);
			

			// cek apakah password diubah atau tidak
			if($request->input('password') != ''){
                $password = $request->input('password');
            } else {
                $password = $user->Password;
            }
		   
		DB::table('users')->where('ID_User',$request->id_user)->update([
			'Username' => $request->username,
            'Password' =>  $password,
		]);
		// alihkan halaman ke halaman pasien
		return redirect('/pimpinan/profile')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['ID_User' => 'User tidak ditemukan']);
    }
}