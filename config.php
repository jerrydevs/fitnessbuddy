<?php

// Create an empty class for configuration data...
$CFG = new stdClass();

// Global configuration variables...
// base_url is the base URL of where this web site is mounted...
// For example, if root of this web site is placed in public_html/provided
// then this needs to be in the base URL.
$CFG->base_url = 'http://zhang1o3.myweb.cs.uwindsor.ca/';

// db_admin_prohibit_create_drop:
//   IMPORTANT: By default this setting should be TRUE!
//   Functions that are capable of creating and destroying database
//   tables in this site's code will check this setting to see if
//   it has been set to FALSE. If it has not been set to FALSE, then
//   the function will fail to execute as a safety precaution.
$CFG->db_admin_prohibit_create_drop = FALSE;

// Database connectivity information...
//  db_dsn: This must be set to the PHP PDO DSN to your database.
// db_user: This must be set to the database connection's user name.
// db_pass: This must be set to the database connection user's password.
$CFG->db_dsn = 'mysql:host=localhost;dbname=zhang1o3_w8';
$CFG->db_user='zhang1o3_w8';
$CFG->db_pass='334w8';

// Login information for the admin account
// set to be whatever is desired, however username must be a valid email format
$CFG->admin_username = 'admin@admin.com';
$CFG->admin_password = 'admin';
?>
