<?php
// Test to see if we are writing to the php_error.log file
error_log("Hello World!");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Pronghorn - Task 1</title>
</head>
<body>
    <h1>
        Hello World!
    </h1>
    <?php
        // Get the tweets in HTML form
        require "../php/tweets.php"
    ?>
</body>
</html>