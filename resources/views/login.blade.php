<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Login</title>

</head>

<body>
    <style>
        body {
            background-image: url(img/bglogin.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
    <div class="container mt-5">
        <form action="{{ route('postlogin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="card col-4 mx-auto">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
                        <hr>
                        <div class="col md-7 mx-auto">
                            <label for="">email</label>
                            <input type="email" name="email" class="form-control" placeholder="masukan email anda"
                                required>
                            <label for="">password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="masukan password anda" required>
                        </div>
                        <center><button type="submit" class="btn btn-primary mt-3">Login</button></center>
                        @if (Session::has('status'))
                            <span style="color: red">{{ Session::get('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
