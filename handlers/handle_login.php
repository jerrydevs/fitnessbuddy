<?php
require_once('../common.php');

if (array_key_exists('username', $_POST)
  && array_key_exists('password', $_POST)
  && count($_POST) == 2) {
    
  $db = new DBUser();
  $username = $_POST['username'];
  $password = $_POST['password'];
  

  // check if admin is trying to log in
  if (($username == $CFG->admin_username) && $db->check_user_pass($username, $password)) {
    LoginUtils::log_in_admin($CFG->admin_username);
    HTTPUtils::redirect('admin_dashboard.php');
  }

  // check if regular user logging in
  if ($db->check_user_pass($username, $password)) {
    LoginUtils::log_in_user($username);
    HTTPUtils::redirect('user_dashboard.php');
  } else {
    // login unsuccessful
    LoginUtils::possible_new_login($username);
  }

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?
  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}

?>
