@extends('layout.jamaah')

@section('content')
<div class="pagetitle">
    <h1>Data Keberangkatan</h1>
</div><!-- End Page Title -->

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">

                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">NIK - Nama Jamaah</th>
                                <th scope="col">Nama - Harga Paket Umrah</th>
                                <th scope="col">Tanggal Keberangkatan</th>
                                <th scope="col">Titik Kumpul</th>
                                <th scope="col">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->Kode_Keberangkatan}}</td>
                                <td>{{$p->NIK}} - {{$p->Nama_Jamaah}}</td>
                                <td>{{$p->Nama_Paket_Umrah}} - Rp.
                                    {{ number_format(floatval($p->Harga_Paket_Umrah), 0, ',', '.') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($p->Tanggal_Keberangkatan)->isoFormat('D MMMM Y') }}</td>
                                <td>{{$p->Titik_Kumpul}}</td>
                                <td>
                                    <a href="cetak_pdf_satuan/{{$p->ID_Keberangkatan}}"
                                        class="btn mb-1 btn-success btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Cetak" type="button"><i class="bi bi-printer-fill"></i>&nbsp; Cetak</a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function showConfirmation(event) {
    event.preventDefault();
    var deleteLink = event.target.getAttribute('href');

    swal({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: "warning",
        buttons: ["Batal", "Ya"],
        dangerMode: true,
    }).then((confirm) => {
        if (confirm) {
            window.location.href = deleteLink;
        }
    });
}
</script>
@if(Session::has('success'))
<script>
swal("Sukses", "{{ Session::get('success') }}", "success");
</script>
@endif

@if(Session::has('danger'))
<script>
swal("Sukses", "{{ Session::get('danger') }}", "success");
</script>
@endif
@endsection