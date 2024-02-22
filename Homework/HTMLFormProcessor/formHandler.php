<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.margin_style1{
	margin-left: 20px;
}
</style>
</head>

<body>
<!--
<h1>WDV101 Intro HTML and CSS</h1>
<h2>UNIT 3 Forms - Lesson 2 Server Side Processes</h2>
<p>This page will demonstrate how a server side application will take the data that was entered on a form and display it within an HTML table. This example will work for any form. It is setup to read any or all fields on a form without needing any changes.  Other applications are more specific to the form they process and require updates anytime the form is changed.</p>

<h3>Instructions</h3>
<ol>
  <li>Place the file name 'demonstrateFormHandler.php' in the action attribute of your form. This is using the default pathname and will look for this file in the same location as the form.html page. You may place server side processes in their own folder on the server.  It is common to use a folder called 'files' which contains server side processes. In that case you would include the pathname in your action attribute. Example: action='files/demonstrateFormHandler.php' </li>
  <li>Move your form.html page AND this page to your host server.</li>
  <li>Use your browser to locate and run the form.html page on your host server. </li>
  <li>Complete the form and click Submit.</li>
</ol>
<p>The table below displays the 'name=value' pairs that were entered on the form and processed on the server.  This page is a result of that server side process.</p>
<p>The <strong>Field Name</strong> column contains the value of the name attribute for each field on the form. <em>Example: &lt;input name=&quot;first_name&quot;&gt;</em>  This displays what you coded into the HTML. NOTE: If you do not have a name attribute for a field OR if the name attribute does not have a value the form will NOT send the data to the server.</p>
<p>The <strong>Value of Field</strong> column contains the value of each field that was sent to the server by the form. This will vary depending upon the HTML form element and how the value attribute was used for a field.</p>
<h3>Form Name-Value Pairs</h3>
-->
<h1 class="center">WDV341 Intro PHP</h1>
<h2 class="center">4-1 HTML Form Processor</h2>
<?php
	// These variables will store the values of the name value pair sent from the inputForm
	// For first and last, set first letter to uppercase and rest to lowercase
	$first = ucfirst(strtolower($_POST["first_name"]));
	$last = ucfirst(strtolower($_POST["last_name"]));
	$email = $_POST["email"];
	$school = $_POST["school"];
	$standing = $_POST["standing"];
	$major = $_POST["major"];
	$information = $_POST["information"];
	$advisor = $_POST["advisor"];
	$comments = $_POST["comments"];

	echo "<div class='bdr2'>";
	echo "<p>Dear ". $first . ",</p>";
	echo "<p>Thank you for your interest in DMACC</p>";
	echo "<p>We have listed you as an " . $standing . " starting this fall.</p>";
	echo "<p>You have declared ". $major . " as your major.</p>";
	echo "<p>Based upon your responses we will provide the following information in our confirmation email to you at " . $email . ".</p>";
	// If information or advisor is not empty echo value in variable
	if($information != ""){
		echo "<p class='margin_style1'>" . $information . "</p>";
	}
	if($advisor != ""){
		echo "<p class='margin_style1'>" . $advisor . "</p>";
	}
	// If nothing is checked echo no information needed
	if($information == "" && $advisor == ""){
		echo "<p class='margin_style1'>No information needed.</p>";
	}
	echo "<p>You have shared the following comments which we will review:</p>";
	if($comments == "") {
		echo "<p class='margin_style1'>No comments provided.</p>";
	}
	else {
		echo "<p class='margin_style1'>". $comments ."</p>";
	}
	/*	//Test variables to see if they work.
		echo "First Name: " . $first;
		echo "<br>";
		echo "Last Name: " . $last;
		echo "<br>";
		echo "Email: " . $email;
		echo "<br>";
		echo "School Name: " . $school;
		echo "<br>";
		echo "Academic Standing: " . $standing;
		echo "<br>";
		echo "Major: " . $major;
		echo "<br>";
		echo "Request Info: " . $information;
		echo "<br>";
		echo "Contact Advisor: " . $advisor;
		echo "<br>";
		echo "Comments: " . $comments;
		echo "<br>";
		echo "</div>";
	*/
	/*
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";
	*/
	echo "</div>";
	echo "
		<footer>
			<p class='center'><a href='./inputForm.html'>Back to Form</a></p>
		</footer>
		";
?>

</body>
</html>
