<?php
require_once('../common.php');

// for a user to submit information when they have first logged in

if (array_key_exists('gender', $_POST)
  && array_key_exists('startWeight', $_POST)
  && array_key_exists('goalWeight', $_POST)
  && array_key_exists('goalDate', $_POST)
  && count($_POST) == 4) 
  {
    
  $dbUser = new DBUser();
  $username = LoginUtils::logged_in_user();
  $gender = $_POST['gender'];
  $startWeight = $_POST['startWeight'];
  $goalWeight = $_POST['goalWeight'];
  $startDate = date('Y-m-d');
  $goalDate = $_POST['goalDate'];

  $dbUser->update_user_data($username, $gender, $startWeight, $goalWeight, $startDate, $goalDate);

  HTTPUtils::redirect('user_dashboard.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
