<header>
	<link rel="stylesheet" href="./css/style.css">

	<div class="container">
		<div id="branding"> 
      <?php
        require('./common.php');
        if (LoginUtils::is_admin_logged_in()) {
          echo '<h1><span class="highlight">Fitness</span> Buddy<span class="highlight"> Admin</span></h1>';
        } else {
          echo '<h1><span class="highlight">Fitness</span> Buddy</h1>';
        }
      ?>
			<div id='svg'>
				<img 
				    src="images/svg.svg"
				    alt="lotus"
				    height="100px"
				    width="100px"
	 			 />
	 		</div>
		</div>

		<nav>
			<ul> 
        <?php
          if (LoginUtils::is_admin_logged_in()) {
            echo <<<ZZEOF
            <li><a href="admin_dashboard.php">Home</a></li>
            <li><a href="./handlers/handle_logout.php">Log Out</a></li>
            <li><a href="admin_create_user_page.php">Create New User</a></li>
            <li><a href="admin_messages_page.php">Messages</a></li>
            <li> 
              <a href="settings.php"><img src="images/settings.svg" id ="settings"></a>
            </li>
ZZEOF;
          } else if (LoginUtils::is_user_logged_in()) {
            echo <<<ZZEOF
            <li><a href="user_dashboard.php">Home</a></li>
            <li><a href="message_admin_page.php">Contact Us</a></li>
            <li><a href="./handlers/handle_logout.php">Log Out</a></li>
            <li> 
              <a href="settings.php"><img src="images/settings.svg" id ="settings"></a>
            </li>
ZZEOF;
          } else {
            echo <<<ZZEOF
            <li class="current"><a href="login.php">Login</a> </li>
            <li><a href="signup.php">Register</a> </li>
            <li><a href="index.php">Home</a> </li>
            <li><a href="contact.php">Contact Us </a> </li>
ZZEOF;
          }
				?>
				
			</ul>
		</nav>

	</div>
</header>