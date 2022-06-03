<?php

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

function textarea_only($data) {
  if (!preg_match("/^[a-zA-Z0-9-', \/\.\n\r]*$/",$data)) {
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