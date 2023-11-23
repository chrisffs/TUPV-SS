<?php
include '../php/conn.php';

$uniquecode = isset($_GET['uniquecode']) ? $_GET['uniquecode'] : '';
$term = isset($_GET['Term']) ? $_GET['Term'] : '';
$sub = isset($_GET['Subj']) ? $_GET['Subj'] : '';
$sem = isset($_GET['Semester']) ? $_GET['Semester'] : '';
$sets = isset($_GET['Sets']) ? $_GET['Sets'] : '';
$stmt = $conn->prepare('SELECT * FROM generatedquestions_tbl2 WHERE UniqueCode = ?');
$stmt->execute([$uniquecode]);
$questions = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <link rel="stylesheet" href="../src/css/testpaper.css">
    <title>Document</title>
</head>
<body>
    
<div class="paper-container w-4/5 flex flex-col items-center">

    <section id="test_paper" class="w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                        <h3 class="uppercase font-bold" type = "text" name = "term"><?php echo $term ?> Exam</h3>
                        <input type="hidden" name = "term"  value = "<?php echo $term ?>">
                        <input type="hidden" name = "noq"  value = "<?php echo $noq ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sub"><?php echo $sub ?></h3>
                        <input type="hidden" name = "sub"  value = "<?php echo $sub ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sem"><?php echo $sem ?>, 2023-2024</h3>
                        <input type="hidden" name = "sem"  value = "<?php echo $sem ?>">
                    </div>
                </div>
                <div class="col-span-1"></div>
            </div>
        </header>
        <div>
            <h1 id="test_paper_h1" class=" text-center text-md font-semibold">Set A</h1>
            <?php 
            $groupedQuestions = [];
            $i2 = 1;
            $i = 1;
            foreach ($questions as $row) {
                $testNum = $row['test_number'];
                $testNumber = $row['test_number'];
                $questionSet = $row['question_set'];
            
                // Only consider questions with test_number and question_set equal to "SET A"
                if ($questionSet === 'SET A') {
                    $key = $testNumber . '_' . $questionSet;
            
                    if (!isset($groupedQuestions[$key])) {
                        $groupedQuestions[$key] = [];
                    }
            
                    $groupedQuestions[$key][] = $row;
                }
            }

            foreach ($groupedQuestions as $key => $questionsGroup):
                list($testNum, $questionSet) = explode('_', $key);
            ?>
            <div class="test-group">
                <div class="flex items-center">
                    <div class="flex w-3/4 gap-2 items-center">
                        <h1 class="font-bold text-lg">Test <?php echo $testNum; ?>: Multiple Choice</h1><span id="points<?php echo $testNum; ?>" class="points<?php echo $testNum; ?> font-medium"></span>
                    </div>
                    <input id="test-points<?php echo $testNum; ?>" name="test-points<?php echo $testNum; ?>" class="print-hide test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                </div>
                <div class="questions">
                    <?php
                    
                    foreach ($questionsGroup as $row):
                    ?>
                    <div class="grid grid-cols-4 text-xs relative my-2">
                        <div class="col-span-4 flex gap-2">
                            <h2><?php echo $i; ?>.)</h2>
                            <div>
                            <?php echo $row['Question']; ?>
                            </div>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>A.</span> <?php echo $row['A']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>B.</span> <?php echo $row['B']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>C.</span> <?php echo $row['C']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>D.</span> <?php echo $row['D']; ?>
                        </div>

                        <input type="hidden" name = "Question<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Question']); ?>">
                        <input type="hidden" name = "A<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['A']); ?>">
                        <input type="hidden" name = "B<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['B']); ?>">
                        <input type="hidden" name = "C<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['C']); ?>">
                        <input type="hidden" name = "D<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['D']); ?>">
                        <input type="hidden" name = "ans<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Answer']); ?>">
                        <input type="hidden" name = "ID<?php echo $i2; ?>"  value = "<?php echo $row['id']; ?>">
                        <input type="hidden" name = "test_part<?php echo $i2; ?>"  value = "<?php echo $row['test_number']; ?>">
                        <input type="hidden" name = "uc"  value = "<?php echo $uniquecode ?>">
                        <input type="hidden" name = "set<?php echo $i2; ?>"  value = "SET A">
                    </div>
                    <?php 
                    $i++;
                    $i2++;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </section>
    <div class="pagebreak hidden"></div>
    <section id="test_paper2" class="<?php if($sets == "1 set") { echo "hidden print-hide";}?>w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                        <h3 class="uppercase font-bold" type = "text" name = "term"><?php echo $term ?> Exam</h3>
                        <input type="hidden" name = "term"  value = "<?php echo $term ?>">
                        <input type="hidden" name = "noq"  value = "<?php echo $noq ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sub"><?php echo $sub ?></h3>
                        <input type="hidden" name = "sub"  value = "<?php echo $sub ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sem"><?php echo $sem ?>, 2023-2024</h3>
                        <input type="hidden" name = "sem"  value = "<?php echo $sem ?>">
                    </div>
                </div>
                <div class="col-span-1"></div>
            </div>
        </header>
        <div>
            <h1 id="test_paper_h1" class=" text-center text-md font-semibold">Set B</h1>
            <?php 
            $groupedQuestions = [];
            $i2 = 1;
            $i = 1;
            foreach ($questions as $row) {
                $testNum = $row['test_number'];
                $testNumber = $row['test_number'];
                $questionSet = $row['question_set'];
            
                // Only consider questions with test_number and question_set equal to "SET A"
                if ($questionSet === 'SET B') {
                    $key = $testNumber . '_' . $questionSet;
            
                    if (!isset($groupedQuestions[$key])) {
                        $groupedQuestions[$key] = [];
                    }
            
                    $groupedQuestions[$key][] = $row;
                }
            }

            foreach ($groupedQuestions as $key => $questionsGroup):
                list($testNum, $questionSet) = explode('_', $key);
            ?>
            <div class="test-group">
                <div class="flex items-center">
                    <div class="flex w-3/4 gap-2 items-center">
                        <h1 class="font-bold text-lg">Test <?php echo $testNum; ?>: Multiple Choice</h1><span id="points<?php echo $testNum; ?>" class="points<?php echo $testNum; ?> font-medium"></span>
                    </div>
                    
                    <input id="test-points<?php echo $testNum; ?>" name="test-points<?php echo $testNum; ?>" class="print-hide test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                </div>
                <div class="questions">
                    <?php
                    
                    foreach ($questionsGroup as $row):
                    ?>
                    <div class="grid grid-cols-4 text-xs relative my-2">
                        <div class="col-span-4 flex gap-2">
                            <h2><?php echo $i; ?>.)</h2>
                            <div>
                            <?php echo $row['Question']; ?>
                            </div>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>A.</span> <?php echo $row['A']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>B.</span> <?php echo $row['B']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>C.</span> <?php echo $row['C']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>D.</span> <?php echo $row['D']; ?>
                        </div>

                        <input type="hidden" name = "Question<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Question']); ?>">
                        <input type="hidden" name = "A<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['A']); ?>">
                        <input type="hidden" name = "B<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['B']); ?>">
                        <input type="hidden" name = "C<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['C']); ?>">
                        <input type="hidden" name = "D<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['D']); ?>">
                        <input type="hidden" name = "ans<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Answer']); ?>">
                        <input type="hidden" name = "ID<?php echo $i2; ?>"  value = "<?php echo $row['id']; ?>">
                        <input type="hidden" name = "test_part<?php echo $i2; ?>"  value = "<?php echo $row['test_number']; ?>">
                        <input type="hidden" name = "uc"  value = "<?php echo $uniquecode ?>">
                        <input type="hidden" name = "set<?php echo $i2; ?>"  value = "SET A">
                    </div>
                    <?php 
                    $i++;
                    $i2++;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </section>
    <div class="pagebreak hidden"></div>
    <section id="test_paper3" class="<?php if($sets == "1 set" || $sets == "2 sets") { echo "hidden print-hide";}?> w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                        <h3 class="uppercase font-bold" type = "text" name = "term"><?php echo $term ?> Exam</h3>
                        <input type="hidden" name = "term"  value = "<?php echo $term ?>">
                        <input type="hidden" name = "noq"  value = "<?php echo $noq ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sub"><?php echo $sub ?></h3>
                        <input type="hidden" name = "sub"  value = "<?php echo $sub ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sem"><?php echo $sem ?>, 2023-2024</h3>
                        <input type="hidden" name = "sem"  value = "<?php echo $sem ?>">
                    </div>
                </div>
                <div class="col-span-1"></div>
            </div>
        </header>
        <div>
            <h1 id="test_paper_h1" class=" text-center text-md font-semibold">Set C</h1>
            <?php 
            $groupedQuestions = [];
            $i2 = 1;
            $i = 1;
            foreach ($questions as $row) {
                $testNum = $row['test_number'];
                $testNumber = $row['test_number'];
                $questionSet = $row['question_set'];
            
                // Only consider questions with test_number and question_set equal to "SET A"
                if ($questionSet === 'SET C') {
                    $key = $testNumber . '_' . $questionSet;
            
                    if (!isset($groupedQuestions[$key])) {
                        $groupedQuestions[$key] = [];
                    }
            
                    $groupedQuestions[$key][] = $row;
                }
            }

            foreach ($groupedQuestions as $key => $questionsGroup):
                list($testNum, $questionSet) = explode('_', $key);
            ?>
            <div class="test-group">
                <div class="flex items-center">
                    <div class="flex w-3/4 gap-2 items-center">
                        <h1 class="font-bold text-lg">Test <?php echo $testNum; ?>: Multiple Choice</h1><span id="points<?php echo $testNum; ?>" class="points<?php echo $testNum; ?> font-medium"></span>
                    </div>
                    
                    <input id="test-points<?php echo $testNum; ?>" name="test-points<?php echo $testNum; ?>" class="print-hide test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                </div>
                <div class="questions">
                    <?php
                    
                    foreach ($questionsGroup as $row):
                    ?>
                    <div class="grid grid-cols-4 text-xs relative my-2">
                        <div class="col-span-4 flex gap-2">
                            <h2><?php echo $i; ?>.)</h2>
                            <div>
                            <?php echo $row['Question']; ?>
                            </div>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>A.</span> <?php echo $row['A']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>B.</span> <?php echo $row['B']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>C.</span> <?php echo $row['C']; ?>
                        </div>
                        <div class="col-span-4 pl-6">
                            <span>D.</span> <?php echo $row['D']; ?>
                        </div>

                        <input type="hidden" name = "Question<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Question']); ?>">
                        <input type="hidden" name = "A<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['A']); ?>">
                        <input type="hidden" name = "B<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['B']); ?>">
                        <input type="hidden" name = "C<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['C']); ?>">
                        <input type="hidden" name = "D<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['D']); ?>">
                        <input type="hidden" name = "ans<?php echo $i2; ?>"  value = "<?php echo htmlspecialchars($row['Answer']); ?>">
                        <input type="hidden" name = "ID<?php echo $i2; ?>"  value = "<?php echo $row['id']; ?>">
                        <input type="hidden" name = "test_part<?php echo $i2; ?>"  value = "<?php echo $row['test_number']; ?>">
                        <input type="hidden" name = "uc"  value = "<?php echo $uniquecode ?>">
                        <input type="hidden" name = "set<?php echo $i2; ?>"  value = "SET A">
                    </div>
                    <?php 
                    $i++;
                    $i2++;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </section>


    <div class="pagebreak hidden"></div>
    <section id="answer-key" class="w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                        <h3 class="uppercase font-bold" type = "text" name = "term"><?php echo $term ?> Exam</h3>
                        <input type="hidden" name = "term"  value = "<?php echo $term ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sub"><?php echo $sub ?></h3>
                        <input type="hidden" name = "sub"  value = "<?php echo $sub ?>">
                    </div>
                    <div>
                        <h3 class="uppercase font-bold underline"  name = "sem"><?php echo $sem ?>, 2023-2024</h3>
                        <input type="hidden" name = "sem"  value = "<?php echo $sem ?>">
                    </div>
                </div>
                <div class="col-span-1"></div>
            </div>
        </header>
        <div>
            <h1 id="test_paper_h1" class=" text-center text-md font-semibold">Answer key</h1>
            <?php 
            $groupedQuestions = [];
            $i2 = 1;
            $i = 1;
            foreach ($questions as $row) {
                $testNum = $row['test_number'];
                $testNumber = $row['test_number'];
                $questionSet = $row['question_set'];
            
                // Only consider questions with test_number and question_set equal to "SET A"
                if ($questionSet === 'SET A') {
                    $key = $testNumber . '_' . $questionSet;
            
                    if (!isset($groupedQuestions[$key])) {
                        $groupedQuestions[$key] = [];
                    }
            
                    $groupedQuestions[$key][] = $row;
                }
            }

            foreach ($groupedQuestions as $key => $questionsGroup):
                list($testNum, $questionSet) = explode('_', $key);
            ?>
            <div class="test-group">
                <div class="flex items-center">
                    <div class="flex w-3/4 gap-2 items-center">
                        <h1 class="font-bold text-lg">Test <?php echo $testNum; ?>: Multiple Choice</h1><span id="points<?php echo $testNum; ?>" class="points<?php echo $testNum; ?> font-medium"></span>
                    </div>
                </div>
                <div class="questions">
                    <?php
                    
                    foreach ($questionsGroup as $row):
                    ?>
                    <div class="grid grid-cols-4 text-xs relative my-2">
                        <div class="col-span-4 flex gap-2">
                            <input type="hidden" name="ans<?php echo $i; ?>" value="<?php echo $row['Answer']; ?>">
                            <input type="hidden" name="uc" value="<?php echo $uniquecode; ?>">
                            <h2><?php echo $i; ?>.)</h2>
                            <div>
                            <?php echo $row['Question']; ?>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <span>Answer: </span> <?php echo $row['Answer']; ?>
                            <input type="hidden" name="A<?php echo $i; ?>" value="<?php echo $row['A']; ?>">
                        </div>
                    </div>
                    <?php 
                    $i++;
                    $i2++;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </section>
</div>

    <div class="fixed right-6 bottom-6 print-hide">    
        <button form="insert_questions" type="submit" id="print-btn" name="print_btn" class="cursor-pointer text-white bg-main hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm p-4 text-center" data-tooltip-target="tooltip-print" data-tooltip-placement="left">
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


<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../src/js/exammaker.js"></script>
<script>
$(document).ready(function () {
// Initially hide all sections
    $('#print-btn').click(function () {
        window.print();
    });


    $('#print_btnAdmin').click(function () {
        // Send an AJAX request to your PHP script to insert data into the database
        $.ajax({
            url: './admin_print.php',
            type: 'POST',
            data: $('#insertFormAdmin').serialize(),
            success: function (response) {
             
          
            },
            error: function () {
                alert('An error occurred while sending data to the server.');
            }
        });

        window.print();
    });

});


</script>
</body>
</html>