<?php
/* this checks to see if the user exists in the session, 
   redirects to log in if not */
include "isLoggedIn.php";

/* The html below controls two tabs; one for Deal posts and another to add
   and remove managers via managePost.php and manageAdmin.php respectively */
?>


<!DOCTYPE html>

<html>
  <head>
    <title>Content Manager</title>
    <link rel="stylesheet"
	  href="http://cs.roanoke.edu/~baboone/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet"
    	  href="http://cs.roanoke.edu/~baboone/bootstrap/css/bootstrap-theme.min.css"/>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
            crossorigin="anonymous">
    </script>
    <script src="http://cs.roanoke.edu/~baboone/bootstrap/js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="managePost.js">
    </script>

    <script type="text/javascript" src="manageAdmins.js">
    </script>


  </head>
  <body>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#Content" aria-controls="home" role="tab" data-toggle="tab">Manage Content</a></li> 
    <li role="presentation">
       <a href="#Admins" aria-controls="profile" role="tab" data-toggle="tab">Manage Administrators</a></li>
    <li role="presentation">
       <a href="#ServiceReq" aria-controls="profile" role="tab" data-toggle="tab">Service Requests</a></li>

  <li role="presentation">
       <a href="#NewsLetter" aria-controls="profile" role="tab" data-toggle="tab">Email Users</a></li>
  <li class="button"><a href="../">Logout</a></li>
  </ul>

  <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="Content"><?php include "managePost.php";?></div>
     <div role="tabpanel" class="tab-pane" id="Admins"><?php include "manageAdmin.php";?></div>
     <div role="tabpanel" class="tab-pane" id="ServiceReq"><?php include "../service_request/request_list.php";?></div>
     <div role="tabpanel" class="tab-pane" id="NewsLetter"><?php include "manageEmail.php";?></div>
  </div>

  </body>
</html>
