<!-- Navigation Bar -->
<?php 
   if(isset($_SESSION["email"]))
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-green w3-large">
  <img src="http://localhost/phpcrudsample/public/images/logor2.png" class="w3-animate-zoom" align="left" style="width:25px; height:35px">
  <a href="/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-home w3-margin-right" style="color:#3b5998;"></i>Home</a>
  <a href="/phpcrudsample/public/modules/user/updateprofilenew.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-edit w3-margin-right" style="color:#3b5998;"></i>Update Profile</a>
  <!--  a href="/phpcrudsample/public/modules/user/mailinglist.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-edit w3-margin-right" style="color:#3b5998;"></i>Mailing List</a -->
<?php
       if($_SESSION["role"] == "admin") // added for role 05092018
       {
?>
         <a href="/phpcrudsample/public/modules/user/userlist1.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-list-ul w3-margin-right" style="color:#3b5998;"></i>View Users</a>
         <a href="/phpcrudsample/public/modules/feedback/feedbacklist2.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-list-ul w3-margin-right" style="color:#3b5998;"></i>View Feedbacks</a>  
<?php
       }
?>
  <a href="/phpcrudsample/public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-history w3-margin-right" style="color:#3b5998;"></i>About Us</a>	
  <a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-address-card w3-margin-right" style="color:#3b5998;"></i>Contact</a>
  <a href="/phpcrudsample/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile"><i class="fas fa-sign-out-alt w3-margin-right" style="color:#3b5998;"></i>Logout</a>
</div>
<?php 
   } else //not login else part will display the below menu
   {
?>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<div class="w3-bar w3-green w3-large">
  <img src="http://localhost/phpcrudsample/public/images/logor2.png" class="w3-animate-zoom" align="left" style="width:55px; height:35px">
  <a href="/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-home w3-margin-right" style="color:#3b5998;"></i>Home</a>
  <a href="/phpcrudsample/public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-history w3-margin-right" style="color:#3b5998;"></i>About Us</a>
  <a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile"><i class="fas fa-address-card" style="color:#3b5998;"></i> Contact</a>
  <a href="/phpcrudsample/public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile"><i class="fas fa-sign-in-alt" style="color:#3b5998;"></i> Login</a>
</div>
<?php 
   } 
?>