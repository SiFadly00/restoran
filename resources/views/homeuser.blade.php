<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Home</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr auto;
        }
    </style>
</head>

<body>
    @include('template.navbar')
    @include('template.carausel')
    {{-- <div class="grid-container">
        <div style="text-align: right; margin: 45px">
            <form action="{{ route('selesai') }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="btn btn-danger">Selesai</button>
            </form>
        </div>
    </div> --}}
    <div class="container mt-2">
        @if (Session::has('status'))
            <div style="color: rgb(0, 0, 0)" class="alert alert-primary">{{ Session::get('status') }}</div>
        @endif
    </div>
    @include('template.card')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
