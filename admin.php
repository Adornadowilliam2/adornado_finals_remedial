<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin form php</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body>
<?php 
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];

    if(empty($username) && empty($password)){
        header("location: login.php"); // Redirect to the login page
        exit(); // Stop further execution of the code
    }
?>
<link rel="stylesheet" href="extra.css">
<div class="recent">
    <fieldset>
        <legend>Recent Student</legend> 
        <ul>
            <li>
                <strong>Username: </strong> <?php echo $username; ?>
            </li>
            <li>
                <strong>Password: </strong> <?php echo $password; ?>
            </li>
        </ul>
    </fieldset>
</div>
<!--Security lock -->
<!--Security lock -->
    <div class="grid">
        <div class="navbar">
            <nav>
                <ul>
                    <li id="special">
                        <a href="admin.php"><b>Home (Admin)</b></a>
                    </li>
                    <li>
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
    <input type="hidden" name="username" value="<?php echo $username?>">
    <input type="hidden" name="password" value="<?php echo $password?>">
    <div>
        <p><strong><a href="result.php" id="see">See Results..</a></strong><i class="animate">Will be visible only if admin is logged in</i></p>
    </div>
    <?php
    include("database.php");
    $query = "SELECT * FROM questions_answers";
    $ExecQuery = mysqli_query($connection, $query);
    if($ExecQuery){
        //echo "Success";
    }
    $fetchStudents = mysqli_fetch_assoc($ExecQuery);
    $input1 = $fetchStudents["sd"];
    $input2 = $fetchStudents["d"];
    $input3 = $fetchStudents["n"];
    $input4 = $fetchStudents["a"];
    $input5 = $fetchStudents["sa"];
    ?>
    <?php
    include("database.php");
    $retrieveQuery = "SELECT * FROM questions";
    $execQuery = mysqli_query($connection, $retrieveQuery);
    if($execQuery){
        //echo "Success";
    }
    while($fetchStudent = mysqli_fetch_assoc($execQuery)){
        $id = $fetchStudent["id"];
        $name = $fetchStudent["name"];
        echo"
        <link rel='stylesheet' href='survey.css'>
        <fieldset>
            <div class='context'>
                <h1>$name</h1>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <a href='edit-form.php?id=$id'><button id='edit'>Edit</button></a>
                <a href='delete-form.php?id=$id'><button id='delete'>Delete</button></a>
            </div>
            <form action='handle_add_vote.php' method='post'>
            <div class='question'>
                <div>
                    <label for='strong_disagree'>
                        <input type='radio' name='radio_option$id' value='$input1'>
                        Strongly Disagree
                    </label>
                </div>
                <div>
                    <label for='disagree'>
                        <input type='radio' name='radio_option$id' value='$input2'>
                        Disagree
                    </label>
                </div>
                <div>
                    <label for='neutral'>
                        <input type='radio' name='radio_option$id' value='$input3'>
                        Neutral
                    </label>
                </div>
                <div>
                    <label for='agree'>
                        <input type='radio' name='radio_option$id' value='$input4'>
                        Agree
                    </label>
                </div>
                <div>
                    <label for='strong_agree'>
                        <input type='radio' name='radio_option$id' value='$input5'>
                        Strongly Agree
                    </label>
                </div>
                <div>
                    <input type='submit' value='Vote' id='vote' name='vote'>
                    <input type='hidden' name='add-id' value='$id'>
                </div>
            </div>
            </form>
        </fieldset>
        ";
    }
    ?>
</div>

  
</body>
</html>

