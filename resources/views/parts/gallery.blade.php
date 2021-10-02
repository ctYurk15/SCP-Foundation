<h3>Gallery: </h3>
<div id='galleryDiv'>
    @foreach($files as $file)
    <div class="galleryPhotoDiv">
        <img src='{{ asset("images/") }}/{{$gallery_name}}/{{ $file->getFilename() }}'> 
        
        {{ $file->getFilename() }}
    </div><br>
    @endforeach
</div>

<h5>Add new  image: </h5>
<form id='addImageForm' data-url='{{ route("add-image") }}' enctype='multipart/form-data' data-gallery="{{ $gallery_name }}">
    <input type='file' name='file'><br>
    <button class="btn btn-success">Submit</button>
</form>