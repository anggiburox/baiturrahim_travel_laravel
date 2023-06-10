@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Detail Data Paket Umrah</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">
            <!-- Custom Styled Validation -->
            <h6 class="mb-5 mt-3" style='color:red;'></h6>

            @foreach($pgw as $pp)
            <form class="row g-3 needs-validation" id="form-perbaharui" action="" method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Kode Keberangkatan</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_keberangkatan"
                            value="{{$pp->Kode_Keberangkatan}}" required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label select2">Nama Paket</label>
                    <div class="col-sm-3">
                        <input type='text' name='' class='form-control' value='{{$pp->Nama_Paket_Umrah}}' readonly
                            style="background-color:#e6e6fa;">
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Harga Paket</label>
                    <div class="col-sm-3">
                        <input type='text' class='form-control' id='harga_paket' value='{{$pp->Harga_Paket_Umrah}}'
                            readonly style='background:#e6e6fa;'>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">NIK </label>
                    <div class="col-sm-3">
                        <input type='text' class='form-control' value='{{$pp->NIK}}' readonly
                            style='background:#e6e6fa;'>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Nama Jamaah</label>
                    <div class="col-sm-3">
                        <textarea id='nama_jamaah' readonly style='background:#e6e6fa;'
                            class='form-control'>{{$pp->Nama_Jamaah}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-3">
                        <textarea id='telepon' readonly style='background:#e6e6fa;'
                            class='form-control'>{{$pp->Nomor_Telepon}}</textarea>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-3">
                        <textarea class='form-control' readonly style='background:#e6e6fa;'>{{$pp->Alamat}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Keberangkatan </label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal_keberangkatan"
                            value='{{$pp->Tanggal_Keberangkatan}}' required readonly style='background:#e6e6fa;'>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Titik Kumpul</label>
                    <div class="col-sm-3">
                        <textarea name="titik_kumpul" required class='form-control' readonly
                            style='background:#e6e6fa;'>{{$pp->Titik_Kumpul}}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <a href="/admin/keberangkatan" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->
            @endforeach
        </div>
    </div>

</div>
@endsection