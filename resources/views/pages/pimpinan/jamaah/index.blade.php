@extends('layout.pimpinan')

@section('content')
<div class="pagetitle">
    <h1>Data Jamaah</h1>
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
                                <th>No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col">Nama Jamaah</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Foto Jamaah</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->NIK}}</td>
                                <td>{{ \Carbon\Carbon::parse($p->Tanggal_Daftar)->isoFormat('D MMMM Y') }}</td>
                                <td>{{$p->Nama_Jamaah}}</td>
                                <td>{{$p->Tempat_Lahir}},
                                    {{ \Carbon\Carbon::parse($p->Tanggal_Lahir)->isoFormat('D MMMM Y') }}</td>
                                <td>{{$p->Jenis_Kelamin}}</td>
                                <td>@if(empty($p->Foto_Jamaah))
                                    Foto belum dimasukan
                                    @else<img src="{{ asset('assets/Foto Jamaah/' . $p->Foto_Jamaah) }}" width="100"
                                        height="100" style="border-radius:50%;">
                                    @endif
                                </td>
                                <td>
                                    <a href="jamaah/detail/{{ $p->ID_Jamaah}}" data-toggle="tooltip"
                                        data-placement="top" title="Detail" class="btn mb-1 btn-info btn-sm"
                                        type="button"><i class="bi bi-eye-fill"></i>&nbsp; Detail
                                    </a>
                                </td>
                                <td>
                                    <a href="jamaah/cetak_pdf_satuan/{{ $p->ID_Jamaah}}"
                                        class="btn mb-1 btn-success btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Cetak" type="button"><i class="bi bi-printer-fill"></i>&nbsp; Cetak
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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