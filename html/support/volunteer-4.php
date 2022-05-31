<?php
session_start() != FALSE
  or die('Could not start session');

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

// Initialize SESSION variables
$_SESSION['occupation'] = $_SESSION['employer'] = $_SESSION['time'] = $_SESSION['certifications'] = $_SESSION['languages'] = $_SESSION['animal-orgs'] = $_SESSION['volunteer-work'] = $_SESSION['conviction'] = $_SESSION['about-paws'] = $_SESSION['volunteer-reason'] = $_SESSION['about-yourself'] = $_SESSION['animal-experience'] = '';


// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    $_SESSION[$key] = parse_input($_SESSION[$key]);
    switch($key)
    {
      case 'occupation':  if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'occupation' field. Please go back and input correctly. <br/> <br />");
                    exit;
                    }
                    break;

      case 'employer': if (!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'employer' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'time':  if (!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'time on the job' field. Please go back and input correctly. <br/> <br />");
                        exit;  
                      };
                      break;

      case 'certifications':  if(!letters_numbers_space_only($_SESSION[$key])) {
                      echo("Only letters, numbers  and white space allowed in the 'certifications' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'languages': if(!letters_space_only($_SESSION[$key])) {
                      echo("Only letters and white space allowed in the 'languages' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }
                    break;

      case 'animal-orgs': if(!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'animal organizations' field. Please go back and input correctly.<br />");
                        exit;
                      }
                      break;

      case 'volunteer-work': if(!letters_numbers_space_only($_SESSION[$key])) {
                      echo("Only letters, numbers and white space allowed in the 'volunteer work' field. Please go back and input correctly.");
                      exit;
                    }
                    break;

      case 'conviction':  if(!letters_numbers_space_only($_SESSION[$key])) {
                            echo("Only letters, numbers and white space allowed in the 'convictions' field. Please go back and input correctly.");
                            exit;
                          }
                          break;
                          
      case 'about-paws': if(!letters_numbers_space_only($_SESSION[$key])) {
                        echo("Only letters, numbers and white space allowed in the 'why you want to volunteer for PAWS' field. Please go back and input correctly. <br/> $_SESSION[$key]<br />");
                        exit;
                      }
                      break;

      case 'volunteer-reason': if(!letters_numbers_space_only($_SESSION[$key])) {
                                echo("Only letters, numbers and white space allowed in the 'volunteer reason' field. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'about-yourself':  if(!letters_numbers_space_only($_SESSION[$key])) {
                          echo("Only letters, numbers and white space allowed in the 'tell us about yourself' field. Please go back and input correctly.");
                          exit;
                        }
                        break;

      case 'animal-experience':  if (!letters_numbers_space_only($_SESSION[$key])) {
                          echo("Only letters, numbers and white space allowed in the 'tell us about your animal experience'  field. Please go back and input correctly. <br/> <br />");
                          exit;
                        }
                        break;
      default:  echo("Invalid variable name: $key. Sorry, something went wrong. Please go back and try again.");
                exit;
    }
  }
}

// Scrubbing and validation functions
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
include 'html_volunteer_email.php';
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

$mail->Subject = "New PAWS Volunteer!!";
// $mail->Body = "<i>Mail body in HTML</i>";
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