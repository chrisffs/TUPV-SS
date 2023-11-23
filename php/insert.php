<?php
include './conn.php'; // Include the database connection script
include '../php/TIMEAGO.PHP';
session_start(); // Start a PHP session

date_default_timezone_set('Asia/Manila');
$currentTimestamp = time(); // This returns the current Unix timestamp
$formattedTimestamp = date("Y-m-d H:i:s", $currentTimestamp);

if(isset($_POST['insertdpt']))
{
    $dptn = $_POST['dptname'];
    $acr = $_POST['acronym'];

    // Prepare the SQL statement
    $sql = "INSERT INTO departmenttbl (dptname, acronym) VALUES (:dptn, :acr)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':dptn', $dptn);
    $stmt->bindParam(':acr', $acr);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['settingsinsert_message'] = $dptn . "(". $acr .")" . " has Added Successfully";
        $_SESSION['settingsinsert_messagecolor'] = "green";
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertcourse']))
{
    $cn = $_POST['courseName'];
    $ac1 = $_POST['acro'];
    $ac2 = $_POST['acronym'];

    // Prepare the SQL statement
    $sql = "INSERT INTO courses_tbl (courseName, acro, dept ) VALUES (:cname, :acros, :acros2)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':cname', $cn);
    $stmt->bindParam(':acros', $ac1);
    $stmt->bindParam(':acros2', $ac2);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['settingsinsert_message'] = $cn . "(". $ac1 .")" . " has Added Successfully";
        $_SESSION['settingsinsert_messagecolor'] = "green";
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertsubject']))
{
    $sn = $_POST['subjectName'];
    $sc = $_POST['subjCode'];

    // Prepare the SQL statement
    $sql = "INSERT INTO subject_tbl (subjectName, subjCode) VALUES (:names, :code)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':names', $sn);
    $stmt->bindParam(':code', $sc);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['settingsinsert_message'] = $sn . "(". $sc .")" . " has Added Successfully";
        $_SESSION['settingsinsert_messagecolor'] = "green";
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['insertuser']))
{
    if ($_FILES["user_pic"]["error"] === UPLOAD_ERR_NO_FILE) {
        // No file was uploaded; use the default file
        $filename = "default.jpg"; // Set the default filename
        $userpic = $filename;
        $userpicloc = realpath("../files/userpics/" . $filename);
        $ufn = $_POST['userFullName'];
        $utupvid = $_POST['userTupvId'];
        $udept = $_POST['userDept'];
        $ucourse = $_POST['userCourse'];
        $uun = $_POST['userUName'];
        $upass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
        $utype = $_POST['usertype'];

        // Prepare the SQL statement
        $sql = "INSERT INTO accounts_tbl (tupv_id, username, password, full_name, course, department, type, user_picture, userpic_fileloc) VALUES (:tupvid, :username, :password, :fullname, :course, :department, :type, :picture, :piclocation)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':tupvid', $utupvid);
        $stmt->bindParam(':username', $uun);
        $stmt->bindParam(':password', $upass);
        $stmt->bindParam(':fullname', $ufn);
        $stmt->bindParam(':department', $udept);
        $stmt->bindParam(':course', $ucourse);
        $stmt->bindParam(':type', $utype);
        $stmt->bindParam(':picture', $userpic);
        $stmt->bindParam(':piclocation', $userpicloc);
        
        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['settingsinsert_message'] = $ufn . "(". $utype .")"." has Added Successfully";
            $_SESSION['settingsinsert_messagecolor'] = "green";
            header("Location: ../ADMIN/settings.php");
        } else {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    } elseif ($_FILES["user_pic"]["error"] !== UPLOAD_ERR_OK) {
        // Handle other file upload errors
        switch ($_FILES["user_pic"]["error"]) {
            case UPLOAD_ERR_PARTIAL:
                $_SESSION['settingsinsert_message'] = "File only partially uploaded";
                header('location: ../admin/settings.php');
                $_SESSION['settingsinsert_messagecolor'] = "red";
                exit();
                break;
            case UPLOAD_ERR_EXTENSION:
                $_SESSION['settingsinsert_message'] = "File upload stopped by a PHP Extension";
                header('location: ../admin/settings.php');
                $_SESSION['settingsinsert_messagecolor'] = "red";
                exit();
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $_SESSION['settingsinsert_message'] = "Temporary folder not found";
                header('location: ../admin/settings.php');
                $_SESSION['settingsinsert_messagecolor'] = "red";
                exit();
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $_SESSION['settingsinsert_message'] = "Failed to write file";
                header('location: ../admin/settings.php');
                $_SESSION['settingsinsert_messagecolor'] = "red";
                exit();
                break;
            default:
                $_SESSION['settingsinsert_message'] = "Unknown upload error";
                header('location: ../admin/settings.php');
                $_SESSION['settingsinsert_messagecolor'] = "red";
                exit();
                break;
        }
    } else {
    // checking the file info
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->file($_FILES["user_pic"]["tmp_name"]);

    // exit($mime_type); 
    $mime_types = [
    'image/jpeg',  // JPEG images
    'image/png',   // PNG images
    'image/gif',   // GIF images
    'image/bmp',   // BMP images
    'image/webp',  // WebP images
    'image/svg+xml',  // SVG images
    // Add more MIME types as needed
    ];

    if (! in_array($_FILES["user_pic"]["type"], $mime_types)) {
        $_SESSION['settingsinsert_message'] = "Invalid file type";
        $_SESSION['settingsinsert_messagecolor'] = "red";
        header('location: ../admin/settings.php');
        exit();
    }
    // For Maximum file size
    if ($_FILES["user_pic"]["size"] > 10485670) {
        $_SESSION['settingsinsert_message'] = "File exceeds max(10MB)";
        $_SESSION['settingsinsert_messagecolor'] = "red";
        header('location: ../admin/settings.php');
        exit();
    }

    $pathinfo = pathinfo($_FILES["user_pic"]["name"]);
    $base = $pathinfo["filename"];
    $base = preg_replace("/[^\w-]/", "_", $base);
    $filename = $base . "." . $pathinfo["extension"];
    
    // Transfering file to a folder
    $filename = $_FILES["user_pic"]["name"];
    $destination = __DIR__ . "/../files/userpics/" . $filename;

    $i = 1;

    while (file_exists($destination)) {
        $filename = $base . "($i)." . $pathinfo["extension"];
        $destination = __DIR__ . "/../files/userpics/" . $filename;
        $i++;
    }

    if (! move_uploaded_file($_FILES["user_pic"]["tmp_name"], $destination)) {
        $_SESSION['settingsinsert_message'] = "Can't move uploaded file";
        $_SESSION['settingsinsert_messagecolor'] = "red";
        header('location: ../admin/settings.php');
        exit();
    }

    $userpic = $filename;
    $userpicloc = realpath("../files/userpics/" . $filename);
    $ufn = $_POST['userFullName'];
    $utupvid = $_POST['userTupvId'];
    $udept = $_POST['userDept'];
    $uun = $_POST['userUName'];
    $upass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);;
    $utype = $_POST['usertype'];

    // Prepare the SQL statement
    $sql = "INSERT INTO accounts_tbl (tupv_id, username, password, full_name, department, type, user_picture, userpic_fileloc) VALUES (:tupvid, :username, :password, :fullname, :department, :type, :picture, :piclocation)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':tupvid', $utupvid);
    $stmt->bindParam(':username', $uun);
    $stmt->bindParam(':password', $upass);
    $stmt->bindParam(':fullname', $ufn);
    $stmt->bindParam(':department', $udept);
    $stmt->bindParam(':type', $utype);
    $stmt->bindParam(':picture', $userpic);
    $stmt->bindParam(':piclocation', $userpicloc);
    
    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['settingsinsert_message'] = $ufn . "(". $utype .")"." has Added Successfully";
        $_SESSION['settingsinsert_messagecolor'] = "green";
        header("Location: ../ADMIN/settings.php");
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    }
}


// CHECKER syllabus .
// accept
if (isset($_POST['accept']) || isset($_POST['accept1'])) {
    $syllabusid = $_POST['syllabusid'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM syllabuschecker_tbl WHERE ID = :syllabusid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':syllabusid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into syllabus_tbl
        $sql_insert_syllabus = "INSERT INTO syllabus_tbl (NAMEUPLOAD, USERUPLOADID, SUBJECTS, CODE, TERM, YEARS, FILES, FILELOC, DATEUPLOAD) VALUES (:NameUpload, :uploaderId, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload)";
        $stmt_insert_syllabus = $conn->prepare($sql_insert_syllabus);
    
        // Define variables for actlog_tbl
        $syllabus = "Syllabus";
        $accepted = "Accepted";
        $module = "Module";
    
        // Insert into actlog_tbl
        $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, subj, subjCode, terms, years, file, fileLoc) VALUES (:syllabus, :dateUpload, :accepted, :module, :NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc)";
        $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);
    
        if ($stmt_insert_syllabus && $stmt_insert_actlog) {
            $stmt_insert_syllabus->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_syllabus->bindParam(':uploaderId', $result['uploaderId']);
            $stmt_insert_syllabus->bindParam(':subj', $result['subj']);
            $stmt_insert_syllabus->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_syllabus->bindParam(':term', $result['term']);
            $stmt_insert_syllabus->bindParam(':year', $result['year']);
            $stmt_insert_syllabus->bindParam(':file', $result['file']);
            $stmt_insert_syllabus->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert_syllabus->bindParam(':dateUpload', $result['dateUpload']);
    
            $stmt_insert_actlog->bindParam(':syllabus', $syllabus);
            $stmt_insert_actlog->bindParam(':dateUpload', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':accepted', $accepted);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_actlog->bindParam(':subj', $result['subj']);
            $stmt_insert_actlog->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_actlog->bindParam(':term', $result['term']);
            $stmt_insert_actlog->bindParam(':year', $result['year']);
            $stmt_insert_actlog->bindParam(':file', $result['file']);
            $stmt_insert_actlog->bindParam(':fileLoc', $result['fileLoc']);
    
            if ($stmt_insert_syllabus->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM syllabuschecker_tbl WHERE ID = :syllabusid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':syllabusid', $result['ID'], PDO::PARAM_INT); // Assuming 'ID' is the correct column name
    
                if ($stmt_delete->execute()) {
                    if (isset($_POST['accept'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['accept1'])) {
                        header("Location: ../ADMIN/syllabus.php");
                    }
                } else {
                    echo "Error deleting from syllabuschecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into syllabus_tbl or actlog_tbl.";
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in syllabuschecker_tbl";
    }
}



// ACCEPT QB CHECKER

// accept
if (isset($_POST['acceptqb']) || isset($_POST['acceptqb1'])) {
    $syllabusid = $_POST['qbid'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM qbchecker_tbl WHERE id = :qbid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':qbid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into syllabus_tbl
        $sql_insert_syllabus = "INSERT INTO questionbank_tbl (Year, Subject, Term, Semester, uploaderId, uploadedby, time_uploaded, Question, A, B, C, D, Answer) VALUES (:Year, :Subject, :Term, :Semester, :uploaderid, :uploadedby, :time_uploaded, :Question, :A, :B, :C, :D, :Answer)";
        $stmt_insert_syllabus = $conn->prepare($sql_insert_syllabus);

        // Define variables for actlog_tbl
        $syllabus = "Question";
        $accepted = "Accepted";
        $module = "Question Bank";

        // Insert into actlog_tbl
        $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, yearqb, subjqb, termqb, semesterqb, questionqb,  A, B, C, D, Answers) VALUES (:syllabus, :upload_time, :accepted, :module, :upload_name, :yearqb, :subjqb, :termqb, :semesterqb, :questionqb,  :A, :B, :C, :D, :Answers)";
        $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert_syllabus && $stmt_insert_actlog) {
            $stmt_insert_syllabus->bindParam(':Year', $result['Year']);
            $stmt_insert_syllabus->bindParam(':Subject', $result['Subject']);
            $stmt_insert_syllabus->bindParam(':Term', $result['Term']);
            $stmt_insert_syllabus->bindParam(':Semester', $result['Semester']);
            $stmt_insert_syllabus->bindParam(':uploaderid', $result['uploaderId']);
            $stmt_insert_syllabus->bindParam(':uploadedby', $result['uploadedby']);
            $stmt_insert_syllabus->bindParam(':time_uploaded', $result['time_uploaded']);
            $stmt_insert_syllabus->bindParam(':Question', $result['Question']);
            $stmt_insert_syllabus->bindParam(':A', $result['A']);
            $stmt_insert_syllabus->bindParam(':B', $result['B']);
            $stmt_insert_syllabus->bindParam(':C', $result['C']);
            $stmt_insert_syllabus->bindParam(':D', $result['D']);
            $stmt_insert_syllabus->bindParam(':Answer', $result['Answer']);
        
            $stmt_insert_actlog->bindParam(':syllabus', $syllabus);
            $stmt_insert_actlog->bindParam(':upload_time', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':accepted', $accepted);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':upload_name', $result['uploadedby']);
            $stmt_insert_actlog->bindParam(':yearqb', $result['Year']);
            $stmt_insert_actlog->bindParam(':subjqb', $result['Subject']);
            $stmt_insert_actlog->bindParam(':termqb', $result['Term']);
            $stmt_insert_actlog->bindParam(':semesterqb', $result['Semester']);
            $stmt_insert_actlog->bindParam(':questionqb', $result['Question']);
            $stmt_insert_actlog->bindParam(':A', $result['A']);
            $stmt_insert_actlog->bindParam(':B', $result['B']);
            $stmt_insert_actlog->bindParam(':C', $result['C']);
            $stmt_insert_actlog->bindParam(':D', $result['D']);
            $stmt_insert_actlog->bindParam(':Answers', $result['Answer']);
         
        
            if ($stmt_insert_syllabus->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM qbchecker_tbl WHERE id = :qbid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':qbid', $syllabusid, PDO::PARAM_INT);

                if ($stmt_delete->execute()) {
                    if (isset($_POST['acceptqb'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['acceptqb1'])) {
                        header("Location: ../ADMIN/questionbank.php");
                    }
                } else {
                    echo "Error deleting from qbchecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into questionbank_tbl or actlog_tbl.";
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in qbchecker_tbl";
    }
}












// decline qb checker

// decline

if (isset($_POST['declineqb']) || isset($_POST['declineqb1'])) {
    $qbcheckerid = $_POST['qbiddec'];

  
    $sql_select = "SELECT * FROM qbchecker_tbl WHERE id = :qbiddec";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':qbiddec', $qbcheckerid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        
        $sql_insert = "INSERT INTO qbdecline_tbl  (archiveDate, uploaderId, uploadedby, time_uploaded, Question, A, B, C, D, Answer, Subject, Year, Term, Semester) VALUES (:timea, :uploaderid, :uploadedby, :time_uploaded, :Question, :A, :B, :C, :D, :Answer, :Subject, :Year, :Term, :Semester)";
        $stmt_insert = $conn->prepare($sql_insert);

         
          $qb = "Question Bank";
          $decline = "Declined";
          $Question = "Question";
  
      
           $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, yearqb, subjqb, termqb, semesterqb, questionqb,  A, B, C, D, Answers) VALUES (:qb, :upload_time, :decline, :Question, :upload_name, :yearqb, :subjqb, :termqb, :semesterqb, :questionqb,  :A, :B, :C, :D, :Answers)";
          $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert) {
            $stmt_insert->bindParam(':timea', $formattedTimestamp);
            $stmt_insert->bindParam(':uploadedby', $result['uploadedby']);
            $stmt_insert->bindParam(':uploaderid', $result['uploaderId']);
            $stmt_insert->bindParam(':time_uploaded', $result['time_uploaded']);
            $stmt_insert->bindParam(':Question', $result['Question']);
            $stmt_insert->bindParam(':A', $result['A']);
            $stmt_insert->bindParam(':B', $result['B']);
            $stmt_insert->bindParam(':C', $result['C']);
            $stmt_insert->bindParam(':D', $result['D']);
            $stmt_insert->bindParam(':Answer', $result['Answer']);
            $stmt_insert->bindParam(':Subject', $result['Subject']);
            $stmt_insert->bindParam(':Year', $result['Year']);
            $stmt_insert->bindParam(':Term', $result['Term']);
            $stmt_insert->bindParam(':Semester', $result['Semester']);


            $stmt_insert_actlog->bindParam(':qb', $Question);
            $stmt_insert_actlog->bindParam(':upload_time', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':decline', $decline);
            $stmt_insert_actlog->bindParam(':Question', $qb);
            $stmt_insert_actlog->bindParam(':upload_name', $result['uploadedby']);
            $stmt_insert_actlog->bindParam(':yearqb', $result['Year']);
            $stmt_insert_actlog->bindParam(':subjqb', $result['Subject']);
            $stmt_insert_actlog->bindParam(':termqb', $result['Term']);
            $stmt_insert_actlog->bindParam(':semesterqb', $result['Semester']);
            $stmt_insert_actlog->bindParam(':questionqb', $result['Question']);
            $stmt_insert_actlog->bindParam(':A', $result['A']);
            $stmt_insert_actlog->bindParam(':B', $result['B']);
            $stmt_insert_actlog->bindParam(':C', $result['C']);
            $stmt_insert_actlog->bindParam(':D', $result['D']);
            $stmt_insert_actlog->bindParam(':Answers', $result['Answer']);


            if ($stmt_insert->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM qbchecker_tbl WHERE id = :qbiddec";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':qbiddec', $qbcheckerid, PDO::PARAM_INT);
 
                if ($stmt_delete->execute()) {
                    if (isset($_POST['declineqb'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['declineqb1'])) {
                        header("Location: ../ADMIN/questionbank.php");
                    }
                } else {
                    echo "Error deleting from syllabuschecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into syllabus_tbl: " . $stmt_insert->errorInfo()[2];
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in syllabuschecker_tbl";
    }
}






// decline syllabus

if (isset($_POST['decline']) || isset($_POST['decline1'])) {
    $syllabusid = $_POST['syllabusidec'];

    // Retrieve the row from syllabuschecker_tbl
    $sql_select = "SELECT * FROM syllabuschecker_tbl WHERE ID = :syllabusidec";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':syllabusidec', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into declinedsyllabus_tbl 
        $sql_insert = "INSERT INTO declinedsyllabus_tbl  (archiveDate, uploaderId, NameUpload, subj, subjCode, term, year, file, fileLoc, dateUpload) VALUES (:timea, :uploaderid, :NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload)";
        $stmt_insert = $conn->prepare($sql_insert);

          // Define variables for actlog_tbl
          $syllabus = "Syllabus";
          $decline = "Declined";
          $module = "Module";
  
          // Insert into actlog_tbl
          $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, subj, subjCode, terms, years, file, fileLoc) VALUES (:syllabus, :dateUpload, :decline, :module, :NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc)";
          $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert) {
            $stmt_insert->bindParam(':timea', $formattedTimestamp);
            $stmt_insert->bindParam(':uploaderid', $result['uploaderId']);
            $stmt_insert->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert->bindParam(':subj', $result['subj']);
            $stmt_insert->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert->bindParam(':term', $result['term']);
            $stmt_insert->bindParam(':year', $result['year']);
            $stmt_insert->bindParam(':file', $result['file']);
            $stmt_insert->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert->bindParam(':dateUpload', $result['dateUpload']);


            $stmt_insert_actlog->bindParam(':syllabus', $syllabus);
            $stmt_insert_actlog->bindParam(':dateUpload', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':decline', $decline);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_actlog->bindParam(':subj', $result['subj']);
            $stmt_insert_actlog->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_actlog->bindParam(':term', $result['term']);
            $stmt_insert_actlog->bindParam(':year', $result['year']);
            $stmt_insert_actlog->bindParam(':file', $result['file']);
            $stmt_insert_actlog->bindParam(':fileLoc', $result['fileLoc']);


            if ($stmt_insert->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from syllabuschecker_tbl
                $sql_delete = "DELETE FROM syllabuschecker_tbl WHERE ID = :syllabusidec";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':syllabusidec', $syllabusid, PDO::PARAM_INT);
 
                if ($stmt_delete->execute()) {
                    if (isset($_POST['decline'])) {
                        header("Location: ../ADMIN/dashboard.php");
                    } elseif (isset($_POST['decline1'])) {
                        header("Location: ../ADMIN/syllabus.php");
                    }
                } else {
                    echo "Error deleting from syllabuschecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into syllabus_tbl: " . $stmt_insert->errorInfo()[2];
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in syllabuschecker_tbl";
    }
}





//resotre QUESTION BANK ARCHIVE


if (isset($_POST['restoreqb'])) {
    $syllabusid = $_POST['resqbid'];

    // Retrieve the row from qbchecker_tbl
    $sql_select = "SELECT * FROM qbdecline_tbl WHERE id = :resqbid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':resqbid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into qbchecker_tbl
        $sql_insert_syllabus = "INSERT INTO qbchecker_tbl (Year, Subject, Term, Semester, uploadedby, time_uploaded, Question, A, B, C, D, Answer) VALUES (:Year, :Subject, :Term, :Semester, :uploadedby, :time_uploaded, :Question, :A, :B, :C, :D, :Answer)";
        $stmt_insert_syllabus = $conn->prepare($sql_insert_syllabus);

        
          // Define variables for actlog_tbl
          $type = "Unarchived Question";
          $ua = "Unarchived";
          $module = "Question Bank";
  
          // Insert into actlog_tbl
          $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, yearqb, subjqb, termqb, semesterqb, questionqb,  A, B, C, D, Answers) VALUES (:type, :upload_time, :ua, :module, :upload_name, :yearqb, :subjqb, :termqb, :semesterqb, :questionqb,  :A, :B, :C, :D, :Answers)";
          $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert_syllabus) {
            $stmt_insert_syllabus->bindParam(':Year', $result['Year']);
            $stmt_insert_syllabus->bindParam(':Subject', $result['Subject']);
            $stmt_insert_syllabus->bindParam(':Term', $result['Term']);
            $stmt_insert_syllabus->bindParam(':Semester', $result['Semester']);
            $stmt_insert_syllabus->bindParam(':uploadedby', $result['uploadedby']);
            $stmt_insert_syllabus->bindParam(':time_uploaded', $formattedTimestamp);
            $stmt_insert_syllabus->bindParam(':Question', $result['Question']);
            $stmt_insert_syllabus->bindParam(':A', $result['A']);
            $stmt_insert_syllabus->bindParam(':B', $result['B']);
            $stmt_insert_syllabus->bindParam(':C', $result['C']);
            $stmt_insert_syllabus->bindParam(':D', $result['D']);
            $stmt_insert_syllabus->bindParam(':Answer', $result['Answer']);


            $stmt_insert_actlog->bindParam(':type', $type);
            $stmt_insert_actlog->bindParam(':upload_time', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':ua', $ua);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':upload_name', $result['uploadedby']);
            $stmt_insert_actlog->bindParam(':yearqb', $result['Year']);
            $stmt_insert_actlog->bindParam(':subjqb', $result['Subject']);
            $stmt_insert_actlog->bindParam(':termqb', $result['Term']);
            $stmt_insert_actlog->bindParam(':semesterqb', $result['Semester']);
            $stmt_insert_actlog->bindParam(':questionqb', $result['Question']);
            $stmt_insert_actlog->bindParam(':A', $result['A']);
            $stmt_insert_actlog->bindParam(':B', $result['B']);
            $stmt_insert_actlog->bindParam(':C', $result['C']);
            $stmt_insert_actlog->bindParam(':D', $result['D']);
            $stmt_insert_actlog->bindParam(':Answers', $result['Answer']);
        
            if ($stmt_insert_syllabus->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from qbchecker_tbl
                $sql_delete = "DELETE FROM qbdecline_tbl WHERE id = :resqbid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':resqbid', $syllabusid, PDO::PARAM_INT);

                if ($stmt_delete->execute()) {
                    if (isset($_POST['restoreqb'])) {
                        header("Location: ../ADMIN/archive.php");
                    } 
                } else {
                    echo "Error deleting from qbchecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into qbchecker_tbl.";
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in qbchecker_tbl";
    }
}




// RESTORE SYLLABUS ARCHIVE
if (isset($_POST['restoresys'])) {
    $syllabusid = $_POST['ressysid'];

    // Retrieve the row from qbchecker_tbl
    $sql_select = "SELECT * FROM declinedsyllabus_tbl WHERE ID = :ressysid";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bindParam(':ressysid', $syllabusid, PDO::PARAM_INT);
    $stmt_select->execute();

    $result = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Insert the row into qbchecker_tbl
        $sql_insert_syllabus = "INSERT INTO syllabuschecker_tbl (NameUpload, subj, subjCode, term, year, file, fileLoc, dateUpload, uploaderId) VALUES (:NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc, :dateUpload, :ui)";
        $stmt_insert_syllabus = $conn->prepare($sql_insert_syllabus);


         // Define variables for actlog_tbl
         $type = "Unarchived Syllabus";
         $ua = "Unarchived";
         $module = "Module";
 
         // Insert into actlog_tbl
         $sql_insert_actlog = "INSERT INTO activitylog_tbl (type, upload_time, choice, type_content, upload_name, subj, subjCode, terms, years, file, fileLoc) VALUES (:type, :dateUpload, :ua, :module, :NameUpload, :subj, :subjCode, :term, :year, :file, :fileLoc)";
          $stmt_insert_actlog = $conn->prepare($sql_insert_actlog);

        if ($stmt_insert_syllabus) {
            $stmt_insert_syllabus->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_syllabus->bindParam(':subj', $result['subj']);
            $stmt_insert_syllabus->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_syllabus->bindParam(':term', $result['term']);
            $stmt_insert_syllabus->bindParam(':year', $result['year']);
            $stmt_insert_syllabus->bindParam(':file', $result['file']);
            $stmt_insert_syllabus->bindParam(':fileLoc', $result['fileLoc']);
            $stmt_insert_syllabus->bindParam(':dateUpload', $formattedTimestamp);
            $stmt_insert_syllabus->bindParam(':ui', $result['uploaderId']);

            
            $stmt_insert_actlog->bindParam(':type', $type);
            $stmt_insert_actlog->bindParam(':dateUpload', $formattedTimestamp);
            $stmt_insert_actlog->bindParam(':ua', $ua);
            $stmt_insert_actlog->bindParam(':module', $module);
            $stmt_insert_actlog->bindParam(':NameUpload', $result['NameUpload']);
            $stmt_insert_actlog->bindParam(':subj', $result['subj']);
            $stmt_insert_actlog->bindParam(':subjCode', $result['subjCode']);
            $stmt_insert_actlog->bindParam(':term', $result['term']);
            $stmt_insert_actlog->bindParam(':year', $result['year']);
            $stmt_insert_actlog->bindParam(':file', $result['file']);
            $stmt_insert_actlog->bindParam(':fileLoc', $result['fileLoc']);
         
        
            if ($stmt_insert_syllabus->execute() && $stmt_insert_actlog->execute()) {
                // Delete the row from qbchecker_tbl
                $sql_delete = "DELETE FROM declinedsyllabus_tbl WHERE ID = :ressysid";
                $stmt_delete = $conn->prepare($sql_delete);
                $stmt_delete->bindParam(':ressysid', $syllabusid, PDO::PARAM_INT);

                if ($stmt_delete->execute()) {
                    if (isset($_POST['restoresys'])) {
                        header("Location: ../ADMIN/archive.php");
                    } 
                } else {
                    echo "Error deleting from qbchecker_tbl: " . $stmt_delete->errorInfo()[2];
                }
            } else {
                echo "Error inserting into qbchecker_tbl.";
            }
        } else {
            echo "Error preparing the insert statement: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Row not found in qbchecker_tbl";
    }
}




?>