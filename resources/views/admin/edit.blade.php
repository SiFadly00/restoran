<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Tambah</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('postedit', $menu->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card col-4 mx-auto">
                <div class="card-body">
                    <h3 class="text-center">Tambah Data</h3>
                    <hr>
                    <div class="col md-7 mx-auto">
                        <label for="">Kategori</label>
                        <select name="kategori_id" class="form-control" required id="">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" required value="{{ $menu->name }}">
                        <label for="">Foto</label>
                        <input type="file" name="foto" accept="img/*" class="form-control" value="{{ $menu->foto }}">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control" required value="{{ $menu->harga }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Edit</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>