
$( document ).ready(function() {
    
    $('#add-review-on-graden').on("click", function(){
        
          console.log (' click #add-review-on-graden');
          add_review_on_garden();
    });
    
    
    
});


  function add_review_on_garden(){
      
       console.log ('add_review_on_garden' );
      
      
        var inputVal = $('#add-review-on-graden-text').val();
        var kindergardenID = $('#kindergerdenID').val();
     
        console.log ('add-review-on-graden-text  =' +inputVal );
       
       
        
        var data = {text: inputVal,
                    kindergardenID : kindergardenID
                };
                
           //TODO check if numeric fo kindergardenID     
        if(inputVal.length){
            $.post("php/add_review.php", data).done(function(data){
                // Display the returned data in browser
                $('#review-modal').foundation('reveal', 'close');
                console.log('quick serch results');
                console.log(data);
                return;
                var showResults = '<ul>';
                $.each(data,function(index,obj){
                    
                    showResults += '<li><a href="item.php?id='+obj.id+'" data-sOBJ="'+index+'" data-DB-ID="'+obj.id+'"class="a-quickresults">' + obj.name + ' , ' + obj.city + ' , ' + obj.adress + '</a>' +'</li>';
                    
                });
                showResults += '</ul>';
                
                resultDropdown.html(showResults);
            });
        } else{
            resultDropdown.empty();
        }
        
    };