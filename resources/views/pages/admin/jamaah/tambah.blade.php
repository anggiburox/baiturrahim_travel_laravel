@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Jamaah</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/admin/jamaah/store" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" name="id_jamaah" value="{{$kode}}">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">NIK <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="nik" required min="0" max="999999999999999999"
                            onkeypress="if (this.value.length > 17) return false;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Jamaah <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_jamaah" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tempat Lahir <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tempat_lahir" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Lahir <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal_lahir" value='{{ date("Y-m-d") }}'
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Jenis Kelamin<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                required>
                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki"
                                required>
                            <label class="form-check-label">
                                Laki-Laki
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Alamat <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <textarea name='alamat' class='form-control' required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nomor Telepon <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="number" min='0' max="999999999999999999" onkeypress="if (this.value.length < 10)"
                            class="form-control" name="nomor_telepon" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Pekerjaan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pekerjaan" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Asal Kota <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="asal_kota" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Daftar <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal_daftar" value='{{ date("Y-m-d") }}'
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Golongan Darah </label>
                    <div class="col-sm-5">
                        <select name='golongan_darah' class='form-control'>
                            <option value=''>-- Pilih Golongan Darah --</option>
                            <option value='A+'>A+</option>
                            <option value='A-'>A-</option>
                            <option value='B+'>B+</option>
                            <option value='B-'>B-</option>
                            <option value='AB+'>AB+</option>
                            <option value='AB+'>AB-</option>
                            <option value='O+'>O+</option>
                            <option value='O-'>O-</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Pendidikan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pendidikan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Foto Jamaah</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="foto_jamaah">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Bukti Dokumentasi</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="bukti_dokumentasi">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label select2">Username <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type='text' name='username' class='form-control' required>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Password <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                        Tambah</button>
                    <a href="/admin/jamaah" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->

        </div>
    </div>

</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('errors'))
<script>
swal("Warning", "{{ Session::get('errors') }}", "warning");
</script>
@endif
@endsection