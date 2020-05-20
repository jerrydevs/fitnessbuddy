<?php
require_once('../common.php');

// for a user to edit their own personal information

if (array_key_exists('firstname', $_POST)
  && array_key_exists('lastname', $_POST)
  && array_key_exists('gender', $_POST)
  && array_key_exists('goalweight', $_POST)
  && count($_POST) == 4) {
    
  $dbUser = new DBUser();
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $goalweight = $_POST['goalweight'];

  $dbUser->user_updates_own_data(
    $_SESSION['logged_in_user'], $firstname, $lastname, $gender, $goalweight
  );

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
