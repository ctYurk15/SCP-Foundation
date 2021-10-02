@extends('layouts.main')

@section('title', 'Objects')

@section('css')
<link rel='stylesheet' href='{{ asset("resources/css/gallery.css") }}'>
@endsection

@section('content')
<h3>Add new object</h3>
<form id='addObjectForm' data-url="{{ route('add-object') }}" data-token="{{ csrf_token() }}">
<table class='formTable'>
    <tr>
        <td><label for='number'>Number</title></td>
        <td><input type='number' name='number' placeholder='Example: 1793' required></td>
    </tr>
    <tr>
        <td><label for='name'>Name</title></td>
        <td><input type='text' name='name' placeholder='Example: magical pills' required></td>
    </tr>
    <tr>
        <td><label for='objectClass'>Object class</title></td>
        <td>
            <select class="form-select form-select-lg mb-3" name='objectClass' required>
                <option value='-' selected disabled>Select one</option>
                @foreach($classes as $class)
                    <option value='{{ $class->id }}'>{{ $class->title }}</option>
                @endforeach
            </select><br>
        </td>
    </tr>
    <tr>
        <td><label for='photo'>Photo</title></td>
        <td><input type='text' name='photo' placeholder='Photo name from gallery' required></td>
    </tr>
    <tr>
        <td><label for='access'>Access</title></td>
        <td><input type='text' name='access' placeholder='NUMBERS ONLY(1-5)' required></td>
    </tr>
</table>

<br>
<h5>Object document parts:</h5>
<div id='objectPartsContainer'>
    <div class='publicationPart publicationPartDiv objectPart' data-index='0'>
        <div class='publicationPartContentDiv'>
            <label for='partType'>Page part type: </label><br>
            <select class="form-select form-select-lg mb-3" name='partType[]' required>
                <option value='male' selected disabled>Select one</option>
                @foreach($types as $type)
                    <option value='{{ $type->id }}'>{{ $type->name }}</option>
                @endforeach
            </select><br>
            
            <label for='content'>Content: </label><br>
            <textarea name='content[]' required rows='4' cols='40' placeholder='For photos: type name of file from the gallery below'></textarea><br>

            <label for='title'>Access</title><br>
            <input type='text' name='access[]' placeholder='NUMBERS ONLY(1-5)' required>
        </div>
    </div><br>
</div>

<button type='button' class='Btn material-icons' id='addPagePartBtn'>add</button>
<button type='button' class="Btn material-icons" id='deletePagePartBtn'>delete</button><br><br>

<button type="submit" class="btn btn-success">Add new object</button>
</form>
<br>

@include('parts.gallery', ['gallery_name' => 'objects'])

@endsection
    
@section('js')
<script src="{{ asset('resources/js/objects.js') }}"></script>
<script src="{{ asset('resources/js/gallery.js') }}"></script>
@endsection