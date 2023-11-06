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
    
<main>

</main>

<section id="testpaper-container">

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
                <input type="hidden" name = "noq"  value = "<?php echo $noq ?>">
               
           
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
        <h1 class="text-center text-sm font-bold mb-6">QUESTIONAIRE</h1>
        <?php 
        $i = 1;
        foreach ($questions as $row):
        ?>
        <div class="grid grid-cols-4 text-xs relative my-2">
            <div class="col-span-4">
       
            <input type="hidden" name = "ans"  value = "<?php echo $row['Answer']; ?>">
            <input type="hidden" name = "uc"  value = "<?php echo $UC ?>">

                <h1><?php echo $i ?>.) <?php echo $row['Question']; ?></h1>
                <input type="hidden" name = "Question"  value = "<?php echo $row['Question']; ?>">
            </div>
            <div class="col-span-4">
                <span>A.</span> <?php echo $row['A']; ?>
                 <input type="hidden" name = "A"  value = "<?php echo $row['A']; ?>">
            </div>
            <div class="col-span-4">
                <span>B.</span> <?php echo $row['B']; ?>
                 <input type="hidden" name = "B"  value = "<?php echo $row['B']; ?>">
            </div>
            <div class="col-span-4">
                <span>C.</span> <?php echo $row['C']; ?>
                 <input type="hidden" name = "C"  value = "<?php echo $row['C']; ?>">
            </div>
            <div class="col-span-4">
                <span>D.</span> <?php echo $row['D']; ?>
                 <input type="hidden" name = "D"  value = "<?php echo $row['D']; ?>">
            </div>
        </div>     
        <?php 
        $i++;
        endforeach;
        ?>
    </div>



  
    </section>

<div class="pagebreak hidden"></div>
<section id="answersheet-container" >
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

<form id="insertFormAdmin" action="./admin_print.php" method="post">
    <div class="fixed right-6 bottom-6">
        
    <button type="submit" id="print_btnAdmin" name="print_btnAdmin" class="cursor-pointer text-white bg-main hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm p-4 text-center" data-tooltip-target="tooltip-print" data-tooltip-placement="left">

            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
            </svg>
        </button>
  
    <div id="tooltip-print" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Print Exam
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
</form>


<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function () {
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