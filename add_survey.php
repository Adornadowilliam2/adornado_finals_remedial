<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="extra.css">
    <link rel="shortcut icon" href="media/survey.svg" type="image/x-icon">
    <title>Add Form Survey Page</title>
</head>
<body class="add">
    <fieldset>
        <legend>Add New Survey</legend>
        <form action="add-handler.php" method="post">
            <div>
                <label for="question">Question: </label>
                <input type="text" name="input_question" id="question">
            </div>
            <div>
                <input type="submit" value="Submit New Question">
            </div>
    </fieldset>
</body>
</html>