<?php

final class DBSetting extends DB
{

  public function __construct()
  {
    // NOTE: PHP doesn't call the parent construtor automatically!
    parent::__construct();
  }

  //
  // admin_create_all_structures()
  //
  // This method creates all database structures required for the
  // DBSetting table.
  //
  public function admin_create_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database CREATEs are prohibited by admin.');

    //
    // user is meant to hold the user's email address
    // meas_system is the system of measurement that the user chooses in settings
    // "0" for metric, "1" for imperial
    $sql = <<<ZZEOF
CREATE TABLE user_settings (
  user VARCHAR(80) PRIMARY KEY,
  meas_system INT(1) NOT NULL DEFAULT 1,
  FOREIGN KEY (user) REFERENCES users(user) 
)
ZZEOF;
    return $this->db_handle()->exec($sql);
  }

  //
  // admin_destroy_all_structures()
  //
  // This method destroys all database structures required for the
  // DBSetting table.
  //
  public function admin_destroy_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database DROPs are prohibited by admin.');

    // NOTE: There is no need to use an SQL prepared statement call
    //       here since the SQL code is 100% from this site and safe.
    $sql = "DROP TABLE IF EXISTS user_settings";
    return $this->db_handle()->exec($sql);
  }

  //
  // insert($user, $pass)
  //
  // Inserts a new user $user into the DBSetting table having password $pass.
  //
  public function insert($user, $meas)
  {
    // Create the entry to add...
    $entry = array(
      ':user' => $user,
      ':meas_system' => $meas
    );

    // Create the SQL prepared statement and insert the entry...
    $sql = 'INSERT INTO user_settings VALUES (:user, :meas_system)';
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute($entry);
  }

  //
  // erase($user)
  //
  // Erases an existing user $user from the DBSetting table.
  //
  public function erase($user)
  {
    $entry = array( ':user' => $user );

    // Create the SQL prepared statement and delete the entry...
    $sql = 'DELETE FROM user_settings WHERE user = :user';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }

  //
  // lookup($user)
  //
  // Attempt to look up user $user in the DBUser table. If $user
  // is not found, then FALSE is returned. Otherwise an array
  // containing the DBUser entry is returned. The column names
  // are: "user" and "pass".
  //
  // If the user is not found or a DB error occurs FALSE is
  // returned. Otherwise an associative array for the record is returned.
  //
  public function lookup($user)
  {
    // Create the entry to add...
    $entry = array( ':user' => $user );

    // Create the SQL prepared statement and insert the entry...
    try
    {
      $sql = 'SELECT * FROM user_settings WHERE user = :user';
      $stmt = $this->db_handle()->prepare($sql);
      $stmt->execute($entry);
      $result = $stmt->fetchAll();
      if (count($result) != 1)
        return FALSE;
      else
        return $result[0];
    }
    catch (PDOException $e)
    {
      return FALSE;
    }
  }

  //
  // lookup_all()
  //
  // Look up all users in the users table. This function permits
  // PDOExceptions to leak.
  //
  public function lookup_all()
  {
    // Create the SQL prepared statement and insert the entry...
    $sql = 'SELECT * FROM user_settings';
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function drop_table()
  {
    $sql = 'DROP TABLE IF EXISTS user_settings';
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute();
  }
}
?>
