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
        <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h5>Keranjang</h5>
            <hr>
            <table class="table table-responsive-sm mt-5" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailtransaksi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="{{ asset($item->menu->foto) }}" width="120" height="120" alt="">
                            </td>
                            <td>{{ $item->menu->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</td>
                            <td>{{ $item->catatan }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Jumlah</th>
                        <th class="quantity">0</th>
                        <th class="totalharga">Rp. {{ number_format($totalharga, 0, ',', '.') }} </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <div class="card col-4 md-7">
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Konfirmasi Pesanan</button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
