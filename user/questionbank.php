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
    <title>Question Bank | TUPV Syllabus System</title>
</head>
<body>
<?php 
$page = 'questionbank';
include "../php/user_header.php";
?>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
// $(document).ready(function() {
//   // Hide the button initially
//   var modalButton = $('[data-modal-toggle="extralarge-modal"]');
//   modalButton.hide();

//   // Use setTimeout to trigger a click event after 2 seconds
//   setTimeout(function() {
//     modalButton.click();
//   }, 1300); // 2000 milliseconds = 2 seconds
// });
</script>
</body>
</html>