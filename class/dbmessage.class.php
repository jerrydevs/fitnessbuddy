<?php

final class DBMessage extends DB
{
  public function __construct()
  {
    parent::__construct();
  }

  // used to create the messages table
  public function admin_create_all_structures()
  {
    if ($this->admin_prohibit_create_drop()) 
      throw new Exception('Database CREATE is prohibited by admin.');

    $sql = <<<ZZEOF
CREATE TABLE messages (
  message_id INT NOT NULL AUTO_INCREMENT,
  user VARCHAR(80),
  content VARCHAR(255) NOT NULL, 
  PRIMARY KEY(message_id)
)
ZZEOF;

    return $this->db_handle()->exec($sql);
  }

  // destroy messages table if exists
  public function admin_destroy_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database DROP is not prohibited by admin.');

    $sql = "DROP TABLE IF EXISTS messages";
    return $this->db_handle()->exec($sql);
  }

  // insert a new message into the messages table
  // $user is the user email that is submitting the message
  // $content is the message contents
  public function insert($user, $content)
  {
    $entry = array(
      ':user' => $user,
      ':content' => $content
    );

    $sql = "INSERT INTO messages(user, content) VALUES (:user, :content)";
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute($entry);
  }

  // Delete a select message from the table with id = message_id
  public function erase($message_id)
  {
    $entry = array( ':message_id' => $message_id );

    $sql = "DELETE FROM messages WHERE message_id = :message_id";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }

  // lookup all messages submitted by a given user
  public function lookup_by_user($user)
  {
    $entry = array ( ':user' => $user );

    try
    {
      $sql = "SELECT * FROM messages WHERE user = :user";
      $stmt = $this->db_handle()->prepare($sql);
      $stmt->execute($entry);
      $result = $stmt->fetchAll();

      if (count($result) < 1) return FALSE;
      else return $result;
    }
    catch (PDOException $e)
    {
      return FALSE;
    }
  }

  // return all messages in the table
  public function lookup_all()
  {
    $sql = "SELECT * FROM messages";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  // drop the table, should not use
  public function drop_table()
  {
    $sql = 'DROP TABLE IF EXISTS messages';
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute();
  }
}

?>