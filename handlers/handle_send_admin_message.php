<?php
require_once('../common.php');

if (array_key_exists('content', $_POST)
  && count($_POST) == 1) {
    
  $dbMessage = new DBMessage();
  $content = $_POST['content'];

  $user = LoginUtils::is_user_logged_in() ? LoginUtils::logged_in_user() : 'Anonymous';

  $dbMessage->insert($user, $content);

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
