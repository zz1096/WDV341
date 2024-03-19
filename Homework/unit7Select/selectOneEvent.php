<?php
// Pull one event from table
try {
    require "../../dbConnect.php";
    $eventID = 2;

    $sql = "SELECT events_name, events_description, DATE_FORMAT(events_date, '%M %e, %Y') AS events_dateFormat, DATE_FORMAT(events_time, '%h:%i %p') AS events_timeFormat, events_presenter, events_date_inserted, events_date_updated  FROM wdv341_events WHERE events_id = :eventID";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":eventID", $eventID);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
}
catch(PDOException $e){
    {
        $message = "<div class='bdr2'><h3 class='center'>There has been a problem. The system administrator has been contacted. Please try again later.</h3></div>";
  
        error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
        error_log($e->getLine());
        error_log(var_dump(debug_backtrace()));
    
        //Clean up any variables or connections that have been left hanging by this error.		
    
        //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page		
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/style2.css" rel="stylesheet" type="text/css" />
    <title>WDV341 Intro PHP</title>
</head>
<body>
    <h1 class="center">WDV341 Intro PHP</h1>
    <h2 class="center">UNIT 7 - Select One Event</h2>
    <?php
        // If table is not empty, create the table and insert data from while loop
        if($result){
    ?>
    <div class="bdr3">
        <div class="table-container">
            <div class="table-row heading">
                <div class="row-item">Events Name</div>
                <div class="row-item">Events Description</div>
                <div class="row-item">Events Date</div>
                <div class="row-item">Events Time</div>
                <div class="row-item">Events Presenter</div>
                <div class="row-item">Events Date Inserted</div>
                <div class="row-item">Events Date Updated</div>
            </div>
            <?php
                while($row = $stmt->fetch()){
            ?>
                <div class="table-row">
                    <div class="row-item"><?php echo $row["events_name"];?></div>
                    <div class="row-item"><?php echo $row["events_description"];?></div>
                    <div class="row-item"><?php echo $row["events_dateFormat"];?></div>
                    <div class="row-item"><?php echo $row["events_timeFormat"];?></div>
                    <div class="row-item"><?php echo $row["events_presenter"];?></div>
                    <div class="row-item"><?php echo $row["events_date_inserted"];?></div>
                    <div class="row-item"><?php echo $row["events_date_updated"];?></div>
                </div>
            <?php
                }
            }
            else{
                echo $message;
            }
            ?>
        </div>
    </div>
</body>
</html>