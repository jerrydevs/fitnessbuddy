<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name-"description" content="Professional web design">
		<meta name="keywords" content="web design, professional web design, start-up design">
		<meta name="author" content="Jaelend Setosta">

		<title>First Web Design | About</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

		<section id="newsletter">
			<div class="container">
				<h1> Subscribe To Our Newsletter</h1>

				<form action="process.php">
					<input type="email" placeholder="Enter Email...">
					<button type="submit" class="button_1">Subscribe</button>
				</form>
			</div>
		</section>

		<section id="main">
			<div class="container">
				<article id="main-col">
					<h1 class="page-title">Lookup User Here</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<div id="messages" class="dark">
						<h2> Messages </h2>
						<p class="dark"> 
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</article>

				<aside id="sidebar">
					<div class="dark">

						<h3>Create a User</h3>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						</p>
					
				</aside>
			</div>
		</section>

		<footer>
			<p> Setosta Web Design, Copyrighht &copy; 2019</p>
		</footer>

	</body>
</html>