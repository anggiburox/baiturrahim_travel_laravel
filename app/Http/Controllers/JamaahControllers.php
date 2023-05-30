<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JamaahModel;
use Illuminate\Support\Facades\DB;

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

    public function tambah(){
        return view('pages/admin/jamaah/tambah');
    }

    public function store(Request $request){
		$validatedData = $request->validate([
            'foto_jamaah' => 'sometimes|image|mimes:jpeg,jpg,png',
        ],[
            'foto_jamaah.image' => 'File yang diunggah harus berupa gambar.',
            'foto_jamaah.mimes' => 'Format file gambar harus JPEG, JPG, atau PNG.',
        ]);
		if($request->hasFile('foto_jamaah')){
            $file = $request->file('foto_jamaah');
   
            $foto_jamaah = $file->getClientOriginalName();
			

                 //cek apakah file adalah format gambar
        if(!in_array($file->getClientOriginalExtension(),['jpeg','jpg','PNG'])){
            return redirect()->back()->withErrors('Format file foto harus JPEG, JPG, atau PNG.');
        }

		   //ambil file
		   $bukti_dokumentasi = $request->file('bukti_dokumentasi');
	   
		   $nama_buktidokumentasi = $bukti_dokumentasi->getClientOriginalName();
		   
		   //pindahkan file kedalam folder doc
		   $tujuanfoto = 'assets/Foto Jamaah';
		   $tujuandokumentasi = 'assets/Bukti Dokumentasi';
		   $file->move($tujuanfoto,$foto_jamaah);
		   $bukti_dokumentasi->move($tujuandokumentasi,$nama_buktidokumentasi);
		   
	// insert data ke table jamaah
	DB::table('jamaah')->insert([
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
	}else{
		DB::table('jamaah')->insert([
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
			'Tanggal_Daftar' => $request->tanggal_daftar
		]);
	}

	// alihkan halaman ke halaman jamaah
	return redirect('/admin/jamaah/')->withSuccess('Data berhasil disimpan');
    }

    public function edit($id)
	{
		// mengambil data jamaah berdasarkan id yang dipilih
		$pgw = DB::table('jamaah')->where('ID_jamaah',$id)->get();
		// passing data jamaah yang didapat ke view edit.blade.php
		return view('pages/admin/jamaah/edit',['pgw' => $pgw]);
	}

	// update data jamaah
	public function update(Request $request){
		$validatedData = $request->validate([
            'foto_jamaah' => 'sometimes|image|mimes:jpeg,jpg,png',
        ],[
            'foto_jamaah.image' => 'File yang diunggah harus berupa gambar.',
            'foto_jamaah.mimes' => 'Format file gambar harus JPEG, JPG, atau PNG.',
        ]);
		if($request->hasFile('foto_jamaah')){
            $file = $request->file('foto_jamaah');
   
            $foto_jamaah = $file->getClientOriginalName();
			

                 //cek apakah file adalah format gambar
        if(!in_array($file->getClientOriginalExtension(),['jpeg','jpg','PNG'])){
            return redirect()->back()->withErrors('Format file foto harus JPEG, JPG, atau PNG.');
        }

		   //ambil file
		   $bukti_dokumentasi = $request->file('bukti_dokumentasi');
		   
		   $nama_buktidokumentasi = $bukti_dokumentasi->getClientOriginalName();
		   
		   //pindahkan file kedalam folder doc
		   $tujuanfoto = 'assets/Foto Jamaah';
		   $tujuandokumentasi = 'assets/Bukti Dokumentasi';
		   $file->move($tujuanfoto,$foto_jamaah);
		   $bukti_dokumentasi->move($tujuandokumentasi,$nama_buktidokumentasi);
		   
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
		}else{
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
				'Tanggal_Daftar' => $request->tanggal_daftar
			]);
		}
		// alihkan halaman ke halaman jamaah
		return redirect('/admin/jamaah')->withSuccess('Data berhasil diperbaharui');
    }

	// method untuk hapus data jamaah
	public function hapus($id){
			// Mendapatkan informasi file foto dan bukti dokumentasi sebelum menghapus data dari database
			$jamaah = DB::table('jamaah')->select('Foto_Jamaah', 'Bukti_Dokumentasi')->where('ID_Jamaah', $id)->first();
			$fotoJamaahPath = public_path('assets/Foto Jamaah/' . $jamaah->Foto_Jamaah);
			$buktiDokumentasiPath = public_path('assets/Bukti Dokumentasi/' . $jamaah->Bukti_Dokumentasi);
		
			// Menghapus data jamaah berdasarkan ID yang dipilih
			DB::table('jamaah')->where('ID_Jamaah', $id)->delete();
		
			// Menghapus file foto jika file tersebut ada
			if (file_exists($fotoJamaahPath)) {
				unlink($fotoJamaahPath);
			}
			
			// Menghapus file bukti dokumentasi jika file tersebut ada
			if (file_exists($buktiDokumentasiPath)) {
				unlink($buktiDokumentasiPath);
			}
			
			// Alihkan halaman ke halaman jamaah
			return redirect('/admin/jamaah')->withDanger('Data berhasil dihapus');
		}
		

}