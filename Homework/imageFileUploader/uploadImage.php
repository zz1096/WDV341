<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341 Intro PHP</title>
    <link href="../../css/style2.css" rel="stylesheet" type="text/css" />
    <style>
        img {
            border: 2px solid #81ab92;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1 class="center">WDV341 Intro PHP</h1>
    <h2 class="center">UNIT 5 - Image File Uploader</h2>    
    <p class="center"><a href="inputImage.html">Back to Image Upload</a></p>
    <?php
    $target_dir = "images/";
    // Make extension lowercase so no images files with same name
    $target_file = $target_dir . pathinfo($_FILES["inputImg"]["name"], PATHINFO_FILENAME) . '.' . strtolower(pathinfo($_FILES["inputImg"]["name"], PATHINFO_EXTENSION));
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file was inputted
    if(basename($_FILES["inputImg"]["name"]) == ""){
        echo "<p class='center'>There was no file to upload. Please try again.</p>";
        $uploadOk = 0;
    }
    else{
        $uploadOk = 1;
    }
    
    // Check if file already exists
    if (file_exists($target_file) && $uploadOk == 1) {
    echo '<p class="center">Sorry, the file named "' . basename( $_FILES["inputImg"]["name"]) . '" already exists.</p>';
    echo '<p class="center">Here is the existing image.</p>';
    echo "<p class='center'><img src='$target_file' width='500'></p>";
    $uploadOk = 0;
    }
    
    // Check file size
    $maxFileSize = 500000;
    if ($_FILES["inputImg"]["size"] > $maxFileSize) {
        echo "<p class='center'>Sorry, your file is too large. Max size 500KB</p>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"  && $uploadOk == 1) {
        echo "<p class='center'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
        $uploadOk = 0;
    }

    if($uploadOk != 0)
    {
        if(move_uploaded_file($_FILES["inputImg"]["tmp_name"], $target_file)) {
            echo "<p class='center'>The file ". htmlspecialchars( basename( $_FILES["inputImg"]["name"])). " has been uploaded.</p>";
            echo "<p class='center'><img src='$target_file' width='500'></p>";
        } 
        else {
            echo "<p class='center'>Sorry, there was an error uploading your file.</p>";
        }
    }
    ?>
    
</body>
</html>
