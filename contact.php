<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name-"description" content="Professional web design">
		<meta name="keywords" content="web design, professional web design, start-up design">
		<meta name="author" content="Jaelend Setosta">

		<title>First Web Design | Services</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

		<section id="main">
			<div class="container">
				<article id="main-col">

					<div class="dark">

						<h3>Contact Us</h3>
						<form action="./handlers/handle_send_admin_message.php" method="POST">
							<div>
								<label>Message</label><br>
								<textarea name="content" placeholder="Message"></textarea>
							</div>

							<input type="submit" value="Send" />
						</form>
					</div>
					
				</article>

				<aside id="sidebar">
					<h1 class="page-title">We'd love to hear from you</h1>
					<ul id="services">
						<li>
							<h3>Get in touch !</h3>
							<p> Whether you have a question about features, how to
								navigate the site, or anything at all, our team is 
								ready to answer your questions ! 
							</p>

						</li>						
					</ul>
				</aside>
			</div>
		</section>

		<?php include ('./mixins/footer.php');?>

	</body>
</html>