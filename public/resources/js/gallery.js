$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addImageForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('gallery_name', $(this).attr("data-gallery"));

        $.ajax({
            type:'POST',
            url: $(this).attr("data-url"),
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#addImageForm')[0].reset();

                alert('File has been uploaded successfully');

                $('#galleryDiv').html(data.view);
            },
            error: function(data){
                console.log(data);
            }
        });
    });

});