<?php
require_once('./common.php');

$dbPost = new DBPost();

$posts = $dbPost->lookup_by_user(LoginUtils::logged_in_user());

?>

<table>
  <thead>
    <tr>
      <th>Date</th>
      <th>Weight</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if ($posts != FALSE) {
        foreach($posts as $post) { ?>
      <tr>
        <td><?php echo $post['entry_date'] ?></td>
        <td><?php echo $post['weight'] ?></td>
        <td><a href="./user_edit_post_page.php?id=<?php echo $post['post_id'] ?>">Edit</a></td>
        <td><a href="./handlers/handle_user_delete_post.php?user=<?php echo LoginUtils::logged_in_user();?>&id=<?php echo $post['post_id']?>">Delete</a></td>
      </tr>
    <?php 
        }
      } 
    ?>

  </tbody>
</table>


