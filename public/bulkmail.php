<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
ob_start();
include 'includes/security.php';
include 'includes/header.php';

/* Include PHPMailer autoloader */
require_once '../phpmailer/PHPMailerAutoload.php';

/*$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation(); */

function sendmail($subject,$message){
    
    $mail = new PHPMailer(true);                // Passing `true` enables exceptions
    $mail = new PHPMailer;						//Create a new PHPMailer instance
    $mail->isSMTP();							//Tell PHPMailer to use SMTP
    $mail->SMTPDebug = 0;						//Enable SMTP debugging // 0 = off (for production use), 1 = client messages, 2 = client and server messages
    $mail->Host = 'smtp.gmail.com';				//Set the hostname of the mail server
    $mail->Port = 587;							//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->SMTPSecure = 'tls';					//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPAuth = true;						//Whether to use SMTP authentication
    $mail->Username = "geethaacwd@gmail.com";	//Username to use for SMTP authentication - use full email address for gmail
    $mail->Password = "*****";			//Password to use for SMTP authentication
    $mail->setFrom('geethaacwd@gmail.com', 'ACWD Mailer');	//Set who the message is to be sent from
    $mail->addAddress('geethaacwd@gmail.com', 'ACWD Mailer');	//Set who the message is to be sent to
    
    $mail->isHTML(true);
    //Set the subject line
    //$subject = $_POST["subject"];
    $mail->Subject = $subject;
    //$message = $_POST["message"];
    $rootlink="http://localhost/GIT/M6CommunityPortal/public/";
    $link=$rootlink."unsubscribe.php";
    $mail->Body = $message . "<br><br>" . "To stop receiving newsletters and updates click <a href=" . $link . ">Unsubscribe</a>" . "<br>";
    $conn = mysqli_connect("127.0.0.1", "root", "test123", "phpcrudsample");
    $sql = "SELECT  email FROM  tb_user WHERE  is_subscribed ='1' ";
    $result = $conn->query($sql);
    foreach ($result as $row){
        $mail->addBCC($row["email"]);
    }
    
    
    //$mail->addReplyTo('replyto@example.com', 'First Last');	//Set an alternative reply-to address
    //$mail->addAddress('acwdcapstone@gmail.com', 'ACWD Mailer');	//Set who the message is to be sent to
    
    
    
    if (!$mail->send()) {
        echo "Message could not be sent.";
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {echo "Email sent successfully <br><br>";}
    
    
}




//$mail->addBCC($email);	//data taken from table
//Everything needed for each email iteration needs to be in the parentheses







//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);



//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');




//send the message, check for errors



if ($_SERVER['REQUEST_METHOD']=='POST'){
    //$email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    //sendmail($email, $subject, $message);
    sendmail($subject,$message);
    //send bulk email
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
			 <h3 class="font-italic text-center">Send a Newsletter </h3></div>
     	
<form method="POST" action="">
      <div class="form-group form-inline mb-3">
         <label for="subject" class="mb-2 mr-sm-4 ml-5" >Subject:</label>
         <input type="text" name="subject" size="47" class="form-control form-control-sm ml-4" id="subject" style="border-color:#3B3B3B">
         
          </div>
          
	<div class="form-group form-inline mb-3">
         <label for="message" class="mb-2 mr-sm-4 ml-5" >Body:</label>&nbsp;&nbsp;&nbsp;&nbsp;
         <textarea rows="5" cols="50" maxlength="256" name="message" class="form-control form-control-sm ml-4" id="message" style="border-color:#3B3B3B"></textarea>
         
          </div>
          
    <div class="form-group form-inline  d-flex justify-content-center mt-5">
         <input type="submit" name="submit" value="Submit" class="btn btn-primary" > &nbsp;&nbsp;
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