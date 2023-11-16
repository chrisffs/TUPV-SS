<?php 
include '../php/conn.php';
include '../php/user_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Exam Checker | TUPV Syllabus System</title>
</head>
<body>
<?php 
$page = 'examchecker';
include "../php/user_header.php";
?>



<!-- EXAM CHECKER CONTENT HERE FROM ALDRICH -->




<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.text-truncate').each(function() {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
    
});
</script>
</body>
</html>