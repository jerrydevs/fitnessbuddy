<?php
require_once('../common.php');

if (LoginUtils::is_user_logged_in()) {
  LoginUtils::log_out_user();
} else if (LoginUtils::is_admin_logged_in()) {
  LoginUtils::log_out_admin();
}

HTTPUtils::Redirect('index.php');

?>