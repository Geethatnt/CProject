<?php
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';

include 'includes/header.php';
$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
    $email=$_POST["email"];
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);
	if(isset($existuser)){
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			//update database with new password
			$UM->updatePassword($email,md5($newpassword[0])); // added md5 hashing for password 
			//$formerror="Valid email user. password: ".$newpassword[0];
			//coding for sending email
			// do work heres
			/*
			 PHPMailer tutorial
			 Please visit alexwebdevelop.com
			 */
			
			
			
			/* Include PHPMailer autoloader */
			require_once '../phpmailer/PHPMailerAutoload.php';
			
			/* PHPMailer object */
			$mail = new PHPMailer();
			
			/* Sender (name is optional) */
			$mail->setFrom('lithanm6@gmail.com', 'Admin');
			
			/* Recipient (name is optional) */
			$mail->addAddress("$email", 'User1');
			
			/* Subject */
			$mail->Subject = 'Test Email';
			
			/* Reply-to address */
			//$mail->addReplyTo('vader@empire.com', 'Lord Vader');
			
			/* CC */
			//$mail->addCC('admiral@empire.com', 'Fleet Admiral');
			
			/* BCC */
			//$mail->addBCC('luke@rebels.com', 'Luke Skywalker');
			
			/* Send message as HTML */
			$mail->isHTML(TRUE);
			
			/* Message body */
			$mail->Body = "<html>This is the new password <strong> $newpassword[0] </strong>.</html>";
			
			/* Plain text alternative */
			$mail->AltBody = 'There is a great disturbance in the Force.';
			
			/* Attachment */
			//$mail->addAttachment('/home/darth/star_wars.mp3', 'Star_Wars_music.mp3');
			
			/* Binary stream from a database blob field */
			//$mysql_data = $mysql_row['blob_data'];
			//$mail->addStringAttachment($mysql_data, 'db_data.db');
			
			/* Binary network stream */
			//$pdf_url = 'http://remote-server.com/file.pdf';
			//$mail->addStringAttachment(file_get_contents($pdf_url), 'file.pdf');
			
			/* Use a custom SMTP server */
			$mail->isSMTP();
			
			/* SMTP host */
			$mail->Host = 'smtp.gmail.com';
			
			/* SMTP TCP port */
			$mail->Port = 465;
			
			/* Use TSL secure connection */
			$mail->SMTPSecure = 'ssl';
			
			/* Enable authentication */
			$mail->SMTPAuth = TRUE;
			
			/* SMTP username */
			$mail->Username = 'lithanm6@gmail.com';
			
			/* SMTP password */
			$mail->Password = 'H245hyt12';
			
			/* Send the message */
			if (!$mail->send())
			{
			    echo "Error: " . $mail->ErrorInfo;
			}
			else
			{
			    echo "Message sent.";
			}
			
			
			$formerror="New password have been sent to ".$email;
			//header("Location:home.php");
	}else{
			$formerror="Invalid email user";
	}
}

?>


<html>

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
	<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
  </head>

	<body style="font-family:'Poppins',sans-serif;color:#222;">
  	<!-- body code goes here -->
  	<h1></h1>
<!-- !PAGE CONTENT! -->
<div class="container-fluid">
	   <div class="container-fluid">
     <div class="row d-flex justify-content-center" style="background-color:#66ffff;color:#220e51">
	     <div class="col-md-12 mt-5 mb-5">
			 <h3 class="font-italic text-center">Forget Password </h3></div>
			 
	<form name="Forgetpwd" method="post">
	<div class="form-group form-inline mb-3">
         <label for="username" class="mb-2 mr-sm-4 ml-5" >Email</label>
         <input type="email" name="email" value="<?=$email?>" pattern=".{1,}"   required title="Cannot be empty field" size="30" class="form-control form-control-sm ml-4" id="username" placeholder="Enter Email" style="border-color:#3B3B3B">
         <?php echo $error_name?>
          </div>
          
     <div class="form-group form-inline  d-flex justify-content-center mt-5">
         <input type="submit" name="submitted" value="Submit" class="btn btn-primary" > 
     </div>
	   
	   <div class="form-group form-inline  d-flex justify-content-center mt-5">
	   <?php echo $formerror?>
	   </div> 
	   
	   </form>
	</div>
   </div>
	 </div>			 
	</body>		 
</html>
<?php
include 'includes/footer.php';
?>