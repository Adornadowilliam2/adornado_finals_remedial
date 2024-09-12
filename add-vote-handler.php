<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Vote</title>

</head>
<body>
<?php
include("database.php");

// Error reporting
error_reporting(E_ERROR | E_PARSE);

// Prepare update query
$updateQuery = "UPDATE questions_answers SET ";
$updates = [];
$params = [];
$types = '';

foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') == 0) {
        $question_id = str_replace('question_', '', $key);
        $answer = $value;
        
        // Map answer to column
        $columnMap = [
            'strong_disagree' => 'sd',
            'disagree' => 'd',
            'neutral' => 'n',
            'agree' => 'a',
            'strong_agree' => 'sa'
        ];
        
        if (isset($columnMap[$answer])) {
            $column = $columnMap[$answer];
            
            $updates[] = "$column = $column + 1";
            $params[] = $question_id;
            $types .= 'i';
        }
    }
}

if (count($updates) > 0) {
    $updateQuery .= implode(', ', $updates) . " WHERE question_id = ?";
    $stmt = mysqli_prepare($connection, $updateQuery);
    
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Close the statement
        mysqli_stmt_close($stmt);
        
        // Show confirmation message
        echo "
        <div>
            <h1>Add Handler Form</h1>
            <h2>Thank you for submitting your vote.</h2>
        </div>";
    }
}

mysqli_close($connection);
?>
</body>
</html>
