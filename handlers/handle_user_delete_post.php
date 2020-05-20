<?php
require_once('../common.php');

if (array_key_exists('id', $_GET)
  && array_key_exists('user', $_GET)
  && (count($_GET) == 2))
  {
    
  $dbPost = new DBPost();
  $post_id = $_GET['id'];
  $user = $_GET['user'];

  $post = $dbPost->lookup_by_id($post_id);

  if ($post[0]['user'] == $user) {
    $dbPost->erase($post_id);  
  }
  
  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?
  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
