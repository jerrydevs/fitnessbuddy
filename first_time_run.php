<?php
require_once('./common.php');

// Clearly this is a very crude interface.
// A normal web site would never output raw text. Instead an admin login
// would trigger this and only would output errors if they occured.
// Ensure that:
//   $CFG->db_admin_prohibit_create_drop = FALSE;
// is set in config.php.
header('Content-Type: text/plain');
try
{
  echo "Creating users DB...\n";
  $db = new DBUser();
  $db->admin_create_all_structures();

  echo "Create posts DB...\n";
  $postDB = new DBPost();
  $postDB->admin_create_all_structures();

  echo "Create user_settings DB...\n";
  $settingsDB = new DBSetting();
  $settingsDB->admin_create_all_structures();
  
  echo "Create messages DB...\n";
  $messagesDB = new DBMessage();
  $messagesDB->admin_create_all_structures();

  echo "Finished creating DBs.\n";

  echo "Create admin account...\n";
  $db->insert(
    $CFG->admin_username, $CFG->admin_password, 'Admin', 'Admin', NULL, NULL, NULL, NULL, NULL
  );

  
  echo "Finished.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage();
}
?>
