<link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
<?php 
include("database.php");
session_start();
$username = $_POST["input_username"];
$password = $_POST["input_password"];
$username = trim($username);
$password = trim($password);

$RetrieveQuery = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
$ExecQuery = mysqli_query($connection, $RetrieveQuery);

$invalid = "<p class='error'>Invalid, please check or fill the missing field</p>";

if ($username == "" || $username <= 0 || $password == "" || $password <= 0) {
    $_SESSION["invalid"] = $invalid;
    header("location: login.php");
} else {
    if(mysqli_num_rows($ExecQuery) > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location: admin.php");
    } else {
        $_SESSION["invalid"] = $invalid;
        header("location: login.php");
    }
}
?>
