<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('pages/auth/login');
    }

    public function forgot()
    {  
        return view('pages/auth/lupa_password');
    }


    // update data diskusi
	public function updatelupapassword(Request $request){
        $user = UsersModel::where('username', $request->username)->first();
        if ($user) {
            // jika username ditemukan
            // update data users
            DB::table('users')->where('Username',$request->username)->update([
                'Password' =>  $request->input('password'),
            ]);
            // alihkan halaman ke halaman lupa_password
            return redirect('/')->withSuccess('Password berhasil diperbarui');
        } else {
            // jika username tidak ditemukan
            return back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function login(Request $request){  
        $post = request()->all();
        $user = UsersModel::where('Username', $post['username'])->first();
        if ($user) {
            $role = $user->ID_User_Roles;
            if ($role == 1) {
                $tutor = UsersModel::fetchusers($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'username'     => $tutor->Username,
                        'password' =>$tutor->Password,
                        'id_user'     => $user->ID_User,
                        'role'      => $tutor->ID_User_Roles
                    ];
                    $request->session()->put($params);
                    if ($role == 1) {
                        return redirect()->to('/admin/dashboard');
                    } 
                } else { 
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } else if ($role == 2) {
                $jamaah = UsersModel::fetchUserJoinJamaah($user->ID_User);
                if ($post['password'] == $user->Password) {
                    $params = [
                        'islogin'   => true,
                        'id_user'     => $user->ID_User,
                        'username'     => $jamaah->Username,
                        'password' =>$jamaah->Password,
                        'nik'     => $jamaah->NIK,
                        'nama_jamaah'     => $jamaah->Nama_Jamaah,
                        'alamat_jamaah'     => $jamaah->Alamat,
                        'role'      => $jamaah->ID_User_Roles
                    ];          
                    $request->session()->put($params);
                    return redirect()->to('/jamaah/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Password salah!');
                }
            } 
            }else{
                return redirect()->back()->with('error', 'Username salah!');
            }
    }
    

    public function logout(){
        Session::forget('id_user');
        Session::forget('islogin');
        Session::forget('username');
        Session::forget('password');
        Session::forget('nama_jamaah');
        Session::forget('nik');
        Session::forget('alamat');
        Session::forget('role');
        Session::flush();
        return redirect()->to('/');
    }
}