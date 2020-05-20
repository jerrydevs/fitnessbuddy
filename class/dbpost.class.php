<?php

final class DBPost extends DB
{
  public function __construct()
  {
    parent::__construct();
  }

  public function admin_create_all_structures()
  {
    if ($this->admin_prohibit_create_drop()) 
      throw new Exception('Database CREATE is prohibited by admin.');

    $sql = <<<ZZEOF
CREATE TABLE posts (
  post_id INT NOT NULL AUTO_INCREMENT,
  user VARCHAR(80) NOT NULL REFERENCES users(user),
  entry_date DATE NOT NULL,
  weight NUMERIC(15,5) NOT NULL,
  PRIMARY KEY(post_id)
)
ZZEOF;

    return $this->db_handle()->exec($sql);
  }

  public function admin_destroy_all_structures()
  {
    if ($this->admin_prohibit_create_drop())
      throw new Exception('Database DROP is not prohibited by admin.');

    $sql = "DROP TABLE IF EXISTS posts";
    return $this->db_handle()->exec($sql);
  }

  public function insert($user, $date, $weight)
  {
    $entry = array(
      ':user' => $user,
      ':entry_date' => $date,
      ':weight' => $weight
    );

    $sql = "INSERT INTO posts(user, entry_date, weight) VALUES (:user, :entry_date, :weight)";
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute($entry);
  }

  public function erase($post_id)
  {
    $entry = array( ':post_id' => $post_id );

    $sql = "DELETE FROM posts WHERE post_id = :post_id";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }

  public function update($post_id, $date, $weight)
  {
    $entry = array( 
      ':post_id' => $post_id,
      ':date' => $date,
      ':weight' => $weight
    );

    $sql = "UPDATE posts SET 
    entry_date = :date, 
    weight = :weight
    WHERE post_id = :post_id";
    
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
  }


  public function lookup_by_id($id)
  {
    $entry = array ( ':post_id' => $id );

    $sql = "SELECT entry_date, weight, user FROM posts WHERE post_id = :post_id";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
    $result = $stmt->fetchAll();

    if (count($result) == 1) {
      return $result;
    } else {
      return FALSE;
    }

  }

  
  public function lookup_by_user($user)
  {
    $entry = array ( ':user' => $user );

    try
    {
      $sql = "SELECT entry_date, weight, post_id FROM posts WHERE user = :user ORDER BY entry_date DESC";
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

  public function lookup_all()
  {
    $sql = "SELECT * FROM posts";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function has_posted_today($user)
  {
    $entry = array( ':user' => $user );

    $sql = "SELECT * FROM posts WHERE user = :user AND entry_date = CURDATE()";
    $stmt = $this->db_handle()->prepare($sql);
    $stmt->execute($entry);
    $result = $stmt->fetchAll();

    // if result is 1, then user has posted today. Thus return TRUE
    // else, return FALSE, signalling that user has not posted today
    return (count($result) == 1);
  }

  public function drop_table()
  {
    $sql = 'DROP TABLE IF EXISTS posts';
    $stmt = $this->db_handle()->prepare($sql);
    return $stmt->execute();
  }
}

?>