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
    <table border='1px' width='50%'>
        <tr>
            <td colspan='2'>
                <h4>{{ $LoggedUserInfo['name'] }}</h4>
            </td>
        </tr>
        <tr>
            <td width='40%'>
                <img src='{{ asset("images/profile.png") }}' style='width: 100%'>
            </td>
            <td width='60%'>
                <table>
                    <tr>
                        <td colspan='3'> {{ $LoggedUserInfo->login }}</td>
                    </tr>
                    <tr>
                        <td>Sex</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>{{ $LoggedUserInfo->sex }}</td>
                    </tr>
                    <tr>
                        <td>Job</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>[SOME_JOB]</td>
                    </tr>
                    <tr>
                        <td>Access level</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>{{ $LoggedUserInfo->access_level }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>{{ $LoggedUserInfo->email }}</td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>{{ $LoggedUserInfo->birthdate }}</td>
                    </tr>
                    <tr>
                        <td>Home address</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>{{ $LoggedUserInfo->home_address }}</td>
                    </tr>
                </table>
                <a href='{{ route("logout") }}'>Logout</a>
            </td>
        </tr>
    </table>
</body>
</html>