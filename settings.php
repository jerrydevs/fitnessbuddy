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
    <script src="./js/settingsValidateForm.js"></script>
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

    <?php 
      require_once('./common.php');
      $dbUser = new DBUser();
      $userData = $dbUser->lookup(LoginUtils::logged_in_user());

      if (LoginUtils::is_user_logged_in()) {
    ?>
        <section id="main">
          <div class="container" id="settings-container">
            <article id="main-col">
              <div class="dark">
              <h2>Settings</h2>
                <form 
                  name="settingsForm" 
                  action ="./handlers/handle_edit_user_info.php" 
                  onsubmit="return settingsValidateForm()" 
                  method="POST"
                >
                  <div>
                    <label>First Name</label><br>
                    <input type="text" name="firstname" value="<?php echo $userData[2]; ?>" />
                  </div>

                  <div>
                    <label>Last Name</label><br>
                    <input type="text" name="lastname" value="<?php echo $userData[3]; ?>" />
                  </div>

                  <div>
                    <label>Gender</label><br>
                    <input type="text" name="gender" value="<?php echo $userData[4]; ?>" />
                  </div>

                  <div>
                    <label>Goal Weight</label><br>
                    <input type="text" name="goalweight" value="<?php echo $userData['goal_weight']; ?>" />
                  </div>

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

