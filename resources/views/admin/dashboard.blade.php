<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <h4>Dashboard</h4>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td>{{ $LoggedUserInfo['name'] }}</td>
                        <td>{{ $LoggedUserInfo['email'] }}</td>
                        <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>