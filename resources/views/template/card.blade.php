<div class="container mt-2">
    <div class="row">
        @foreach ($menu as $item)
            <div class="col-2 mt-5">
                <div class="card">
                    <img class="card-img-top" src="{{ asset($item->foto) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('detailpesan', $item->id) }}" class="btn btn-dark">Pesan</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
