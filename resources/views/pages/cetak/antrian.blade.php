<!DOCTYPE html>
<html>
<head>
    <title>Cetak Kartu Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }
        .card {
            border: 1px solid #000;
            padding: 20px;
            width: 500px;
            margin: 0 auto;
        }
        .card-header, .card-body {
            text-align: center;
            margin-bottom: 10px;
        }
        .card-header {
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-header img {
            width: 50px; /* Sesuaikan ukuran logo */
            height: auto;
            margin-right: 10px;
        }
        .card-header div {
            text-align: left;
        }
        .card-body {
            text-align: left;
            padding: 10px;
        }
        .card-body p {
            margin: 5px 0;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="card">
        <div class="card-header">

            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <div>
                <h2>KLINIK TAQI MEDIKA</h2>
                <p>Bona Sarana Indah Bona Raya No.: 14, RT.004/RW.007, Cikokol</p>
                <p>Telepon : 0896-5380-6625</p>
            </div>
        </div>
        <div class="card-body">
            <h3 style="text-align:center;">NOMOR ANTRIAN</h3>
            <p><strong>No. Antrian :</strong> 0{{$antrian->no_antrian}}</p>
            <p><strong>Tanggal Daftar :</strong> {{$antrian->created_at->format('d-M-y') }}</p>
            <p><strong>No. RM :</strong> {{$antrian->no_rekmed}}</p>
            <p><strong>Nama Pasien :</strong> {{$antrian->nama }}</p>

        </div>
    </div>
</body>
</html>


