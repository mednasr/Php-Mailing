
<?php


$email = $_REQUEST['email'] ;
$subject= $_REQUEST['subject'] ;
$name= $_REQUEST['name'] ;
$message=$_message['message'];


$msg=
'Name:	'.$_REQUEST['name'].'<br />
Email:	'.$_REQUEST['email'].'<br />
IP:	'.$_SERVER['REMOTE_ADDR'].'<br /><br />

Message:<br /><br />

'.nl2br($_message['message']).'

';

require("phpmailer/PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$mail->Username = "Your sender mail";
$mail->Password = "Your password";

$mail->From = $email;


$mail->AddAddress("Your receiver Adress", "Name");


$mail->WordWrap = 80;
$mail->IsHTML(true);


// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;

$mail->MsgHTML($msg);
$mail->Body = $msg;
if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";
?>
