<?php
require_once('../common.php');

if (array_key_exists('username', $_POST)
  && array_key_exists('password', $_POST)
  && array_key_exists('passwordConfirm', $_POST)
  && array_key_exists('firstName', $_POST)
  && array_key_exists('lastName', $_POST)
  && count($_POST) == 5) 
  {
    
  $db = new DBUser();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];
  $firstName = $_POST['firstName']; 
  $lastName = $_POST['lastName'];

  if ($password != $passwordConfirm) HTTPUtils::redirect('index.php');


  if ($db->check_user_pass($username, $password)) {
    // user with that login already exists, redirect to home page
    HTTPUtils::redirect('index.php');
  } else {
    $db->insert($username, $password, $firstName, $lastName);
    LoginUtils::log_in_user($username);
  }
  LoginUtils::log_in_user($username);
  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
