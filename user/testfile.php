<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the generated string
    $generatedString = $_POST["generated_string"];

    // Now you can use $generatedString as needed
    echo "Received generated string: " . $generatedString;
}
?>
