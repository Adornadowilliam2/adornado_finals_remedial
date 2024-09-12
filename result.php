<?php

include("database.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin form php</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
    <style>
        .progress-container {
            margin-bottom: 20px;
        }
    </style>
    </style>
</head>
<body class='seal'>
    <div class="grid">
        <div class="navbar">
            <nav>
                <ul>
                    <li>
                        <a href="admin.php"><b>Home (Admin)</b></a>
                    </li>
                    <li id="special">
                        <a href="result.php"><b>Results</b></a>
                    </li>
                    <li>
                        <a href="add_survey.php"><b>Add Survey Question</b></a>
                    </li>
                    <li>
                       <a href="create-account.php"> <b>Create Account</b></a>
                    </li>
                    <li>
                        <a href="logout.php"><b>Logout</b></a>
                    </li>
                </ul>
                <form action="search-handler.php" method="post">
                            <label for="search">Search Survey</label>
                            <input type="text" name="input_search" id="search">
                            <input type="submit" value="Submit" class='search-submit'>
                </form>
            </nav>
        </div>
        <div class="content">
            <div>
            </div>
            <form action="handle_add_vote.php" method="post">
                <br>
                <br>
                <?php
                include("database.php");

                $retrieveQuery = "SELECT q.id, q.name, qa.sd, qa.d, qa.n, qa.a, qa.sa 
                FROM questions_answers qa 
                JOIN questions q ON qa.question_id = q.id;
                ";
                $execQuery = mysqli_query($connection, $retrieveQuery);
                if ($execQuery) {
                    //echo "Success";
                }

                while ($fetchStudent = mysqli_fetch_assoc($execQuery)) {
                    $id = $fetchStudent["id"];
                    $name = $fetchStudent["name"];
                    $sd = $fetchStudent["sd"];
                    $d = $fetchStudent["d"];
                    $n = $fetchStudent["n"];
                    $a = $fetchStudent["a"];
                    $sa = $fetchStudent["sa"];

                    echo "
                    <link rel='stylesheet' href='survey.css'>
                    <fieldset>
                        <div class='context'>
                            <h1>$name</h1>
                            <br>
                            <br>
                            <h3>Graph Table Progress</h3>
                            <div class='progress-container'>
                                <label>
                                    <progress min='0' max='10' value='$sd'></progress> 
                                    Strongly Disagree : <mark>$sd%</mark>
                                </label>
                            </div>

                            <div class='progress-container'>
                                <label>
                                    <progress min='0' max='10' value='$d'></progress> 
                                    Disagree : <mark>$d%</mark>
                                </label>
                            </div>

                            <div class='progress-container'>
                                <label>
                                    <progress min='0' max='10' value='$n'></progress> 
                                    Neutral : <mark>$n%</mark>
                                </label>
                            </div>

                            <div class='progress-container'>
                                <label>
                                    <progress min='0' max='10' value='$a'></progress> 
                                    Agree: <mark>$a%</mark>
                                </label>
                            </div>

                            <div class='progress-container'>
                                <label>
                                    <progress min='0' max='10' value='$sa'></progress> 
                                    Strongly Agree: <mark>$sa%</mark>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    ";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>









        