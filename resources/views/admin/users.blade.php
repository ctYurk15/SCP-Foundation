@extends('layouts.main')

@section('title', 'Users')

@section('content')
<h3>Add new user</h3>
<form id='addUserForm' data-route='{{ route("save") }}'>
    @csrf
    <h4>Main info</h4>
    <table class='formTable' width="50%">
        <tr>
            <td><label for='name'>Fullname</label></td>
            <td><input type='text' name='name' placeholder='Example: John Doe' required></td>
        </tr>
        <tr>
            <td><label for='sex'>Sex</label></td>
            <td>
                <select class="form-select form-select-lg mb-3" aria-label="Sex" name='sex'>
                    <option value='male' selected>Male</option>
                    <option value='female'>Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for='access_level'>Access level</label></td>
            <td><input type='text' name='access_level' placeholder='(NUMBERS ONLY 1-5)' required></td>
        </tr>
        <tr>
            <td><label for='email'>Email</label></td>
            <td><input type='email' name='email' placeholder='Example: johndoe@email.com' required></td>
        </tr>
        <tr>
            <td><label for='birthdate'>Birthdate</label></td>
            <td><input type='text' name='birthdate' placeholder='Example: 2003-12-25' required></td>
        </tr>
        <tr>
            <td><label for='home_address'>Home address</label></td>
            <td><textarea name='home_address' placeholder='Example: Country, City, Street 1, flat 2' required></textarea></td>
        </tr>
    </table>
    
    <h4>Login credentials</h4>
    <table class='formTable' width="50%">
        <tr>
            <td><label for='login'>Login</label></td>
            <td><input type='text' name='login' required></td>
        </tr>
        <tr>
            <td><label for='password'>Password</label></td>
            <td><input type='password' name='password' required></td>
        </tr>
    </table>

    <button class="btn btn-submit">Add new user</button>
</form>
@endsection
    
@section('js')
<script src="{{ asset('resources/js/add_user.js') }}"></script>
@endsection