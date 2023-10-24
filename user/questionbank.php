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
    <div class="pb-4 flex justify-between">
        <h1 class="font-bold text-2xl">Add Question to the Question Bank.</h1>
    </div>
    <div class="border-t py-2">
        <div class="mb-4 md:mb-6 bg-white flex flex-col md:flex-row justify-between">
            <div class="w-full md:w-1/2 lg:w-2/3 text-lg md:text-xl font-semibold text-left text-gray-900">
                Submit Questions using excel.
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
            </div>
            <div class="mt-2 md:mt-0 w-full md:w-1/2 lg:w-1/3">
                <button type="button" class="md:ml-auto text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 flex items-center gap-2">
                <h1>Download Excel file Template</h1>
                <svg class="w-[16px] h-[16px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/>
                    <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                </svg>
                <!-- <svg class="w-[16px] h-[16px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4"/>
                </svg> -->
                </button>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Excel file here</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 w-full lg:w-2/3 lg:w-50" id="file_input" type="file" required>
            <div class="mt-2">
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Submit Excel file</button>
            </div>
        </form>
    </div>
    
    <form id="addQuestionForm" action="" method="post">
        <div class="py-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 border-y">
            <div class="question-card p-4 border rounded-lg">
                    <div class="grid grid-cols-3 gap-2">
                        <div class="col-span-3">
                            <?php
                                $sql = "SELECT * FROM subject_tbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <label for="qbank_subject-user" class="block my-2 text-sm font-medium text-gray-900">Subject</label>
                            <select id="qbank_subject-user" name="qbank_subject-user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose the Subject</option>
                                <?php foreach ($subjects as $row): ?>
                                    <option value="<?php echo $row['subjectName']; ?>"><?php echo $row['subjectName']; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        <div class="col-span-1">
                            <label for="qbank_year-user" class="block my-2 text-sm font-medium text-gray-900">Year</label>
                            <select id="qbank_year-user" name="qbank_year-user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Year</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="qbank_term-user" class="block my-2 text-sm font-medium text-gray-900">Term</label>
                            <select id="qbank_term-user" name="qbank_term-user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Term</option>
                                <option value="Prelim">Prelim</option>
                                <option value="Midterm">Midterm</option>
                                <option value="Endterm">Endterm</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="qbank_sem-user" class="block my-2 text-sm font-medium text-gray-900">Semester</label>
                            <select id="qbank_sem-user" name="qbank_sem-user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="3rd Semester">3rd Semester</option>
                            </select>
                        </div>
                        <div class="col-span-3">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Question</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write the question here..."></textarea>
                        </div>
                        <div class="col-span-3">
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                    <h1 class="font-semibold">A.</h1>
                                </span>
                                <input type="text" id="choice_a" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice A here..." required>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                    <h1 class="font-semibold">B.</h1>
                                </span>
                                <input type="text" id="choice_b" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice B here..." required>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                    <h1 class="font-semibold">C.</h1>
                                </span>
                                <input type="text" id="choice_c" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice C here..." required>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                    <h1 class="font-semibold">D.</h1>
                                </span>
                                <input type="text" id="choice_d" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" placeholder="Type Choice D here..." required>
                            </div>
                        </div>
                    </div>
            </div>
            <button id="add_question-btn" type="button" class="p-4 border rounded-lg flex justify-center items-center hover:bg-gray-50 text-gray-500">
                <svg class="w-[32px] h-[32px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 1v16M1 9h16"/>
                </svg>
            </button>
        </div>
    </form>
    <div class="py-4 flex justify-end">
        <button form="addQuestionForm" type="submit" class="text-white bg-main group hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 mr-2 mb-2 flex items-center gap-2 text-start">
            <div>
                <h1 class="font-medium">Submit Questions</h1>
                <h2 class="text-xs">Add the questions to the Question Bank.</h2>
            </div>
            <svg class="w-[16px] h-[16px] dark:text-white group-hover:translate-x-1 transition ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
            </svg>
        </button>
    </div>
</main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
</script>
</body>
</html>