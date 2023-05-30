@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Paket Umrah</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/admin/keberangkatan/store" method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Keberangkatan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_keberangkatan" value="{{$kode}}" required
                            readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label select2">Nama Paket<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_paket_umrah' class='form-control'>
                            <option value="">-- Pilih Data Paket --</option>
                            @foreach($paket as $pkt)
                            <option value="{{ $pkt->ID_Paket_Umrah }}">{{ $pkt->Nama_Paket_Umrah}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Harga Paket<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type='text' class='form_control' value='' readonly style='background:#e6e6fa;'>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">NIK <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_jamaah' class='form-control'>
                            <option value="">-- Pilih Data Jamaah --</option>
                            @foreach($jamaah as $jmh)
                            <option value="{{ $jmh->ID_Jamaah }}">{{ $jmh->Nama_Jamaah}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Keberangkatan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal_keberangkatan" value='{{date("Y-m-d")}}'
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Titik Kumpul <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <textarea name="titik_kumpul" required class='form-control'></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                        Tambah</button>
                    <a href="/admin/keberangkatan" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->

        </div>
    </div>

</div>


<script>
var hargaObatInput = document.querySelector('input[name=harga_keberangkatan]');

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