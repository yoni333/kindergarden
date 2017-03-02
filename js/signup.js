

$(document).ready(function(){
    
    console.log ('soc ready from signup.js');
    
    $('#signUpAccount').on("click",function(){
        
        console.log ('click on #signUpAccount');
       var  data ={};
        data.signup_first_name = $("#signup_first_name").val();
       data.signup_last_name = $("#signup_last_name").val();
       data.signup_email = $("#signup_email").val();
       data.signup_password = $("#signup_password").val();
        console.log(data);
       signup_ajax(data);
      
    });
    
    
    $('#loginAccount').on("click",function(){
        
        console.log ('click on #loginAccount');
       var  data ={};
       
      
       data.email = $("#login_email").val();
       data.password = $("#login_password").val();
        console.log(data);
       login_ajax(data);
      
    });
    
});

function signup_ajax(data){
    
     console.log ('function signup_ajax');
   
  
   $.post("php/signup.php",data )
  .done(function(response) {
     
      console.log('new account signup');
      console.log(response);
      
     if ( response === 'duplicate'){
         
         alert ('This Email Allready exist');
         
     }
     
      if ( response === 'insert'){
         
         alert ('You have new Account now ');
         
     }
   
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
    
}

function login_ajax(data){
    
     console.log ('function login_ajax');
   
  
   $.post("php/login.php",data )
  .done(function(response) {
     
        console.log('after login try');
        console.log(response);
      
    
        if ( response ==='we_login') {
            window.location.href = 'http://pupick.de/app-pupick/profile.php';
        }else {
            
         alert ('Wrong Email or Password ');
     }
    
   
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "finished" );
  });
    
    
}