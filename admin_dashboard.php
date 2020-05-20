<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name-"description" content="Professional web design">
		<meta name="keywords" content="web design, professional web design, start-up design">
		<meta name="author" content="Jaelend Setosta">

		<title>User Dashboard</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

    <?php
      $dbUser = new DBUser();

      if (LoginUtils::is_admin_logged_in()) {
        echo "<h1>Welcome Admin</h1>";
        $allUsers = $dbUser->lookup_all(LoginUtils::logged_in_admin());
 
        if ($allUsers) {
          echo "<h3>Select a user to edit</h3>";

          foreach($allUsers as $user) { 
    ?>
            <a href="admin_edit_user_page.php?user=<?php echo $user['user']; ?>">
              <p><?php echo $user['user'];?> </p>
            </a>
    <?php
          }
        } else {
          echo "<h3>No users found</h3>";
        }

        
      } else {
        // not logged in as admin, thus not supposed to access this page
        HTTPUtils::redirect('index.php');
      } 

    ?>

    <?php include ('./mixins/footer.php');?>  

	</body>
</html>