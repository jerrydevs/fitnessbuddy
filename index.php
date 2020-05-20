<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name-"description" content="Professional web design">
		<meta name="keywords" content="web design, professional web design, start-up design">
		<meta name="author" content="Jaelend Setosta">

		<title>First Web Design | Welcome</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
    <?php 
      require_once('./common.php');
      if (LoginUtils::is_user_logged_in()) HTTPUtils::redirect('user_dashboard.php');
      if (LoginUtils::is_admin_logged_in()) HTTPUtils::redirect('admin_dashboard.php');
    ?>
		<?php include ('./mixins/header.php');?>

		<section id="showcase">
			<div class="container">
				<h1>Your Own Personal Fitness Buddy </h1>
				<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud</p>
			</div>
		</section>

		<section id="newsletter">
			<div class="container">
				<h1> Subscribe To Our Newsletter</h1>

				<form action="process.php">
					<input type="email" placeholder="Enter Email...">
					<button type="submit" class="button_1">Subscribe</button>
				</form>
			</div>
		</section>

		<section id="boxes">
			<div class="container">
				<div class="box">
					<img src="./images/chart.png">
					<h3>Track Your Own Progress</h3>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>

				<div class="box">
					<img src="./images/dumbell.png">
					<h3>Update Daily</h3>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>

				<div class="box">
					<img src="./images/flex.png">
					<h3>Reach Your Goal</h3>
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</section>

		<?php include ('./mixins/footer.php');?>

	</body>
</html>