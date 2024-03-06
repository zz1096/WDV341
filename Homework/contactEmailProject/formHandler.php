<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP</title>
<link href="../../css/style2.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
	color: #81ab92;
}
.margin_style1{
	margin-left: 20px;
}
</style>
</head>

<body>
<h1 class="center">WDV341 Intro PHP</h1>
<h2 class="center">4-1 HTML Form Processor</h2>
<?php
	$contact_name = $_POST["name"];
	$contact_email = $_POST["email"];
	$reasons = $_POST["reasons"];
	$comments = $_POST["comments"];
	$date = date("m/d/Y");
	echo "<div class='bdr2'>";
	// This if statement is used so if a user tries to access the formHandler.php page
	// without any information provided, wed can give them an appropriate response.
	if($contact_name != "" && $contact_email){
		echo "<h1>Dear $contact_name,</h1>";
		echo "<p>Thank you for contacting us!</p>";
		
		echo "<p>We have noted down your email: $contact_email</p>";

		echo "<p>We will contact you with more information regarding:</p>";

		echo "<p>Reasons for Contact:</p>";
		echo "<p class='margin_style1'>- $reasons</p>";

		echo "<p>You have shared the following comments which we will review:</p>";
		if($comments == "") {
			$comments = "No comments provided.";
			echo "<p class='margin_style1'>- $comments</p>";
		}
		else {
			echo "<p class='margin_style1'>- $comments</p>";
		}
		echo "<p>Date of Contact: $date</p>";
	
		// Email user and person being Contacted
		$to = $contact_email;
		$subject = "Hello $contact_name, Thank you for your inquiry.";
		$message = "<html>
					<head>
						<style>
							a:link{
								color: #39ff14;
							}
							a:hover {
								color: #289bff;
							}
							a:active {
								color:#71ff4a;
							}
							
						</style>
					</head>
					<body style='font-family: Arial, Helvetica, sans-serif;'>
						<br>
						<div style='background-color: black; color: #81ab92; width: 90%; text-align: left; border: 2px solid #81ab92; padding: 10px; margin: 20px; margin-left: auto; margin-right: auto; border-radius: 5px; overflow: auto;'>
							<h1>Dear $contact_name,</h1>
							<p>We have received your email and will respond regarding the information you have given us.</p>
							<p>We will contact you at this email: $contact_email</p>
							<p>Your reason for contact:</p>
								<p style='margin-left: 20px;'>- $reasons</p>
							<p>Comments:</p>
								<p style='margin-left: 20px;'>- $comments</p>
							<p>Date of Contact: $date</p>
							<p>Thank you for contacting us!</p>
							<p>We will be back with you shortly.</p>
							<p style='text-align:center;'>wdv341.chaeonline.net</p>
						</div>
						<br>
					</body>
				</html>";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: info@wdv341.chaeonline.net" . "\r\n"; 
		
		// Make sure email entered is valid, if valid we can send the confirmation email
		if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
			$send_mail = mail($to, $subject, $message, $headers);
			if ($send_mail) {
				echo "<h3 style='color: #39ff14; text-align: center;'>Email sent successfully!</h3>";
				// Send to Staff email if the email was successfully sent to the client
				$to = "staff@wdv341.chaeonline.net";
				$subject = "A client: $contact_email has submitted a form to contact us.";
				$message = "<html>
							<head>
								<style>
									a:link{
										color: #39ff14;
									}
									a:hover {
										color: #289bff;
									}
									a:active {
										color:#71ff4a;
									}
									
								</style>
							</head>
							<body style='font-family: Arial, Helvetica, sans-serif;'>
								<br>
								<div style='background-color: black; color: #81ab92; width: 90%; text-align: left; border: 2px solid #81ab92; padding: 10px; margin: 20px; margin-left: auto; margin-right: auto; border-radius: 5px; overflow: auto;'>
									<p>Client Name: $contact_name</p>
									<p>Client Email: $contact_email</p>
									<p>Reason for Contact:</p>
										<p style='margin-left: 20px;'>- $reasons</p>
									<p>Comments:</p>
										<p style='margin-left: 20px;'>- $comments</p>
									<p>Date of Contact: $date</p>
									<p>Please respond to client as soon as possible.</p>
								</div>
								<br>
							</body>
						</html>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: info@wdv341.chaeonline.net" . "\r\n"; 
				$send_mail = mail($to, $subject, $message, $headers);
			} 
			else {
				echo "<h3 style='color: red; text-align: center;'>Failed to send email. Please try again.</h3>";
			}
		}
		else {
			echo "<h3 style='color: red; text-align: center;'>Could not send email because email address was invalid. Please enter a valid one.</h3>";
		}
	}
	else{
		echo "<h1>Sorry, not enough information was provided to send an email.</h1>";
		echo "<p>Thank you, please try again.</p>";
	}
	
	// echo $contact_name;
	// echo "<br>";
	// echo $email;
	// echo "<br>";
	// echo $reasons;
	// echo "<br>";
	// echo $comments;
	// echo "<br>";

	echo "</div>";
	echo "
		<footer>
			<p class='center'><a href='./contactUs.html'>Back to Form</a></p>
		</footer>
		";
?>

</body>
</html>
