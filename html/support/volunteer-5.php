<?php
session_start() != FALSE
  or die('Could not start session');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Pull in PHPMailer code
require "../../forms/PHPMailer/PHPMailer.php";
require "../../forms/PHPMailer/Exception.php";
require "../../forms/PHPMailer/SMTP.php";

// Pull in my parsing funcitons
require "../../forms/parse_lib.php";

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo <<< _EOT
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Volunteer Error</title>
    <style type="text/css">
    </style>
  </head>
  <body>
    <div style='border:2px dotted; padding:5px 10px;background-color:tan'>
    Line $line: <span style='color:red'>$str</span> 
    in <span style='color:blue'>$file</span></div>
  </body>
</html>
_EOT;
}

// Initialize SESSION variable
$_SESSION['signature'] = '';

// Set SESSION variable to POST variable so they carry over
// to other pages
// Then scrub and validate SESSION variable
if (isset($_POST['signature'])) {
  $_SESSION['signature'] = $_POST['signature'];
  if(!letters_space_only($_SESSION['signature'])) {
    echo("Only letters and white space allowed in the 'fullname' field. Please go back and input correctly. <br/> <br />");
    exit;
  }
}

// Send input in email
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

// Use 'include' to pull in email template for email message body.
ob_start();
include '../../forms/html_volunteer_email.php';
$body = ob_get_clean();

//From email address and name
$mail->From = $_SESSION['email'];
$mail->FromName = $_SESSION['name'];

//To address and name
$mail->addAddress("jgiuliano8@yahoo.com", "Jeff Giuliano");
// $mail->addAddress("jgiuliano8@gmail.com", "Jeff Giuliano");


//Address to which recipient will reply
$mail->addReplyTo($_SESSION['email'], $_SESSION['name']);

//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "New PAWS Volunteer!!";
$mail->MsgHTML($body);

$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    header('Refresh: 5; URL=http://development.paws-li.org/html/support/volunteer-1.php');
    $success_message = <<<_EOT
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Volunteer</title>
    <style type="text/css">
    </style>
  </head>
  <body>
    <p>
    <strong>Form has been sent successfully! Someone from PAWS will contact you soon.</strong> <br /> <br /> ....redirecting in 5 seconds.
    </p>
  </body>
</html>
_EOT;
echo ("$success_message");

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo . " <br /> Please hit back button and try to resubmit.";
}

?>