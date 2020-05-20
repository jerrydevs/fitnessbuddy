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
      $userData = $dbUser->lookup(LoginUtils::logged_in_user());
    ?>

     <section id="main">
          <div class="container createAdmin">
            <article id="main-col">
              <div class="dark">
              <h2 class="heading">Create a new User</h2>
                <form 
                    class="dark moveDown"
                    name="create_user_form"
                    action="./handlers/handle_admin_create_user.php"
                    method="POST" 
                  >
                    <div id="form_errors"></div>

                    <p>Email *</p>
                    <input type="email" name="username" placeholder="Enter Email" required />

                    <p>First Name *</p>
                    <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required />

                    <p>Last Name *</p>
                    <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required />

                    <p>Starting Weight *</p>
                    <input type="text" name="startWeight" placeholder="..170.20" required />
                    <p>Goal Weight *</p>
                    <input type="text" name="goalWeight" placeholder="...160.00" required />
                    <p>Goal Date *</p>
                    <input type="date" name="goalDate" required />
                    <p>Gender *</p>
                    <select name="gender" required>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>  

                    <p>Password *</p>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required /> 

                    <p>Confirm Password *</p>
                    <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" required />

                    <input type="submit" value="Register">

                    <p>* is required</p>

                    </form>
              </div>
              
            </article>

            <aside id="sidebar" class="asideCreate">
              <ul id="services" class="createUser">
                <li>
                  <h3>Create a new user !</h3>
                  <p> As an admin, you have access to more features such as creating a user ! </p>
                  <p> Just type in all of the user's info and they will be added to the database !</p>
                </li>           
              </ul>
            </aside>
          </div>
        </section>
    
    

      

	</body>
</html>

