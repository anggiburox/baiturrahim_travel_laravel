@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Perbaharui Data Paket Umrah</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            @foreach($pgw as $pp)
            <form class="row g-3 needs-validation" id="form-perbaharui" action="/admin/paket_umrah/update"
                method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Paket Umrah <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_paket_umrah" value="{{$pp->ID_Paket_Umrah}}"
                            required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Paket Umrah <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_paket_umrah"
                            value='{{$pp->Nama_Paket_Umrah}}' required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Harga Paket Umrah <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="harga_paket_umrah"
                            value="Rp. {{ number_format($pp->Harga_Paket_Umrah, 0, ',', '.') }}" required>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="button" onclick="showConfirmation()"><i
                            class='bi bi-check-circle'></i>&nbsp;
                        Perbaharui</button>
                    <a href="/admin/paket_umrah" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->
            @endforeach

        </div>
    </div>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
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

var hargaObatInput = document.querySelector('input[name=harga_paket_umrah]');

hargaObatInput.addEventListener('input', function(evt) {
    var harga = evt.target.value.replace(/\D/g, '');
    harga = harga ? parseInt(harga, 10) : 0;
    evt.target.value = 'Rp. ' + harga.toLocaleString('id-ID', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
});
</script>

@endsection