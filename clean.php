<?php
require_once('./common.php');

header('Content-Type: text/plain');

try
{
  $dbUser = new DBUser();
  $dbPost = new DBPost();
  $dbSetting = new DBSetting();
  $dbMessage = new DBMessage();

  $dbPost->admin_destroy_all_structures();
  $dbSetting->admin_destroy_all_structures();
  $dbUser->admin_destroy_all_structures();
  $dbMessage->admin_destroy_all_structures();
  
  echo "All tables dropped!";
}
catch (Exception $e) 
{
  echo $e;
}


?>