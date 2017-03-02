$( document ).ready(function() {
    console.log( "world_doc ready!" );
    
     
     //add new garden admin
    $('#big-search-submit').click(function(){
        console.log ('click big-search-submit');
        //TODO redirect to results.html
       
        
        
    });
    
  
    $('#live_search_input').on("keyup", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        console.log ('inputVal  =' +inputVal );
        
        var resultDropdown = $("#quick_search_results");
        if(inputVal.length){
            $.post("php/live_search.php", {search: inputVal}).done(function(data){
                // Display the returned data in browser
                console.log(data);
                var showResults = '<ul>';
                $.each(data,function(index,obj){
                    
                    showResults += '<li><a href="">' + obj.name + ' , ' + obj.city + ' , ' + obj.adress + '</a>' +'</li>';
                    
                });
                showResults += '</ul>';
                
                resultDropdown.html(showResults);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
  
  
  
    
});