
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
               
                console.log('quick serch results');
                console.log(data);
                
                reviewDiv = $('#reviewsDiv');
                
                if ( window.family_name === '') { window.family_name ='anonymous' ;  window.private_name='';}
                
               var html = '';
               html += '<div class="single-review small-12 medium-8 columns end">';
               html += '<div class="reviewer-details">';
               html += '<img class="profileAvatarLib" data-name="'+window.private_name+' '+window.family_name+'">';
               html += '<a href="">'+ window.private_name + ' ' + window.family_name+'</a>';
               html += '</div>';
               html += ' <p>';
               html += inputVal ;
               html += '</p>';
               html += '<div class="up-down-vote-container">';
               html += '<a href=""><i class="fa fa-caret-up" aria-hidden="true"></i><span class="review-up-down-number">23</span></a>';
               html += '<a href=""><i class="fa fa-caret-down" aria-hidden="true"></i><span class="review-up-down-number">3</span></a>';
               html += '</div>';
    
                console.log(html);
                reviewDiv.append(html);
                 $('.profileAvatarLib').initial({width:32,height:32,fontSize:16,charCount:2});
                //close modal
                 $('#review-modal').foundation('reveal', 'close');
            });
        } else{
           console.log ('error - no text found');
        }
        
    };