<?php
require_once '../../includes/autoload.php';
include '../../includes/header.php';
if(isset($_GET["firstname"]) && ($_GET["email"]))
{
    $fname=$_GET["firstname"];
    $email=$_GET["email"];
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
	
  </head>
  <body style="font-family:'Poppins',sans-serif;color:#222;">
  	<!-- body code goes here -->
  	<h1></h1>
<!-- !PAGE CONTENT! -->
<div class="container-fluid">
	   	   <div class="container-fluid font-italic" style="background-color:#66ffff;color:green;">
     	     <br>
<br><br><br>
	<div class="col-md-12 mt-5 mb-3">
		<h6 class="font-italic text-center">Thank you for signing up <?php echo $fname;?>! </h6></div>
		<div class="col-md-12 mb-3"><h6 class="font-italic text-center">We sent confirmation email to <b><?php echo $email;?>! </b></h6></div>
		<div class="col-md-12 mb-3" style="color:blue"><h6 class="font-italic text-center">Proceed to <a href="../../login.php">login</a> now .....</h6></div>
		 
			   <br><br><br><br>
			   
   </div>
	 </div>




<?php
include '../../includes/footer.php';
?>