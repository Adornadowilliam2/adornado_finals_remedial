<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
    <link rel="stylesheet" href="extra.css">
    <title>Add Handler</title>
</head>
<body id="add-handler">
    <h1>Add New Survey Handler</h1>

    <?php
        $name = trim($_POST["input_question"]);

        if($name == "" || $name <= 0){
            echo "<h2 style='color: maroon;'> Missing Field! Invalid Data! </h2>";
        }else{
            $createQuery = "INSERT INTO questions (name) VALUES ('$name')";

            $execQuery = mysqli_query($connection, $createQuery);
            if ($execQuery) {
                $random = mysqli_insert_id($connection); // Get the last inserted ID bagong dagdag 
            
                $CreateQuery = "INSERT INTO questions_answers (question_id) VALUES ('$random')";
                $ExecQuery = mysqli_query($connection, $CreateQuery);
            
                if ($ExecQuery) {
                    echo "<h2 style='color: green;'> Create Success! </h2>";
                } else {
                    echo "<h2 style='color: red;'> Create Failed! Error: " . mysqli_error($connection) /*pang check ng error parang kagaya sa var__dump().*/ ."</h2>"; 
                }
            } else {
                echo "<h2 style='color: red;'> Create Failed! Error: " . mysqli_error($connection) . "</h2>";
            }
        }
    ?>
    <footer>
        <a href="admin.php">Go back To Admin Form</a>
    </footer>
</body>
</html>
