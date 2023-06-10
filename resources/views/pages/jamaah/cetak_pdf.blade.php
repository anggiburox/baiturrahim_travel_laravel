<!DOCTYPE html>
<html>

<head>
    <title>Data Keberangkatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
    table tr td {
        font-size: 14px;
    }
    </style>
    <center>
        <h5>Data Keberangkatan</h5>
    </center>

    <table class='table table-bordered'>
        @foreach($pgw as $p)
        <tr>
            <td width="2%" style='font-weight:bold;'>Kode Keberangkatan</td>
            <td width="5%" style="text-align: center">{{$p->Kode_Keberangkatan}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>NIK</td>
            <td width="5%" style="text-align: center">{{$p->NIK}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Nama Jamaah</td>
            <td width="5%" style="text-align: center">{{$p->Nama_Jamaah}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Alamat</td>
            <td width="5%" style="text-align: center">
                {{$p->Alamat}}
            </td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Nama Paket Umrah</td>
            <td width="5%" style="text-align: center">{{$p->Nama_Paket_Umrah}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Harga Paket Umrah</td>
            <td width="5%" style="text-align: center"> Rp.
                {{ number_format(floatval($p->Harga_Paket_Umrah), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Tanggal Keberangkatan</td>
            <td width="5%" style="text-align: center">
                {{ \Carbon\Carbon::parse($p->Tanggal_Keberangkatan)->isoFormat('D MMMM Y') }}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Titik Kumpul</td>
            <td width="5%" style="text-align: center">{{$p->Titik_Kumpul}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>