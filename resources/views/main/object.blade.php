@extends('layouts.main')

@section('title', 'SCP-'.$object->number)

@section('content')

<i>Access-level - {{$LoggedUserInfo->access_level}}.</i>
<h1>SCP-{{$object->number}}</h1>

@if($object->access_level <= $LoggedUserInfo->access_level)

    Item: SCP-{{$object->number}} <i>({{$object->name}})</i><br>
    Object class: {{$object->class->title}}<br>
    <img src="{{asset('images/objects/'.$object->photo)}}" style="width: 300px;" title="scp-{{$object->number}}"><br>

    @foreach($object->page_parts as $page_part)
        @if($page_part->access_level <= $LoggedUserInfo->access_level)
                <div>
                @if($page_part->page_type->name == 'text')
                    {{ $page_part->content }}
                @elseif($page_part->page_type->name == 'markup-text')
                    {!! $page_part->content !!}
                @elseif($page_part->page_type->name == 'photo')
                    <img src="{{asset('images/'.$page_part->content)}}">
                @endif
                </div>
                <br>
        @endif
    @endforeach
@else
    <h3>Sorry, you dont have access to the object</h3>
@endif

@endsection