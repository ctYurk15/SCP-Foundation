@extends('layouts.main')

@section('title', 'Users')

@section('content')
<h3>Add new user</h3>
<form id='addUserForm' data-route='{{ route("save") }}'>
    @csrf
    <h3>Main info</h3>
    <div class="input-group mb-3">
        <span class="input-group-text" for='name'>Fullname</span><br>
        <input type='text' name='name' placeholder='Example: John Doe' required>
    </div>
    <br>
    <span class="input-group-text">Sex</span><br>
    <select class="form-select form-select-lg mb-3" aria-label="Sex" name='sex'>
        <option value='male' selected>Male</option>
        <option value='female'>Female</option>
    </select>
    <br>
    <div class="input-group mb-3">
        <span class="input-group-text" for='access_level'>Access level</span><br>
        <input type='text' name='access_level' placeholder='(NUMBERS ONLY 1-5)' required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" for='email'>Email</span><br>
        <input type='email' name='email' placeholder='Example: johndoe@email.com'  required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" for='birthdate'>Birthdate</span><br>
        <input type='text' name='birthdate' placeholder='Example: 2003-12-25' required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" for='home_address'>Home address</span><br>
        <textarea name='home_address'  placeholder='Example: Country, City, Street 1, flat 2' required></textarea>
    </div>
    
    <h3>Login credentials</h3>

    <div class="input-group mb-3">
        <span class="input-group-text" for='login'>Login</span><br>
        <input type='text' name='login' required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" for='password'>Password</span><br>
        <input type='password' name='password' required>
    </div>

    <button>Add new user</button>
    </form>
@endsection
    
@section('js')
<script src="{{ asset('resources/js/add_user.js') }}"></script>
@endsection