<?php
require_once('./common.php');
?>


<h3>Your past posts:</h3>

<?php 

$dbPost = new DBPost();
$posts = $dbPost->lookup_by_user($_SESSION['logged_in_user']);

foreach($posts as &$post) {
  echo $post['entry_date']; 
  echo $post['weight'];
  echo "<br>";
}

?>
