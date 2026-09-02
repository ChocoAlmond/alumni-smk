<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Alumni</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            background: #f4efe8;
            color: #141313;
        }

        .page {
            padding: 28px;
        }

        .header {
            background: #141313;
            color: #f9f7f2;
            padding: 26px 28px 22px;
            border-radius: 10px 10px 0 0;
        }

        .eyebrow {
            color: #ef725f;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.1;
            font-family: Georgia, serif;
            font-weight: normal;
        }

        .meta {
            margin-top: 10px;
            font-size: 11px;
            color: #d8d0c5;
        }

        .summary {
            display: table;
            width: 100%;
            background: #f1eadf;
            border: 1px solid #e7dcc8;
            border-top: none;
            border-bottom: none;
            margin-bottom: 20px;
        }

        .summary-item {
            display: table-cell;
            width: 33.33%;
            padding: 18px 20px;
            border-right: 1px solid #e7dcc8;
        }

        .summary-item:last-child {
            border-right: none;
        }

        .summary-label {
            display: block;
            font-size: 9px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #847e75;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 26px;
            line-height: 1;
            font-family: Georgia, serif;
            color: #141313;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
            background: #fffdf9;
        }

        th, td {
            padding: 10px 10px;
            text-align: left;
            border-bottom: 1px solid #e9e0d3;
            vertical-align: top;
        }

        th {
            background: #141313;
            color: #f9f7f2;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        td {
            font-size: 11px;
            color: #1d1c1a;
        }

        tr:nth-child(even) td {
            background: #faf6f0;
        }

        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 10px;
            background: rgba(139, 200, 110, 0.18);
            color: #39652b;
            font-size: 10px;
            font-weight: bold;
        }

        .footer {
            margin-top: 18px;
            padding-top: 12px;
            border-top: 1px solid #d9cebd;
            font-size: 9px;
            color: #847e75;
            text-align: right;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <div class="eyebrow">SMK Negeri 1 Pedan</div>
            <h1>Laporan Data Alumni</h1>
            <div class="meta">Dicetak pada {{ date('d-m-Y') }}</div>
        </div>

        <div class="summary">
            <div class="summary-item">
                <span class="summary-label">Total Alumni</span>
                <span class="summary-value">{{ $alumnis->count() }}</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Jurusan</span>
                <span class="summary-value">{{ $alumnis->pluck('jurusan')->filter()->unique()->count() }}</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Tahun Terakhir</span>
                <span class="summary-value">{{ $alumnis->pluck('tahun_lulus')->filter()->max() ?? '-' }}</span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnis as $index => $alumni)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $alumni->nisn }}</td>
                        <td>{{ $alumni->nama_lengkap }}</td>
                        <td>{{ $alumni->jurusan }}</td>
                        <td>{{ $alumni->tahun_lulus }}</td>
                        <td><span class="status">{{ $alumni->status }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 18px;">Belum ada data alumni.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="footer">Direktori Alumni • SMK Negeri 1 Pedan</div>
    </div>
</body>
</html>