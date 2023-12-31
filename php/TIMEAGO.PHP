<?php

function getTimeAgo($timestamp) {
    $timezone = new DateTimeZone('Asia/Manila'); // Set the timezone to the Philippines
    $datetime = new DateTime($timestamp, $timezone);
    $currentDatetime = new DateTime('now', $timezone);
    $interval = $currentDatetime->diff($datetime);

    if ($interval->y > 0) {
        return $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
    } elseif ($interval->m > 0) {
        return $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
    } elseif ($interval->d > 0) {
        return $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
    } elseif ($interval->h > 0) {
        return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
    } elseif ($interval->i > 0) {
        return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
    } else {
        return "Just now";
    }
}


// DATE
$currentDate = date('Y-m-d'); // Format: Year-Month-Day

// TIME
$currentTime = date('H:i:s'); // Format: Hour:Minute:Second

// DATE TIME
$currentDateTime = date('Y-m-d H:i:s');

?>
