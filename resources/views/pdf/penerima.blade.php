<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Penerima</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            width: 120px;
            height: 80px;
            margin-right: 20px;
        }
        .header .text-header {
            text-align: left;
        }
        .header .text-header h2, 
        .header .text-header p {
            margin: 0;
            line-height: 1.4;
        }
        h3 {
            text-align: center;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <!-- HEADER DINAS -->
    <div class="header">
        <img src="{{ public_path('views/image/21dinsos.png') }}" class="w-100" alt="Logo Dinas Sosial">
        <div class="text-header">
            <h2>DINAS SOSIAL</h2>
            <p>PEMERINTAH KOTA SERANG</p>
        </div>
    </div>

    <!-- JUDUL -->
    <h3>Laporan Data Penerima</h3>

    <!-- TABEL -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Tanggal Terima</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penerimas as $i => $p)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $p->GetUser->nama }}</td>
                    <td>{{ $p->GetUser->nik }}</td>
                    <td>{{ $p->GetUser->alamat }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->updated_at)->translatedFormat('d F Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
