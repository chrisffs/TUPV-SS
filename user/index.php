<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Syllabus | TUPV Syllabus System<</title>
</head>
<body class="">
    
<?php 
$page = 'syllabus';
include "../php/user_header.php";
?>
<main class="ml-[64px] ml-6 p-6 mt-[60px]">
    <h1 class="font-bold text-2xl">Syllabus</h1>
    <div class="flex flex-wrap gap-4 mt-6">
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
        <div class="bg-light-100 w-56 p-4 rounded-lg">content</div>
    </div>
</main>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
  // Hide the button initially
  var modalButton = $('[data-modal-toggle="extralarge-modal"]');
  modalButton.hide();

  // Use setTimeout to trigger a click event after 2 seconds
  setTimeout(function() {
    modalButton.click();
  }, 1300); // 2000 milliseconds = 2 seconds
});
</script>
</body>
</html>