$(document).ready(function(){
    
    $('#addUserForm').submit(function(event){
        event.preventDefault();
        
        var data = $(this).serializeArray();
        var url = $(this).data('route');

        console.log(data);

        $.ajax({
            type: "POST",
            url: url, 
            data: data,
            success: function(response){

                if(response.success)
                {
                    alert("Success!");
                    $('#addUserForm')[0].reset();
                }
            },
            error: function(response){
                alert('See errors in console');
                console.log(response);
                console.log(response.responseJSON.errors);
            }
        });
    });
});