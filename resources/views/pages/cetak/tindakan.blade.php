<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hasil Tindakan Medis</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 80px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
        }

        .content {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .content,
        .content th,
        .content td {
            border: 1px solid black;
        }

        .content th,
        .content td {
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        .content th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <h1>KLINIK TAQI MEDIKA</h1>
            <p>Bona Sarana Indah Bona Raya No: 14, RT.004/RW.007, Cikokol</p>
            <p>Telepon: 0896-5380-6625</p>
            <h2> HASIL TINDAKAN MEDIS</h2>
        </div>
        <div>
            <p>No. RM: {{ $pendaftaran->no_rekmed }}</p>
            <p>Nama Pasien: {{ $pendaftaran->nama }}</p>
            <p>Ditangani Oleh: {{ $pendaftaran->dokter->nama }}</p>
            <p>Tanggal Pemeriksaan: {{ $pendaftaran->created_at->format('d-M-Y') }}</p>
        </div>
        <table class="content">
            <thead>
                <tr>
                    <th>Poli</th>
                    <th>Penyakit</th>
                    <th>Tindakan</th>
                    <th>Hasil Periksa</th>
                    <th>Nama Obat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tindakan as $record)
                    <tr>
                        <td>{{ $record->pendaftaran->dokter->spesialisasi }}</td>
                        <td>{{ $record->nama_penyakit ?? 'N/A' }}</td>
                        <td>{{ $record->nama_tindakan ?? 'N/A' }}</td>
                        <td>{{ $record->hasil_periksa ?? 'N/A' }}</td>
                        <td>{{ $record->nama_obat ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Waktu Cetak: <?php echo date('d F Y'); ?></p>
        </div>
    </div>
</body>

</html>
