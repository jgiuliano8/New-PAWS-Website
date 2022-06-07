<?php

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo
  "<div style='border:2px dotted; padding:5px 10px;background-color:tan'>" .
  "Line $line: <span style='color:red'>$str</span> " .
  "in <span style='color:blue'>$file</span></div>";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";
require "PHPMailer/SMTP.php";

// Parsing and scrubbing functions library
require "parse_lib.php";

// Initialize variables
$name = $email = $street = $city = $state = $zip_code = $phone = $pet_type = $pet_gender = $pet_age = $reason = $comments = '';

// Scrub and validate input
foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $$key = $value;
    $$key = parse_input(${$key});
    switch(${$key})
    {
      case 'name': if(!letters_space_only(${$key})) {
                    echo("Only letters and white space allowed in the name field. Please go back and input correctly. <br/> <br />");
                    exit;
                  }
                  break;

      case 'email': if (!filter_var(${$key}, FILTER_VALIDATE_EMAIL)) {
                      echo("Invalid email format. Please go back and input a valid email. <br/> <br />");
                      exit;
                    }
                    break;

      case 'street':  if (!letters_numbers_space_only(${$key})) {
                        echo("Only letters, numbers and white space allowed in the street field. Please go back and input correctly. <br/> <br />");
                        exit;  
                      };
                      break;

      case 'city':  if(!letters_space_only(${$key})) {
                      echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'state': if(!letters_space_only(${$key})) {
                      echo("Only letters and white space allowed in the city field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'zip_code': if(!zipcode_only(${$key})) {
                        echo("Please go back and input a valid ZIP Code, 5 digits or optionally ZIP+4. <br />");
                        exit;
                      }
                      break;

      case 'phone': if(!phone_number_only(${$key})) {
                      echo("Please go back and input a valid phone number in the form ###-###-####.");
                      exit;
                    }
                    break;

      case 'pet_type': if(${$key} != '') {
                        if(!letters_space_only(${$key})) {
                          echo("Only letters and white space allowed in the 'pet type' field. Please go back and input correctly. <br/> <br />");
                          exit;
                        }
                      }
                      break;

      case 'pet_gender': if(${$key} != '') {
                        if(!letters_space_only(${$key})) {
                          echo("Only letters and white space allowed in the 'pet gender' field. Please go back and input correctly. <br/> <br />");
                          exit;
                        }
                      }
                      break;

      case 'pet_age': if(${$key} != '') {
                        if(!numbers_only(${$key})) {
                          echo("Only numbers and decimals allowed in the 'pet age' field. Please go back and input correctly. <br/> <br />");
                          exit;
                        }
                      }
                      break;

      case 'reason':  if(!letters_space_only(${$key})) {
                        echo("Only letters and white space allowed in the 'reason' field. Please go back and input correctly. <br/> <br />");
                        exit;
                    }
                    break;

      case 'comments':  if(!textarea_only(${$key})) {
                          echo("Only letters and white space and certain characters allowed in the 'comments' field. Please go back and input correctly. <br/> <br />");
                          exit;
                        }
                        break;
      }
    }
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