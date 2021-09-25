@foreach($files as $file)
<div class="galleryPhotoDiv">
    <img src='{{ asset("images") }}/{{ $gallery_name}}/{{ $file->getFilename() }}'> 
    
    {{ $file->getFilename() }}
</div><br>
@endforeach