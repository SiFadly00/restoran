<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <title>Edit data user</title>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('editdatauser', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card col-4 mx-auto">
                <div class="card-body">
                    <h3 class="text-center">edit Data User</h3>
                    <hr>
                    <div class="col md-7 mx-auto">
                        <label for="">Nama</label>
                        <input type="text" name="name" required  class="form-control" value="{{ $user->name }}">
                        <label for="">Email</label>
                        <input type="text" name="email" required class="form-control" value="{{ $user->email }}">
                        <label for="">Password</label>
                        <input type="password" name="password" required class="form-control" value="{{ $user->password }}">
                        <label for="">Role</label>
                        <input type="text" name="role" required class="form-control" value="{{ $user->role }}">
                        <p>role : user, kasir, admin, owner</p>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Edit User</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    
</body>
</html>