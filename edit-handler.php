<link rel="stylesheet" href="extra.css">
<link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
<?php
 error_reporting(E_ERROR | E_PARSE);
include("database.php");

$id = $_POST["edit-id"];
$name = $_POST["input_question"];
$name = trim($name);

if ($name == "" || $name == 0) {
   
    echo "
<body id='succeed'>
    <div class='form-succeed'>
        <h1>Output</h1>
        <h2> Invalid, please complete the missing field <h2>
        <a href='edit-form.php?id=$id'><button>Back To Edit Form</button></a>
    </div>
</body>
</html>";
} else {
    $updateQuery = "UPDATE questions SET name='$name' WHERE id=$id";
    $execQuery = mysqli_query($connection, $updateQuery);
    if ($execQuery) {
        echo "
        <body class='succeed'>
            <div class='form-succeed'>
                <h1>Output</h1>
                <h2 style='color: green'>Success!!...</h2>
                <img src='media/jake.png' alt='jake approved' width='100px'>
            </div>
        </body>
        </html>";
    }
}
?>
<head>
    <title>Edit handler Form</title>
    <style>
        footer{
          
        }

        footer a{
            text-decoration: none;
            color: white;
            display: block;
            margin: auto;
            max-width: 100px;
            border: none;
            text-align: center;
            background: green;
            border-radius: 5px;
            padding: 2px;
        }
    </style>
</head>
<footer>
    <a href="admin.php">Go back To Admin Form</a>
</footer>
