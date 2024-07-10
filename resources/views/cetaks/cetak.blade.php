<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        /* CSS untuk styling */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Data Barang</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Satuan</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $key => $barang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->jenis_barang->kategori }}</td>
                    <td>{{ $barang->merk->merk }}</td>
                    <td>{{ $barang->satuan->satuan }}</td>
                    <td>{{ $barang->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
