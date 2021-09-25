@extends('layouts.main')

@section('title', 'Publications')

@section('css')
<link rel='stylesheet' href='{{ asset("resources/css/publications.css") }}'>
@endsection

@section('content')
<h3>Add new publication</h3>
<form id='addPublicationForm' data-url="{{ route('add-publication') }}" data-token="{{ csrf_token() }}">
<table class='formTable'>
    <tr>
        <td><label for='title'>Title</title></td>
        <td><input type='text' name='title' placeholder='Example: New employee' required></td>
    </tr>
    <tr>
        <td><label for='title'>Access</title></td>
        <td><input type='text' name='access' placeholder='NUMBERS ONLY(1-5)' required></td>
    </tr>
</table>

<br>
<h5>Publication parts:</h5>
<div id='pagePartsContainer'>
    <div class='publicationPart publicationPartDiv' data-index='0'>
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

<button type="submit" class="btn btn-success">Add new publication</button>
</form>
<br>

<h3>Gallery: </h3>
<div id='galleryDiv'>
    @foreach($files as $file)
    <div class="galleryPhotoDiv">
        <img src='{{ asset("images/publications") }}/{{ $file->getFilename() }}'> 
        
        {{ $file->getFilename() }}
    </div><br>
    @endforeach
</div>

<h5>Add new  image: </h5>
<form id='addImageForm' data-url='{{ route("add-image") }}' enctype='multipart/form-data'>
    <input type='file' name='file'><br>
    <button class="btn btn-success">Submit</button>
</form>

@endsection
    
@section('js')
<script src="{{ asset('resources/js/publications.js') }}"></script>
@endsection