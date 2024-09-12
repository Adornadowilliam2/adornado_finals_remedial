<?php
//edit id = $_GET["id"];
//edit-handler id = $_GET["edit-id"]
error_reporting(E_ERROR | E_PARSE);
include("database.php");
$id = $_GET["id"];
$query = "SELECT * FROM questions WHERE id =$id";
$execQuery = mysqli_query($connection, $query);

if($execQuery){
   // echo "sucess";
}
$fetchStudent = mysqli_fetch_assoc($execQuery);
$name = $fetchStudent["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <title>Edit Form</title>
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body id="editf">
    <fieldset>
    <form action="edit-handler.php" method="post">
        <div>
            <label for="question">Question No. <?php echo $id ?></label>
            <p>Please edit carefully &#128513</p>
            <input type="text" name="input_question" id="search" value="<?php echo $name?>">

        </div>
        <div>
            <input type="submit" value="Sumit info">
            <input type="hidden" name="edit-id" value="<?php echo $id ?>">
        </div>
    
    </form>
    </fieldset>
</body>
</html>