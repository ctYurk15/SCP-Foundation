$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //start values for page parts
    var partTemplate = $(".objectPart").toArray()[0];
    var pagePartCount = 1;

    function serializeArray(form)
    {
        var data_array = form.serializeArray();
        var result = [];
        
        //adding title, access to result
        result.push(new Object({name: 'number', value: data_array[0].value}));
        result.push(new Object({name: 'name', value: data_array[1].value}));
        result.push(new Object({name: 'objectClass', value: data_array[2].value}));
        result.push(new Object({name: 'photo', value: data_array[3].value}));
        result.push(new Object({name: 'access', value: data_array[4].value}));
        result.push(new Object({name: 'parts', value: []}));

        //adding array of page parts
        var tmp_part = [];
        var parts = [];

        data_array.forEach(function(element){
            if(element.name == 'partType[]' && tmp_part['partType'] == null)
            {
                console.log(1);
                tmp_part['partType'] = element.value;
            }
            else if(element.name == 'content[]' && tmp_part['content'] == null)
            {
                console.log(2);
                tmp_part['content'] = element.value;
            }
            else if(element.name == 'access[]' && tmp_part['access'] == null)
            {
                console.log(3);
                tmp_part['access'] = element.value;
            }
            
            //we have full part, and can pass it into array
            if(tmp_part['partType'] != null && tmp_part['content'] != null && tmp_part['access'] != null)
            {
                parts.push(new Object({partType: tmp_part['partType'], content: tmp_part['content'], access: tmp_part['access']}));
                tmp_part = [];
                console.log(parts);
            }

        });

        result[5].value = parts;

        return result;
    }

    $("#addObjectForm").submit(function(event){
        event.preventDefault();

        var data_array = serializeArray($(this));
        var url = $(this).attr("data-url");

        console.log(data_array);

        $.ajax({
            type: "POST",
            url: url, 
            data: {
                'object': data_array,
                '_token': $(this).attr('data-token'),
                
            },
            success: function(data){

                if(data.success === true)
                {
                    alert("Success!");
                    $("#addObjectForm")[0].reset();
                }
                else console.log(data);
                
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    $("#addPagePartBtn").on("click", function(){
        //adding new page part
        $("#objectPartsContainer").append(partTemplate.outerHTML+"<br>");

        //getting new page part
        var newPagePart = $(".publicationPart").toArray()[pagePartCount];
        
        //changing names&values of page part
        $(newPagePart).attr('data-index', pagePartCount);

        pagePartCount++;
    });

    $("#deletePagePartBtn").on("click", function(){
        pagePartCount--;
        
        $(".publicationPart").toArray()[pagePartCount].remove();
        $("#objectPartsContainer").children('br').toArray()[pagePartCount].remove();
        
    });

});