<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Penerima</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h3>Laporan Data Penerima</h3>
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
