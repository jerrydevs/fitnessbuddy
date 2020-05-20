<?php
require_once('../common.php');

// for admin to create a new user from their dashboard 

if (array_key_exists('username', $_POST)
  && array_key_exists('password', $_POST)
  && array_key_exists('passwordConfirm', $_POST)
  && array_key_exists('firstName', $_POST)
  && array_key_exists('lastName', $_POST)
  && array_key_exists('gender', $_POST)
  && array_key_exists('startWeight', $_POST)
  && array_key_exists('goalWeight', $_POST)
  && array_key_exists('goalDate', $_POST)
  && count($_POST) == 9) 
  {
    
  $dbUser = new DBUser();

  // required fields
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];
  $firstName = $_POST['firstName']; 
  $lastName = $_POST['lastName'];
  $goalDate = $_POST['goalDate'];
  $startWeight = $_POST['startWeight'];
  $goalWeight = $_POST['goalWeight'];
  $startDate = date("Y-m-d");
  $gender = $_POST['gender'];
  
  if ($password != $passwordConfirm) HTTPUtils::redirect('index.php');


  if ($dbUser->check_user_pass($username, $password)) {
    // user with that already exists, so redirect
    HTTPUtils::redirect('index.php');
  } else {
    $dbUser->insert($username, $password, $firstName, $lastName, $gender, $startWeight, $goalWeight, $startDate, $goalDate);
  }

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
