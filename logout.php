
<head>
    <title>Logout Form</title>
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<?php
session_start();

session_destroy();

header("location: login.php");


?>
