<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";
require "PHPMailer/SMTP.php";

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo
  "<div style='border:2px dotted; padding:5px 10px;background-color:tan'>" .
  "Line $line: <span style='color:red'>$str</span> " .
  "in <span style='color:blue'>$file</span></div>";
}

// Initialize variables
$name = $email = $street = $city = $state = $zipcode = $phone = $pet_type = $pet_gender = $pet_age = $reason = $comments = '';

// Scrub and validate input
if (isset($_POST['name'])) $name = $_POST['name'];
$name = parse_input($name);
if(!letters_space_only($name)) {
  echo("Only letters and white space allowed in the name field. Please go back and input correctly. <br/> <br />");
  exit;
}

if (isset($_POST['email'])) $email = $_POST['email'];
$email = parse_input($email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("Invalid email format. Please go back and input a valid email. <br/> <br />");
  exit;
}

if (isset($_POST['street'])) $street = $_POST['street'];
$street = parse_input($street);
if (!letters_numbers_space_only($street)) {
  echo("Only letters, numbers and white space allowed in the street field. Please go back and input correctly. <br/> <br />");
  exit;  
};

if (isset($_POST['city'])) $city = $_POST['city'];
$city = parse_input($city);
if(!letters_space_only($city)) {
  echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br/> <br />");
  exit;
}

if (isset($_POST['city'])) $state = $_POST['state'];
$state = parse_input($state);
if(!letters_space_only($state)) {
  echo("Only letters and white space allowed in the state field. Please go back and input correctly. <br/> <br />");
  exit;
}

if (isset($_POST['zip-code'])) $zipcode = $_POST['zip-code'];
$zipcode = parse_input($zipcode);
if(!zipcode_only($zipcode)) {
  echo("Please go back and input a valid ZIP Code, 5 digits or optionally ZIP+4. <br />");
  exit;
}

if (isset($_POST['phone'])) $phone = $_POST['phone'];
$phone = parse_input($phone);
if(!phone_number_only($phone)) {
  echo("Please go back and input a valid phone number in the form ###-###-####.");
  exit;
}

if (isset($_POST['pet-type'])) $pet_type = $_POST['pet-type'];
$pet_type = parse_input($pet_type);
if(!letters_space_only($pet_type)) {
  echo("Please select a valid pet type option.");
  exit;
}

if (isset($_POST['pet-gender'])) $pet_gender = $_POST['pet-gender'];
$pet_gender = parse_input($pet_gender);
if(!letters_space_only($pet_gender)) {
  echo("Please select a valid pet gender option.");
  exit;
};

if (isset($_POST['pet-age'])) $pet_age = $_POST['pet-age'];
$pet_age = parse_input($pet_age);
if(!numbers_only($pet_age)) {
  echo("Please go back and put the pets age in number of years. (Numbers only)");
  exit;
}

if (isset($_POST['reason'])) $reason = $_POST['reason'];
$reason = parse_input($reason);
letters_space_only($reason);

if (isset($_POST['comments'])) $comments = $_POST['comments'];


function parse_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function letters_space_only($data) {
  if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
    return(FALSE);
  }
  return(TRUE);
}

function letters_numbers_space_only($data) {
  if (!preg_match("/^[a-zA-Z0-9-' \.]*$/",$data)) {
    return(FALSE);
  }
  return(TRUE);
}

function zipcode_only($data) {
  if (!preg_match("/^[0-9]{5}-{0,1}[0-9]{0,4}$/",$data)) {
    return(FALSE);
  }
  return(TRUE);
}

function phone_number_only($data) {
  if (!preg_match("/^[0-9]{3}-{0,1}[0-9]{3}-{0,1}[0-9]{4}$/",$data)) {
    return(FALSE);
  }
  return(TRUE);
}

function numbers_only($data) {
  if (!preg_match("/^[0-9.]*$/",$data)) {
    return(FALSE);
  }
  return(TRUE);
}

// Send input in email
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

// Use 'include' to pull in email template for email message body.
ob_start();
include 'html_contact_email.php';
$body = ob_get_clean();

//From email address and name
$mail->From = "$email";
$mail->FromName = "$name";

//To address and name
$mail->addAddress("jgiuliano8@yahoo.com", "Jeff Giuliano");
$mail->addAddress("jgiuliano8@gmail.com", "Jeff Giuliano");


//Address to which recipient will reply
$mail->addReplyTo("$email", "$name");

//CC and BCC
// $mail->addCC("cc@example.com");
// $mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "New PAWS Contact!";
// $mail->Body = "<i>Mail body in HTML</i>";
$mail->MsgHTML($body);

$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    header('Refresh: 5; URL=http://development.paws-li.org/html/contact.html');
$success_message = <<<_EOT
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New PAWS Contact</title>
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
    header('Refresh: 5; URL=/html/contact.html');
    echo "Mailer Error: " . $mail->ErrorInfo . " redirecting in 5 seconds.";
}

?>