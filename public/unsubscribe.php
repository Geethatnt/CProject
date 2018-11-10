<?php
session_start();
require_once 'includes/autoload.php';
include 'includes/header.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\business\Validation;



?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$passwordc="";

//Next two brought outside if statement to become global


if (isset($_POST["unsubscribe"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    //var_dump($email);
    //var_dump($password);
    //if($validate->check_password($password, $error_passwd)){
        //$UM=new UserManager();
        
        $existuser=UserManager::getUserByEmailPassword($email,$password);
        var_dump($existuser);
        if(isset($existuser)){
            
            $_SESSION['email']=$email;
            $_SESSION['id']=$existuser->id;
            $_SESSION['role']=$existuser->role;
            
           UserManager::updateSubscription($_SESSION["email"]);
            
            echo "You have been unsubscribed" ;
            header("Location:unsubscribethankyou.php?email=$email" );
        }else{
            $formerror="Invalid User Name or Password";
        }
    }

  

  
?>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Community Portal</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="/GIT/M6CommunityPortal/public/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
	<link href="/GIT/M6CommunityPortal/public/css/bootstrap-4.0.0.css" rel="stylesheet">
	<script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.0.0.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script> <!-- recaptcha  -->
  </head>
  <body style="font-family:'Poppins',sans-serif;color:#222;">
  	<!-- body code goes here -->
  	<h1></h1>
<!-- !PAGE CONTENT! -->
<div class="container-fluid">
	   <div class="container-fluid">
     <div class="row d-flex justify-content-center" style="background-color:#66ffff;color:#220e51">
	     <div class="col-md-12 mt-5 mb-5">
			 <h3 class="font-italic text-center">Confirm you want to unsubscribe? </h3></div>

	<form method="POST" action="">
      <div class="form-group form-inline mb-3">
         <label for="email" class="mb-2 mr-sm-4 ml-5" >Email to unsubscribe:</label>
         <input type="text" name="email" size="40" class="form-control form-control-sm ml-4" id="email" style="border-color:#3B3B3B">
      </div>
	<div class="form-group form-inline mb-3">
         <label for="password" class="mb-2 mr-sm-4 ml-5" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</label>
         <input type="password" name="password" size="30" class="form-control form-control-sm ml-4" id="password" style="border-color:#3B3B3B">
      </div>
	<div class="form-group form-inline  d-flex justify-content-center mt-5">
         <input type="submit" name="unsubscribe" value="Unsubscribe" class="btn btn-primary" > &nbsp;&nbsp;
         <input type="reset" name="reset" value="Reset" class="btn btn-primary" >
	   </div>
</form>
	</div>
   </div>
	 </div>
 </body>
         
<?php
include 'includes/footer.php';
?>
