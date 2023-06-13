@extends('layout.pimpinan')

@section('content')
<div class="pagetitle">
    <h1>Perbaharui Data Pimpinan</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>

            @foreach($pgw as $pp)
            <!-- Profile Edit Form -->
            <form class="row g-3 needs-validation" id="form-perbaharui" action="/pimpinan/profile/editprofile"
                method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="{{ $pp->ID_User}}">
                <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Username <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-md-8 col-lg-8">
                        <input type="text" class="form-control" name="username" value='{{$pp->Username}}' required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-4 col-form-label">Password </label>
                    <div class="col-md-8 col-lg-8">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" id="password" required
                                value="{{ $pp->Password}}">
                            <span class="input-group-text" id="basic-addon1" onclick="showPassword()">Show
                                Password</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="button" onclick="showConfirmation()"><i
                            class='bi bi-check-circle'></i>&nbsp;
                        Perbaharui</button>
                    <a href="/pimpinan/dashboard" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Profile Edit Form -->
            @endforeach


        </div>
    </div>
</div>

<script>
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showConfirmation() {
    // Menjalankan validasi form sebelum menampilkan konfirmasi
    if (document.getElementById('form-perbaharui').checkValidity()) {
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
    } else {
        // Menampilkan pesan error jika validasi form gagal
        swal({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap lengkapi semua kolom yang diperlukan!',
        });
    }
}
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
<script>
swal("Sukses", "{{ Session::get('success') }}", "success");
</script>
@endif

@if(Session::has('errors'))
<script>
swal("Warning", "{{ Session::get('errors') }}", "warning");
</script>
@endif
@endsection