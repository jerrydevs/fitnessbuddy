<?php
require_once('../common.php');

// for admin to edit an existing user from their dashboard

if (array_key_exists('firstname', $_POST)
  && array_key_exists('lastname', $_POST)
  && array_key_exists('gender', $_POST)
  && array_key_exists('goalweight', $_POST)
  && array_key_exists('goaldate', $_POST)
  && array_key_exists('user', $_POST)
  && count($_POST) == 6) {
    
  $dbUser = new dbUser();

  $user = $_POST['user'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $goalweight = $_POST['goalweight'];
  $goaldate = $_POST['goaldate'];

  $dbUser->admin_updates_user_data(
    $user, $firstname, $lastname, $gender, $goalweight, $goaldate
  );

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
