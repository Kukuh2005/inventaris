<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Opname</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #28a745;
        }

        .header h4 {
            font-size: 28px;
            margin: 0;
            color: #28a745;
        }

        .header .invoice-info {
            text-align: right;
        }

        .header .invoice-info h5 {
            font-size: 20px;
            margin: 0;
            font-weight: bold;
        }

        .header .invoice-info p {
            margin: 0;
            font-size: 14px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        .info-table td {
            padding: 8px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f9fa;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        .summary-table td {
            text-align: right;
            padding: 8px;
            font-size: 14px;
            border: none;
        }

        .summary-table td:first-child {
            text-align: left;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h4>INVENTARIS</h4>
            <div class="invoice-info">
                <h5>Laporan Opname</h5>
                <p>Tanggal Cetak: {{ date('d F Y') }}</p>
            </div>
        </div>

        <!-- Informasi Pengadaan -->
        <div class="section-title">Informasi Opname</div>
        <table class="info-table" style="width: 100%;">
            <tr>
                <td style="font-weight: bold; width: 30%">Periode Opname</td>
                <td style="width: 70%">: {{ \Carbon\Carbon::parse($opname->first()->tgl_opname ?? now())->format('F Y') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Jumlah Barang</td>
                <td>: {{ $opname->sum('jumlah') }} Unit</td>
            </tr>
        </table>

        <!-- Detail Pengadaan -->
        <div class="section-title">Detail Opname</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opname as $item)
                <tr>
                    <td>{{ $item->tgl_opname }}</td>
                    <td>{{ $item->pengadaan->masterBarang->nama_barang }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Dicetak oleh sistem pada {{ date('d-m-Y') }}</p>
        </div>
    </div>
</body>
</html>
