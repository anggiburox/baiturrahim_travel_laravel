<?php

namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileJamaah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // mengambil data dari table 
		$pgw = UsersModel::fetchUserJamaah(session()->get('id_user'));
    	// mengirim data ke view index
        return view('pages/jamaah/profile', ['pgw'=>$pgw]);
    }

    public function editprofile(Request $request){
        $user = UsersModel::find($request->ID_User);

		if($user){
            $username_lama = $user->Username;
            $validatedData = $request->validate([
                'username' => $username_lama == $request->username ? '' : 'unique:users,Username',
				'foto_jamaah' => 'sometimes|image|mimes:jpeg,jpg,png',
            ],[
				'foto_jamaah.image' => 'File yang diunggah harus berupa gambar.',
				'foto_jamaah.mimes' => 'Format file gambar harus JPEG, JPG, atau PNG.',
            ]);
			

			// cek apakah password diubah atau tidak
			if($request->input('password') != ''){
                $password = $request->input('password');
            } else {
                $password = $user->Password;
            }
	 // Inisialisasi variabel foto_jamaah dan nama_buktidokumentasi
		 $foto_jamaah = null;
		 $nama_buktidokumentasi = null;
	 
		 if ($request->hasFile('foto_jamaah')) {
			 $file = $request->file('foto_jamaah');
	 
			 // Cek apakah file adalah format gambar
			 if (!in_array($file->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])) {
				 return redirect()->back()->withErrors('Format file foto harus JPEG, JPG, atau PNG.');
			 }
	 
			 $foto_jamaah = $file->getClientOriginalName();
	 
			 // Pindahkan file ke dalam folder foto jamaah
			 $tujuanfoto = 'assets/Foto Jamaah';
			 $file->move($tujuanfoto, $foto_jamaah);
		 }
	 
		 if ($request->hasFile('bukti_dokumentasi')) {
			 $bukti_dokumentasi = $request->file('bukti_dokumentasi');
	 
			 $nama_buktidokumentasi = $bukti_dokumentasi->getClientOriginalName();
	 
			 // Pindahkan file ke dalam folder bukti dokumentasi
			 $tujuandokumentasi = 'assets/Bukti Dokumentasi';
			 $bukti_dokumentasi->move($tujuandokumentasi, $nama_buktidokumentasi);
		 }
		   // update data jamaah
		   DB::table('jamaah')->where('ID_Jamaah',$request->id_jamaah)->update([
			'NIK' => $request->nik,
			'Nama_jamaah' => $request->nama_jamaah,
			'Tempat_Lahir' => $request->tempat_lahir,
			'Tanggal_Lahir' => $request->tanggal_lahir,
			'Jenis_Kelamin' => $request->jenis_kelamin,
			'Alamat' => $request->tempat_lahir,
			'Nomor_Telepon' => $request->nomor_telepon,
			'Pekerjaan' => $request->pekerjaan,
			'Asal_Kota' => $request->asal_kota,
			'Golongan_Darah' => $request->golongan_darah,
			'Pendidikan' => $request->pendidikan,
			'Foto_Jamaah' => $foto_jamaah,
			'Bukti_Dokumentasi' => $nama_buktidokumentasi,
			'Tanggal_Daftar' => $request->tanggal_daftar
		]);
			
		DB::table('users')->where('ID_Jamaah',$request->id_jamaah)->update([
			'Username' => $request->username,
            'Password' =>  $password,
		]);
		// alihkan halaman ke halaman pasien
		return redirect('/jamaah/profile')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['ID_User' => 'User tidak ditemukan']);
    }
}