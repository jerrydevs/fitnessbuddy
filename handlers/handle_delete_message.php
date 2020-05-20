<?php
require_once('../common.php');
 
// for admin to delete a message from their messages page 
if (array_key_exists('id', $_REQUEST)) {
    
  $dbMessage = new DBMessage();
  $message_id = $_REQUEST['id'];

  $dbMessage->erase($message_id);


} else {
  //invalid information! hacking?
  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
