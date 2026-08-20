<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Alumni</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-center { text-align: center; }
    </style>
</head>
<body>

    <h2 class="text-center">Laporan Data Alumni SMK Negeri 1 Pedan</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Tahun Lulus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnis as $index => $alumni)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $alumni->nisn }}</td>
                <td>{{ $alumni->nama_lengkap }}</td>
                <td>{{ $alumni->tahun_lulus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>