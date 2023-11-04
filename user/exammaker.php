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

                        <div class="col-span-1"> 
                            <h4 class="text-xs text-secondary">Available Questions:</h4>
                            <h4  class="text-s text-main" id="content_count">0</h4>
                        </div>
                       

        <div class="col-span-2">
            <label for="exam_no_of_items" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. of Items</label>
            <input id="exam_no_of_items" name="exam_no_of_items" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="" type="number" placeholder="Enter no. of Questions" required min="1" max="60">
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
            <div class="p-4 h-full flex flex-col gap-2">
                <?php 
                if(isset($_POST['generate_exam'])) {
                    $noq = $_POST['exam_no_of_items'];
                    $sub = $_POST['exam_subj'];
                    $year = $_POST['exam_year'];
                    $term = $_POST['exam_term'];
                    $sem = $_POST['exam_semester'];

                    $sql = "SELECT * FROM `questionbank_tbl` WHERE Subject LIKE :subject AND Year LIKE :year AND Term LIKE :term AND Semester LIKE :semester ORDER BY RAND() LIMIT :number_of_items";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(':subject', $sub);
                    $stmt->bindParam(':year', $year);
                    $stmt->bindParam(':term', $term);
                    $stmt->bindParam(':semester', $sem);
                    $stmt->bindParam(':number_of_items', $noq);

                    $stmt->execute();
                    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $removedRows = isset($_POST['removed_rows']) ? $_POST['removed_rows'] : array();
                    if (count($questions) === 0) {
                        ?>
                        <div class="bg-light border p-4 rounded-lg">
                            <h1 class="text-center">No questions found for the following criteria.</h1>
                        </div>
                        <?php
                    } else {
                        $i = 1;
                        foreach ($questions as $row):
                        ?>
                        <div class="bg-light grid grid-cols-4 text-xs border p-4 gap-x-2 rounded-lg relative">
                            <div class="col-span-4">
                                <h1><?php echo $i ?>.) <?php echo $row['Question']; ?></h1>
                            </div>
                            <div class="col-span-4">
                                <span>A.</span> <?php echo $row['A']; ?>
                            </div>
                            <div class="col-span-4">
                                <span>B.</span> <?php echo $row['B']; ?>
                            </div>
                            <div class="col-span-4">
                                <span>C.</span> <?php echo $row['C']; ?>
                            </div>
                            <div class="col-span-4">
                                <span>D.</span> <?php echo $row['D']; ?>
                            </div>
                        </div>     
                        <?php 
                        $i++;
                        endforeach;
                    }
                    ?>
                    <?php
                ?>   
            </div>    
        </div>
    </div>
    <div class="fixed right-6 bottom-6">
        <form action="../php/user_print.php" method="post">
            <button type="submit" id="print-btn" name="print_btn" class="cursor-pointer text-white bg-main hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm p-4 text-center" data-tooltip-target="tooltip-print" data-tooltip-placement="left">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                    <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                </svg>
            </button>
        </form>
        <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Print Exam
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</main>
<section id="testpaper-container" class="hidden">
    <header class="text-xs mb-4">
        <div class="grid grid-cols-9">
            <div class="col-span-1">
                <img class="object-cover " src="../src/img/tupvlogo.png" alt="">
            </div>
            <div class="col-span-7 flex flex-col gap-2 grow text-center">
                <div>
                    <h1 class="font-bold text-sm">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                    <h2 class="">Capt. Sabi St., City of Talisay, Negros Occidental</h2>
                </div>
                <div>
                    <h3>OFFICE OF THE COLLEGE DEAN</h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold"><?php echo $term ?> Exam</h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold underline"><?php echo $sub ?></h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold underline"><?php echo $sem ?>, 2023-2024</h3>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
        <!-- <div class="text-sm flex flex-col gap-3">
            <div class="grid grid-cols-4 gap-2">
                <div class="col-span-3 flex">
                    <p class="whitespace-nowrap">Name:</p>
                    <div class="w-full border-b border-black relative">
                        <div class="relative top-[1rem] text-[10px]">
                            <div class="grid grid-cols-7">
                                <div class="col-span-3">Last Name</div>
                                <div class="col-span-3">First Name</div>
                                <div class="col-span-1">M.I</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 flex">
                    <p class="whitespace-nowrap">Yr. & Sec.</p>
                    <div class="w-full border-b border-black relative">
                    </div>
                </div>
                <div class="col-span-1 flex gap-2">
                    <p>Score</p>
                    <div class="relative">
                        <div class="top-[-3.7rem] absolute w-20 h-20 border-2 border-black"></div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-2 flex">
                    <p class="whitespace-nowrap">Instructor:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
                <div class="col-span-2 flex">
                    <p class="whitespace-nowrap">Proctor:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
                <div class="col-span-1 flex gap-2">
                    <p>Date:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
            </div>
        </div> -->
    </header>
    <div>
        <h1 class="text-center text-sm font-bold mb-6">QUESTIONAIRE</h1>
        <?php 
        $i = 1;
        foreach ($questions as $row):
        ?>
        <div class="grid grid-cols-4 text-xs relative my-2">
            <div class="col-span-4">
                <h1><?php echo $i ?>.) <?php echo $row['Question']; ?></h1>
            </div>
            <div class="col-span-4">
                <span>A.</span> <?php echo $row['A']; ?>
            </div>
            <div class="col-span-4">
                <span>B.</span> <?php echo $row['B']; ?>
            </div>
            <div class="col-span-4">
                <span>C.</span> <?php echo $row['C']; ?>
            </div>
            <div class="col-span-4">
                <span>D.</span> <?php echo $row['D']; ?>
            </div>
        </div>     
        <?php 
        $i++;
        endforeach;
        ?>
    </div>
</section>
<div class="pagebreak hidden"></div>
<section id="answersheet-container" class="hidden">
    <header class="text-xs mb-4">
        <div class="grid grid-cols-9">
            <div class="col-span-1">
                <img class="object-cover " src="../src/img/tupvlogo.png" alt="">
            </div>
            <div class="col-span-7 flex flex-col gap-2 grow text-center">
                <div>
                    <h1 class="font-bold text-sm">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                    <h2 class="">Capt. Sabi St., City of Talisay, Negros Occidental</h2>
                </div>
                <div>
                    <h3>OFFICE OF THE COLLEGE DEAN</h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold"><?php echo $term ?> Exam</h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold underline"><?php echo $sub ?></h3>
                </div>
                <div>
                    <h3 class="uppercase font-bold underline"><?php echo $sem ?>, 2023-2024</h3>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
        <div class="text-sm flex flex-col gap-3">
            <div class="grid grid-cols-4 gap-2">
                <div class="col-span-3 flex">
                    <p class="whitespace-nowrap">Name:</p>
                    <div class="w-full border-b border-black relative">
                        <div class="relative top-[1rem] text-[10px]">
                            <div class="grid grid-cols-7">
                                <div class="col-span-3">Last Name</div>
                                <div class="col-span-3">First Name</div>
                                <div class="col-span-1">M.I</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 flex">
                    <p class="whitespace-nowrap">Yr. & Sec.</p>
                    <div class="w-full border-b border-black relative">
                    </div>
                </div>
                <!-- <div class="col-span-1 flex gap-2">
                    <p>Score</p>
                    <div class="relative">
                        <div class="top-[-3.7rem] absolute w-20 h-20 border-2 border-black"></div>
                    </div>
                </div> -->
            </div>
            <div class="grid grid-cols-5 gap-2">
                <div class="col-span-2 flex">
                    <p class="whitespace-nowrap">Instructor:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
                <div class="col-span-2 flex">
                    <p class="whitespace-nowrap">Proctor:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
                <div class="col-span-1 flex gap-2">
                    <p>Date:</p>
                    <div class="w-full border-b border-black">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div>
        <div class="">
            <h1 class="text-center text-sm font-bold">ANSWERSHEET</h1>
            <div class="grid grid-cols-3 mt-6">
                    <?php 
                    $i = 1;
                    $totalQuestions = count($questions);
                    echo '<div class="col-span-1">'; // Open the initial col-span-1 div
                    foreach ($questions as $row):
                    ?>
                    <div class="grid grid-cols-10 text-xs content-center circles ">
                        <div class="col-span-1 py-2 align-middle">
                            <h1><?php echo $i ?>.)</h1>
                        </div>
                        <div class="col-span-6 flex mx-2 py-2 px-1 border-black border-x-2 w-full justify-center gap-2">
                            <div class="">
                                <div class="w-4 h-4  rounded-full border border-black"></div>
                            </div>
                            <div class="">
                                <div class="w-4 h-4  rounded-full border border-black"></div>
                            </div>
                            <div class="">
                                <div class="w-4 h-4  rounded-full border border-black"></div>
                            </div>
                            <div class="">
                                <div class="w-4 h-4  rounded-full border border-black"></div>
                            </div>
                        </div>
                    </div>     
                    <?php 
                    if ($i % 20 === 0 && $i !== $totalQuestions) {
                        echo '</div><div class="col-span-1">'; // Close the previous col-span-1 div and open a new one for the next set of questions
                    }
                    $i++;
                    endforeach;
                    echo '</div>'; // Close the last col-span-1 div at the end
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
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
<script>


    $(document).ready(function (){
        $('#print-btn').click(function(){
        window.print();
        });
        setTimeout(function() {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 3000);
    $('.text-truncate').each(function() {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
    })




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