@extends('layout.admin')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Paket Umrah</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-menu-button-wide"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$paket}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sales Card -->


                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">
                                Total Jamaah
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$jamaah}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">
                                Total Keberangkatan
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-plane-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$keberangkatan}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customers Card -->
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Jamaah</h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jamaahPerBulan as $data)
                                            <tr>
                                                <td>{{ date('M', mktime(0, 0, 0, $data->bulan)) }}</td>
                                                <td>{{ date('Y', mktime(0, 0, 0, 1, 1, $data->tahun)) }}</td>
                                                <td>{{ $data->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Keberangkatan</h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($keberangkatanPerBulan as $data)
                                            <tr>
                                                <td>{{ date('M', mktime(0, 0, 0, $data->bulan)) }}</td>
                                                <td>{{ date('Y', mktime(0, 0, 0, 1, 1, $data->tahun)) }}</td>
                                                <td>{{ $data->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->
        </div>        
    </div>
</section>
@endsection