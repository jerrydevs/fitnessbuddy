<?php
require_once('./common.php');

$dbUser = new DBUser();
$dbPost = new DBPost();

$data = array(
  "goal_data" => $dbUser->lookup_goals_data(LoginUtils::logged_in_user()),
  "progress_data" => $dbPost->lookup_by_user(LoginUtils::logged_in_user())
);

echo json_encode($data);
?>