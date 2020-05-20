<html>
	<head>
	    <meta charset="UTF-8">
	    <meta charset="utf-8">
			<meta name="viewport" content="width=device-width">
			<meta name-"description" content="Professional web design">
			<meta name="keywords" content="web design, professional web design, start-up design">
			<meta name="author" content="Jaelend Setosta">

			<title>Login</title>
			<link rel="stylesheet" href="./css/style.css">
	    
	</head>
	<body id="login">
		<?php include ('./mixins/header.php');?>
	    <div class="contact-form">
	        
	        <h2>Login</h2>
	        <form action="./handlers/handle_login.php" method="POST">
            <p>Email</p>
            <input type="email" name="username" placeholder="Enter Email" required />
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required />
            <input type="submit" value="Sign In">

            <button id="signUp"><a href="./signup.php"> Sign Up </button>
	        </form>
	    </div>
	</body>
</html>