<?php
require_once('../common.php');

// for user to add a weight post from their dashboard

if (array_key_exists('weight', $_POST)
  && count($_POST) == 1) {
    
  $dbPost = new DBPost();
  $weight = $_POST['weight'];

  $dbPost->insert($_SESSION['logged_in_user'], date("Y-m-d"), (float)$weight);

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
