@extends('layouts.main')

@section('title', 'Publications')

@section('css')
<link rel='stylesheet' href='{{ asset("resources/css/publications.css") }}'>
@endsection

@section('content')
<h3>Add new publication</h3>
<form id='addPublicationForm'>
<table class='formTable'>
    <tr>
        <td><label for='title'>Title</title></td>
        <td><input type='text' name='title' placeholder='Example: New employee'></td>
    </tr>
    <tr>
        <td><label for='title'>Access</title></td>
        <td><input type='text' name='access' placeholder='NUMBERS ONLY(1-5)'></td>
    </tr>
</table>

<br>
<h4>Publication parts:</h4>
<div id='pagePartsContainer'>
    <div class='publicationPart publicationPartDiv' data-index='0'>
        <div class='publicationPartArrowsDiv'>
            <p class='arrow'>&#9651;</p>
            <p class='arrow'>&#9661;</p>
        </div>
        <div class='publicationPartContentDiv'>
            <label for='partType'>Page part type: </label><br>
            <select class="form-select form-select-lg mb-3" name='partType0' required>
                <option value='male' selected disabled>Select one</option>
                @foreach($types as $type)
                    <option value='{{ $type->name }}'>{{ $type->name }}</option>
                @endforeach
            </select><br>
            
            <label for='content'>Content: </label><br>
            <textarea name='content0'></textarea>
        </div>
    </div><br>
</div>

<button type='button' class='Btn material-icons' id='addPagePartBtn'>add</button>
<button type='button' class="Btn material-icons" id='deletePagePartBtn'>delete</button><br><br>

<button type="submit" class="btn btn-success">Add new publication</button>
</form>
@endsection
    
@section('js')
<script src="{{ asset('resources/js/publications.js') }}"></script>
@endsection