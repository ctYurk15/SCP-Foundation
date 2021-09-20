$(document).ready(function(){
    
    //start values for page parts
    var partTemplate = $(".publicationPart").toArray()[0];
    var pagePartCount = 1;

    $("#addPublicationForm").submit(function(event){
        event.preventDefault();

        var data_array = $(this).serializeArray();

        console.log(data_array);
    });

    $("#addPagePartBtn").on("click", function(){
        //adding new page part
        $("#pagePartsContainer").append(partTemplate.outerHTML+"<br>");

        //getting new page part
        var newPagePart = $(".publicationPart").toArray()[pagePartCount];
        
        //changing names&values of page part
        $(newPagePart).attr('data-index', pagePartCount);

        $(newPagePart).find('select[name="partType0"]').attr('name', 'partType'+pagePartCount);
        $(newPagePart).find('textarea[name="content0"]').attr('name', 'content'+pagePartCount);

        pagePartCount++;
    });

    $("#deletePagePartBtn").on("click", function(){
        pagePartCount--;
        
        $(".publicationPart").toArray()[pagePartCount].remove();
        $("#pagePartsContainer").children('br').toArray()[pagePartCount].remove();
        
    });

});