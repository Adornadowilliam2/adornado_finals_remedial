<?php
session_start();
//$_SESSION["invalid"] = "Invalid";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Php</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_SESSION["invalid"])){
            echo "
            <form action='admin.php' method='post'>
            <h1>Login</h1>
            <div>
                <label id='label-login'  for='username'>Username:</label>
                <input type='text' placeholder='username' name='input_username'>
            </div>
            <div>
                <label id='label-login'  for='username'>Password:</label>
                <input type='password' placeholder='password' name='input_password'>
            </div>
            ";
        }else{
            echo "
            <form action='admin.php' method='post'>
            <h1>Login</h1>
            <div>
                <label id='label-login'  for='username'>Username:</label>
                <input type='text' placeholder='username' name='input_username'>
            </div>
            <div>
                <label id='label-login'  for='username'>Password:</label>
                <input type='password' placeholder='password' name='input_password'>
            </div>
          
            ";
        };


        ?>
         <input type='submit' value='Login' id='login'>
        <?php 
        if(isset($_SESSION["invalid"])){
            echo $_SESSION["invalid"];
        };
        $_SESSION["invalid"] = null
        ?>
         
        </form>
    </div>
</body>
</html>