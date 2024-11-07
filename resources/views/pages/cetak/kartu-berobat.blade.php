<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Berobat</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .card {
            border: 1px solid #000;
            padding: 20px;
            width: 600px;
            margin: 0 auto;
        }

        .card-header,
        .card-body {
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
            width: 50px;
            /* Sesuaikan ukuran logo */
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

        .card-footer {
            text-align: center;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #000;
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
        <h3 style="text-align:center;">KARTU BEROBAT</h3>
        <hr>
        <div class="card-body">
            <p><strong>Tanggal Daftar :</strong> {{ $antrian->created_at->format('d-M-y') }}</p>
            <p><strong>No RM :</strong> {{ $antrian->no_rekmed }}</p>
            <p><strong>Nama Pasien :</strong> {{ $antrian->nama }}</p>
            {{-- <p><strong>Alamat :</strong> Buaran Indah RT 004/03</p> --}}
            <div class="card-footer">
                <h4>KETENTUAN</h4>
                <p>Kartu ini hanya bisa digunakan pada saat berobat di KLINIK TAQI MEDIKA</p>
                <p>Memakai kartu berobat ini dapat potongan biaya berobat 20%</p>
                <p>Jika kartu hilang minta cetak ulang ke admin</p>
            </div>
        </div>
    </div>
</body>

</html>
