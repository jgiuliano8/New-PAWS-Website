<?php
session_start() != FALSE
  or die('Could not start session');

// Error handling
set_error_handler("ErrorHandler");

function ErrorHandler($no, $str, $file, $line) {
  echo
  "<div style='border:2px dotted; padding:5px 10px;background-color:tan'>" .
  "Line $line: <span style='color:red'>$str</span> " .
  "in <span style='color:blue'>$file</span></div>";
}

// Initialize SESSION variables
$_SESSION['interests[]'] = $_SESSION['other-info'] = $_SESSION['availability[]'] = $_SESSION['ref1-name'] = $_SESSION['ref1-relationship'] = $_SESSION['ref1-phone'] = $_SESSION['ref1-email'] = $_SESSION['ref2-name'] = $_SESSION['ref2-relationship'] = $_SESSION['ref2-phone'] = $_SESSION['ref2-email'] = $_SESSION['ref3-name'] = $_SESSION['ref3-relationship'] = $_SESSION['ref3-phone'] = $_SESSION['ref3-email'] = $_SESSION['vet-name'] = $_SESSION['vet-phone'] = '';

foreach($_POST['interests'] as $key => $value) {
print("Key $key - Value $value <br />");
}
// Set SESSION variables to POST variables so they carry over
// to other pages
// Then scrub and validate SESSION variables

foreach($_POST as $key => $value) {
  if (isset($_POST[$key])) {
    $_SESSION[$key] = $value;
    if(gettype($_SESSION[$key]) == 'array') {
      foreach($_SESSION[$key] as $subkey => $subvalue) {
            $_SESSION[$key][$subkey] = parse_input($subvalue);
      }
    } else {
      $_SESSION[$key] = parse_input($_SESSION[$key]);
    }
    switch($key)
    {
      case 'interests': foreach($_SESSION[$key] as $subkey => $subvalue) {
                          if(!letters_space_only($_SESSION[$key][$subkey])) {
                            echo("Only letters and white space allowed in the 'interests' field. Please go back and input correctly. <br/> <br />");
                          exit;
                          }
                        }
                        break;

      case 'other-info':  if (!letters_numbers_space_only($_SESSION[$key])) {
                            echo("Only letters, numbers and white space allowed in the 'time on the job' field. Please go back and input correctly. <br/> <br />");
                            exit;  
                          };
                          break;

      case 'availability':  foreach($_SESSION[$key] as $subkey => $subvalue) {
                              if(!letters_space_only($_SESSION[$key][$subkey])) {
                                echo("Only letters and white space allowed in the 'availability' field. Please go back and input correctly. <br/> <br />");
                              exit;
                              }
                            }
                            break;

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

      case 'ref1-email': if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                      echo("Invalid email format. Please go back and input a valid email in the 'Reference 1 email' field. <br/> <br />");
                      exit;
                    }
                    break;

      case 'ref2-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 1 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref2-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 1 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref2-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 1 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref2-email': if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                      echo("Invalid email format. Please go back and input a valid email in the 'Reference 1 email' field. <br/> <br />");
                      exit;
                    }
                    break;

      case 'ref3-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Reference 1 name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'ref3-relationship': if(!letters_space_only($_SESSION[$key])) {
                                echo("Only letters and white space allowed in the 'Reference 1 relationship field'. Please go back and input correctly. <br/> <br />");
                                exit;
                              }
                              break;

      case 'ref3-phone': if(!phone_number_only($_SESSION[$key])) {
                      echo("Please go back and input a valid phone number in the 'Reference 1 phone number' field, if the format ###-###-####.");
                      exit;
                    }
                    break;

      case 'ref3-email': if (!filter_var($_SESSION[$key], FILTER_VALIDATE_EMAIL)) {
                      echo("Invalid email format. Please go back and input a valid email in the 'Reference 1 email' field. <br/> <br />");
                      exit;
                    }
                    break;

      case 'vet-name': if (!letters_space_only($_SESSION[$key])) {            
                      echo("Only letters and white space allowed in the 'Veterinary name' field. Please go back and input correctly. <br/> <br />");
                      exit;
                    }  
                    break;

      case 'vet-phone': if($_SESSION[$key] != '') {
                          if(!phone_number_only($_SESSION[$key])) {
                            echo("Please go back and input a valid phone number in the 'Veterinary phone number' field, of the format ###-###-####.");
                            exit;
                          }
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



?>