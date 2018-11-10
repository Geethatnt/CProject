<?php
session_start();
include 'includes/security.php';
include 'includes/header.php';

?>
<br><br>
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
   
  
<h3 style="color:blue;text-align:center"><B>Welcome to the Community Portal for the Software Programmers</B></h3>
<!-- !PAGE CONTENT! -->

   <div class="container-fluid"> 
    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
		  <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>	
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active"> <img class="img-fluid" src="Images/bg1v2.jpg" alt="First slide">
            <div class="carousel-caption">
              
              <p style="font-family:'forte';font-size:'2 rem'; color:#FFF">"The Best Job awaits here !!!!"</p>
            </div>
          </div>
          <div class="carousel-item"> <img class="img-fluid" src="Images/bg2.jpg" alt="Second slide">
            <div class="carousel-caption">
               <p style="font-family:'forte';font-size:'2 rem';  color:#ffff80">"If you control the code,you control the world"</p>
            </div>
          </div>
          <div class="carousel-item"> <img class="img-fluid" src="Images/bg8v2.jpg" alt="Third slide">
            <div class="carousel-caption">
             <p style="font-family:'forte';font-size:'2 rem';  color:#DF181B">"Together Everyone Achieves More-TEAM"</p>
             
            </div>
          </div>
		     <div class="carousel-item"> <img class="img-fluid" src="Images/bg5v2.png" alt="fourth slide">
            <div class="carousel-caption">
              
              <p style="font-family:'forte';font-size:'2 rem';  color:#ffff80">"We are software professionals to convert your ideas to applications..."</p>
            </div>
          </div>	
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> 
        	<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
        	<span class="sr-only">Previous</span> 
        </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> 
         	<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span> 
		</a> 
		</div>
   </div>
 </body>
<?php
include 'includes/footer.php';
?>
