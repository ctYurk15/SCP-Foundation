@extends('layouts.main')

@section('title', 'SCP Objects')

@section('content')

<i>Access-level - {{$LoggedUserInfo->access_level}}</i>
<h2>Objects: </h2>
@foreach($objects as $object)
    @if($object->access_level <= $LoggedUserInfo->access_level)
        <a href="{{route('object', [$object->number])}}"><h4>SCP-{{$object->number}}</h4></a>
    @endif
@endforeach

@endsection