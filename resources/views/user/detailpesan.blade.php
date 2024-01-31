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
        <form action="{{ route('postpesanan', $menu->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($menu->foto) }}" alt="">

                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <input type="number" name="banyak" class="form-control" placeholder="banyak" required><br>
                            <input type="number" name="no_meja" class="form-control" placeholder="Masukan No Meja anda" required>
                            <hr>
                            <h5>Catatan pesanan :</h5>
                            <input type="text" name="catatan" class="form-control" id="" required>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kategori:{{ $menu->kategori->name }}</h5>
                        </div>
                        <button type="submit" class="btn btn-primary">kirim pesanan</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
