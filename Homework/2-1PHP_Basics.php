<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WDV341 Intro PHP</title>
</head>

<body>
	<header>
		<h1 id="#top">WDV341 Intro PHP</h1>
		<?php echo "<h1>2-1 PHP Basics</h1>";?>
	</header>
	<?php 
		$yourName = "Alexander Vang";
		$number1 = 3;
		$number2 = 9;
		$total = $number1 + $number2;

		$languages = array("PHP", "HTML", "JavaScript");
	?>
	<script>
		// Push values from PHP array to JavaScript array
		var jsArray = [];
		<?php 
			foreach ($languages as $language){
				echo "jsArray.push('" . $language . "');\n		";
			}
		?>
	</script>
	<h2><?php echo $yourName;?></h2>
	<p>Number 1: <?php echo $number1;?></p>
	<p>Number 2: <?php echo $number2;?></p>
	<p>Total: <?php echo $total;?></p>
	<script>
		// Write values retrieved from PHP Array in the JavaScript array
		for(var index in jsArray){
			document.write("<p>" + jsArray[index] + "</p>");
		}
	</script>
	<footer>
		<p><a href="../wdv341.php">Back to Homework</a></p>
	</footer>
</body>

</html>