 <?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$UM =new UserManager();
$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$existuser="";

if(!isset($_POST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserById($_GET["id"]);
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $password=$existuser->password;
}else{
  $UM=new UserManager();
  $firstName=$_POST["firstName"];
  $lastName=$_POST["lastName"];
  $email=$_POST["email"];
  //$id=$_POST["id"];
  $password=md5($_POST["password"]);
  
  //$existuser=$UM->getUserById($id);
  $existuser=$UM->getUserById($_GET["id"]);
  if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
       $update=true;
      $UM=new UserManager();
       if($email!=$existuser->email){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           //$existuser=$UM->getUserById($id);
           $existuser=$UM->getUserById($_GET["id"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           $existuser->password=$password;
           $UM->saveUser($existuser);
           $formerror="User edited successfully";
         //  $_SESSION["email"]=$email;
          // header("Location:../../home.php");
       }
  }else{
      $formerror="Please provide required values";
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
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
  </head>
  
  <body style="font-family:'Poppins',sans-serif;color:#222;">
  	<!-- body code goes here -->
  	<h1></h1>
<!-- !PAGE CONTENT! -->

 <div class="container-fluid">
	   <div class="container-fluid">
     <div class="row d-flex justify-content-center" style="background-color:#66ffff;color:#220e51">
	     <div class="col-md-12 mt-5 mb-5">
			 <h3 class="font-italic text-center">Edit Profile </h3></div>
     	
<form name="edituser.php" method="post" >
<div><?=$formerror?></div>
		<div class="form-group form-inline mb-3">
         <label for="firstname" class="mb-2 mr-sm-4 ml-5" >FirstName</label>
         <input type="text" name="firstName" value="<?=$firstName?>" "pattern="[a-zA-Z]{4,20}" title="Accept only alphabets,4-20 characters" size="50" class="form-control form-control-sm ml-4"  id="firstname" placeholder="Firstname" style="border-color:#3B3B3B">
       </div>
	
	   <div class="form-group form-inline mb-3">
		  <label for="lastname" class="mb-2 mr-sm-4 ml-5" >LastName</label> 
         <input type="text" name="lastName" value="<?=$lastName?>" "pattern="[a-zA-Z]{4,20}" title="Accept only alphabets,4-20 characters" size="50" class="form-control form-control-sm ml-4"  id="lastname" placeholder="Lastname" style="border-color:#3B3B3B">
		</div>
		
		<div class="form-group form-inline mb-3">
		  <label for="email" class="mb-2 mr-sm-4 ml-3" >Email Address </label> 
         <input type="text" name="email" value="<?=$email;?>" class="form-control form-control-sm ml-4" id="email"  style="border-color:#3B3B3B"> 
		</div>
		
		<div class="form-group form-inline mb-3">
         <label for="password" class="mb-2 mr-sm-4 ml-5" >&nbsp;Password</label>
         <input type="password" name="password" value="<?=$password?>" size="20" 
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z].{6,}" title="Must containsat least one number,one lower case,one upper case letter
    and at least 6 or more characters" class="form-control form-control-sm ml-4" id="password" placeholder="Password" style="border-color:#3B3B3B">
       </div>
	
		<div class="form-group form-inline mb-3">
         <label for="confirmpassword" class="mb-2 mr-sm-4" >Confirm Password</label>
         <input type="password" name="cpassword" value="<?=$password?>" size="20" class="form-control form-control-sm ml-2"  id="confirmpassword" placeholder="Password" style="border-color:#3B3B3B">
       </div>
                    
       <div class="form-group form-inline  d-flex justify-content-center mt-5">
       		<input type="submit" name="submitted" value="Edit" class="btn btn-primary" > &nbsp;&nbsp;
         	<input type="reset" name="reset" value="Reset" class="btn btn-primary" >
        </div> 
	   
     </form>
	</div>
   </div>
	 </div>
		





<?php
include '../../includes/footer.php';
?>