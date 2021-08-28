<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id='addUserForm' data-route='{{ route("auth.save") }}'>
        @csrf
        <h3>Main info</h3>
        <input type='text' name='name' placeholder='Fullname' required><br>
        <select name='sex' required><br>
            <option value='male'>Male</option>
            <option value='female'>Female</option>
        </select><br>
        <input type='text' name='access_level' placeholder='access-level (NUMBER ONLY 1-5)' required><br>
        <input type='email' name='email' placeholder='email' required><br>
        <input type='text' name='birthdate' placeholder='birthdate' required><br>
        <input type='text' name='home_address' placeholder='home_address' required><br>
        <h3>Login credentials</h3>
        <input type='text' name='login' placeholder='login' required><br>
        <input type='password' name='password' placeholder='password' required><br>
        <button>Add new user</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('resources/js/add_user.js') }}"></script>
</html>