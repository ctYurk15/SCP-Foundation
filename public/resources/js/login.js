$(document).ready(function(){
    
    $("#loginForm").submit(function(event){
        event.preventDefault();

        $("#errorText").html("");

        var data_array = $(this).serializeArray();
        var url = $(this).data("url");
        
        $.ajax({
            type: "POST",
            url: url,
            data: data_array,
            success: function(data){
                window.location.replace(data['url']);
            },
            error: function(data){
                $("#errorText").html(data.responseJSON.message);
            }
        });

    });

});