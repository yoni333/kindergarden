<?php session_start();?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PUPICK KITA FINDER</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
<!-- nav -->
<section class="navigation">
  <nav class="top-bar row" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1 class="logo"><a href="index.php"><img src="img/logo.png"></a></h1>
      </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a class="" href="admin-pupick/index.php">Admin</a></li>
        <li><a class="" href="profile.html">Profile</a></li>
        <li><a class="but" href="review.html">Review a kita</a></li>
       
         <?php if ($_SESSION['isLogin']  !== 'login' ){ ?>
        
        <li class="nav-sign-up"><a data-reveal-id="sign-up-modal" id="nav-sign-up" href="">Sign Up</a></li>
        <li class="nav-login"><a data-reveal-id="login-modal" id="nav-login" href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp Login</a></li>
         <li id="nav-signout" style="display:none;"><a  href="php/signout.php">SignOut</a></li>
         
        <?php } else { ?>
         <li id="nav-signout"><a  href="php/signout.php">SignOut</a></li>
        <?php } ?>
         
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li class="">
        </li>
      </ul>
    </section>
  </nav>
</section>
<!-- nav -->

<section class="the-search">
  <div class="row">
    <div class="small-12">
      <h2 class="search-title text-center">Search a kita near you:</h2>
    </div>
    <div class="small-12 large-6 large-centered columns">
        <input class="adress-input" type="text" placeholder="Mitte, Berlin" id="live_search_input"/>
          <a href="" class="main-search-button" id="big-search-submit">Search</a>
          <div id="quick_search_results"></div>
    </div>
  </div>
</section>

<section class="row">

</section>
    

    <!-- check sign up modal -->
  <div id="reply-modal-check-sign" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header"><h4 class="text-center">Add a review</h4></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
      <div class="row modal-body">
        <div class="small-12 columns">
          <h4 class="text-center">Hi, to leave a reply you need to sign up. It's easy and takes just a second.</h4>
        </div>
        <div class="small-12 columns">
          <a href="" data-reveal-id="sign-up-modal" class="grey-button bl" id="">Sign Up</a>
        </div>
        <div class="small-12 columns">
          <br>
          <h4 class="text-center">Already a member?</h4>
          <a href="" data-reveal-id="login-modal" class="purp-button bl" id="">Log In</a>
        </div>
      </div>
    </div>
<!-- check sign up modal -->

<!-- sign up modal -->
    <div id="sign-up-modal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="modal-header"><h4 class="text-center">Sign Up</h4></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
      <div class="row modal-body">
        <div class="small-12 columns">
          <h4 class="text-center">Choose a method to sign up:</h4>
          <a href="" data-reveal-id="sign-with-mail" class="grey-button bl" id="">Sign with mail</a>
          <!--
          <br>
          <a href="" data-reveal-id="reply-modal" class="grey-button bl" id="sign-with-google">
            <i class="fa fa-google" aria-hidden="true"></i>Sign with with google</a>
          <br>
          <a href="" data-reveal-id="reply-modal" class="grey-button bl" id="sign-with-facebook">
            <i class="fa fa-facebook" aria-hidden="true"></i>Sign with with facebook</a>
            -->
        </div>
      </div>
    </div>
<!-- sign up modal -->

<!-- login modal -->
    <div id="login-modal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="modal-header"><h4 class="text-center">Log In</h4></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
      <div class="row modal-body">
        <div class="small-12 columns">
          <h4 class="text-center">Welcome! Log in.</h4>
          <form class="log-in-modal-form">
            <div class="row">
              <div class="large-12 columns">
                <input type="text" id="login_email" placeholder="Email" />
              </div>
              <div class="large-12 columns">
                <input type="text"  id="login_password"  placeholder="Password" />
                <div id="loginAccount" class="purp-button loginAccount">Log In</div>
              </div>
              </div>
          </form>
        </div>
      </div>
    </div>
<!-- login modal -->

<!-- sign with mail modal -->
    <div id="sign-with-mail" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="small-12 columns">
        <form>
          <div class="row">
            <div class="large-12 columns">
              <label>First name
                <input type="text" placeholder="First name" id="signup_first_name"/>
              </label>
            </div>
            <div class="large-12 columns">
              <label>Last name
                <input type="text" placeholder="Last name"  id="signup_last_name" />
              </label>
            </div>
            <div class="large-12 columns">
              <label>E-mail
                <input type="text" placeholder="E-mail"  id="signup_email"/>
              </label>
            </div>
            <div class="large-12 columns">
              <label>password
                <input type="text" placeholder="*********"  id="signup_password"/>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
             <div id="signUpAccount" class="purp-button">Sign up</div>
            </div>
          </div>  
        </form>
        
      </div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
<!-- sign with mail modal -->
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/world_docReady.js"></script>
    <script src="js/quick_search.js"></script>
    <script src="js/signup.js"></script>
    <script src="lib/avatar/initial.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
