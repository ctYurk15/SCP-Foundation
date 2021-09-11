@extends('layouts.main')

@section('title', 'Employee Dashboard')

@section('content')

@if(Session::get('fail'))
    <div class='alert alert-danger'>
        {{ Session::get('fail') }}
    </div>
@endif

<table border='0px' width='50%'>
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
                    <td>{{ $LoggedUserInfo->job_position->title}}</td>
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

@endsection