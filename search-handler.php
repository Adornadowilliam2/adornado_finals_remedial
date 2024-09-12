<head>
<style>
    body{
        background-image: url(media/YujiDog.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        font-family: "Sofia", sans-serif;
    }
</style>
<title>Seach Handler PHP</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
</head>
<?php
error_reporting(E_ERROR | E_PARSE);
include("database.php");

$name = $_POST["input_search"];

$retrieve = "SELECT * FROM questions WHERE name LIKE '%$name%'";
$execQuery = mysqli_query($connection, $retrieve);

if($execQuery){
   // echo"please ssucess";
}
while($fetchStudent = mysqli_fetch_assoc($execQuery)){
    $id = $fetchStudent["id"];
    $name = $fetchStudent["name"];

echo"
<fieldset style='backdrop-filter: blur(10px);'>
<h1><b style='background-color: yellow;'>Result No. $id</b></h1>
<div class='context' >
                <h1><b style='text-decoration: underline; background-color: yellow;'> $name</b></h1>
                <br>
                <br>
                <a href='admin.php'><button>Go back to Admin form</button></a>
</div>
</fieldset>
";
}
?>

