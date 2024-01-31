<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
            <span style="color: aqua">{{ Session::get('status') }}</span>
        @endif
        <h5>Detail Pesanan</h5>
        <hr>
        <table class="table table-responsive-sm mt-3" id="example">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksi as $item)
                    <tr>
                        <td>{{ $item->menu->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total Harga Pesanan:</th>
                    <th class="totalharga">Rp. {{ number_format($totalharga, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="card col-6">
            <div class="card-body">
                <h6>Uang Tunai : Rp. {{ number_format($transaksi->uang_bayar, 0, ',', '.') }}</h6>
                <h6>Uang kembali : Rp. {{ number_format($transaksi->uang_kembali, 0, ',', '.') }}</h6>
                <h6>Tanggal : {{ $transaksi->created_at->format('d-m-Y') }}</h6>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
