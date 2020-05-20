<?php
require_once('../common.php');

// for a user to edit one of their existing posts
if (array_key_exists('date', $_POST)
  && array_key_exists('weight', $_POST)
  && array_key_exists('post_id', $_POST)
  && count($_POST) == 3) {
    
  $dbPost = new DBPost();
  $date = $_POST['date'];
  $weight = $_POST['weight'];
  $post_id = $_POST['post_id'];


  $dbPost->update($post_id, $date, $weight);

  HTTPUtils::redirect('index.php');

} else {
  //invalid information! hacking?

  LoginUtils::log_out_user();
  HTTPUtils::redirect('index.php');
}


?>
