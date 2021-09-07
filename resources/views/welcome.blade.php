<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <title>SCP Foundation</title>

        <style>
            body
            {
                background-color: black;
            }

            .btn
            {
                position: relative;
                top: 70px;
            }
        </style>
    </head>
    <body>
        <div align='center'>
            <img src='{{ asset("images/mainlogo.jpg") }}'>
            <br>
            <button class="btn btn-light btn-lg" onclick='location.replace("{{ route("login") }}")'>Log in</button>
        </div>
    </body>
</html>
