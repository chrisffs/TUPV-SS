<?php
include '../php/conn.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action === 'count' && isset($_POST['sem']) && isset($_POST['term']) && isset($_POST['subject']) && isset($_POST['year'])) {
    $selectedSem = $_POST['sem'];
    $selectedYear = $_POST['year'];
    $selectedTerm = $_POST['term'];
    $selectedSubject = $_POST['subject'];

    // SQL query to fetch count of distinct questions for the selected semester
    $sql = "SELECT COUNT(DISTINCT ID) AS QuestionCount FROM questionbank_tbl WHERE Year = :year AND Subject = :subject AND Term = :term AND Semester = :sem";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sem', $selectedSem, PDO::PARAM_STR);
    $stmt->bindParam(':year', $selectedYear, PDO::PARAM_STR);
    $stmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
    $stmt->bindParam(':subject', $selectedSubject, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the count result
    $result = $stmt->fetch();

    // Return only the count as a response
    echo $result['QuestionCount'];
} elseif ($action === 'populate') {
    if (isset($_POST['year'])) {
        // Your existing code...
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
    } elseif (isset($_POST['subject'])) {
        $selectedSubject = $_POST['subject'];

        // SQL query to fetch distinct terms for the selected subject
        $sql = "SELECT DISTINCT Term FROM questionbank_tbl WHERE Subject = :subject order by Term DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':subject', $selectedSubject, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the terms
        $terms = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Create and return the HTML options for the Term dropdown
        $termOptions = '<option selected disabled hidden value="">Choose the Term</option>';
        foreach ($terms as $term) {
            $termOptions .= '<option value="' . $term . '">' . $term . '</option>';
        }

        echo $termOptions;
    } elseif (isset($_POST['term'])) {
        $selectedTerm = $_POST['term'];

        // SQL query to fetch distinct semesters for the selected term
        $sql = "SELECT DISTINCT Semester FROM questionbank_tbl WHERE Term = :term order by Semester DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the semesters
        $semesters = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Create and return the HTML options for the Semester dropdown
        $semesterOptions = '<option selected disabled hidden value="">Choose the Semester</option>';
        foreach ($semesters as $semester) {
            $semesterOptions .= '<option value="' . $semester . '">' . $semester . '</option>';
        }

        echo $semesterOptions;
    }
}



// $action = isset($_POST['action']) ? $_POST['action'] : '';

// // Then, wrap your existing code in if blocks like this:

// if ($action === 'count' && isset($_POST['sem']) && isset($_POST['term']) && isset($_POST['subject']) &&  isset($_POST['year'])) {
//     $selectedSem = $_POST['sem'];
//     $selectedy = $_POST['year'];
//     $selectedt = $_POST['term'];
//     $selecteds = $_POST['subject'];

//     // SQL query to fetch count of distinct questions for the selected semester
//     $sql = "SELECT COUNT(DISTINCT Question) AS QuestionCount FROM questionbank_tbl WHERE Year = :year AND Subject = :subject AND Term = :term AND Semester = :sem";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':sem', $selectedSem, PDO::PARAM_STR);
//     $stmt->bindParam(':year', $selectedy, PDO::PARAM_STR);
//     $stmt->bindParam(':term', $selectedt, PDO::PARAM_STR);
//     $stmt->bindParam(':subject', $selecteds, PDO::PARAM_STR);
//     $stmt->execute();
    
//     // Fetch the count result
//     $result = $stmt->fetch();

//     // Return only the count as a response
//     echo $result['QuestionCount'];
// }

// if ($action === 'populate' && isset($_POST['year'])) {
//    // Your existing code...
//    $selectedYear = $_POST['year'];

//    // SQL query to fetch distinct subjects for the selected year
//    $sql = "SELECT DISTINCT Subject FROM questionbank_tbl WHERE Year = :year order by Subject ASC";
//    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':year', $selectedYear, PDO::PARAM_STR);
//    $stmt->execute();

//    // Fetch the subjects
//    $subjects = $stmt->fetchAll(PDO::FETCH_COLUMN);

//    // Create and return the HTML options for the Subject dropdown
//    $subjectOptions = '<option selected disabled hidden value="">Choose the Subject</option>';
//    foreach ($subjects as $subject) {
//        $subjectOptions .= '<option value="' . $subject . '">' . $subject . '</option>';
//    }

//    echo $subjectOptions;
// }

// if ($action === 'populate' && isset($_POST['subject'])) {
//     $selectedSubj = $_POST['subject'];

//     // SQL query to fetch distinct term for the selected year
//     $sql = "SELECT DISTINCT Term FROM questionbank_tbl WHERE Subject = :subject order by Term DESC";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':subject', $selectedSubj, PDO::PARAM_STR);
//     $stmt->execute();

//     // Fetch the term
//     $term = $stmt->fetchAll(PDO::FETCH_COLUMN);


//     // Create and return the HTML options for the Subject dropdown
//     $termOptions = '<option selected disabled hidden value="">Choose the Term</option>';
//     foreach ($term as $terms) {
//         $termOptions .= '<option value="' . $terms . '">' . $terms . '</option>';
//     }

//     echo $termOptions;
// }

// if ($action === 'populate' && isset($_POST['term'])) {
//     $selectedTerm = $_POST['term'];

//     // SQL query to fetch distinct term for the selected year
//     $sql = "SELECT DISTINCT Semester FROM questionbank_tbl WHERE Term = :term order by Semester DESC";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
//     $stmt->execute();
    

//     // Fetch the term
//     $sem = $stmt->fetchAll(PDO::FETCH_COLUMN);
    


//     // Create and return the HTML options for the Subject dropdown
//     $semOptions = '<option selected disabled hidden value="">Choose the Semester</option>';
//     foreach ($sem as $sems) {
//         $semOptions .= '<option value="' . $sems . '">' . $sems . '</option>';
//     }

//     echo $semOptions;
// }




// if (isset($_POST['sem']) && isset($_POST['term']) && isset($_POST['subject']) &&  isset($_POST['year']) ) {
//     $selectedSem = $_POST['sem'];
//     $selectedy = $_POST['year'];
//     $selectedt = $_POST['term'];
//     $selecteds = $_POST['subject'];

//     // SQL query to fetch count of distinct questions for the selected semester
//     $sql = "SELECT COUNT(DISTINCT Question) AS QuestionCount FROM questionbank_tbl WHERE Year = :year AND Subject = :subject AND Term = :term AND Semester = :sem";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':sem', $selectedSem, PDO::PARAM_STR);
//     $stmt->bindParam(':year', $selectedy, PDO::PARAM_STR);
//     $stmt->bindParam(':term', $selectedt, PDO::PARAM_STR);
//     $stmt->bindParam(':subject', $selecteds, PDO::PARAM_STR);
//     $stmt->execute();
    
//     // Fetch the count result
//     $result = $stmt->fetch();

//     // Return only the count as a response
//     echo $result['QuestionCount'];
// }



















// count

// // Get selected filter values
// $selectedYear = isset($_POST['year']) ? $_POST['year'] : null;
// $selectedSubj = isset($_POST['subject']) ? $_POST['subject'] : null;
// $selectedTerm = isset($_POST['term']) ? $_POST['term'] : null;
// $selectedSemester = isset($_POST['semester']) ? $_POST['semester'] : null;

// // Build the SQL query with filters
// $sql = "SELECT COUNT(*) AS count FROM questionbank_tbl WHERE 1 = 1";

// if ($selectedYear) {
//     $sql .= " AND Year = :year";
// }

// if ($selectedSubj) {
//     $sql .= " AND Subject = :subject";
// }

// if ($selectedTerm) {
//     $sql .= " AND Term = :term";
// }

// if ($selectedSemester) {
//     $sql .= " AND Semester = :semester";
// }

// $stmt = $conn->prepare($sql);

// if ($selectedYear) {
//     $stmt->bindParam(':year', $selectedYear, PDO::PARAM_STR);
// }

// if ($selectedSubj) {
//     $stmt->bindParam(':subject', $selectedSubj, PDO::PARAM_STR);
// }

// if ($selectedTerm) {
//     $stmt->bindParam(':term', $selectedTerm, PDO::PARAM_STR);
// }

// if ($selectedSemester) {
//     $stmt->bindParam(':semester', $selectedSemester, PDO::PARAM_STR);
// }

// $stmt->execute();

// // Fetch the count result
// $result = $stmt->fetch();

// // Return only the count as a response
// echo json_encode(['count' => $result['count']]);


?>



