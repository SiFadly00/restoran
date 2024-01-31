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
    @include('template.navbar')
    <div class="container mt-5">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>Nama</th>
                    <th>Activity</th>
                    <th>create at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $item)
                    <tr>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->activity }}</td>
                        <td>{{ $item->created_at->format('d-m-Y')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
