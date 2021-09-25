$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //start values for page parts
    var partTemplate = $(".publicationPart").toArray()[0];
    var pagePartCount = 1;

    function serializeArray(form)
    {
        var data_array = form.serializeArray();
        var result = [];
        
        //adding title, access and token to result
        result.push(new Object({name: 'title', value: data_array[0].value}));
        result.push(new Object({name: 'access', value: data_array[1].value}));
        result.push(new Object({name: 'parts', value: []}));

        //adding array of page parts
        var tmp_part = [];
        var parts = [];

        data_array.forEach(function(element){
            if(element.name == 'partType[]' && tmp_part['partType'] == null)
            {
                tmp_part['partType'] = element.value;
            }
            else if(element.name == 'content[]' && tmp_part['content'] == null)
            {
                tmp_part['content'] = element.value;
            }
            else if(element.name == 'access[]' && tmp_part['access'] == null)
            {
                tmp_part['access'] = element.value;
            }
            
            //we have full part, and can pass it into array
            if(tmp_part['partType'] != null && tmp_part['content'] != null && tmp_part['access'] != null)
            {
                parts.push(new Object({partType: tmp_part['partType'], content: tmp_part['content'], access: tmp_part['access']}));
                tmp_part = [];
            }

        });

        result[2].value = parts;

        return result;
    }

    $("#addPublicationForm").submit(function(event){
        event.preventDefault();

        var data_array = serializeArray($(this));
       // var data_array = $(this).serializeArray();
        var url = $(this).attr("data-url");

        console.log(data_array);

        $.ajax({
            type: "POST",
            url: url, 
            data: {
                'publication': data_array,
                '_token': $(this).attr('data-token'),
                
            },
            success: function(data){

                if(data.success === true)
                {
                    alert("Success!");
                    $("#addPublicationForm")[0].reset();
                }
                
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    $("#addPagePartBtn").on("click", function(){
        //adding new page part
        $("#pagePartsContainer").append(partTemplate.outerHTML+"<br>");

        //getting new page part
        var newPagePart = $(".publicationPart").toArray()[pagePartCount];
        
        //changing names&values of page part
        $(newPagePart).attr('data-index', pagePartCount);

        pagePartCount++;
    });

    $("#deletePagePartBtn").on("click", function(){
        pagePartCount--;
        
        $(".publicationPart").toArray()[pagePartCount].remove();
        $("#pagePartsContainer").children('br').toArray()[pagePartCount].remove();
        
    });

    $('#addImageForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('gallery_name', 'publications');

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