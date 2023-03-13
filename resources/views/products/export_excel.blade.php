<table>
    <thead>
        <tr>
            <th style="width: 70px; text-align:center;">No</th>
            <th style="width: 150px; text-align:center;">Nama Produk</th>
            <th style="width: 120px; text-align:center;">Harga</th>
            <th style="width: 90px; text-align:center;">Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td style="text-align:center">{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td style="text-align:right">{{ format_uang($product->price) . ',-' }}</td>
                <td style="text-align:center">{{ $product->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
