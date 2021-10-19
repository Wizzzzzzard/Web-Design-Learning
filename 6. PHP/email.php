<?php

	$emailTo = "elijah797@gmail.com";

	$subject = "Behold the power of PHP";

	$body = "With the magic that is PHP I have sent you this email through the ether";

	$headers = "From: elijah.reid@tracsis.com";

	if (mail($emailTo, $subject, $body, $headers)) {

		echo "Email sent successfully";

	} else {

		echo "Email could not be sent";
		
	}

?>

