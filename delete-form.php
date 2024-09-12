
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <title>Delete Form</title>
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body id="delete-form">
    <fieldset>
    <?php
     error_reporting(E_ERROR | E_PARSE);
    include("database.php");
  $id = $_GET["id"];

  $query = "SELECT * FROM questions WHERE id=$id";

  $execQuery = mysqli_query($connection, $query);

  $fetchStudent = mysqli_fetch_assoc($execQuery);

  $name = $fetchStudent["name"];

?>
        <div>
            <h2 style="color:red">Do you want to delete this? <br> Question No.  <?php echo $id ?></h2>
             <h4><?php echo $name ?></h4>
        <form action="delete-handler.php" method="post">
            <input type="submit" name="btn-submit" value="Yes" id="btnYes"> 
            
            <input type="submit" name="btn-submit" value="No" id="btnNo">
            <input type="hidden" name="delete-id" value="<?php echo $id ?>">
        </form>
    </fieldset>
</body>
</html>



