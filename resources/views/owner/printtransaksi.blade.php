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
        <h5>Transaksi Masuk </h5>
        <hr>
        <form action="{{ route('filtering') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
                <div class="col-4 mt-4">
                    <button type="submit" class="btn btn-primary form-control">Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-responsive-sm mt-2" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>No Meja</th>
                    <th>Total harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->no_meja }}</td>
                        <td>Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
