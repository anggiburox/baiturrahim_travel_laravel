<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JamaahModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\ImageCache;


class JamaahControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {   
        $pgw = DB::table('jamaah')->get();
        return view('pages/admin/jamaah/index',['pgw' => $pgw]);
    }

	public function cetak_pdf()
{
    set_time_limit(0); // Tambahkan baris ini
    $pgw = DB::table('jamaah')->get();
    $pdf = PDF::loadview('pages/admin/jamaah/jamaah_pdf', ['pgw' => $pgw]);
    return $pdf->stream('data-jamaah.pdf');
}

	

	public function cetak_pdf_satuan($id)
    {
		set_time_limit(0); 
        $pgw = DB::table('jamaah')->where('ID_Jamaah',$id)->get();
		$pdf = PDF::loadview('pages/admin/jamaah/jamaah_satuan_pdf',['pgw'=>$pgw]);
		return $pdf->download('data-jamaah-satuan.pdf');
    }

    public function tambah(){
		$kode = JamaahModel::kode();
        return view('pages/admin/jamaah/tambah', ['kode'=>$kode]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'foto_jamaah' => 'sometimes|image|mimes:jpeg,jpg,png',
		'username' => 'required|unique:users'
    ], [
        'foto_jamaah.image' => 'File yang diunggah harus berupa gambar.',
        'foto_jamaah.mimes' => 'Format file gambar harus JPEG, JPG, atau PNG.',
		'username.unique' => 'Username sudah terdaftar, silahkan masukkan username lain.'
    ]);

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

    // Insert data ke table jamaah
    DB::table('jamaah')->insert([
        'ID_Jamaah' => $request->id_jamaah,
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

	DB::table('users')->insert([
		'ID_Jamaah' => $request->id_jamaah,
        'Username' => $request->username,
		'Password' =>  $request->password,
        'ID_User_Roles' => '2'
	]);

    // Alihkan halaman ke halaman jamaah
    return redirect('/admin/jamaah/')->withSuccess('Data berhasil disimpan');
}


    public function edit($id)
	{
		// mengambil data jamaah berdasarkan id yang dipilih
		$pgw = DB::table('jamaah')->where('ID_Jamaah',$id)->get();
		$user = JamaahModel::userjoinjamaahwhere($id);
		// passing data jamaah yang didapat ke view edit.blade.php
		return view('pages/admin/jamaah/edit',['pgw' => $pgw, 'user'=>$user]);
	}

	// update data jamaah
	public function update(Request $request){
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
		return redirect('/admin/jamaah')->withSuccess('Data berhasil diperbaharui');
        }
        return redirect()->back()->withErrors(['ID_User' => 'User tidak ditemukan']);
    }

	public function downloadfile($id)
    {
	  // Generate path file
	  $path = public_path('assets/Bukti Dokumentasi/' . $id);
	  
	  // Download file
	  return response()->download($path);
    }

	
	public function detail($id)
	{
		// mengambil data jamaah berdasarkan id yang dipilih
		$pgw = DB::table('jamaah')->where('ID_Jamaah',$id)->get();
		$user = JamaahModel::userjoinjamaahwhere($id);
		// passing data jamaah yang didapat ke view edit.blade.php
		return view('pages/admin/jamaah/detail',['pgw' => $pgw, 'user'=>$user]);
	}

	


	// method untuk hapus data jamaah
	public function hapus($id) {
		// Mendapatkan informasi file foto dan bukti dokumentasi sebelum menghapus data dari database
		$jamaah = DB::table('jamaah')->select('Foto_Jamaah', 'Bukti_Dokumentasi')->where('ID_Jamaah', $id)->first();
		$fotoJamaahPath = public_path('assets/Foto Jamaah/' . $jamaah->Foto_Jamaah);
		$buktiDokumentasiPath = public_path('assets/Bukti Dokumentasi/' . $jamaah->Bukti_Dokumentasi);
	
		// Menghapus data jamaah berdasarkan ID yang dipilih
		DB::table('jamaah')->where('ID_Jamaah', $id)->delete();
		DB::table('users')->where('ID_Jamaah', $id)->delete();
	
		// Menghapus file foto jika file tersebut ada dan bukan null
		if ($jamaah->Foto_Jamaah && file_exists($fotoJamaahPath)) {
			unlink($fotoJamaahPath);
		}
	
		// Menghapus file bukti dokumentasi jika file tersebut ada dan bukan null
		if ($jamaah->Bukti_Dokumentasi && file_exists($buktiDokumentasiPath)) {
			unlink($buktiDokumentasiPath);
		}
	
		// Alihkan halaman ke halaman jamaah
		return redirect('/admin/jamaah')->withDanger('Data berhasil dihapus');
	}
	
		

}