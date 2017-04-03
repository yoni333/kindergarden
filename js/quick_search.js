/*
function world_live_search(){
    
     console.log ('function world_live_search');
    
    var search = $('#live_search_input' );
    var data = {"search": search};
   
   // ajax_admin_insert_kindergarden.php
  
  
  
    var jqxhr = $.post(admin.url + "live_search.php",data )
  .done(function() {
     
      console.log('update datatable');
      
     
      
       //get_all_kindergarden_admin(); //draw table again with new inserted
      
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
    
}

*/