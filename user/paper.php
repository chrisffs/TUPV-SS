<?php
include '../php/conn.php';

$uniquecode = isset($_GET['uniquecode']) ? $_GET['uniquecode'] : '';
$term = isset($_GET['Term']) ? $_GET['Term'] : '';
$sub = isset($_GET['Subj']) ? $_GET['Subj'] : '';
$sem = isset($_GET['Semester']) ? $_GET['Semester'] : '';

$stmt = $conn->prepare('SELECT * FROM generatedquestions_tbl WHERE UniqueCode = ?');
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
<div class="flex divide-x">
    <div class="w-1/5 print-hide">
        <aside>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sets:</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected hidden>Choose Sets</option>
                <option value="1 set">1 set</option>
                <option value="2 sets">2 sets</option>
                <option value="3 sets">3 sets</option>
            </select>
        </aside>
    </div>
    <div class="w-4/5 flex flex-col items-center">
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
                <?php 
                $groupedQuestions = [];
                $i = 1;
                foreach ($questions as $row) {
                    $testNumber = $row['test_number'];
                    if (!isset($groupedQuestions[$testNumber])) {
                        $groupedQuestions[$testNumber] = [];
                    }
                    $groupedQuestions[$testNumber][] = $row;
                }

                foreach ($groupedQuestions as $testNumber => $questionsGroup):
                ?>
                <div class="test-group">
                    <div class="flex items-center">
                        <div class="flex w-3/4 gap-2 items-center">
                            <h1 class="font-bold text-lg">Test <?php echo $testNumber; ?>: Multiple Choice</h1><span id="points<?php echo $testNumber; ?>" class="points<?php echo $testNumber; ?> font-medium"></span>
                        </div>
                        
                        <input id="test-points<?php echo $testNumber; ?>" name="test-points<?php echo $testNumber; ?>" class="test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                    </div>
                    <div class="questions">
                        <?php
                        
                        foreach ($questionsGroup as $row):
                        ?>
                        <div class="grid grid-cols-4 text-xs relative my-2">
                            <div class="col-span-4">
                                <input type="hidden" name="ans<?php echo $i; ?>" value="<?php echo $row['Answer']; ?>">
                                <input type="hidden" name="uc" value="<?php echo $UC; ?>">
                                <h1><?php echo $i; ?>.) <?php echo $row['Question']; ?></h1>
                                <input type="hidden" name="Question<?php echo $i; ?>" value="<?php echo $row['Question']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>A.</span> <?php echo $row['A']; ?>
                                <input type="hidden" name="A<?php echo $i; ?>" value="<?php echo $row['A']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>B.</span> <?php echo $row['B']; ?>
                                <input type="hidden" name="B<?php echo $i; ?>" value="<?php echo $row['B']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>C.</span> <?php echo $row['C']; ?>
                                <input type="hidden" name="C<?php echo $i; ?>" value="<?php echo $row['C']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>D.</span> <?php echo $row['D']; ?>
                                <input type="hidden" name="D<?php echo $i; ?>" value="<?php echo $row['D']; ?>">
                            </div>
                        </div>
                        <?php 
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </section>
        <section id="test_paper2" class="w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                <?php 
                $groupedQuestions = [];
                $i = 1;
                foreach ($questions as $row) {
                    $testNumber = $row['test_number'];
                    if (!isset($groupedQuestions[$testNumber])) {
                        $groupedQuestions[$testNumber] = [];
                    }
                    $groupedQuestions[$testNumber][] = $row;
                }

                // Shuffle the questions within each test number group
                foreach ($groupedQuestions as $testNumber => $questionsGroup) {
                    shuffle($groupedQuestions[$testNumber]);
                }

                foreach ($groupedQuestions as $testNumber => $questionsGroup):
                ?>
                <div class="test-group">
                    <div class="flex items-center">
                        <div class="flex w-3/4 gap-2 items-center">
                            <h1 class="font-bold text-lg">Test <?php echo $testNumber; ?>: Multiple Choice</h1><span id="points<?php echo $testNumber; ?>" class="points<?php echo $testNumber; ?> font-medium"></span>
                        </div>
                        
                        <input id="test-points<?php echo $testNumber; ?>" name="test-points<?php echo $testNumber; ?>" class="test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                    </div>
                    <div class="questions">
                        <?php
                        
                        foreach ($questionsGroup as $row):
                        ?>
                        <div class="grid grid-cols-4 text-xs relative my-2">
                            <div class="col-span-4">
                                <input type="hidden" name="ans<?php echo $i; ?>" value="<?php echo $row['Answer']; ?>">
                                <input type="hidden" name="uc" value="<?php echo $UC; ?>">
                                <h1><?php echo $i; ?>.) <?php echo $row['Question']; ?></h1>
                                <input type="hidden" name="Question<?php echo $i; ?>" value="<?php echo $row['Question']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>A.</span> <?php echo $row['A']; ?>
                                <input type="hidden" name="A<?php echo $i; ?>" value="<?php echo $row['A']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>B.</span> <?php echo $row['B']; ?>
                                <input type="hidden" name="B<?php echo $i; ?>" value="<?php echo $row['B']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>C.</span> <?php echo $row['C']; ?>
                                <input type="hidden" name="C<?php echo $i; ?>" value="<?php echo $row['C']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>D.</span> <?php echo $row['D']; ?>
                                <input type="hidden" name="D<?php echo $i; ?>" value="<?php echo $row['D']; ?>">
                            </div>
                        </div>
                        <?php 
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </section>
        <section id="test_paper3" class="w-[21cm] p-[1cm] min-h-[29.7cm] mt-10 border border-[#D3D3D3] shadow-lg">
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
                <?php 
                $groupedQuestions = [];
                $i = 1;
                foreach ($questions as $row) {
                    $testNumber = $row['test_number'];
                    if (!isset($groupedQuestions[$testNumber])) {
                        $groupedQuestions[$testNumber] = [];
                    }
                    $groupedQuestions[$testNumber][] = $row;
                }

                foreach ($groupedQuestions as $testNumber => $questionsGroup):
                ?>
                <div class="test-group">
                    <div class="flex items-center">
                        <div class="flex w-3/4 gap-2 items-center">
                            <h1 class="font-bold text-lg">Test <?php echo $testNumber; ?>: Multiple Choice</h1><span id="points<?php echo $testNumber; ?>" class="points<?php echo $testNumber; ?> font-medium"></span>
                        </div>
                        
                        <input id="test-points<?php echo $testNumber; ?>" name="test-points<?php echo $testNumber; ?>" class="test-points-input block w-1/4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter points per items">
                    </div>
                    <div class="questions">
                        <?php
                        
                        foreach ($questionsGroup as $row):
                        ?>
                        <div class="grid grid-cols-4 text-xs relative my-2">
                            <div class="col-span-4">
                                <input type="hidden" name="ans<?php echo $i; ?>" value="<?php echo $row['Answer']; ?>">
                                <input type="hidden" name="uc" value="<?php echo $UC; ?>">
                                <h1><?php echo $i; ?>.) <?php echo $row['Question']; ?></h1>
                                <input type="hidden" name="Question<?php echo $i; ?>" value="<?php echo $row['Question']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>A.</span> <?php echo $row['A']; ?>
                                <input type="hidden" name="A<?php echo $i; ?>" value="<?php echo $row['A']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>B.</span> <?php echo $row['B']; ?>
                                <input type="hidden" name="B<?php echo $i; ?>" value="<?php echo $row['B']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>C.</span> <?php echo $row['C']; ?>
                                <input type="hidden" name="C<?php echo $i; ?>" value="<?php echo $row['C']; ?>">
                            </div>
                            <div class="col-span-4">
                                <span>D.</span> <?php echo $row['D']; ?>
                                <input type="hidden" name="D<?php echo $i; ?>" value="<?php echo $row['D']; ?>">
                            </div>
                        </div>
                        <?php 
                        $i++;
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
    <div class="fixed right-6 bottom-6">    
        <button type="submit" id="print-btn" name="print_btn" class="cursor-pointer text-white bg-main hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm p-4 text-center" data-tooltip-target="tooltip-print" data-tooltip-placement="left">
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


    $("#test_paper2, #test_paper3").hide();

    // Listen for changes in the select dropdown
    $("#countries").change(function () {
        // Get the selected value
        var selectedSets = $(this).val();

        // Hide all sections
        $("#test_paper, #test_paper2, #test_paper3").hide();

        // Show the selected number of sections
        if (selectedSets == "1 set") {
            $("#test_paper").show();
        } else if (selectedSets == "2 sets") {
            $("#test_paper, #test_paper2").show();
        } else if (selectedSets == "3 sets") {
            $("#test_paper, #test_paper2, #test_paper3").show();
        }
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