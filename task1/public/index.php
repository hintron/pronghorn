<?php
// Test to see if we are writing to the php_error.log file
error_log("Starting up Pronghorn Task 1...");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Pronghorn - Task 1</title>
</head>
<body>
    <h1>
        Pronghorn - Task 1
    </h1>
    <?php
        // Get the tweets in HTML form
        require "../php/tweets.php"
    ?>
</body>
</html>