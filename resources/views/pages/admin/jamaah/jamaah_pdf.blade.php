<!DOCTYPE html>
<html>

<head>
    <title>Laporan Jamaah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
    table tr td {
        font-size: 9pt;
    }
    </style>
    <center>
        <h5>Data Jamaah</h5>
    </center>

    <table class='table table-bordered'>
        @foreach($pgw as $p)
        <tr>
            <td width="2%" style='font-weight:bold;'>NIK</td>
            <td width="5%" style="text-align: center">{{$p->NIK}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Nama Jamaah</td>
            <td width="5%" style="text-align: center">{{$p->Nama_Jamaah}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Tempat, Tanggal Lahir</td>
            <td width="5%" style="text-align: center">
                {{$p->Tempat_Lahir}}, {{ \Carbon\Carbon::parse($p->Tanggal_Lahir)->isoFormat('D MMMM Y') }}
            </td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Jenis Kelamin</td>
            <td width="5%" style="text-align: center">{{$p->Jenis_Kelamin}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Alamat</td>
            <td width="5%" style="text-align: center">{{$p->Alamat}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Nomor Telepon</td>
            <td width="5%" style="text-align: center">{{$p->Nomor_Telepon}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Pekerjaan</td>
            <td width="5%" style="text-align: center">{{$p->Pekerjaan}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Asal Kota</td>
            <td width="5%" style="text-align: center">{{$p->Asal_Kota}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Tanggal Daftar</td>
            <td width="5%" style="text-align: center">
                {{ \Carbon\Carbon::parse($p->Tanggal_Daftar)->isoFormat('D MMMM Y') }}
            </td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Golongan Darah</td>
            <td width="5%" style="text-align: center">{{$p->Golongan_Darah}}</td>
        </tr>
        <tr>
            <td width="2%" style='font-weight:bold;'>Pendidikan</td>
            <td width="5%" style="text-align: center">{{$p->Pendidikan}}</td>
        </tr>
        <!-- <tr>
            <td width="2%" style='font-weight:bold;'>Foto Jamaah</td>
            <td width="5%" style="text-align: center">
                @if(empty($p->Foto_Jamaah))
                Foto belum dimasukkan
                @else
                <img src="{{ asset('assets/Foto Jamaah/' . $p->Foto_Jamaah) }}" width="100" height="100"
                    style="border-radius: 50%" />
                @endif
            </td>
        </tr> -->
        @endforeach
    </table>

    <div style="page-break-before: always;"></div> <!-- Tambahkan halaman baru setelah setiap data jamaah -->

    <!-- Tambahkan kode halaman berikutnya -->
    <!-- @if($nextPageExists)
    <script type="text/php">
        if (isset($pdf) && $GLOBALS['nextPageExists']) {
            $pdf->AddPage();
        }
    </script>
    @endif -->

</body>

</html>