<?php 
include '../php/conn.php';
include '../php/user_session.php';



function generateRandomString($length = 6) {
    $characters = 'A1B2C3D4EF5GH6IJ7KL8MN9OP0QRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <link rel="stylesheet" href="../src/css/testpaper.css">
    <title>Exam Maker | TUPV Syllabus System</title>
</head>
<body>
<div class="print-hide">
<?php 
$page = 'exammaker';
include "../php/user_header.php";
?>
</div>

<main class="print-hide sm:ml-[64px] p-4 md:p-6 sm:ml-6 mt-[60px] relative">
    <?php 
        include "../php/success.user_insert.php";
    ?>
    <div class="flex flex-col lg:flex-row lg:divide-x">
        <aside class="lg:w-1/3 pr-4 py-4">
            <div class="mb-4">
                <h1 class="text-xl font-semibold">Exam Maker</h1>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Generate a paper for the exam.</p>
            </div>
            <?php

            $sqlYear = "SELECT DISTINCT Year FROM questionbank_tbl";
            $stmtYear = $conn->prepare($sqlYear);
            $stmtYear->execute();
            $years = $stmtYear->fetchAll(PDO::FETCH_COLUMN);

            ?>
            <form id="exam_generate-form" action="exammaker.php" method="post">
                <div class="grid grid-cols-2 gap-4 border-b pb-4">
                    <div class="col-span-2">
                        <div class="col-span-1">
                            <label for="exam_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                            <select id="exam_year" name="exam_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose the Year</option>
                                <?php foreach ($years as $year): ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="exam_subj" class="block my-2 text-sm font-medium text-gray-900">Subject</label>
                        <select id="exam_subj" name="exam_subj" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected disabled hidden value="">Choose the Subject</option>
                        </select> 
                    </div>

                    <div class="col-span-2">
                        <label for="exam_term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term</label>
                        <select id="exam_term" name="exam_term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected disabled hidden value="">Choose the Term</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="exam_semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester</label>
                        <select id="exam_semester" name="exam_semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected disabled hidden value="">Choose the Semester</option>
                        </select>
                    </div>
                    <div class="col-span-2 border-t pt-4">
                        <label for="part" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exam Parts</label>
                        <select name="part" id="part"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option disabled selected hidden> Choose how many parts </option>
                            <option value ="1"> 1 part </option>
                            <option value ="2"> 2 parts </option>
                            <option value ="3"> 3 parts </option>
                        </select>
                    </div>
                                
    
                    <div id="testPartsContainer" class="col-span-2 grid grid-cols-2 gap-2">
                        <!-- Test parts will be appended here -->
                    </div>
                    <div class="col-span-2 flex items-center gap-2"> 
                        <h4 class="text-xs text-secondary">Available Questions:</h4>
                        <h4  class="text-s text-main" id="content_count">0</h4>    
                    </div>
                </div>
            </form>
            <div class="mt-4">
                <button form="exam_generate-form" type="submit" name="generate_exam" class="focus:outline-none text-white bg-main hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm ml-auto px-5 py-2.5 group flex items-center gap-2 text-start">
                    <div>
                        Generate Exam Questions
                    </div>
                    <svg class="w-[16px] h-[16px] dark:text-white group-hover:translate-x-1 transition ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                    </svg>
                </button>
            </div>
        </aside>
        <div class="grow h-[88vh] overflow-auto overflow-x-hidden lg:w-2/3">
            <h1 class="text-xl font-semibold p-4 sticky">Questions</h1>
            <form id="insertForm" action="./test1.php" method="post" onsubmit="return confirm('Are you sure you want to decline this?');">
                <div class="p-4 h-full flex flex-col gap-2">
                    <?php 
                    if(isset($_POST['generate_exam'])) {
                        $UC =  generateRandomString();
                        $sub = $_POST['exam_subj'];
                        $year = $_POST['exam_year'];
                        $term = $_POST['exam_term'];
                        $sem = $_POST['exam_semester'];
                        $parts = $_POST['part'];

                        $i = 1;
                        
                        for ($partNumber = 1; $partNumber <= $parts; $partNumber++) {
                            // Calculate number of questions for the current part
                            $currentPartKey = 'testpart' . $partNumber;
                            $noq = !empty($_POST[$currentPartKey]) ? (int)$_POST[$currentPartKey] : 0;

                            // Your existing SQL query and preparation
                            $sql = "SELECT * FROM `questionbank_tbl` WHERE Subject LIKE :subject AND Year LIKE :year AND Term LIKE :term AND Semester LIKE :semester ORDER BY RAND() LIMIT :number_of_items";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':subject', $sub);
                            $stmt->bindParam(':year', $year);
                            $stmt->bindParam(':term', $term);
                            $stmt->bindParam(':semester', $sem);
                            $stmt->bindParam(':number_of_items', $noq);
                            $stmt->execute();
                            $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($questions) === 0) {
                                ?>
                                <div class="bg-light border p-4 rounded-lg">
                                    <h1 class="text-center">No questions found for the following criteria.</h1>
                                </div>
                                <?php
                            } else {
                                
                                ?>
                                <div class="flex items-center">
                                    <div class="flex w-3/4 gap-2 items-center">
                                        <h1 class="font-bold text-lg">Test <?php echo $partNumber; ?>: Multiple Choice</h1><span id="points<?php echo $partNumber; ?>" class="points font-medium"></span>
                                    </div>

                                </div>
                                <?php
                                foreach ($questions as $row):
                                    ?>
                                    <div class="bg-light grid grid-cols-4 text-xs border p-4 gap-x-2 rounded-lg">
                                        <div class="col-span-4">
                                            <h2><?php echo $i; ?>.) <?php echo htmlspecialchars($row['Question']); ?></h2>
                                        </div>
                                        <div class="col-span-4">
                                            <span>A.</span> <?php echo htmlspecialchars($row['A']); ?>
                                        </div>
                                        <div class="col-span-4">
                                            <span>B.</span> <?php echo htmlspecialchars($row['B']); ?>
                                        </div>
                                        <div class="col-span-4">
                                            <span>C.</span> <?php echo htmlspecialchars($row['C']); ?>
                                        </div>
                                        <div class="col-span-4">
                                            <span>D.</span> <?php echo htmlspecialchars($row['D']); ?>
                                        </div>
                                        <div class="col-span-1">
                                            <input type="hidden" name = "term"  value = "<?php echo $term ?>">
                                        </div>
                                        <div class="col-span-1">
                                            <input type="hidden" name = "sub"  value = "<?php echo $sub ?>">
                                        </div>
                                        <div class="col-span-1">
                                            <input type="hidden" name = "sem"  value = "<?php echo $sem ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="text" name = "Question<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['Question']); ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="hidden" name = "A<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['A']); ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="hidden" name = "B<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['B']); ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="hidden" name = "C<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['C']); ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="hidden" name = "D<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['D']); ?>">
                                        </div>
                                        <div class="col-span-4">
                                            <input type="hidden" name = "ans<?php echo $i; ?>"  value = "<?php echo htmlspecialchars($row['Answer']); ?>">
                                            <input type="hidden" name = "ID<?php echo $i; ?>"  value = "<?php echo $row['ID']; ?>">
                                            <input type="hidden" name = "test_part<?php echo $i; ?>"  value = "<?php echo $partNumber; ?>">
                                            <input type="hidden" name = "uc"  value = "<?php echo $UC ?>">
                                        </div>
                                    </div>
                                    <?php 
                                    $i++;
                                endforeach;
                            }
                        }
                        ?>
                
                </div>   
            </form> 
        </div>
    </div>
    <div class="fixed right-6 bottom-6">    
        <button form="insertForm" type="submit" id="print-btn" name="print_btn" class="cursor-pointer text-white bg-main hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm p-4 text-center" data-tooltip-target="tooltip-print" data-tooltip-placement="left">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
            </svg>
            <h1 class="hidden" id="no_of_items"><?= $i-1?></h1>
        </button>

        <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Print Exam
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div> 
</main>

<?php 
} else {
    ?>
    <div class="bg-light p-4 rounded-lg">
        <h1 class="text-center">Please fill up the form to generate the exam questions.</h1>
    </div>
    <?php
}
?>




<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../src/js/exammaker.js"></script>
<script>


$(document).ready(function () {
    $('#print-btn').click(function () {
    //    // Get the content of the #no_of_items element
    //    var noOfItems = $('#no_of_items').text();

    //     // Create a link element
    //     var downloadLink = $('<a></a>');

    //     // Set the href attribute to the dynamically generated file path
    //     downloadLink.attr('href', `../files/answersheets/${noOfItems}_items.docx`);

    //     // Set the download attribute to specify the file name
    //     downloadLink.attr('download', `${noOfItems}_items.docx`);

    //     // Append the link to the body
    //     $('body').append(downloadLink);

    //     // Trigger a click on the link to start the download
    //     downloadLink[0].click();

    //     // Remove the link from the body
    //     downloadLink.remove();
        // Send an AJAX request to your PHP script to insert data into the database
        // $.ajax({
        //     url: '.test1.php',
        //     type: 'POST',
        //     data: $('#insertForm').serialize(),
        //     success: function (response) {
        //         // Handle the response, e.g., show an alert or redirect to another page
             
        //     },
        //     error: function () {
        //         alert('An error occurred while sending data to the server.');
        //     }
        // });

        // // Trigger the print action
        // window.print();
    });

    setTimeout(function () {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 3000);

    $('.text-truncate').each(function () {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
});




    $('#exam_year').change(function () {
    var selectedYear = $(this).val();

    // Send an AJAX request to get available subjects for the selected year
    $.ajax({
        type: 'POST',
        url: './getcontent.php',
        data: { year: selectedYear, action: 'populate' },
        success: function (data) {
            // Update the Subject dropdown with available options
            $('#exam_subj').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('AJAX Error:', textStatus, errorThrown);
        }
    });
});

$('#exam_subj').change(function () {
    var selectedSubj = $(this).val();

    // Send an AJAX request to get available terms for the selected subject
    $.ajax({
        type: 'POST',
        url: './getcontent.php',
        data: { subject: selectedSubj, action: 'populate' },
        success: function (data) {
            // Update the Term dropdown with available options
            $('#exam_term').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('AJAX Error:', textStatus, errorThrown);
        }
    });
});

$('#exam_term').change(function () {
    var selectedTerm = $(this).val();

    // Send an AJAX request to get available semesters for the selected term
    $.ajax({
        type: 'POST',
        url: './getcontent.php',
        data: { term: selectedTerm, action: 'populate' },
        success: function (data) {
            // Update the Semester dropdown with available options
            $('#exam_semester').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('AJAX Error:', textStatus, errorThrown);
        }
    });
});



$('#exam_semester').change(function () {
    var selectedYear = $('#exam_year').val();
    var selectedSubj = $('#exam_subj').val();
    var selectedTerm = $('#exam_term').val();
    var selectedSemester = $(this).val();

    // Send an AJAX request to get the count for the selected semester
    $.ajax({
        type: 'POST',
        url: './getcontent.php',
        data: { 
            year: selectedYear,
            subject: selectedSubj,
            term: selectedTerm,
            sem: selectedSemester,
            action: 'count'
        },
        success: function (data) {
            // Clear the existing content and update the h4 element with the count
            $('#content_count').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('AJAX Error:', textStatus, errorThrown);
        }
    });
});








// // Function to update the content count based on selected filters
// function updateContentCount() {
//     var selectedYear = $('#exam_year').val();
//     var selectedSubj = $('#exam_subj').val();
//     var selectedTerm = $('#exam_term').val();
//     var selectedSemester = $('#exam_semester').val();

//     // Send an AJAX request to get the content count
//     $.ajax({
//         type: 'POST',
//         url: './getcontent.php',
//         data: {
//             year: selectedYear,
//             subject: selectedSubj,
//             term: selectedTerm,
//             semester: selectedSemester
//         },
//         success: function (data) {
//             // Update the content count in the h4 element
//             $('#content_count').text(data);
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             console.log('AJAX Error:', textStatus, errorThrown);
//         }
//     });
// }

// // Attach change event handlers to all dropdowns
// $('#exam_year, #exam_subj, #exam_term, #exam_semester').change(updateContentCount);

// // Initial call to populate content count
// updateContentCount();




</script>



</body>
</html>