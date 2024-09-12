<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Survey Form php</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<body>
    <div class="grid">
        <div class="navbar">
            <nav>
                <ul>
                    <li id="special">
                        <a href="index.php"><b>Home (Guest)</b></a>
                    </li>
                </ul>
                <form action="search-handler.php" method="post">
                            <label for="search">Search Survey</label>
                            <input type="text" name="input_search" id="search">
                            <input type="submit" value="Submit">
                </form>
            </nav>
        </div>
        <div class="content">
        <p><i>Will be visible only if admin is logged in</i></p>
        <form action="handle_add_vote.php" method="post">
        <br>
        <br>
        <?php
            include("database.php");

            $retrieveQuery = "SELECT * FROM questions";
            $execQuery = mysqli_query($connection, $retrieveQuery);

            if($execQuery){
                //echo "Nigga";
            }

            while($fetchStudent = mysqli_fetch_assoc($execQuery)){
                $id = $fetchStudent["id"];
                $name = $fetchStudent["name"];
            
            echo"
            <link rel='stylesheet' href='survey.css'>
            <fieldset>
                <h1>$name</h1>
                <div class='question'>
                    <div>
                        <label for='strong_disagree'>
                        <input type='radio'  id='strong_disagree'>
                        Strongly Disagree
                        </label>
                    </div>
                    <div>
                        <label for='disagree'>
                        <input type='radio'  id='disagree'>
                        Disagree
                        </label>
                    </div>
                    <div>
                        <label for='neutral'>
                        <input type='radio'  id='neutral'>
                        Neutral
                        </label>
                    </div>
                    <div>
                        <label for='agree'>
                        <input type='radio' id='agree'>
                        Agree
                        </label>
                    </div>
                    <div>
                        <label for='strong_agree'>
                        <input type='radio' id='strong_agree'>
                        Strongly Agree
                        </label>
                    </div>
                    <div>
                        <input type='submit' value='Vote' id='vote'>
                        <input type='hidden' name='add-id' value='$id'>
                    </div>
                </div>
            </fieldset>
            ";}
            ?>
        </form>
        </div>
    </div>
</body>
</html>


