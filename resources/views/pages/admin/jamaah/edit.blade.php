@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Perbaharui Data Jamaah</h1>
</div><!-- End Page Title -->



@foreach($pgw as $pp)
<div class="row">
    <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


                @if(empty($pp->Foto_Jamaah))
                Data foto belum dimasukan
                @else<img src="{{ asset('assets/Foto Jamaah/' . $pp->Foto_Jamaah) }}" width="100" height="100"
                    style="border-radius:50%;">
                @endif
                <h2>{{$pp->Nama_Jamaah}}</h2>
                <div class="social-links mt-2">
                    {{$pp->Tempat_Lahir}},
                    {{ \Carbon\Carbon::parse($pp->Tanggal_Lahir)->isoFormat('D MMMM Y') }}
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-edit">Overview</button>
                    </li>

                </ul>

                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-edit">

                        <!-- Profile Edit Form -->
                        <form class="row g-3 needs-validation" id="form-perbaharui" action="/admin/jamaah/update"
                            method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                            <input type='hidden' value='{{$pp->ID_Jamaah}}' name='id_jamaah'>

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-4 col-form-label">NIK <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="number" class="form-control" name="nik" required min="0"
                                        max="999999999999999999" onkeypress="if (this.value.length > 17) return false;"
                                        value='{{$pp->NIK}}'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-4 col-lg-4 col-form-label">Nama Jamaah <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="nama_jamaah" required
                                        value='{{$pp->Nama_Jamaah}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company" class="col-md-4 col-lg-4 col-form-label">Tempat Lahir <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="tempat_lahir" required
                                        value='{{$pp->Tempat_Lahir}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Job" class="col-md-4 col-lg-4 col-form-label">Tanggal Lahir <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="date" class="form-control" name="tanggal_lahir" required
                                        value='{{$pp->Tanggal_Lahir}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-md-4 col-lg-4 col-form-label">Jenis Kelamin<label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="Perempuan" {{$pp->Jenis_Kelamin == 'Perempuan' ? 'checked' : ''}}
                                                required>
                                            <label class="form-check-label">
                                                Perempuan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="Laki-Laki" {{$pp->Jenis_Kelamin == 'Laki-Laki' ? 'checked' : ''}}
                                                required>
                                            <label class="form-check-label">
                                                Laki-Laki
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-4 col-form-label">Alamat <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <textarea name='alamat' class='form-control' required>{{$pp->Alamat}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-4 col-form-label">Nomor Telepon <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="number" min='0' max="999999999999999999"
                                        onkeypress="if (this.value.length > 12)" class="form-control"
                                        name="nomor_telepon" required value='{{$pp->Nomor_Telepon}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-4 col-form-label">Pekerjaan <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="pekerjaan" required
                                        value='{{$pp->Pekerjaan}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Twitter" class="col-md-4 col-lg-4 col-form-label">Asal Kota <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="asal_kota" required
                                        value='{{$pp->Asal_Kota}}'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-lg-4 col-form-label">Tanggal Daftar <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-sm-8 col-lg-8">
                                    <input type="date" class="form-control" name="tanggal_daftar"
                                        value='{{ $pp->Tanggal_Daftar }}' required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Facebook" class="col-md-4 col-lg-4 col-form-label">Golongan Darah </label>
                                <div class="col-md-8 col-lg-8">
                                    <select name='golongan_darah' class='form-control'>
                                        <option value=''>-- Pilih Golongan Darah --</option>
                                        <option value='A+' {{$pp->Golongan_Darah == 'A+' ? 'selected' : ''}}>A+</option>
                                        <option value='A-' {{$pp->Golongan_Darah == 'A-' ? 'selected' : ''}}>A-</option>
                                        <option value='B+' {{$pp->Golongan_Darah == 'B+' ? 'selected' : ''}}>B+</option>
                                        <option value='B-' {{$pp->Golongan_Darah == 'B-' ? 'selected' : ''}}>B-</option>
                                        <option value='AB+' {{$pp->Golongan_Darah == 'AB+' ? 'selected' : ''}}>AB+
                                        </option>
                                        <option value='AB-' {{$pp->Golongan_Darah == 'AB-' ? 'selected' : ''}}>AB-
                                        </option>
                                        <option value='O+' {{$pp->Golongan_Darah == 'O+' ? 'selected' : ''}}>O+</option>
                                        <option value='O-' {{$pp->Golongan_Darah == 'O-' ? 'selected' : ''}}>O-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Instagram" class="col-md-4 col-lg-4 col-form-label">Pendidikan</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="pendidikan"
                                        value='{{$pp->Pendidikan}}'>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Foto Jamaah</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="file" class="form-control" name="foto_jamaah">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Bukti Dokumentasi</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="file" class="form-control" name="bukti_dokumentasi">
                                </div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-success" type="button" onclick="showConfirmation()"><i
                                        class='bi bi-check-circle'></i>&nbsp;
                                    Perbaharui</button>
                                <a href="/admin/jamaah" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                                    Kembali</a>
                            </div>
                        </form><!-- End Profile Edit Form -->
                        @endforeach
                    </div>
                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
</div>

<script>
function showConfirmation() {
    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin memperbaharui data ini?",
        icon: "warning",
        buttons: ["Batal", "Ya"],
        dangerMode: true,
    }).then((confirm) => {
        if (confirm) {
            document.getElementById('form-perbaharui').submit();
        }
    });
}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('errors'))
<script>
swal("Warning", "{{ Session::get('errors') }}", "warning");
</script>
@endif
@endsection