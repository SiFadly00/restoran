<nav class="navbar navbar-expand" style="background-color: #105180;">
    <a href="" class="nav-link text-light">RESTORAN-UJI</a>

    @auth
        @if (auth()->user()->role == 'admin')
            <a href="{{ route('homeadmin') }}" class="nav-link text-light">Kelola Menu</a>
            <a href="{{ route('kelolauser') }}" class="nav-link text-light">Kelola User</a>
            <a href="{{ route('log') }}" class="nav-link text-light">Log Activity</a>
            <a href="{{ route('logout') }}" class="nav-link text-light">logout</a>
        @elseif(auth()->user()->role == 'user')
            <a href="{{ route('homeuser') }}" class="nav-link text-light">Menu</a>
            <a href="{{ route('keranjang') }}" class="nav-link text-light">Keranjang</a>
            <a href="{{ route('riwayat') }}" class="nav-link text-light">Orderan</a>
            <a href="{{ route('logout') }}" class="nav-link text-light">logout</a>
        @elseif(auth()->user()->role == 'kasir')
            <a href="{{ route('konfirbayar') }}" class="nav-link text-light">Orderan</a>
            <a href="{{ route('summary') }}" class="nav-link text-light">Summary</a>
            <a href="{{ route('logout') }}" class="nav-link text-light">logout</a>
        @elseif(auth()->user()->role == 'owner')
            <a href="{{ route('printtransaksi') }}" class="nav-link text-light">Kelola Transaksi</a>
            <a href="{{ route('logout') }}" class="nav-link text-light">logout</a>
        @endif
    @else
        <a href="{{ route('homeuser') }}" class="nav-link text-light">Menu</a>
        <a href="{{ route('login') }}" class="nav-link text-light">Login</a>


    @endauth
</nav>
