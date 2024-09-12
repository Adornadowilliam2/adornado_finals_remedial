<?php 

include_once("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <title>Create Handler</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body class="create-handler">
    <h1 style="text-align:center">Create Handler Page</h1>

    <?php

        $username = trim($_POST["input_username"]);
        $password= trim($_POST["input_password"]);
       

        if($username == "" || $password == "" || $username <= 0 || $password <= 0){
            echo " <style>
            .maroon{
                color: maroon;
                text-align: center;
                text-shadow: 0 0 10px gray;
            }
            body{
                background-color: orange;
                text-align: center;
            }

            a button{
                text-align: center;
                display: block;
                margin: auto;
            }

            a{
                text-decoration: none;
            }
            </style>";
            echo "<h2 style='color: maroon;'> Missing Field! Invalid Data! </h2>";

        }else{
            $checkQuery = "SELECT * FROM admins WHERE username = '$username' AND  password = '$password'";
            $checkResult = mysqli_query($connection, $checkQuery);
            
            if (mysqli_num_rows($checkResult) > 0) {
                echo "<head>
            <body id='duplicate'>
            <div class='failed'>
            <h2 class='maroon'> Duplicate record, please try again! &#128513 </h2>
            <br>
            <a href='create-account.php'><button>Back To Create Form</button></a>
            <br>
            </div>
            </body>";
            } else {


            $createQuery = "INSERT INTO admins(username, password) VALUES ('$username','$password')";

            $execQuery = mysqli_query($connection, $createQuery);
        
            if($execQuery){
                echo "
                <body id='sucess-create'>
                    <div class='content'>
                        <img src='media/jakesad.png' alt='jake sad' width='100px'>
                        <h1>Create Success</h1>
                    </div>
                    <img src='media/pikachu.gif' alt='pikachu roar' width='300px' class='img'>
                </body>
                ";
            }

        }
    }

        

    ?>

    <footer>
        <a href='admin.php'>Go back To Admin Form</a>
    </footer>
</body>
</html>