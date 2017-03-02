console.log ('init admin obj');
admin = {};
admin.url =  window.location.href.substring(0, window.location.href.lastIndexOf("/") + 1);
admin.kindergarden = {};
admin.tables = {};
admin.tables.active_kindergaden = undefined;
admin.dom = {} ;
admin.dom.form = 'admin_new_form';
admin.dom.editForm = 'admin_edit_form';
admin.dom.table = 'active_table_admin';

function get_new_kindergarden( domElement){
    
    console.log ('get_new_kindergarden');
    data = $( '#' + domElement ).serializeArray();
    
     console.log ('data' , data );
    
    return data;
}

function insert_kindergarden_admin(){
    
    console.log ('insert_kindergarden_admin');
    
    var data = get_new_kindergarden( admin.dom.form );
   
   // ajax_admin_insert_kindergarden.php
   ;
    var jqxhr = $.post(admin.url + "ajax_admin_insert_kindergarden.php",data )
  .done(function() {
      alert('insert success');
      console.log('update datatable');
      
      
       get_all_kindergarden_admin(); //draw table again with new inserted
      
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
    
    
}

function get_all_kindergarden_admin(){
    console.log('function get_all_kindergarden_admin');
     var jqxhr = $.post(admin.url + "get_all_kindergarden.php" )
  .done(function(data) {
      console.log('data' ,data);
   admin.kindergarden = data;
    console.log( "get all success" );
    create_all_dataTable();
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
}

function create_all_dataTable(){
    
     console.log( "function create_all_dataTable" );
     
    columns = [] ;
    $.each(admin.kindergarden[0],function(key,value){
    //create the columns headers
    columns.push({"data":key , "className":key});
    
    
    });
     console.log( 'columns' , columns);
     
     
     
     if ( admin.tables.active_kindergaden === undefined ){
         // append_table_headers_admin(columns);
      }
      
      if ( admin.tables.active_kindergaden !== undefined ){
           admin.tables.active_kindergaden.fnDestroy();
      }
      
   
   
  //TODO add check for empty json
    admin.tables.active_kindergaden  = $('#' + admin.dom.table ).dataTable( {
        "data":  admin.kindergarden,
        "columns": columns,
        "ordering": true,
       
         "retrieve": true
      } );
 
    //add events for clicking on edit garden button
    add_events_edit_garden();
    
}

function append_table_headers_admin(columns){
    
    var header= '';
    $.each(columns,function(key,value){
    //create the columns headers
    header += "<th>" + columns[key].data + "</th>";
    
    
    });
    
      $('#active_table_admin thead').append(header);
    
}


function add_events_edit_garden(){
    
   console.log ('function add_events_edit_garden');
    
    $('.adminEditGardenBtn').on( "click", function() {
        var id = $( this ).attr('data-editGarden') ;
        console.log( 'garden id = ' + id  );
        var row = $(this).closest("tr");
        open_edit_gardem_modal( id , row );
    });
    
}

function open_edit_gardem_modal( id ,row ){
        
         console.log ('function open_edit_gardem_modal');
        var data = {};
      //get all data from the row
      row.find('td').each(function() {
        //console.log( $(this).text() ); // this will be the text of each <td>
        var className = $(this).attr('class').split(' ')[1];//we make split to take only first class
        data[className] = $(this).text(); 
   });
   
   data['id'] = data.sorting_1; //datatableJs insert the class sorting_1 instesd of 'id' - so we bring it back

      console.log(data);
      
  
       $('#editGardenModal #admin_edit_id').val(data.id);
       $('#editGardenModal #admin_edit_id').prop('readonly', true);//we dont want you to edit this because its the id on mySql
       
       $('#editGardenModal #admin_edit_name').val(data.name);
       $('#editGardenModal #admin_edit_adress').val(data.adress);
       $('#editGardenModal #admin_edit_city').val(data.city);
       $('#editGardenModal #admin_edit_country').val(data.country);
       $('#editGardenModal #admin_edit_working_hours').val(data.working_hours);
       $('#editGardenModal #admin_edit_description').val(data.description);
      
      
      
        $('#editGardenModal').foundation('reveal','open');
    
}

function edit_kindergarden_admin(){
    
     console.log ('function edit_kindergarden_admin');
    
    var data = get_new_kindergarden( admin.dom.editForm  );
   
   // ajax_admin_insert_kindergarden.php
  
  
  
    var jqxhr = $.post(admin.url + "ajax_admin_edit_kindergarden.php",data )
  .done(function() {
     
      console.log('update datatable');
      
     
      
       get_all_kindergarden_admin(); //draw table again with new inserted
      
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
    
}