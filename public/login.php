<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
$formerror="";

$email = "";
$password = "";
$error_auth = "";
$error_name = "";
$error_passwd = "";
$error_email = "";
$validate = new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
	//if($validate->check_password($password, $error_passwd))
	{
	    $response = $_POST["g-recaptcha-response"];
	    $url = 'https://www.google.com/recaptcha/api/siteverify';
	    $data = array(
	        'secret' => '6LelRXAUAAAAAHpHBtINI_dQEwR0e_-8pX66tNAp',
	        'response' => $_POST["g-recaptcha-response"]
	    );
	    $options = array(
	        'http' => array (
	            'method' => 'POST',
	            'content' => http_build_query($data)
	        )
	    );
	    $context  = stream_context_create($options);
	    $verify = file_get_contents($url, false, $context);
	    $captcha_success=json_decode($verify);
	    if ($captcha_success->success==false) {
	        echo "<p>You are a bot! Go away!</p>";
	    } else if ($captcha_success->success==true) {
	        $UM=new UserManager();
	        
	        $existuser=$UM->getUserByEmailPassword($email,$password);
	        if(isset($existuser)){
	            
	            $_SESSION['email']=$email;
	            $_SESSION['id']=$existuser->id;
	            $_SESSION['role']=$existuser->role; // added for role 05092018
	            echo '<meta http-equiv="Refresh" content="1; url=home.php">';// content ="5 means after 5 seconds redirects to home
	            
	        }
	        else
	        {
	            $formerror="Invalid User Name or Password";
	        }
	    }

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
			 <h3 class="font-italic text-center">Sign In </h3></div>
     	
<form name="login" method="post">
      <div class="form-group form-inline mb-3">
         <label for="username" class="mb-2 mr-sm-4 ml-5" >Username</label>
         <input type="email" name="email" value="<?=$email?>" pattern=".{1,}"   required title="Cannot be empty field" size="30" class="form-control form-control-sm ml-4" id="username" placeholder="Enter username" style="border-color:#3B3B3B">
         <?php echo $error_name?>
          </div>
          
       <div class="form-group form-inline mb-3">
         <label for="password" class="mb-2 mr-sm-4 ml-5" >&nbsp;Password</label>
         <input type="password" name="password" value="<?=$password?>"  size="30" class="form-control form-control-sm ml-4" id="password" placeholder="Password" style="border-color:#3B3B3B">
         <?php echo $error_passwd?>
       </div>
       
       <div class="form-group form-inline mb-3">
         <label for="password" class="mb-2 mr-sm-4 ml-5" ></label>
         <div class="g-recaptcha" data-sitekey="6LelRXAUAAAAAKO9neqOmUUDQ68oy_lNr7tAnenH"></div><!-- recaptcha  -->
       </div>
       
       <div class="form-group form-inline  d-flex justify-content-center mt-5">
         <input type="submit" name="submitted" value="Sign In" class="btn btn-primary" > &nbsp;&nbsp;
         <input type="reset" name="reset" value="Reset" class="btn btn-primary" >
	   </div>
	   
	   <div class="form-group form-inline  d-flex justify-content-center mt-5">
	   <?php echo $formerror?>
	   </div> 
	   
	   <div class="form-group form-inline  d-flex justify-content-center mt-0">
        <a  href="modules/user/register.php">Register Now!</a>&nbsp;&nbsp;
        <a  href="./forgetpassword.php">Forget Password?</a>
        </div>
        
     </form>
	</div>
   </div>
	 </div>
 </body>
<?php
include 'includes/footer.php';
?>