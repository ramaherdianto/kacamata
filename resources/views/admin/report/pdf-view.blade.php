<!DOCTYPE html>
<html>

<head>
    <title>Laporan Produk Keluar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            font-family: 'Roboto Mono', monospace;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>

    <img src="{{ asset('dist/logo.jpg') }}" alt="" width="200" style="position: absolute; top: 0;left: 0;">

    <div style="float: left; margin-top: 150px;">
        <h2>Laporan Produk Keluar</h2>
        <span>Tanggal Laporan:</span> <span style="font-weight: 700">{{ date('d F Y') }}</span>
    </div>


    <div style="float: right; text-align: right; margin-top: 150px">
        <p style="width: 300px; line-height: 30px">
            Jl. Raya Perjuangan, Blok 32 Bekasi Utara, Summarecon Bekasi
            <br />
            nouglasses@gmail.com
            <br />
            (021) 88896032
        </p>
    </div>


    <table style="margin-top: 350px">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Tanggal Keluar</th>
                <th>Total Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_produk_masuk }}</td>
                    <td>{{ $item->tanggal_beli }}</td>
                    <td>{{ $item->total_beli }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="float: right; position: absolute;bottom: 0;text-align: center">
        <div class="text-center">
            <h6 style="margin-bottom: 65px;font-size: 9pt;font-weight: normal;">Bekasi, {{ date('d F Y') }}
            </h6>
            <p>.......................................</p>
            <h6 style="margin-top: -20px;font-size: 9pt;font-weight: normal;">Mayjen Tomy</h6>
        </div>
    </div>



</body>

</html>
