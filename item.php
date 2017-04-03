<?php
session_start();

//include('main.php');
//include('isLogin.php');

include('php/get_item_data.php');

//print_r($kindergarden);
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
  <body id="">
<!-- nav -->
<section class="navigation">
  <nav class="top-bar row" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1 class="logo"><a href="index.html"><img src="img/logo.png"></a></h1>
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

<section class="refine-search-container">
  <div class="row">
    <div class="small-12 no-pad columns">
      <input class="result-input" type="text" placeholder="Mitte, Berlin" />
      <a href="#" class="main-search-button" id="refine-search">Refine search</a>
    </div>
  </div>
  </div>
</section>

<section class="row">
  <div class="small-12 columns">
      <ul class="breadcrumbs">
        <li><a href="#">Home</a></li>
        <li><a href="#">Results</a></li>
        <li><a href="#">Item</a></li>
      </ul>
  </div>
</div>
</section>

<!-- Kita header -->
<section class="row" id="listing-header">
  <div class="small-12 columns clearfix">
    <div class="small-12 medium-4 left">
            <a href="" class="listing-adress">
                <input type="hidden" value="<?php echo $kindergarden['id'];?>" id="kindergerdenID">
              <span class="list-item-name" id="item_kindergarden_name"><?php echo $kindergarden['name'];?> </span>
              <span class="list-item-adress"><?php echo $kindergarden['adress'];?> , <?php echo $kindergarden['city'];?> , <?php echo $kindergarden['country'];?>
              </span>
            </a>
            <a href="" data-reveal-id="show-map-modal" class="show-on-map">more info <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
          </div>        
          <div class="small-12 medium-8 large-6 right text-right list-item-right-details" id="listing-header-actions">
            <span class="item-comment-count">
              <i class="fa fa-comments" aria-hidden="true"></i>
              <a href="">1</a>
            </span>
            <span class="item-rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <span class="list-item-avg-rating"><a href="">4.5</a></span>
            </span>
            <a href="#" class="grey-button listing-action-button"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp Save</a>
            <a href="" data-reveal-id="reply-modal-check-sign" class="purp-button listing-action-button">
              <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp  Add a review</a>
          </div>
      </div>    

  <div class="small-12 columns">
    <hr>
  </div>

  <div class="small-12 columns listing-header-bottom no-pad">
    
    <div class="small-12 medium-3 columns">
      <h5>About this place:</h5>
      <p class="small-p">
        
          <?php echo $kindergarden['description'];?>
                </p>
    </div>
    <div class="small-12 medium-3 columns">
      <h5>Opening Times:</h5>
      <p class="small-p">
          <?php echo $kindergarden['working_hours'];?> 
      </p>
    </div>
    <div class="small-12 medium-3 columns">
      <h5>Location:</h5>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9722.245018162283!2d13.43526645!3d52.4689729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sde!4v1483543819795" frameborder="0" width="100%" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="small-12 medium-3 columns">
      <h5>Contact details:</h5>
      <p class="small-p">
      <?php echo $kindergarden['contact'];?> 
      </p>
      <a href="#" class="grey-button listing-action-button"><i class="fa fa-phone" aria-hidden="true"></i></i>&nbsp Contact</a>
    </div>
  </div>
</section>
<!-- Kita header -->

<section class="row">
  <div class="small-12 columns listing-parameters">
    <h4>Other patameters</h4>
    <hr>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <div class="small-12 medium-2 columns listing-parameters-container">
      <p class="text-center listing-parameters-stars-container">
        <span class="item-rating">
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
          <i class="fa fa-star purp-color" aria-hidden="true"></i>
        </span>
      </p>
      <span class="bl text-center listing-parameter-name">clean</span>
    </div>
    <br><br>
    <hr>
  </div>
</section>

<section class="listing-reviews row">
  <div class="reviews-container small-12 columns">
      <?php //print_r($reviews);?>
    <h3><?php echo count($reviews);?> Reviews:</h3>
  </div>
    
   <?php foreach($reviews as $key=>$value) { ?>
  <div class="single-review small-12 medium-8 columns end">
    <div class="reviewer-details">
      <img src="img/avatar/avatar3.jpg">
      <a href=""><?php echo $value['user_id'] ;?></a>
    </div>
    <p>
        <?php echo $value['feddback'] ;?>
    </p>
    <div class="up-down-vote-container">
      <a href=""><i class="fa fa-caret-up" aria-hidden="true"></i><span class="review-up-down-number">23</span></a>
      <a href=""><i class="fa fa-caret-down" aria-hidden="true"></i><span class="review-up-down-number">3</span></a>
    </div>
    <!--
    <div class="small-12 columns no-pad">
      <textarea placeholder="Reply here"></textarea>
      <a href="" data-reveal-id="reply-modal-check-sign" class="purp-button" id="reply-to-review">Reply</a>
    </div>
  -->
  </div>
    
   <?php } ?>
    
</section>

<!-- Review modal -->
    <div id="review-modal" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="modal-header"><h4 class="text-center">Add a review</h4></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
      <div class="row modal-body">
            <div class="large-12 columns">
              <h4>Your Rating:</h4>
              <span class="add-review-item-rating">
                <a href="" class="add-review-star"><i class="fa fa-star" aria-hidden="true"></i></a>
                <a href="" class="add-review-star"><i class="fa fa-star" aria-hidden="true"></i></a>
                <a href="" class="add-review-star"><i class="fa fa-star" aria-hidden="true"></i></a>
                <a href="" class="add-review-star"><i class="fa fa-star" aria-hidden="true"></i></a>
                <a href="" class="add-review-star"><i class="fa fa-star" aria-hidden="true"></i></a>
            </span>
          </div>
          <div class="small-12 columns">
            <h4>What do you think about this place?</h4>
              <label>
                <textarea id ="add-review-on-graden-text" class="add-review-text-area" placeholder="Enter your review here:"></textarea>
              </label>
            <button id="add-review-on-graden" class="purp-button">Submit review</button>
            </div>
          </div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
<!-- Review modal -->

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

<!-- place on map modal -->
    <div id="show-map-modal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
      <div class="modal-header"><h4 class="text-center">Show on map</h4></div>
      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
      <div class="row modal-body">
        <div class="small-12 columns">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9722.245018162283!2d13.43526645!3d52.4689729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sde!4v1483543819795" frameborder="0" width="100%" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
<!-- place on map modal -->


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    
      <script src="js/signup.js"></script>
    <script src="js/add-review-on-graden.js"></script>
  </body>
</html>





