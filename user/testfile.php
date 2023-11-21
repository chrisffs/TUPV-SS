<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the generated string
    $generatedString = $_POST["generated_string"];

    // Now you can use $generatedString as needed
    echo "Received generated string: " . $generatedString;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>#</h1>
</body>
</html>