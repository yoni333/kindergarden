<?php
session_start();
 include('php/isLogin.php');
 ?>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    var availableTags = [
      "Kita 01",
      "Kita 02",
      "Kita 03",
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
  </head>
  <body id="profile">
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
        <li><a class="" href="admin.html">Admin</a></li>
        <li><a class="" href="profile.html">Profile</a></li>
        <li><a class="but" href="review.html">Review a kita</a></li>
        <li><a data-reveal-id="sign-up-modal" id="nav-sign-up" href="">Sign Up</a></li>
        <li><a data-reveal-id="login-modal" id="nav-login" href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp Login</a></li>
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

<section class="profile-container">
  <div class="row">
    <div class="small-12 medium-12 columns profile-tabs">
      <ul class="tabs" data-tab>
        <li class="tab-title active"><a href="#panel1"><h3>Personal details:</h3></a></li>
        <li class="tab-title "><a href="#panel2"><h3>My Places</h3></a></li>
      </ul>

      <div class="tabs-content">
        <div class="content active" id="panel1">
          <form>
            <div class="row">
              <div class="large-12 columns">
                <label>First name
                  <input type="text" placeholder="First name" />
                </label>
              </div>
              <div class="large-12 columns">
                <label>Last name
                <input type="text" placeholder="Last name" />
                </label>
              </div>
              <div class="small-12 large-4 columns">
                <div class="profile-img-upload">
                </div>
                <a href="#" class="grey-button"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp Browse</a>
              </div>
              <div class="large-12 columns">
                <label>E-mail
                <input type="text" placeholder="E-mail" />
                </label>
              </div>
              <div class="large-12 columns">
                <label>password
                <input type="text" placeholder="*********" />
                </label>
              </div>
              <div class="large-12 columns">
                <label>more details
                <textarea placeholder="add some more details"></textarea>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <a href="add.html" class="purp-button">Save Changes</a>
              </div>
            </div> 
          </form>
        </div>
        <div class="content" id="panel2">
          <div class="list-item small-12 columns" id="listing-header">
              <div class="small-12 medium-4 columns">
                  <a href="item.html" class="listing-adress">
                    <span class="list-item-name">Kita varthestrase</span>
                    <span class="list-item-adress">Nogatstr. 19/20 12051 Berlin</span>
                  </a>
                </div>
                <div class="small-12 medium-4 medium-end columns text-right list-item-right-details">
                  <span class="item-comment-count">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <a href="">3</a>
                  </span>
                  <span class="item-rating">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <span class="list-item-avg-rating"><a href="">4.5</a></span>
                  </span>
                </div>
            </div>
          </div>      
      </div>
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
          <br>
          <a href="" data-reveal-id="reply-modal" class="grey-button bl" id="sign-with-google">
            <i class="fa fa-google" aria-hidden="true"></i>Sign with with google</a>
          <br>
          <a href="" data-reveal-id="reply-modal" class="grey-button bl" id="sign-with-facebook">
            <i class="fa fa-facebook" aria-hidden="true"></i>Sign with with facebook</a>
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
                <input type="text" placeholder="First name" />
              </div>
              <div class="large-12 columns">
                <input type="text" placeholder="Password" />
                <a href="add.html" data-reveal-id="review-modal" class="purp-button">Log In</a>
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
                <input type="text" placeholder="First name" />
              </label>
            </div>
            <div class="large-12 columns">
              <label>Last name
                <input type="text" placeholder="Last name" />
              </label>
            </div>
            <div class="large-12 columns">
              <label>E-mail
                <input type="text" placeholder="E-mail" />
              </label>
            </div>
            <div class="large-12 columns">
              <label>password
                <input type="text" placeholder="*********" />
              </label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <a href="add.html" class="purp-button">Sign up</a>
            </div>
          </div>  
        </form>
        
      </div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
<!-- sign with mail modal -->
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
