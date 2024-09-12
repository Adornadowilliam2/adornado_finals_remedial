<head>
    <link rel="stylesheet" href="extra.css">
    <title>Delete handler</title>
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>

<?php
 error_reporting(E_ERROR | E_PARSE);
include("database.php");
$id = $_POST["delete-id"];

$response = $_POST["btn-submit"];

if ($response == "Yes") {
    $deleteQuery = "DELETE FROM questions_answers WHERE question_id = $id";
    $execQuery = mysqli_query($connection, $deleteQuery);

    if ($execQuery) {
        $deleteQuery = "DELETE FROM questions WHERE id = $id";
        $execQuery = mysqli_query($connection, $deleteQuery);

        if ($execQuery) {
            echo "
            <body id='delete-handler'>
                <div class='content'>
                    <img src='media/jakesad.png' alt='jake sad' width='100px'>
                    <h1>Delete Success</h1>
                </div>
                <img src='media/roar.gif' alt='Palword roar' width='300px' class='img'>
            </body>
            ";
        } else {
            echo "<h2 style=\"color: red;\"> Delete Failed! </h2>";
        }
    } else {
        echo "<h2 style=\"color: red;\"> Delete Failed! </h2>";
    }
} else {
    header("location: admin.php");
    exit();
}
?>
<footer id='foot'>
    <a href="admin.php">Go back To Admin Form</a>
</footer>