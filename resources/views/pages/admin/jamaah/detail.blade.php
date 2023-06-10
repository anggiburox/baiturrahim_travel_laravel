@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Detail Data Jamaah</h1>
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
                        <form class="row g-3 needs-validation mt-3" action="/admin/jamaah/update" method="POST"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <input type='hidden' value='{{$pp->ID_Jamaah}}' name='id_jamaah'>

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-4 col-form-label">NIK</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="number" class="form-control" name="nik" required min="0"
                                        max="999999999999999999" onkeypress="if (this.value.length > 17) return false;"
                                        value='{{$pp->NIK}}' readonly style='background:#e6e6fa;'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-lg-4 col-form-label">Tanggal Daftar </label>
                                <div class="col-sm-8 col-lg-8">
                                    <input type="date" class="form-control" name="tanggal_daftar"
                                        value='{{ $pp->Tanggal_Daftar }}' required readonly style='background:#e6e6fa;'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-md-4 col-lg-4 col-form-label">Nama Jamaah </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="nama_jamaah" required readonly
                                        style='background:#e6e6fa;' value='{{$pp->Nama_Jamaah}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company" class="col-md-4 col-lg-4 col-form-label">Tempat Lahir</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="tempat_lahir" required readonly
                                        style='background:#e6e6fa;' value='{{$pp->Tempat_Lahir}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Job" class="col-md-4 col-lg-4 col-form-label">Tanggal Lahir </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="date" class="form-control" name="tanggal_lahir" required readonly
                                        style='background:#e6e6fa;' value='{{$pp->Tanggal_Lahir}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Country" class="col-md-4 col-lg-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type='text' name='golongan_darah' value='{{$pp->Jenis_Kelamin}}'
                                        style='background:#e6e6fa;' class='form-control' readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-4 col-form-label">Alamat </label>
                                <div class="col-md-8 col-lg-8">
                                    <textarea name='alamat' class='form-control' required style='background:#e6e6fa;'
                                        readonly>{{$pp->Alamat}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-4 col-form-label">Nomor Telepon </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="number" min='0' max="999999999999999999"
                                        onkeypress="if (this.value.length > 12)" class="form-control" readonly
                                        style='background:#e6e6fa;' name="nomor_telepon" required
                                        value='{{$pp->Nomor_Telepon}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-4 col-form-label">Pekerjaan </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="pekerjaan" required readonly
                                        style='background:#e6e6fa;' value='{{$pp->Pekerjaan}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Twitter" class="col-md-4 col-lg-4 col-form-label">Asal Kota </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="asal_kota" required readonly
                                        style='background:#e6e6fa;' value='{{$pp->Asal_Kota}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Facebook" class="col-md-4 col-lg-4 col-form-label">Golongan Darah </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type='text' name='golongan_darah' value='{{$pp->Golongan_Darah}}' readonly
                                        style='background:#e6e6fa;' class='form-control'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Instagram" class="col-md-4 col-lg-4 col-form-label">Pendidikan</label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="pendidikan" readonly
                                        style='background:#e6e6fa;' value='{{$pp->Pendidikan}}'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Bukti Dokumentasi</label>
                                <div class="col-md-8 col-lg-8">
                                    @if ($pp->Bukti_Dokumentasi)
                                    <a href="/admin/jamaah/downloadfile/{{$pp->Bukti_Dokumentasi}}">{{$pp->Bukti_Dokumentasi}}
                                        <i class='bi bi-file-earmark-arrow-down'></i></a>
                                    @else
                                    File tidak tersedia
                                    @endif
                                </div>
                            </div>
                            @foreach($user as $user)
                            <input type="hidden" name="ID_User" value="{{ $user->ID_User}}">
                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Username <label
                                        style='color:red;'>(*)</label></label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="username" value='{{$user->Username}}'
                                        required readonly style='background:#e6e6fa;'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Password </label>
                                <div class="col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="password" readonly
                                        value='{{$user->Password}}' style='background:#e6e6fa;'>
                                </div>
                            </div>
                            @endforeach


                            <div class="col-12">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('errors'))
<script>
swal("Warning", "{{ Session::get('errors') }}", "warning");
</script>
@endif
@endsection