@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Keberangakatan</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/admin/keberangkatan/store" method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Kode Keberangkatan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="kode" value="{{$kode}}" required readonly
                            style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label select2">Nama Paket<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <select name='id_paket_umrah' class='form-control' id='myselect' onchange="updateHargaPaket()"
                            required>
                            <option value="">-- Pilih Data Paket --</option>
                            @foreach($paket as $pkt)
                            <option value="{{ $pkt->ID_Paket_Umrah }}"
                                data-harga="Rp. {{ number_format($pkt->Harga_Paket_Umrah, 0, ',', '.') }}">
                                {{ $pkt->Nama_Paket_Umrah}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Harga Paket</label>
                    <div class="col-sm-3">
                        <input type='text' class='form-control' id='harga_paket' value='' readonly
                            style='background:#e6e6fa;'>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">NIK <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <select name='id_jamaah[]' id="myselect2" class='form-control' onchange=showjamaah() required
                            multiple="multiple">
                            <option value="" disabled>-- Pilih Data Jamaah --</option>
                            @foreach($jamaah as $jmh)
                            <option value="{{ $jmh->ID_Jamaah }}" data-nama='{{$jmh->Nama_Jamaah}}'
                                data-tempat='{{$jmh->Tempat_Lahir}}'
                                data-tanggal='{{ \Carbon\Carbon::parse($jmh->Tanggal_Keberangkatan)->isoFormat("D MMMM Y") }}'
                                data-alamat='{{$jmh->Alamat}}'>
                                {{ $jmh->NIK}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Nama Jamaah</label>
                    <div class="col-sm-3">
                        <input type='text' class='form-control' id='nama_jamaah' value='' readonly
                            style='background:#e6e6fa;'>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type='text' class='form-control' id='tempat_tanggal_lahir' value='' readonly
                            style='background:#e6e6fa;'>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-3">
                        <textarea class='form-control' id='alamat' value='' readonly
                            style='background:#e6e6fa;'></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Keberangkatan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal_keberangkatan" value='{{date("Y-m-d")}}'
                            required>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Kepulangan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal_kepulangan" value='{{date("Y-m-d")}}'
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-3 col-form-label">Titik Kumpul <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <textarea name="titik_kumpul" required class='form-control'></textarea>
                    </div>
                    <label for="inputText" class="col-sm-3 col-form-label">Keterangan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <textarea name="keterangan" required class='form-control'></textarea>
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
$('#myselect').select2({});
$('#myselect2').select2({});

function updateHargaPaket() {
    var select = document.getElementById("myselect");
    var selectedOption = select.options[select.selectedIndex];
    var hargaPaket = selectedOption.dataset.harga;
    if (hargaPaket) {
        document.getElementById("harga_paket").value = hargaPaket;
    } else {
        document.getElementById("harga_paket").value = "";
    }
}

function showjamaah() {
    // var select = document.getElementById("myselect2");
    // var selectedOption = select.options[select.selectedIndex];
    // var namajamaah = selectedOption.dataset.nama;
    // var tempatlahir = selectedOption.dataset.tempat;
    // var tgllahir = selectedOption.dataset.tanggal;
    // var alamat = selectedOption.dataset.alamat;
    // if (namajamaah && tempatlahir && tgllahir && alamat) {
    //     document.getElementById("nama_jamaah").value = namajamaah;
    //     document.getElementById("tempat_tanggal_lahir").value = tempatlahir + ", " + tgllahir;
    //     document.getElementById("alamat").value = alamat;
    // } else {
    //     document.getElementById("nama_jamaah").value = "";
    //     document.getElementById("tempat_tanggal_lahir").value = "";
    //     document.getElementById("alamat").value = "";
    // }

    var select = document.getElementById("myselect2");
    var selectedOptions = select.selectedOptions;
    var namajamaah = '';
    var tempatlahir = '';
    var tgllahir = '';
    var alamat = '';

    for (var i = 0; i < selectedOptions.length; i++) {
        var selectedOption = selectedOptions[i];
        var nama = selectedOption.getAttribute('data-nama');
        var tempat = selectedOption.getAttribute('data-tempat');
        var tanggal = selectedOption.getAttribute('data-tanggal');
        var alamat2 = selectedOption.getAttribute('data-alamat');

        namajamaah += nama + ', ';
        tempatlahir += tempat + ', ';
        tgllahir += tanggal + ', ';
        alamat += alamat2 + ', ';
    }

    if (namajamaah.length > 0) {
        namajamaah = namajamaah.slice(0, -2); // Remove the trailing comma and space
        tempatlahir = tempatlahir.slice(0, -2);
        tgllahir = tgllahir.slice(0, -2);
        alamat = alamat.slice(0, -2);
    }

    document.getElementById("nama_jamaah").value = namajamaah;
    document.getElementById("tempat_tanggal_lahir").value = tempatlahir + ", " + tgllahir;
    document.getElementById("alamat").value = alamat;
}
</script>
@endsection