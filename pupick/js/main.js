lists= {};

lists.getAll = function() {
    
   $.post( "allLists.json", function( data  ) {
  console.log( "success" , data  );
})
  .done(function() {
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
};
    lists.getAll();
    
    
