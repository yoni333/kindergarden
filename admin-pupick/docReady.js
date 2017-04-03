
$( document ).ready(function() {
    console.log( "ready!" );
    
     get_all_kindergarden_admin();
     
     //add new garden admin
    $('#insert_kindergarden').click(function(){
        console.log ('click insert_kindergarden');
        insert_kindergarden_admin();
        
        
    });
    
    $('#update_kindergarden').click(function(){
        console.log ('click update_kindergarden');
        edit_kindergarden_admin();
        
        
    });
   
    
});
