<?php
require_once('./common.php');

header('Content-Type: text/plain');

try
{
  $dbUser = new DBUser();
  $dbPost = new DBPost();
  $dbSetting = new DBSetting();

  // create new user jerry@me.com
  $dbUser->insert('jaelend@me.com', 'pass', 'Jaelend', 'Setosta');

  // as though user has just entered in their goal information
  $dbUser->update_user_data('jaelend@me.com', 'M', '175', '170', date("Y-m-d"), '2019-05-20');

  // simulate user entering posts on different days, so there is info to show in UI
  $dbPost->insert('jaelend@me.com', '2019-04-20', '170.20');
  $dbPost->insert('jaelend@me.com', '2019-04-24', '169.20');
  $dbPost->insert('jaelend@me.com', '2019-04-27', '171.20');
  $dbPost->insert('jaelend@me.com', '2019-05-12', '168.5');
  $dbPost->insert('jaelend@me.com', '2019-05-14', '165.90');
}
catch (Exception $e)
{
  echo $e;
}

?>