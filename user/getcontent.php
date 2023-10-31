<?php
include '../php/conn.php';



// populate subject
if (isset($_POST['year'])) {
    $selectedYear = $_POST['year'];

    // SQL query to fetch distinct subjects for the selected year
    $sql = "SELECT DISTINCT Subject FROM questionbank_tbl WHERE Year = :year order by Subject ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':year', $selectedYear, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the subjects
    $subjects = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Create and return the HTML options for the Subject dropdown
    $subjectOptions = '<option selected disabled hidden value="">Choose the Subject</option>';
    foreach ($subjects as $subject) {
        $subjectOptions .= '<option value="' . $subject . '">' . $subject . '</option>';
    }

    echo $subjectOptions;
} else {
    // Handle the case where 'year' is not provided in the POST request
    echo '<option value="">---</option>';
}



// populate term

if (isset($_POST['subject'])) {
    $selectedSubj = $_POST['subject'];

    // SQL query to fetch distinct term for the selected year
    $sql = "SELECT DISTINCT Term FROM questionbank_tbl WHERE Subject = :subject order by Term DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':subject', $selectedSubj, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the term
    $term = $stmt->fetchAll(PDO::FETCH_COLUMN);


    // Create and return the HTML options for the Subject dropdown
    $termOptions = '<option selected disabled hidden value="">Choose the Term</option>';
    foreach ($term as $terms) {
        $termOptions .= '<option value="' . $terms . '">' . $terms . '</option>';
    }

    echo $termOptions;
} else {
    // Handle the case where 'year' is not provided in the POST request
    echo '<option value="">---</option>';
}





// populate semester

if (isset($_POST['term'])) {
    $selectedTerm = $_POST['term'];

    // SQL query to fetch distinct term for the selected year
    $sql = "SELECT DISTINCT Semester FROM questionbank_tbl WHERE Term = :term order by Semester DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the term
    $sem = $stmt->fetchAll(PDO::FETCH_COLUMN);


    // Create and return the HTML options for the Subject dropdown
    $semOptions = '<option selected disabled hidden value="">Choose the Semester</option>';
    foreach ($sem as $sems) {
        $semOptions .= '<option value="' . $sems . '">' . $sems . '</option>';
    }

    echo $semOptions;
} else {
    // Handle the case where 'year' is not provided in the POST request
    echo '<option value="">---</option>';
}



// count
// Count the filtered content
$countSql = "SELECT COUNT(*) AS count FROM questionbank_tbl WHERE 1";

if (!empty($selectedYear)) {
    $countSql .= " AND Year = :year";
}

if (!empty($selectedSubject)) {
    $countSql .= " AND Subject = :subject";
}

if (!empty($selectedTerm)) {
    $countSql .= " AND Term = :term";
}

if (!empty($selectedSemester)) {
    $countSql .= " AND Semester = :semester";
}

$countStmt = $conn->prepare($countSql);

if (!empty($selectedYear)) {
    $countStmt->bindParam(':year', $selectedYear, PDO::PARAM_STR);
}

if (!empty($selectedSubject)) {
    $countStmt->bindParam(':subject', $selectedSubject, PDO::PARAM_STR);
}

if (!empty($selectedTerm)) {
    $countStmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
}

if (!empty($selectedSemester)) {
    $countStmt->bindParam(':semester', $selectedSemester, PDO::PARAM_STR);
}

$countStmt->execute();

$countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
$contentCount = $countResult['count'];

// Return the content count as JSON
$response['count'] = $contentCount;
echo json_encode($response);


?>



