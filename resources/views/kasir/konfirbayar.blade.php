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
        <div class="row">

        </div>
        <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h5>Orderan Masuk</h5>
            <hr>
            <table class="table table-responsive-sm mt-5" id="example">
                <thead>
                    <tr>
                        <th>No Meja</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailtransaksi as $no_meja => $group)
                        <tr>
                            <td>{{ $no_meja }}</td>
                            <td>Klik detail untuk memproses pesanan</td>
                            <td>
                                <a href="{{ route('tampildetailpesan', ['no_meja' => $no_meja])}}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
