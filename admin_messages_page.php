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
    <script src="./js/delete_message.js"></script>
	</head>

	<body>
		<?php include ('./mixins/header.php');?>

    <?php
      $dbMessage = new DBMessage();
      $messages = $dbMessage->lookup_all();

      if (LoginUtils::is_admin_logged_in()) {
        
        if (count($messages) == 0) {
          echo "<h2>There are currently no messages</h2>";
          
        } else {

          foreach($messages as $message) {
            echo $message['user'];
            echo "<br>";
            echo $message['content'];
            ?>

          <button onclick="deleteMessage(<?php echo $message['message_id']?>)">Delete</button>
          <br>
        <?php
          }
        }
        
      } else {
        // not logged in as a user, thus not supposed to access this page
        HTTPUtils::redirect('index.php');
      }

    ?>

    <?php include ('./mixins/footer.php');?>  

	</body>
</html>