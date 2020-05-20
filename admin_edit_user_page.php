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
      $dbUser = new DBUser();

      if (!array_key_exists('user', $_GET)) HTTPUtils::redirect('index.php');

      $user = $_GET['user'];
      $userData = $dbUser->lookup($user);

      if (LoginUtils::is_admin_logged_in()) {
    ?>

      <h2>Edit User Info</h2>
        <form action ="./handlers/handle_admin_edit_user.php" method="POST">
          <div>
            <label>First Name</label><br>
            <input type="text" name="firstname" value="<?php echo $userData['first_name']; ?>" required/>
          </div>

          <div>
            <label>Last Name</label><br>
            <input type="text" name="lastname" value="<?php echo $userData['last_name']; ?>" required/>
          </div>

          <div>
            <label>Gender</label><br>
            <input type="text" name="gender" value="<?php echo $userData['gender']; ?>" required/>
          </div>

          <div>
            <label>Goal Weight</label><br>
            <input type="text" name="goalweight" value="<?php echo $userData['goal_weight']; ?>" required/>
          </div>

          <div>
            <label>Goal Date</label><br>
            <input type="date" name="goaldate" value="<?php echo $userData['goal_date']; ?>" required />
          </div>

          <input type="text" name="user" value="<?php echo $user; ?>" hidden />

          <input type="submit" value="Submit">

        </form>

      <?php
      } else {
        HTTPUtils::redirect('index.php');
      }
      ?>
	</body>
</html>

