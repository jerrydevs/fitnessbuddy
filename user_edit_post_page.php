<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name-"description" content="Professional web design">
		<meta name="keywords" content="web design, professional web design, start-up design">
		<meta name="author" content="Jaelend Setosta">

		<title>Settings</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

    <?php 
      require_once('./common.php');

      if (array_key_exists('id', $_GET)) {
        $post_id = $_GET['id'];
      } else {
        HTTPUtils::redirect('index.php');
      } 

      $dbPost = new DBPost();
      $postData = $dbPost->lookup_by_id($post_id)[0];

      if (LoginUtils::is_user_logged_in()) {
    ?>
        <section id="main">
          <div class="container" id="settings-container">
            <article id="main-col">
              <div class="dark">
              <h2>Settings</h2>
                <form 
                  action ="./handlers/handle_edit_post.php" 
                  method="POST"
                >
                  <div>
                    <label>Date</label><br>
                    <input type="date" name="date" value="<?php echo $postData['entry_date']; ?>" required />
                  </div>

                  <div>
                    <label>Weight</label><br>
                    <input type="text" name="weight" value="<?php echo $postData['weight']; ?>" required />
                  </div>

                  <input type="text" name="post_id" value="<?php echo $post_id ?>" hidden required />
                  <input type="submit" value="Submit">

                </form>
              </div>
              
            </article>

            <aside id="sidebar">
              <ul id="services">
                <li>
                  <h3>Change Your Settings !</h3>
                  <p> Here you can change your settings and save them.</p>
                </li>           
              </ul>
            </aside>
          </div>
        </section>

      <?php
      } else {
        HTTPUtils::redirect('index.php');
      }
      ?>
	</body>
</html>

