<!DOCTYPE html>
<html>

<head>
    <title>Laporan Daftar Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets-frontend/img/logo.png') }}" class="img-fluid"
        style="position: absolute; top:-20px; width: 100px;" alt="">
    <div class="text-center">
        <h4 style="font-weight: bold;font-size: 24px;">KUSUMA_ILM
        </h4>
        <p style="margin-top: -10px;font-size: 12px;">Jl Potong Lembu No 1, RT/RW : 002/011, Kode Pos: 29122</p>
        <p style="margin-top: -15px;font-size: 12px;">Kecamatan Tanjungpinang Barat, Kota Tanjung Pinang, Provinsi
            Kepulauan Riau </p>
    </div>
    <hr style="border: 1px solid rgba(0, 0, 0, 0.5);">
    <center>
        <h5>Laporan Daftar Siswa</h4>
    </center>

    <table class='table table-bordered mt-4'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tingkat</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($siswa as $s)
            <tr>
                <td style="width: 10px;">{{ $no++ }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->tingkat->tingkat}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>