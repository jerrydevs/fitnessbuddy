<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta charset="utf-8">
			<meta name="viewport" content="width=device-width">
			<meta name-"description" content="Professional web design">
			<meta name="keywords" content="web design, professional web design, start-up design">
			<meta name="author" content="Jaelend Setosta">

			<title>Login</title>
			<link rel="stylesheet" href="./css/style.css">
			<script src="./js/signupValidateForm.js"></script>
	    
	</head>

	<body id='signup'>
    <?php 
      include ('./mixins/header.php');
    ?>

		  <div class="contact-form">

				<h2>Register</h2>
				<form 
					name="signupForm"
					action="./handlers/handle_signup.php"
					method="POST" 
					onsubmit="return signupValidateForm();"
				>
          <div id="form_errors"></div>

					<p>Email</p>
					<input type="email" name="username" placeholder="Enter Email" required />

					<p>First Name</p>
					<input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required/>

					<p>Last Name</p>
					<input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required/>

					<p>Password</p>
					<input type="password" name="password" id="password" placeholder="Enter Password" required/>

					<p>Confirm Password</p>
					<input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" required/>

					<input type="submit" onclick=value="Register">

	        </form>
	    </div>
		
	</body>

</html>
