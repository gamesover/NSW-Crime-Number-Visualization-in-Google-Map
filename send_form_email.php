<!DOCTYPE html>
<html>
<head>
	<meta name="Ken Ding" content="Project 2 of Grand Challenges " />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Ken Ding -- Project 2 of Grand Challenges</title>
</head>
<body>
	<div id="page" align="center">
		<div id="content" style="width:800px">
			<div id="logo">
				<div style="margin-top:70px" class="whitetitle">GC - UofA</div>
			</div>
			<div id="topheader">
				<div align="left" class="bodytext">
					<br />
					<strong>Ken Ding</strong><br />
					Department of Computer Science<br />
					University of Adelaide<br />
					North Terrace, Adelaide SA 5005<br />
					wenhe <strong>dot</strong> ding <strong>at</strong> student.adelaide.edu.au
				</div>
				<div id="toplinks" class="smallgraytext">
					<a href="index.html">Home</a> | <a href="sitemap.xml">Sitemap</a> | <a href="contact.html">Contact Me</a>
				</div>
			</div>
			<div id="menu">
				<div align="right" class="smallwhitetext" style="padding:9px;">
					<a href="#">Home</a> | <a href="introduction.html">Introduction</a> | <a href="dataset.html">DataSet</a> | <a href="hadoop.html">Hodoop</a> | <a href="googlemaps.html">Google Maps</a> | <a href="benefit.html">Benefit</a> | <a href="reflection.html">Reflection</a>
				</div>
			</div>
			<div id="submenu">
				<div align="right" class="smallgraytext" style="padding:9px;">
					<a href="https://docs.google.com/presentation/d/165vgFpt-07iFwuhkM66Y14qWrrb03P_teXwfG2s5Kog/edit?usp=sharing" target="_blank">Pitch</a> | <a href="https://docs.google.com/presentation/d/1MuLNwdBuZ3BbagzzvfKs4GYcX5v4TH38XLqAr7WQLlY/edit?usp=sharing" target="_blank">First Cut</a> | <a href="thanks.html">Thanks</a>
				</div>
			</div>
			<div id="contenttext">
				<div style="padding:10px">
					<span class="titletext">Thank you for sending comments!</span>
					</div>
					<div class="bodytext" style="padding:12px;" align="justify">

<?php
		if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "dingwenhe@gmail.com";
    $email_subject = "Comments to your project 2";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

    
// use php mail() function     
// create email headers
//ini_set("sendmail_path","/usr/local/bin/sendmail");
/*
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
*/
$from = "From: You <dingwenhe@gmail.com>";
$to = "dingwenhe@gmail.com";
$subject = "Hi! ";
$body = "TEST";

if(mail($to,$subject,$body,$from)) echo "MAIL - OK";
else echo "MAIL FAILED";
/*
require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.gmx.net';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'flypcb@gmx.com';                            // SMTP username
$mail->Password = '116569';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted


//Set who the message is to be sent from
$sender_name = $first_name.' '.$last_name;
$mail->setFrom($email_from, $sender_name);
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($email_to, 'Ken Ding');
//Set the subject line
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->Subject = $email_subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}*/
?>
 
<!-- include your own success html here -->
<!--
Thank you for contacting us. We will be in touch with you very soon. 
-->
<!--
Sorry, this free space server ban mail function of PHP. Please send your comments directly to wenhe.ding <strong>AT</strong> student.adelaide.edu.au 
--> 
<?php
}
?>
				</div>
			</div>
			<div id="leftpanel">
				<div align="justify" class="graypanel">
					<span class="smalltitle">News</span><br /><br />
					<span class="smallredtext">October 31, 2013</span><br />
					<span class="bodytext">My Project 2 of Grand Challenges is online now. Please free feel to give me any feedback. I hope everybody could harvest a great score. Best wishes to you!</span><br />
					<a href="10_31_2013.html" class="smallgraytext">More...</a><br /><br />
					<!--
					<span class="smallredtext">September 27, 2006</span><br />
					<span class="bodytext">Curabitur arcu tellus, suscipit in, aliquam eget, ultricies id, sapien. Nam est.</span><br />
					<a href="#" class="smallgraytext">More...</a><br /><br />
					<span class="smallredtext">September 27, 2006</span><br />
					<span class="bodytext">Curabitur arcu tellus, suscipit in, aliquam eget, ultricies id, sapien. Nam est.</span><br />
					<a href="#" class="smallgraytext">More...</a><br /><br />
					-->
				</div>
			</div>
			<div id="footer" class="smallgraytext">
				<a href="index.html">Home</a> | <a href="introduction.html">Introduction</a> | <a href="dataset.html">DataSet</a> | <a href="hadoop.html">Hodoop</a> | <a href="googlemaps.html">Google Maps</a> | <a href="benefit.html">Benefit</a> | <a href="reflection.html">Reflection</a>
				| Ken Ding 
				&copy; 2013 | <a href="http://www.biz.nf/" target="_blank">Hosting Biz.nf</a> 
			</div>
		</div>
	</div>
</body>
</html>