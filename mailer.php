<?php 
	error_reporting(-1);
	ini_set('display_errors', 'On');
	set_error_handler("var_dump");
	$name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r","\n"), array(" "," "), $name);
	$email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
	$message = trim($_POST["message"]);

	//Check the data 
	if(empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: http://diasaleh.hostkda.com/index.php?success=-1#form");
		exit;
	}
	//set the recipient email address
	$recipient = "dia351992@gmail.com";

	$subject = "New contact from $name";

	$email_content = "Name : $name \n";
	$email_content .= "Email : $email \n";
	$email_content .= "Message :\n $message \n";

	$headers = array("From: from@example.com", 
		"Reply-To: replyto@example.com",
		"X-Mailer: PHP/" . PHP_VERSION
	);
	$headers = implode("\r\n", $headers);
		
			
	if (mail($recipient, $subject, $email_content, $headers)){

	header("Location: http://diasaleh.hostkda.com/index.php?success=1#form");

	} else {
	header("Location: http://diasaleh.hostkda.com/index.php?success=2#form");	
	}

?>