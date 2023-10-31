<?php 
include '../php/conn.php';
include '../php/session.php';
Include '../php/TIMEAGO.PHP'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Admin Activity Log | TUPV Syllabus System</title>
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-light-100">
<?php 
$page = 'activities';
include '../php/headerActlog2.php' 
?>
    
    <div class="p-2 sm:ml-64 relative my-16">
    <div class="col-span-1 row-span-2 max-w-6xl mx-auto">
        <?php
        $sql = "SELECT * FROM activitylog_tbl ORDER BY DATE(upload_time) DESC, upload_time DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $current_date = null;
        foreach ($data as $row) {
            $upload_date = date('Y-m-d', strtotime($row['upload_time']));
            if ($current_date != $upload_date) {
                if ($current_date != null) {
                    echo '</div>';  // Close previous date group
                }
                echo '<h2 class="leading-tight tracking-tight text-xl font-bold text-dark m-4">' . $upload_date . '</h2>';
                echo '<div class="date-group">';  // Open new date group
                $current_date = $upload_date;
            }
            ?>

            <div class="bg-light p-6 border m-2 border-light-200 rounded-lg">
            <div class="w-full flex gap-2 text-gray-600 dark:text-gray-400">
                <?php
                $activityType = $row['type_content'];
                $activityType2 = $row['type'];
                $content = array(); // Define $content array with default values

                if ($activityType === "Question Bank") {
                    $sql = "SELECT yearqb, subjqb, termqb, semesterqb, questionqb, A, B, C, D, Answers FROM activitylog_tbl WHERE id = ?";
                } elseif ($activityType === "Module") {
                    $sql = "SELECT subj, subjCode, terms, years, file, fileloc FROM activitylog_tbl WHERE id = ?";
                }
                $stmt = $conn->prepare($sql);
                $stmt->execute([$row['id']]);
                $content = $stmt->fetch();
            
               ?>
                <div>
               <?php
                if ($activityType2 === "Question") {
                    $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/></svg>';
                    
                } elseif ($activityType2 === "Syllabus") {
                    $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"><path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/></svg>'; 
                }
                elseif ($activityType2 === "Unarchived Syllabus") {
                   $imageSrc = '<svg class="w-6 h-6 text-main  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 15"><path d="M1 13a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H1v7Zm5.293-3.707a1 1 0 0 1 1.414 0L8 9.586V8a1 1 0 0 1 2 0v1.586l.293-.293a1 1 0 0 1 1.414 1.414l-2 2a1 1 0 0 1-1.416 0l-2-2a1 1 0 0 1 .002-1.414ZM17 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1Z"/>
                 </svg>';

                 }
                 elseif ($activityType2 === "Unarchived Question") {
                    $imageSrc = '<svg class="w-6 h-6 text-main  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 15"><path d="M1 13a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H1v7Zm5.293-3.707a1 1 0 0 1 1.414 0L8 9.586V8a1 1 0 0 1 2 0v1.586l.293-.293a1 1 0 0 1 1.414 1.414l-2 2a1 1 0 0 1-1.416 0l-2-2a1 1 0 0 1 .002-1.414ZM17 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1Z"/>
                  </svg>';

                 }

                 
                 elseif ($activityType2 === "Trash") {
                    $imageSrc = '<svg class="w-6 h-6 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                  </svg>';

                } else {
                    $imageSrc = '<svg class="w-6 h-6 text-main dark-text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"><path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/> <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/></svg>';
                }
                echo $imageSrc;
                ?>
                </div>
                
                <?php
                if ($activityType === "Question Bank") {
                ?>
                <div class="min-w-full ">
                <div class="grow">

                    <!-- Display question columns -->
                    <div class="flex justify-between items-start">
                    <h4 class="text-main text-xs font-medium mb-1"><?= $row['type']; ?></h4>
                    <h4 class="text-gray-400 italic text-sm mb-1 mr-8"><?= getTimeAgo($row['upload_time']);?></h4>
                    </div>

                 

                                    
                    <div class="flex align-center mt-[-3px]">
                    <h4 class ="text-xs font-medium mb-1">
                    <span class="text-main italic"> <?= $row['type_content']; ?> </span> Submitted by
                    <span class="font-semibold text-dark"><?= $row['upload_name']; ?></span>
                    </h4>
                    </div>
                


                    <p class = "text-xs text-secondary my-2">Content:</p>
                    <!-- Display specific columns for questions -->
                    <h4 class="text-dark text-sm font-medium"> <span class="text-secondary italic">Question: </span><?= $row['questionqb']; ?></h4>

                    <div class="grid grid-cols-2 gap-4">
                    
                    <div class="col-start-1 col-end-3"> 
                    <div class="flex text-sm justify-between">
                    <div class="flex justify-between gap-2">
                        <h4 class="text-secondary text-sm italic">Choices:</h4>
                        <h4 class="text-dark text-sm font-medium">A. <?= $content['A']; ?> </h4>
                        <h4 class="text-dark text-sm font-medium ml-14">B. <?= $content['B']; ?> </h4>
                        <h4 class="text-dark text-sm font-medium ml-14">C. <?= $content['C']; ?> </h4>
                        <h4 class="text-dark text-sm font-medium ml-14">D. <?= $content['D']; ?> </h4>
                    </div>
                       
                    </div>
                </div>

                <div class="col-start-3 col-end-3">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center mr-8 p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:outline-none dark:text-whitedark:bg-gray-800 dark:hover:bg-gray-700"  type="button"> 
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delactlog=true" onclick="return confirm('Are you sure you want to delete this Activity?');"class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                       
                        </ul>
                        
                    </div>
                    </div>
                </div>
                <!-- <h4  class="text-dark text-sm font-medium"> <span class="text-secondary italic">Answer: </span><?= $content['Answers']; ?> </h4>
                 -->
                <p class = "text-xs text-secondary mt-2">Additional Information:</p>
                <div class="mt-3 flex flex-wrap gap-6">
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['yearqb']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['subjqb']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['termqb']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">     <?= $content['semesterqb']; ?></div>   
                </div>

                </div>
                </div>

                <!-- MODULE -->

                <?php
                } elseif ($activityType === "Module") {
                ?>
                <div class="min-w-full">
                    <div class = "grow">

                    <!-- Display syllabus columns -->
                    <div class="flex justify-between items-start">
                    <h4 class="text-main text-xs font-medium mb-1"><?= $row['type']; ?></h4>
                    <h4 class="text-gray-400 italic text-sm mb-1 mr-8"><?= getTimeAgo($row['upload_time']);?></h4>
                    </div>
                    
                    <div class="flex align-center mt-[-3px]">
                    <h4 class ="text-xs font-medium mb-1">
                    <span class="text-main italic"> <?= $row['type_content']; ?> </span> Submitted by
                    <span class="font-semibold text-dark"><?= $row['upload_name']; ?></span>
                    </h4>
                    </div>

                    
                    <p class = "text-xs text-secondary mt-2">Content:</p>

                    <div class="grid grid-cols-2 gap-4">
                    <div class="col-start-1 col-end-3"> 
                        <div class="items-center gap-2 text-main inline-block hover:underline hover:underline-offset-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-[16px] h-[16px] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"/>
                                </svg>
                                <!-- FILE LOCATION -->
                                <a class="" href="../files/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-start-3 col-end-3">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center mr-8 p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:outline-none dark:text-whitedark:bg-gray-800 dark:hover:bg-gray-700"  type="button"> 
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delactlog=true" onclick="return confirm('Are you sure you want to delete this Activity?');"class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                       
                        </ul>
                        
                    </div>
                    </div>
                </div>


                        <p class = "text-xs text-secondary mt-2">Additional Information:</p>
                        <div class="mt-3 flex flex-wrap gap-6">
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['subj']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['subjCode']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"> <?= $content['terms']; ?></div>
                    <div class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">     <?= $content['years']; ?></div>   
                </div>




                    </div>
                </div>
                    
                <?php
                }
                ?>
                <!-- Display image based on "type" -->
             
            </div>
            </div>
        <?php
        }
        if ($current_date != null) {
            echo '</div>'; // Close last date group
        }
        ?>
    </div>
</div>














    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>