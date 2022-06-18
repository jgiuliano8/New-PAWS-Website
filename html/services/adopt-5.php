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
    <title>PAWS Adoption Fomr Error</title>
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
$_SESSION['ref1-name'] = $_SESSION['ref1-relationship'] = $_SESSION['ref1-phone'] = $_SESSION['ref1-email'] = $_SESSION['ref2-name'] = $_SESSION['ref2-relationship'] = $_SESSION['ref2-phone'] = $_SESSION['ref2-email'] = $_SESSION['ref3-name'] = $_SESSION['ref3-relationship'] = $_SESSION['ref3-phone'] = $_SESSION['ref3-email'] = $_SESSION['vet-name'] = $_SESSION['vet-phone'] = $_SESSION['care-consent'] = $_SESSION['signature'] = '';


// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key)
    {

      case 'ref1-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 1 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref1-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 1 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref1-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 1 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref1-email':  if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 1 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'ref2-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 2 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref2-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 2 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref2-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 2 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref2-email':  if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 2 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'ref3-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 3 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref3-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 3 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref3-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 3 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref3-email':   if($_SESSION[$key] != '') {
                            if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                              echo("Invalid email format. Please go back and input a valid email in the 'Reference 3 email' field. <br/> <br />");
                              exit;
                            }
                          }
                          break;

      case 'vet-name':  if (!letters_space_only($_SESSION[$key])) {            
                            echo("Only letters and white space allowed in the 'Veterinary name' field. Please go back and input correctly. <br/> <br />");
                            exit;
                          }
                        break;

      case 'vet-phone': if(!phone_number_only($_SESSION[$key])) {
                            echo("Please go back and input a valid phone number in the 'Veterinary phone number' field, of the format ###-###-####.");
                            exit;
                          }
                        break;

      case 'care-consent': if ($_SESSION[$key] !== 'I agree') {            
                            echo("Only letters and white space allowed in the 'care consent' field. Please go back and input correctly. <br/> <br />");
                            exit;
                          }
                        break;

      case 'signature':  if (!letters_space_only($_SESSION[$key])) {            
                            echo("Only letters and white space allowed in the 'Full legal name' field. Please go back and input correctly. <br/> <br />");
                            exit;
                          }
                        break;

      default:  echo("Invalid variable name: $key. Sorry, something went wrong. Please go back and try again.");
                exit;
    }
  }
}

// Send input in email
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

// Use 'include' to pull in email template for email message body.
ob_start();
include '../../forms/html_adopt_email.php';
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

$mail->Subject = "New PAWS Adoption Application!";
$mail->MsgHTML($body);

$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    header('Refresh: 5; URL=http://development.paws-li.org/html/services/adopt-1.php');
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