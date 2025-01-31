<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Material PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Material</h1>
    <table class="gallery-table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nama Material</th>
                <th>PIC Penerima</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Stok Sisa</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $material)
            <tr>
                <td>{{ $material->tanggal }}</td>
                <td>{{ $material->kategori }}</td>
                <td>{{ $material->nama_material }}</td>
                <td>{{ $material->pic_penerima }}</td>
                <td>{{ $material->stok_masuk }}</td>
                <td>{{ $material->stok_keluar }}</td>
                <td>{{ $material->stok_sisa }}</td>
                <td>{{ $material->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
