<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
</head>

<body>
    @include('template.navbar')
    <div class="container mt-5">
        @if (Session::has('status'))
            <span style="color: aqua">{{ Session::get('status') }}</span>
        @endif
        <h5>Summary</h5>
        <hr>
        <table class="table table-responsive-sm mt-5" id="example">
            <thead>
                <tr>
                    <th>Transaksi_id</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($detailtransaksi as $transaksi_id => $group)
                        <tr>
                            <td>{{ $transaksi_id }}</td>
                            <td>Klik detail untuk melihat struk pesanan</td>
                            <td>
                                <a href="{{ route('tampildetailsummary', ['transaksi_id' => $transaksi_id]) }}"
                                    class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
