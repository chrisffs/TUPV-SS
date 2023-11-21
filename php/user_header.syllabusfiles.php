<header class="antialiased">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 px-4 lg:px-6 py-2.5 mx-auto dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
                <!-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button> -->
                <!-- <button aria-expanded="true" data-collapse-toggle="navbar-user" aria-controls="navbar-user" class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/></svg>
                    <span class="sr-only">Toggle sidebar</span>
                </button> -->
                <a href="../../" class="flex">
                    <img src="../../../src/img/sslogo.png" class="w-10 object-cover" alt="Syllabus System Logo" />
                </a>    
            </div>
            <div class="flex items-center md:order-2">
                <!-- Button for Extra Large Modal | dont delete -->
                <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="p-2 mr-1 text-main rounded-lg hover:text-red-900 hover:bg-red-100" type="button">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                </button>
                <!-- Notifications -->
                <button type="button" data-tooltip-target="tooltip-notifications" data-tooltip-placement="bottom" data-dropdown-toggle="notification-dropdown" class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20"><path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/></svg>
                </button>
                <?php 
                    $sql1 = "    
                    ( SELECT ID, uploaderId, uploadedby, dateAccepted, Question, 'Accepted' AS status, 'Question' AS type 
                    FROM questionbank_tbl WHERE uploaderId = {$_SESSION['ID']} ) 
                    UNION ALL 
                    ( SELECT ID, uploaderId, uploadedby, dateDeclined, Question, 'Declined' AS status, 'Question' AS type 
                    FROM qbdecline_tbl WHERE uploaderId = {$_SESSION['ID']} ) 
                    UNION ALL 
                    ( SELECT ID, USERUPLOADID, NAMEUPLOAD, dateAccepted, FILES, 'Accepted' AS status, 'Module' AS type 
                    FROM syllabus_tbl WHERE USERUPLOADID = {$_SESSION['ID']} ) 
                    UNION ALL 
                    ( SELECT ID, uploaderId, NameUpload, dateDeclined, file, 'Declined' AS status, 'Module' AS type 
                    FROM declinedsyllabus_tbl WHERE uploaderId = {$_SESSION['ID']} )
                    ORDER BY dateAccepted DESC LIMIT 6;";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->execute();
                    $data1 = $stmt1->fetchAll();
                ?>
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Notifications
                    </div>
                    <div>
                    <?php foreach ($data1 as $row1): 
                        if(  $row1['type'] == 'Module') {
                            ?>
                            <a id="<?php echo $row1['ID']?>" href="../../notifications.php#notification_<?php echo $row1['ID']?>" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img title="Admin" class="w-11 h-11 rounded-full" src="../../../files/userpics/default.jpg" alt="Bonnie Green avatar">
                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-blue-500 dark:border-gray-700">
                                        <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><?php echo $row1['status']?> your uploaded <?php echo $row1['type']?> <span class="font-semibold text-gray-900 dark:text-white text-truncate"><?php echo $row1['Question']?></span></div>
                                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                    <?php
                                        date_default_timezone_set('Asia/Manila'); // Set the default timezone to Manila
                                        // Get the original timestamp (for example, from a database or any source)
                                        $originalTimestamp = strtotime($row1['dateAccepted']); // Replace this with your original timestamp
                                        $currentTimestamp = time();

                                        $timeDifference = $currentTimestamp - $originalTimestamp;

                                        // Convert the time to a human-readable format
                                        if ($timeDifference < 60) {
                                            echo "Just Now";
                                        } elseif ($timeDifference < 3600) {
                                            $minutes = floor($timeDifference / 60);
                                            echo $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                        } elseif ($timeDifference < 86400) {
                                            $hours = floor($timeDifference / 3600);
                                            echo $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                        } elseif ($timeDifference < 604800) {
                                            $days = floor($timeDifference / 86400);
                                            echo $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                        } elseif ($timeDifference < 2592000) {
                                            $weeks = floor($timeDifference / 604800);
                                            echo $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
                                        } else {
                                            $months = floor($timeDifference / 2592000);
                                            echo $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                        }
                                    ?>
                                    </div>
                                </div>
                            </a>
                            <?php
                        } else if ( $row1['type'] == 'Question') {
                            ?>
                            <a id="<?php echo $row1['ID']?>" href="../../notifications.php#notification_<?php echo $row1['ID']?>" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                <div class="flex-shrink-0">
                                    <img title="Admin" class="w-11 h-11 rounded-full" src="../../../files/userpics/default.jpg" alt="Jese Leos avatar">
                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-500 rounded-full border border-white dark:border-gray-700">
                                        <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><?php echo $row1['status']?> your submitted <?php echo $row1['type']?> <span class="font-medium text-gray-900 dark:text-white text-truncate">"<?php echo $row1['Question']?>"</span></div>
                                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400">
                                        <?php
                                            date_default_timezone_set('Asia/Manila'); // Set the default timezone to Manila
                                            // Get the original timestamp (for example, from a database or any source)
                                            $originalTimestamp = strtotime($row1['dateAccepted']); // Replace this with your original timestamp
                                            $currentTimestamp = time();

                                            $timeDifference = $currentTimestamp - $originalTimestamp;

                                            // Convert the time to a human-readable format
                                            if ($timeDifference < 60) {
                                                echo "Just Now";
                                            } elseif ($timeDifference < 3600) {
                                                $minutes = floor($timeDifference / 60);
                                                echo $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                            } elseif ($timeDifference < 86400) {
                                                $hours = floor($timeDifference / 3600);
                                                echo $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                            } elseif ($timeDifference < 604800) {
                                                $days = floor($timeDifference / 86400);
                                                echo $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                            } elseif ($timeDifference < 2592000) {
                                                $weeks = floor($timeDifference / 604800);
                                                echo $weeks . " week" . ($weeks > 1 ? "s" : "") . " ago";
                                            } else {
                                                $months = floor($timeDifference / 2592000);
                                                echo $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                        ?>
                    
                    <?php endforeach; ?>
                    </div>
                    <a href="../../notifications.php" class="block py-2 text-base font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                        <div class="inline-flex items-center ">
                        <svg aria-hidden="true" class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                        View all
                        </div>
                    </a>
                </div>
                <!-- Apps -->
                <button type="button" data-tooltip-target="tooltip-apps" data-tooltip-placement="bottom" data-dropdown-toggle="apps-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">View notifications</span>
                    <!-- Icon -->
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>              
                </button>
                <!-- <div id="tooltip-apps" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Apps
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div> -->
                <!-- Dropdown menu -->
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="apps-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Apps
                    </div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <a href="../../../user/" class="block p-4 text-center rounded-lg <?php if($page=='syllabus'){echo 'bg-gray-100 text-gray-500';} else {echo 'hover:bg-gray-100 text-gray-400';}?> hover:bg-gray-100 group">
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                            </svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Syllabus</div>
                        </a>
                        <a href="../../../user/exammaker.php" class="block p-4 text-center rounded-lg <?php if($page=='exammaker'){echo 'bg-gray-100 text-gray-500';} else {echo 'hover:bg-gray-100 text-gray-400';}?> hover:bg-gray-100 group">
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                            </svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Exam Maker</div>
                        </a>
                        <a href="../../../user/examchecker.php" class="block p-4 text-center rounded-lg <?php if($page=='examchecker'){echo 'bg-gray-100 text-gray-500';} else {echo 'hover:bg-gray-100 text-gray-400';}?> hover:bg-gray-100 group">
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-2.359 10.707-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L7 12.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>                 
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Exam Checker</div>
                        </a>
                        <a href="../../../user/uploadsyllabus.php" class="block p-4 text-center rounded-lg <?php if($page=='uploadsyllabus'){echo 'bg-gray-100 text-gray-500';} else {echo 'hover:bg-gray-100 text-gray-400';}?> hover:bg-gray-100 group">
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                                <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                            </svg>                    
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Upload Module</div>
                        </a>
                        <a href="../../../user/questionbank.php" class="block p-4 text-center rounded-lg <?php if($page=='questionbank'){echo 'bg-gray-100 text-gray-500';} else {echo 'hover:bg-gray-100 text-gray-400';}?> hover:bg-gray-100 group">     
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                            </svg>              
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Question Bank</div>
                        </a>
                        <a href="#" class="block p-4 text-center rounded-lg text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <svg class="mx-auto mb-2 w-5 h-5 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/></svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Settings</div>
                        </a>
                        <a href="../../../php/user_logout.php" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/></svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Logout</div>
                        </a>
                    </div>
                </div>
                <?php 
                    $sql = "SELECT * FROM `accounts_tbl` WHERE id = {$_SESSION['ID']}";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $data = $stmt->fetchAll();

                    foreach ($data as $row):
                ?>
                <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <div class="rounded-full">
                        <img class="w-10 h-10 object-cover rounded-full" src="../../../files/userpics/<?php echo $row['user_picture']?>" alt="user photo">
                    </div>
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white"><?php echo $row['full_name']?></span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?php echo $row['tupv_id']?></span>
                    </div>
                    <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                        <li>
                            <a href="../../../user/profile.php" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
                        </li>
                    </ul>
                    <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                        <li>
                            <a href="../../../php/user_logout.php" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
                <?php 
                    endforeach; 
                ?>
            </div>
            
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <img src="../../../src/img/tupvlogo.png" class="w-10" alt="Syllabus System Logo" />
            </div>
        </div>
        <!-- Button for Extra Large Modal | dont delete -->
        <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="hidden w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Extra large modal
        </button>
        <!-- Extra Large Modal -->
        <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-7xl max-h-full">
                <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="extralarge-modal"></div>
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-medium md:text-xl font-medium text-gray-900 dark:text-white">
                            TUPV Syllabus System
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-6 grid grid-cols-1 md:grid-cols-3 gap-y-2 md:gap-x-4 bg-main md:custom-gradient">
                        <div class="bg-light border rounded-lg p-4 md:p-6 lg:p-10 flex flex-row items-center gap-x-2 md:gap-0 md:flex-col">
                            <div class="w-1/3 md:w-40 lg:w-60 mx-auto">
                                <img class="w-60" src="../../../src/img/syllabus_modal-pic.png" alt="" srcset="">
                            </div>
                            <div class="w-2/3 md:w-full text-center md:mt-4">
                                <h1 class="font-bold text-medium lg:text-xl">Syllabus</h1>
                                <h3 class="text-xs md:text-sm font-semibold mb-2 md:mb-4">Search, and Download Learning Materials and Modules</h3>
                                <h5 class="text-xs md:text-sm">Allows educators to effortlessly share, explore, and access a vast array of learning materials and modules.</h5>
                            </div>
                        </div>
                        <div class="bg-light border rounded-lg p-4 md:p-6 lg:p-10 flex flex-row items-center gap-x-2 md:gap-0 md:flex-col">
                            <div class="w-1/3 md:w-40 lg:w-60 mx-auto">
                                <img class="w-60" src="../../../src/img/exam_modal-pic.png" alt="" srcset="">
                            </div>
                            <div class="w-2/3 md:w-full text-center md:mt-4">
                                <h1 class="font-bold text-medium lg:text-xl">Exam Maker and Checker</h1>
                                <h3 class="text-xs md:text-sm font-semibold mb-2 md:mb-4">Create Exam Test Paper and Automatic Checking</h3>
                                <h5 class="text-xs md:text-sm">Empowers educators to effortlessly create and grade exams with ease.</h5>
                            </div>
                        </div>
                        <div class="bg-light border rounded-lg p-4 md:p-6 lg:p-10 flex flex-row items-center gap-x-2 md:gap-0 md:flex-col">
                            <div class="w-1/3 md:w-40 lg:w-60 mx-auto">
                                <img class="w-60" src="../../../src/img/upload_modal-pic.png" alt="" srcset="">
                            </div>
                            <div class="w-2/3 md:w-full text-center md:mt-4">
                                <h1 class="font-bold text-medium lg:text-xl">Submit Module and Question</h1>
                                <h3 class="text-xs md:text-sm font-semibold mb-2 md:mb-4">Upload learning materials and test questions for exam</h3>
                                <h5 class="text-xs md:text-sm">Accepts user’s uploaded questions, modules and other learning materials.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 md:p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <!-- <div class="flex items-center">
                            <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Don't show again.</label>
                        </div> -->
                        <button data-modal-hide="extralarge-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-16 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="../../../user/" data-tooltip-target="tooltip-syllabus" data-tooltip-placement="left" class="flex items-center justify-center p-2 <?php if($page=='syllabus'){echo 'text-main bg-red-100';} else {echo 'hover:bg-gray-100 text-gray-500';}?> rounded-lg dark:text-white group">
                        <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                        </svg>
                    </a>
                    <div id="tooltip-syllabus" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Syllabus
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li>
                    <a href="../../../user/exammaker.php" data-tooltip-target="tooltip-exammaker" data-tooltip-placement="left" class="flex items-center justify-center p-2 <?php if($page=='exammaker'){echo 'text-main bg-red-100';} else {echo 'hover:bg-gray-100 text-gray-500';}?> rounded-lg dark:text-white group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                            <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                        </svg>
                    </a>
                    <div id="tooltip-exammaker" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Exam Maker
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li>
                    <a href="../../../user/examchecker.php" data-tooltip-target="tooltip-examchecker" data-tooltip-placement="left" class="flex items-center justify-center p-2 <?php if($page=='examchecker'){echo 'text-main bg-red-100';} else {echo 'hover:bg-gray-100 text-gray-500';}?> rounded-lg dark:text-white group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-2.359 10.707-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L7 12.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                    </a>
                    <div id="tooltip-examchecker" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Exam Checker
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li>
                    <a href="../../../user/uploadsyllabus.php" data-tooltip-target="tooltip-uploadsyllabus" data-tooltip-placement="left" class="flex items-center justify-center p-2 <?php if($page=='uploadsyllabus'){echo 'text-main bg-red-100';} else {echo 'hover:bg-gray-100 text-gray-500';}?> rounded-lg dark:text-white group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z"/>
                            <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                        </svg>
                    </a>
                    <div id="tooltip-uploadsyllabus" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Upload Files
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
                <li>
                    <a href="../../../user/questionbank.php" data-tooltip-target="tooltip-questionbank" data-tooltip-placement="left" class="flex items-center justify-center p-2 <?php if($page=='questionbank'){echo 'text-main bg-red-100';} else {echo 'hover:bg-gray-100 text-gray-500';}?> rounded-lg dark:text-white group">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                        </svg>
                    </a>
                    <div id="tooltip-questionbank" role="tooltip" class="absolute z-10 invisible whitespace-nowrap inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Question Bank
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>    
</header>