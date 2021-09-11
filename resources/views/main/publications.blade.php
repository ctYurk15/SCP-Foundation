@extends('layouts.main')

@section('title', 'SCP Publications')

@section('content')

<h2>Publications: </h2>

<div class="container">
    <div class="row">
        @foreach($publications as  $publication)
            @if($LoggedUserInfo->access_level >= $publication->access_level)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <h4>{{ $publication->title }}</h4>                
                    <div class="card-body">
                        @foreach($publication->parts as $part)
                            <p class="card-text">
                                @if($part->page_type->name == 'text')
                                    {{ $part->content }}
                                @elseif($part->page_type->name == 'markup-text')
                                    {!! $part->content !!}
                                @elseif($part->page_type->name == 'photo')
                                    <img src="{{asset('images/publications/'.$part->content)}}" class='publication-image'>
                                @endif
                            </p>
                        @endforeach
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">{{ $publication->updated_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
                
            @endif
        @endforeach
    </div>
</div>
            


@endsection