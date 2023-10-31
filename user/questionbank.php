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
<main class="sm:ml-[64px] sm:ml-6 p-4 md:p-6 mt-[60px]">
    <div class="flex flex-col md:flex-row divide-y md:divide-x md:divide-y-0">
        <div class="p-0 md:pr-4 md:w-2/3 h-full md:pt-4">
            <?php 
            include "../php/success.user_insert.php";
            ?>
            <div class="pb-6">
                <div class="mb-4 md:mb-6 bg-white flex flex-col lg:flex-row justify-between">
                    <div class="w-full text-lg md:text-xl font-semibold text-left text-gray-900">
                        Submit Questions using excel.
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">You can easily upload multiple-choice questions and other related details using <span class="text-green-600 font-semibold italic">Excel</span>. You can download our <a href="../files/excel/questionbank_file_template.xlsx" class="text-green-600 underline hover:no-underline">Excel template</a>. This template is specifically designed to make the question submission process as seamless as possible.</p>
                    </div>
                </div>
                <form action="../php/user_insert-excel.php" method="post" enctype="multipart/form-data" class="">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-3">
                            <?php
                                $sql = "SELECT * FROM subject_tbl ORDER BY subjectName ASC";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <label for="excel_file_subj" class="block my-2 text-sm font-medium text-gray-900">Subject</label>
                            <select id="excel_file_subj" name="excel_file_subj" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose the Subject</option>
                                <?php foreach ($subjects as $row): ?>
                                    <option value="<?php echo $row['subjectName']; ?>"><?php echo $row['subjectName']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        <div class="col-span-1">
                            <label for="excel_file_year" class="block my-2 text-sm font-medium text-gray-900">Year</label>
                            <select id="excel_file_year" name="excel_file_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Year</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="excel_file_term" class="block my-2 text-sm font-medium text-gray-900">Term</label>
                            <select id="excel_file_term" name="excel_file_term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Term</option>
                                <option value="Prelim">Prelim</option>
                                <option value="Midterm">Midterm</option>
                                <option value="Endterm">Endterm</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="excel_file_sem" class="block my-2 text-sm font-medium text-gray-900">Semester</label>
                            <select id="excel_file_sem" name="excel_file_sem" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="3rd Semester">3rd Semester</option>
                            </select>
                        </div>
                        <div class="col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Excel file here</label>
                            <div class="flex items-center gap-2">
                                <div class="grow">
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="file_input" name="excel" type="file" required>
                                </div>
                                <div class="">
                                    <button type="submit" name="submit_excel" class="whitespace-nowrap focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">Submit Excel file</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="py-6 border-t">
                <div class="mb-4 md:mb-6 bg-white flex flex-col lg:flex-row justify-between">
                    <div class="w-full text-lg md:text-xl font-semibold text-left text-gray-900">
                        Submit Questions by filling up forms.
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="">No of Questions</label>
                    <div class="flex items-center gap-2">
                        <div class="min-w-0">
                            <input id="no_of_cards" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="" type="number" placeholder="Enter no. of Questions" required>
                        </div>
                        <div class="">
                            <button id="no_of_cards-btn" type="button" class="whitespace-nowrap focus:outline-none text-white bg-main hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2.5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <form id="addQuestionForm" action="../php/insert_qbank.php" method="post" class="">
                    <div class="mt-4 py-4 grid grid-cols-1 lg:grid-cols-2 gap-2 border-y relative">
                        
                        <div class="col-span-2 add-question-btn px-20 py-40 border rounded-lg flex justify-center items-center bg-gray-50">
                            <!-- <svg class="w-[32px] h-[32px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 1v16M1 9h16"/>
                            </svg> -->
                        </div>
                        <div>
                            <input type="hidden" name="no_of_questions" id="no_of_questions">
                        </div>
                    </div>
                </form>
            </div>

            <div class="py-4 flex justify-end">
                <button form="addQuestionForm" type="submit" name="insert_questions" class="submitQuestionbtn text-white bg-main group hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 mr-2 mb-2 flex items-center gap-2 text-start">
                    <div>
                        <h1 class="font-medium">Submit Questions</h1>
                        <h2 class="text-xs">Add the questions to the Question Bank.</h2>
                    </div>
                    <svg class="w-[16px] h-[16px] dark:text-white group-hover:translate-x-1 transition ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                    </svg>
                </button>
            </div>
        </div>
        <aside class="py-4 pl-4 lg:pl-6 md:w-1/3">
            <div class="h-full">
                <div class="mb-4">
                    <h1 class="text-xl font-semibold">Pending</h1>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Wait for the admin to accept these files and be displayed at the Syllabus.</p>
                </div>
                <div>
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700 border-y ">
                        <?php
                            $sql = "SELECT q.Question, q.Subject, q.time_uploaded FROM qbchecker_tbl q LEFT JOIN accounts_tbl a ON q.uploaderId = a.ID WHERE a.ID = {$_SESSION['ID']} ORDER BY q.time_uploaded ASC";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php 
                        if (count($questions) == 0) {
                            ?> 
                            <li class="py-3 sm:py-4 px-4 text-center text-gray-500">
                                <h1>No Pending Questions.</h1>
                            </li>
                            <?php
                        } else {
                        foreach ($questions as $row): 
                        ?>
                        <li class="py-3 sm:py-4 px-4 hover:bg-gray-100">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 ">
                                    <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-600 truncate dark:text-white">
                                        <?php echo $row['Question'];?>
                                    </p>
                                    <p class="text-xs text-gray-500 truncate dark:text-gray-400">
                                        <?php echo $row['Subject'];?>
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-400 dark:text-white">
                                    <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; }?>

                    </ul>
                </div>
            </div>
        </aside>
    </div>
    
</main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 3000);
    $("#no_of_cards-btn").click(function() {
        // Get the number of cards from the input field
        let noOfCards = $("#no_of_cards").val();
        $('#no_of_questions').val(noOfCards)
        // Remove any existing question cards
        $(".question-card").remove();

        // Generate question cards based on the user's input
        for (let i = 1; i <= noOfCards; i++) {
            let form = generateQuestionCard(i);
            $(".add-question-btn").before(form);
        }
        $(".add-question-btn").addClass('hidden')
        if (noOfCards == 0) {
            $(".add-question-btn").removeClass('hidden')
        }

    });
    function generateQuestionCard(i) {
        let subj = `qbank_subject-user${i}`;
        let year = `qbank_year-user${i}`;
        let term = `qbank_term-user${i}`;
        let sem = `qbank_sem-user${i}`;
        let quest = `qbank_question-user${i}`;
        let a = `choice_a-user${i}`;
        let b = `choice_b-user${i}`;
        let c = `choice_c-user${i}`;
        let d = `choice_d-user${i}`;
        let ans = `qb_answer-user${i}`;

        let form = `
        <div class="question-card p-4 border rounded-lg">
            <div class="grid grid-cols-3 gap-2">
                <div class="col-span-3">
                    <?php
                        $sql = "SELECT * FROM subject_tbl ORDER BY subjectName ASC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <label for="${subj}" class="block my-2 text-sm font-medium text-gray-900">Subject</label>
                    <select id="${subj}" name="${subj}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose the Subject</option>
                        <?php foreach ($subjects as $row): ?>
                            <option value="<?php echo $row['subjectName']; ?>"><?php echo $row['subjectName']; ?></option>
                        <?php endforeach; ?>
                    </select> 
                </div>
                <div class="col-span-1">
                    <label for="${year}" class="block my-2 text-sm font-medium text-gray-900">Year</label>
                    <select id="${year}" name="${year}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose Year</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="${term}" class="block my-2 text-sm font-medium text-gray-900">Term</label>
                    <select id="${term}" name="${term}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose Term</option>
                        <option value="Prelim">Prelim</option>
                        <option value="Midterm">Midterm</option>
                        <option value="Endterm">Endterm</option>
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="${sem}" class="block my-2 text-sm font-medium text-gray-900">Semester</label>
                    <select id="${sem}" name="${sem}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose Semester</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="3rd Semester">3rd Semester</option>
                    </select>
                </div>
                <div class="col-span-3">
                    <label for="${quest}" class="block mb-2 text-sm font-medium text-gray-900">Question</label>
                    <textarea id="${quest}" rows="4" name="${quest}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write the question here..."></textarea>
                </div>
                <div class="col-span-3">
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <h1 class="font-semibold">A.</h1>
                        </span>
                        <input type="text" id="${a}" name="${a}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice A here..." required>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <h1 class="font-semibold">B.</h1>
                        </span>
                        <input type="text" id="${b}" name="${b}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice B here..." required>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <h1 class="font-semibold">C.</h1>
                        </span>
                        <input type="text" id="${c}" name="${c}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice C here..." required>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                            <h1 class="font-semibold">D.</h1>
                        </span>
                        <input type="text" id="${d}" name="${d}" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice D here..." required>
                    </div>
                </div>
                <div class="col-span-3">
                    <label for="${ans}" class="block my-2 text-sm font-medium text-gray-900">Answer</label>
                    <select id="${ans}" name="${ans}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose Answer</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
        </div>`

        return form;
    }
});
</script>
</body>
</html>