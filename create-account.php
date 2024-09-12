<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
    <title>Create Account</title>
</head>
<body class="create">
<div class="container">
        <form action="create-handler.php" method="post">
            <h1>Create Account</h1>
            <div>
                <label for="username">Username: </label>
                <input type="text" name="input_username" id="username" placeholder="username">
            </div>
            <div>
                <label for="password">Password: </label>
                <input type="text" name="input_password" id="password" placeholder="password">
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
</div>

</body>
</html>