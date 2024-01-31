<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola restoran</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        <a href="{{ route('tampiltambahdatauser')}}" class="btn btn-primary mb-4">Tambah data</a>
        <table class="table table-responsive-sm mt-5" id="example" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="{{ route('tampileditdatauser', $item->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{ route('hapususer', $item->id)}}" onclick="return confirm('yakin di hapus?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script>
        new DataTable('#example');
    </script>
</body>
</html>