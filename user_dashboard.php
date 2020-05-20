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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.2/dist/Chart.bundle.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

    <?php 
      require_once('./common.php');
      $dbUser = new DBUser();
      $dbPost = new DBPost();

      if ($dbUser->is_new_user(LoginUtils::logged_in_user())) {
        // new user, have then enter starting information
        include ('./mixins/get_started_form.php');

      } else if (LoginUtils::logged_in_user()) {
        // returning user, show normal dashboard
        echo <<<ZZEOF
        <h2>Your Progress</h2>
        <canvas id="userChart"></canvas>
        <script src="./js/draw_user_chart.js"></script>
ZZEOF;

        $dbPost = new DBPost();
        
        // if user has not yet posted today, then show form to add a new post
        if (!$dbPost->has_posted_today(LoginUtils::logged_in_user())) {
          include ('./mixins/user_add_post_form.php');
        }
    
        include ('./mixins/user_posts_table.php');

      } else {
        // not logged in as a user, thus not supposed to access this page
        HTTPUtils::redirect('index.php');
      }

    ?>
		
    <?php include ('./mixins/footer.php');?>

	</body>
</html>

