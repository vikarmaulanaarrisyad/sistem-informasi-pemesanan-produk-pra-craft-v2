<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Daftar Produk</title>

    <link rel="stylesheet" href="{{ public_path('/AdminLTE/dist/css/adminlte.min.css') }}">
</head>

<body>
    <h4 class="text-center">Laporan Daftar Produk</h4>

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td class="text-right">{{ format_uang($row->price) }}</td>
                    <td class="text-center">{{ $row->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
