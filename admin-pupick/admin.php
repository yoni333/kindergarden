<?php
session_start();

include('login_check.php');


?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PUPICK KITA FINDER</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://use.fontawesome.com/36cdea22c0.js"></script>
    <script src="../js/vendor/modernizr.js"></script>
     
   
    
    
  </head>
  <body>
<!-- nav -->
<section class="navigation">
  <nav class="top-bar row" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1 class="logo"><a href="index.html"><img src="../img/logo.png"></a></h1>
      </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
          <!--
        <li><a class="" href="admin.html">Admin</a></li>
        <li><a class="" href="profile.html">Profile</a></li>
        <li><a class="but" href="review.html">Review a kita</a></li>
        <li><a data-reveal-id="sign-up-modal" id="nav-sign-up" href="">Sign Up</a></li>
        <li><a data-reveal-id="login-modal" id="nav-login" href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp Login</a></li>
          -->
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

<section class="admin-add">
  <div class="row">
  <div class="small-12 columns">
      <h3>Listings</h3> <u><a href="#" data-reveal-id="myModal">insert new kindergarden</a></u>
    <table id="active_table_admin" >
      <thead>
            <!--
        <tr>
          
          <th width="200">Name</th>
          <th width="200">Adress</th>
          <th width="100">City</th>
          <th width="100">Country</th>
          <th width="200">Working hours</th>
          <th width="200">Description</th>
          <th width="150">Rating</th>
          <th width="150">Avg. Rate</th>
          <th width="150">Edit</th>
          
        </tr>
              -->
      </thead>
      <tbody>
          <!--
        <tr>
          <td>Content Goes Here</td>
          <td>porta gravida at eget metus.</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
          <td>Content Goes Here</td>
          <td>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </td>
          <td>4.5</td>
          <td><a href="" class="grey-button"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp&nbspEdit</a></td>
        </tr>
          -->
      </tbody>
    </table>
  </div>
</div>
</section>

<!--modal -->

<!-- modal for admin insert new garden --> 
<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">insert new kindergarden</h2>
  <p class="lead">my design is grea!!!.</p>
  <form id="admin_new_form">
      name:
      <input type="text" id="admin_new_name" name="name" >
      adress:
      <input type="text"  id="admin_new_adress" name="adress" >
      city:
      <input type="text" id="admin_new_city"  name="city" >
      country:
      <input type="text"  id="admin_new_country" name="country" >
      working hours:
      <input type="text" id="admin_new_working_hours"  name="working_hours" >
      description:
      <textarea type="text"  id="admin_new_description" name="description" ></textarea>


      <a id="insert_kindergarden" class="button">insert</a>
      
  </form>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<!-- modal for admin edit garden  garden --> 

<div id="editGardenModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Edit kindergarden</h2>
  <p class="lead">my design is great edit!!!.</p>
  <form id="admin_edit_form">
      id in DATABASE:
      <input type="text" id="admin_edit_id" name="id" readonly>
      name:
      <input type="text" id="admin_edit_name" name="name" >
      adress:
      <input type="text"  id="admin_edit_adress" name="adress" >
      city:
      <input type="text" id="admin_edit_city"  name="city" >
      country:
      <input type="text"  id="admin_edit_country" name="country" >
      working hours:
      <input type="text" id="admin_edit_working_hours"  name="working_hours" >
      description:
      <textarea type="text"  id="admin_edit_description" name="description" ></textarea>


      <a id="update_kindergarden" class="button">Edit</a>
      
  </form>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
    
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
     <!--datatable.js with FixedColumns FixedHeader Buttons Column visibility Foundation -->
    <link rel="stylesheet" type="text/css" href="../lib/dataTable/datatables.min.css"/>
 
    <script type="text/javascript" src="../lib/dataTable/datatables.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script src="docReady.js"></script>
    <script src="admin.js"></script>
  </body>
</html>
