<?php
require_once '../../includes/autoload.php';
include '../../includes/header.php';
if(isset($_GET["firstname"]) && ($_GET["lastname"]))
{
    $fname=$_GET["firstname"];
    $lname=$_GET["lastname"];
}
?>

<h3 style="color:Green;">Thank You 
<?php 
echo $fname."&nbsp".$lname; 
?> </h3>
<br/><br/> Thank you for submitting your feedback.We are reviewing your feedback.