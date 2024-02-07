<?php
    $time = date('D, M d, Y');
    $firstString = "Hello THERE";
    $secondString = "     The school I currently attend is DMACC!     ";
    $phoneNumber = 1234567890;
    $money = 123456;
    
    // This function takes in a parameter $timestamp and converts it to
    // MM/DD/YYYY
    // and returns the formatted timestamp.
    function formatTimestamp($timestamp)
    {
        $convertedTime = strtotime($timestamp);
        $formattedTimestamp = date('m/d/Y', $convertedTime);
        return $formattedTimestamp;
    }

    // This function takes in a parameter $timestamp and converts it to
    // DD/MM/YYYY
    // and returns the formatted timestamp.
    function formatTimestampInternational($timestamp)
    {
        $convertedTime = strtotime($timestamp);
        $formattedTimestamp = date('d/m/Y', $convertedTime);
        return $formattedTimestamp;
    }
    // This function takes in a parameter $inputStr and gets the length,
    // trims whitespace, converts it to lowercase, and checks if it has
    // 'DMACC' within the string, and echos that information onto the page.
    function formatString($inputStr)
        {
            echo "<p><pre>Original String: " . $inputStr . "</pre></p>";
            $stringLength = strlen($inputStr);
            echo "<p>String Length: " . $stringLength . "</p>";
            $stringTrim = trim($inputStr);
            echo "<p>Trimmed Whitespace: " . $stringTrim . "</p>";
            $stringLowercase = strtolower($inputStr);
            echo "<p>String To Lowercase: " . $stringLowercase . "</p>";
            if(stripos($stringLowercase, "dmacc"))
            {
                echo "<p>This string contains 'DMACC' in it.</p>";
            }
            else
            {
                echo "<p>This string does not contain 'DMACC' in it.</p>";
            }
        }

        // This function takes in a parameter $inputStr and if the length
        // is 10 which would be a phone number length, formats it, and
        // echos it to the page.
        function formatPhoneNumber($inputNum)
        {
            $inputLength = strlen($inputNum);
            $formattedNum = "";
            if($inputLength == 10)
            {
                $formattedNum = substr($inputNum, 0, 3). "-" . substr($inputNum, 3, 3) . "-" . substr($inputNum, 6, 4);
            }
            else
            {
                $formattedNum = "Unable to format";
            }
            echo "<p>Formatted Phone Number: " . $formattedNum . "</p>";
        }
        // This function takes in a parameter $inputNum and converts it to
        // USD using number_format and uses 2 decimal places, and echos it to the page.
        function formatMoney($inputNum)
        {
            $formattedUSD = '$' . number_format($inputNum, 2);
            echo "<p>Formatted as US Currency: " . $formattedUSD . "</p>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Intro PHP</title>
    <style>
        pre {
            font-family: Serif;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>3-1 PHP Functions</h2>
    <?php 
        
        echo "<p>Original Server Timestamp: " . $time . "</p>";
        echo "<p>Converted Timestamp (MM-DD-YYYY): " . formatTimestamp($time) . "</p>";
        echo "<p>Converted Timestamp (DD-MM-YYYY): " . formatTimestampInternational($time) . "</p>";

        echo "<br>";
        formatString($firstString);
        echo "<br>";
        formatString($secondString);

        echo "<br>";
        formatPhoneNumber($phoneNumber);

        formatMoney($money);
    ?>
    <footer>
		<p><a href="../wdv341.php">Back to Homework</a></p>
	</footer>
</body>
</html>