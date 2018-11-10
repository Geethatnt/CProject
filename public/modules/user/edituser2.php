<?php
session_start();
require_once '../../includes/autoload.php';
use classes\entity\User;
use classes\business\UserManager;


ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php 

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$existuser="";

if(isset($_POST["submitted"])){
    if(isset($_GET["id"])){
        $UM = new UserManager();
        
       /* $formerror="User edited successfully";
        $existuser=$UM->getUserById($_GET["id"]);
        $existuser->firstName=$_POST["firstName"];
        $existuser->lastName=$_POST["lastName"];
        $existuser->email=$_POST["email"];
        $existuser->password=$_POST["password"];*/
        
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
                $existuser=$UM->getUserById($_GET["id"]);
                $existuser->firstName=$firstName;
                $existuser->lastName=$lastName;
                $existuser->email=$email;
                $existuser->password=$password;
                $UM->saveUser($existuser);
                $formerror="User edited successfully";
                //  $_SESSION["email"]=$email;
                //header("Location:../../home.php");
            }
        }
        
        //$UM->saveUser($existuser);
    }
}else if (isset($_POST["cancelled"])){
    header("Location:../../home.php");
}else{
    if(isset($_GET["id"]))
    {
        $UM = new UserManager();
        $existuser=$UM->getUserById($_GET["id"]);
        $firstName=$existuser->firstName;
        $lastName=$existuser->lastName;
        $email=$existuser->email;
        $password=$existuser->password;
        
        
    }
}

?>

<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<form name="edituser1.php" method="post" class="pure-form pure-form-stacked">
<h1>Edit Profile for <?=$email?></h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>First Name</td>
    <td><input type="text" name="firstName" value="<?=$firstName;?>" pattern="[a-zA-Z]{4,20}" title="Accept only alphabets,4-20 characters" size="50"></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastName" value="<?=$lastName?>" pattern="[a-zA-Z]{4,20}" title="Accept only alphabets,4-20 characters" size="50"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?=$email?>"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" name="cpassword" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
	<td></td>
    <td><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary">
    <input type="hidden" name="id" value="<?=$id?>"></td>
   
  </tr>
</table>
</form>


<?php
include '../../includes/footer.php';
?>
