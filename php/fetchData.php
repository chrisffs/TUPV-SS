<?php
// $data = array(/* Fetch your data from the database */);

// Dynamically generate date categories in PHP
$categories = array();
$startDate = '2023-11-04'; // Starting date in the format 'YYYY-MM-DD'
$numberOfDays = 7; // Number of days for the date range

$dates = array();

for ($i = 0; $i < $numberOfDays; $i++) {
    $dates[] = date('d F', strtotime($startDate . " +$i day"));
}

// Combine data and categories
$response = array(
    'categories' => $dates
);

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>