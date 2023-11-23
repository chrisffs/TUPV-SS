<?php 
include '../php/session.php';
include '../php/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Settings | TUPV Syllabus System</title>
    <link rel="stylesheet" href="../src/css/jquery.dataTables.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light-100">
<?php 
// $page = 'syllabus';
include '../php/header.php' 
?>

<div class="p-2 sm:ml-64 relative">
    <div class="p-4 mt-14">
    <?php 
    include "../php/success_insert.setting.php"
    ?>
        <div class="bg-light border border-light-200 rounded-lg h-full p-4">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold">System Settings</h1>
                <h6 class="text-gray-600 leading-tight tracking-tight">Manage the system settings including user settings and campus settings. </h6>
            </div>
            <div>
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg active hover:bg-gray-50 dark:bg-gray-800 dark:text-blue-500 aria-selected:bg-gray-100 aria-selected:text-main" id="campussettings-tab" data-tabs-target="#campussettings" role="tab" aria-controls="campussettings" aria-selected="false"  type="button">Campus Settings</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300 aria-selected:bg-gray-100 aria-selected:text-main" id="usersettings-tab" data-tabs-target="#usersettings" type="button" role="tab" aria-controls="usersettings" aria-selected="false">User Settings</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <!-- SYSTEM SETTINGS STARTS HERE -->
                <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="campussettings" role="tabpanel" aria-labelledby="campussettings-tab">
                    <div class="mb-6 border border-light-200 rounded-lg p-6">
                        <div class="flex justify-between mb-6">
                            <?php 
                                $sql = "SELECT * FROM departmenttbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                                
                                // Department Count
                                $sql = "SELECT COUNT(dptname)`dptname` FROM departmenttbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(); // Use fetch instead of fetchAll
                                
                                if ($result) {
                                    $qty = $result['dptname'];
                                } else {
                                    $qty = 0; // Handle the case when no rows are returned
                                }
                            ?>
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">Departments <span class="text-main">(<?php echo $qty; ?>)</span></h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addDepartment-modal" data-modal-toggle="addDepartment-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer">
                                    + Add new Department
                                </a>
                            </div>
                        </div>
                       
                        
                        <!-- ================= DEPARTMENT ======================== -->
                        <!-- table for department -->
                        <table id="" class="settingsTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                         
                            <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Department
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Acronym
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr class="bg-white border-b border-light-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $row['dptname']; ?>
                                    </th>
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $row['acronym']; ?>
                                    </th>

                                   
                                    <td class="px-4 py-2">
                                        <div class="inline-block mr-2">
                                            <a type="button" data-modal-target="editDepartment-modal" data-modal-toggle="editDepartment-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-department" data-id="<?php echo $row['id']; ?>" data-dptname="<?php echo $row['dptname']; ?>" data-acronym="<?php echo $row['acronym']; ?>">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="inline-block">
                                        <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delfa=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-normal text-main dark:text-blue-500 hover:underline">Remove</a>

                                        </div>
                                    </td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
    
                    </div>
                    <!-- ========================= END OF DEPARTMENT ======================== -->


                    <!-- ======================= COURSES ============================= -->
                      <div class="mb-6 border border-light-200 rounded-lg p-6">

                      <?php 
                                $sql = "SELECT * FROM courses_tbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                                
                                // Course Count
                                $sql = "SELECT COUNT(courseName)`courseName` FROM courses_tbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(); // Use fetch instead of fetchAll
                                
                                if ($result) {
                                    $qtys = $result['courseName'];
                                } else {
                                    $qtys = 0; // Handle the case when no rows are returned
                                }
                            ?>
                        <div class="flex justify-between mb-6">
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">Courses <span class="text-main">(<?php echo $qtys; ?>)</span></h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addCourse-modal" data-modal-toggle="addCourse-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer">
                                    + Add new Course
                                </a>
                            </div>
                        </div>
                        <table id="" class="settingsTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Courses
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Course Acronym
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Department 
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr class="bg-white border-b border-light-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $row['courseName']; ?>
                                    </th>
                                    <td class="px-4 py-2">
                                    <?php echo $row['acro']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                    <?php echo $row['dept']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="inline-block mr-2">
                                            <a type="button" data-modal-target="editCourses-modal" data-modal-toggle="editCourses-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-course" 
                                            data-id="<?php echo $row['id']; ?>" 
                                            data-crsname="<?php echo $row['courseName']; ?>" 
                                            data-acronym="<?php echo $row['acro']; ?>"
                                            data-deptname="<?php echo $row['dept']; ?>">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="inline-block">
                                        <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delcourse=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-normal text-main dark:text-blue-500 hover:underline">Remove</a>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                
                    <!-- =========================== END OF COURSES =============================== -->

                    

                    <!-- ================= SUBJECT ======================== -->
                    <div class="mb-6 border border-light-200 rounded-lg p-6">
                    <?php 
                                $sql = "SELECT * FROM subject_tbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                                
                                // Department Count
                                $sql = "SELECT COUNT(subjectName)`subjectName` FROM subject_tbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetch(); // Use fetch instead of fetchAll
                                
                                if ($result) {
                                    $qty2 = $result['subjectName'];
                                } else {
                                    $qty2 = 0; // Handle the case when no rows are returned
                                }
                            ?>
                        <div class="flex justify-between mb-6">
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">Subjects <span class="text-main">(<?php echo $qty2; ?>)</span></h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addSubject-modal" data-modal-toggle="addSubject-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer" >
                                    + Add new Subject
                                </a>
                            </div>
                        </div>

                        
                        <table id="" class="settingsTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               
                            
                            
                            <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Subject
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Subject Code
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        Actions
                                    </th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr class="bg-white border-b border-light-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $row['subjectName']; ?>
                                    </th>
                                    <td class="px-4 py-2">
                                    <?php echo $row['subjCode']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="inline-block mr-2">
                                            <a type="button" data-modal-target="editSubject-modal" data-modal-toggle="editSubject-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-subject" 
                                            data-id="<?php echo $row['id']; ?>" 
                                            data-sbjname="<?php echo $row['subjectName']; ?>" 
                                            data-sbjcode="<?php echo $row['subjCode']; ?>">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="inline-block">
                                            <a href="../php/delete.php?id=<?php echo $row['id']; ?>&delsub=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-normal text-main dark:text-blue-500 hover:underline">Remove</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ============== END OF SUBJECT =============================== -->
                  
                    <!-- <div class="mb-6 border border-light-200 rounded-lg p-6">
                        <div class="flex justify-between mb-6">
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">School Year</h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addCourse-modal" data-modal-toggle="addCourse-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer">
                                    Update
                                </a>
                            </div>
                        </div>
                        <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
                        <select id="schoolyear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php 
                            $currentYear = date("Y");
                            $endYear = $currentYear + 25; // Assuming you want options up to 75 years in the future

                            for ($year = $currentYear; $year <= $endYear; $year++) {
                                $nextYear = $year + 1;
                                $schoolYear = $year . "-" . $nextYear;
                                echo "<option value='$schoolYear'>$schoolYear</option>";
                            }
                        ?>
                        </select>
                        
                    </div> -->
                </div>

                <!-- USER SETTINGS STARTS HERE -->   
                <div class="hidden pt-4 rounded-lg dark:bg-gray-800" id="usersettings" role="tabpanel" aria-labelledby="usersettings-tab">
                    <?php 
                        $sql = "SELECT * FROM accounts_tbl";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll();
                        
                        // Users Count
                        $sql = "SELECT COUNT(tupv_id)`tupv_id` FROM accounts_tbl";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetch(); // Use fetch instead of fetchAll
                        
                        if ($result) {
                            $qty3 = $result['tupv_id'];
                        } else {
                            $qty3 = 0; // Handle the case when no rows are returned
                        }

                        
                    ?>
                    <div class="mb-6 border border-light-200 rounded-lg p-6">
                        <div class="flex justify-between mb-6">
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">Users <span class="text-main">(<?php echo $qty3; ?>)</span></h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addUser-modal" data-modal-toggle="addUser-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer">
                                    + Add new User
                                </a>
                                
                            </div>
                        </div>
                        
                        <table id="" class="settingsTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                       Pic
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        TUPV ID
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        USERNAME
                                    </th>
                                    <!-- <th scope="col" class="px-4 py-2 font-medium">
                                        PASSWORD
                                    </th> -->
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        FULLNAME
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        DEPARTMENT
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        COURSE
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        TYPE
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        ACTIONS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr class="bg-white border-b border-light-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-900">
                                    <td class="px-2 py-2">
                                        <div class=" h-6 w-6">
                                            <img src="../files/userpics/<?php echo $row['user_picture']; ?>" class="rounded-full h-6 w-6 object-cover" alt="" srcset="">
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['tupv_id']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['username']; ?>
                                    </td>
                                    
                                    <td class="px-4 py-2">
                                        <?php echo $row['full_name']; ?>
                                    </td>
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['department']; ?>
                                    </th>
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['course']; ?>
                                    </th>
                                    <td class="px-4 py-2">
                                        <?php echo $row['type']; ?>
                                    </td>
                                    <td class="px-4 py-2 flex items-center gap-2">
                                        <div class="inline-block mr-2 flex flex-col">
                                            <a type="button" data-modal-target="editUserDetails-modal" data-modal-toggle="editUserDetails-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-userDetails" 
                                            data-id="<?php echo $row['ID']; ?>"
                                            data-userpic="<?php echo $row['user_picture']; ?>"
                                            data-tupvid="<?php echo $row['tupv_id']; ?>"  
                                            data-userfname="<?php echo $row['full_name']; ?>"
                                            data-userdept="<?php echo $row['department']; ?>"
                                            data-usertype="<?php echo $row['type']; ?>"
                                            data-usercourse="<?php echo $row['course']; ?>">
                                                Edit details
                                            </a>
                                            <a type="button" data-modal-target="editUserAccount-modal" data-modal-toggle="editUserAccount-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-userAccount" 
                                            data-id="<?php echo $row['ID']; ?>"
                                            data-userfname="<?php echo $row['full_name']; ?>" 
                                            data-username="<?php echo $row['username']; ?>" 
                                            data-userpass="<?php echo $row['password']; ?>">
                                                Edit account
                                            </a>
                                        </div>
                                        <div class="inline-block">
                                            <a href="../php/delete.php?id=<?php echo $row['ID']; ?>&deluser=true" onclick="return confirm('Are you sure you want to delete this item?');" class="font-normal text-main dark:text-blue-500 hover:underline">Remove</a>
                                        </div>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="mb-6 border border-light-200 rounded-lg p-6">
                        <div class="flex justify-between mb-6">
                            <div>
                                <h1 class="leading-tight tracking-tight text-lg font-medium">Admin <span class="text-main">(2)</span></h1>
                            </div>
                            <div>
                                <a type="button" data-modal-target="addUser-modal" data-modal-toggle="addUser-modal" class="text-main text-sm dark:text-red-500 hover:underline cursor-pointer">
                                    + Add new Admin
                                </a>
                            </div>
                        </div> 
                        <table id="" class="settingsTable pt-3 mb-3 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                       Pic
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        TUPV ID
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        USERNAME
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        PASSWORD
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        FULLNAME
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        DEPARTMENT
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        TYPE
                                    </th>
                                    <th scope="col" class="px-4 py-2 font-medium">
                                        ACTIONS
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr class="bg-white border-b border-light-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-900">
                                    <td class="px-2 py-2">
                                        <div class=" h-6 w-6">
                                            <img src="../src/img/profile_image.jpg" class="rounded-full h-6 w-6" alt="" srcset="">
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['tupv_id']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['password']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <?php echo $row['full_name']; ?>
                                    </td>
                                    <th scope="row" class="px-4 py-2 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $row['department']; ?>
                                    </th>
                                    <td class="px-4 py-2">
                                        <?php echo $row['type']; ?>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="inline-block mr-2">
                                            <a type="button" data-modal-target="editUser-modal" data-modal-toggle="editUser-modal" class="text-blue-600 text-sm dark:text-blue-500 hover:underline cursor-pointer edit-user" 
                                            data-id="<?php echo $row['ID']; ?>"
                                            data-tupvid="<?php echo $row['tupv_id']; ?>" 
                                            data-username="<?php echo $row['username']; ?>" 
                                            data-userpass="<?php echo $row['password']; ?>"
                                            data-userfname="<?php echo $row['full_name']; ?>"
                                            data-userdept="<?php echo $row['department']; ?>"
                                            data-usertype="<?php echo $row['type']; ?>">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="inline-block">
                                            <a href="#" class="font-normal text-main dark:text-blue-500 hover:underline">Remove</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div> -->
                </div>
                <?php 
                include "../php/modal.settings.php"
                ?>
            </div>
        </div>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/flowbite/dist/datepicker.js"></script>
<script src="../src/js/jquery.dataTables.js"></script>
<script src="../src/js/settings.js"></script>
</body>
</html>