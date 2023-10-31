<!-- MODAL FOR ADD NEW DEPARTMENTS -->
<div id="addDepartment-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add Departments
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addDepartment-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="addDepartment-form" method="post" action="../php/insert.php">
                    <!-- Input fields will be added dynamically here -->
                    <label for="dptname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department Name</label>
                    <input type="text" name="dptname" id="dptname" required placeholder="Enter Department Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="acronym" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department Acronym</label>
                    <input type="text" name="acronym" id="dptacronym" required placeholder="Enter Department Acronym eg. COET" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="addDepartment-form" type="submit" name="insertdpt" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">Add Department</button>
                <button data-modal-hide="addDepartment-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
            
        </div>
    </div>
</div>

<!-- MODAL FOR ADD NEW Subject -->
<div id="addSubject-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add Subject
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addSubject-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="addSubject-form" method="post" action="../php/insert.php">
                       <!-- Input fields will be added dynamically here -->
                    <label for="subjectName" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject Name</label>
                    <input type="text" name="subjectName" id="subjectName" required placeholder="Enter Subject Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="subjCode" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject Code</label>
                    <input type="text" name="subjCode" id="subjCode" required placeholder="Enter Subject Code eg. COMP-123" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="addSubject-form" data-modal-hide="addSubject-modal" type="submit" name="insertsubject" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">Add Subject</button>

                <button data-modal-hide="addSubject-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
            
        </div>
    </div>
</div>

<!-- MODAL FOR ADD NEW course -->
<div id="addCourse-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add New Course
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addCourse-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="addCourse-form" method="post" action="../php/insert.php">
                    <label for="courseName" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Course Name</label>
                    <input type="text" name="courseName" id="courseName" required placeholder="Enter Course Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="acro" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Course Acronym</label>
                    <input type="text" name="acro" id="acro" required placeholder="Enter Course Acronym eg. BSET" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    
                    <?php
                          $sql = "SELECT * FROM departmenttbl";
                          $stmt = $conn->prepare($sql);
                          $stmt->execute();
                          $data = $stmt->fetchAll();
                    ?>
                    <label for="acronym" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Select Department</label>
                    <select id="departmentacronym" name= "acronym" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled hidden value="">Choose a Department</option>
                    <?php foreach ($data as $row): ?>
                    <option value="<?php echo $row['acronym']; ?>"> <?php echo $row['acronym']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="addCourse-form" data-modal-hide="addCourse-modal" type="submit" name="insertcourse" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">Add Course</button>

                <button data-modal-hide="addCourse-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR ADD NEW USER -->
<div id="addUser-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Add New User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addUser-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="addUserForm" method="post" action="../php/insert.php" enctype="multipart/form-data">
                    <div class="grid gap-2 sm:grid-cols-4 content-end">
                        <div class="sm:col-span-1">
                            <div class="w-20 h-20">
                                <img class="w-20 h-20 mb-3 rounded-full" src="../src/img/profile_image.jpg" alt="Bonnie image"/>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="user_pic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Profile Picture</label>
                            <input name="user_pic" id="user_pic" value="default.jpg" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="userFullName" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" name="userFullName" id="userFullName" required placeholder="User Full Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="userTupvId" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">TUPV ID</label>
                            <input type="text" name="userTupvId" id="userTupvId" required placeholder="User TUPV-ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-2">
                            <?php
                                $sql = "SELECT * FROM departmenttbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                            ?>
                            <label for="userDept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                            <select id="userDept" name= "userDept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected disabled hidden value="">Choose a Department</option>
                                <?php foreach ($data as $row): ?>
                                <option value="<?php echo $row['acronym']; ?>"> <?php echo $row['acronym']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="userUName" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="userUName" id="userUName" required placeholder="Enter Username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="userPass" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="userPass" name="userPass" placeholder="Enter Password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="confirm-password2" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="confirm-password2" id="confirm-password2" placeholder="Confirm Password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <p id="password-match-error" class="text-xs mt-2 text-red-500 hidden">Passwords do not match.</p>
                        </div>
                        <div class="sm:col-span-4">
                            <input type="hidden" name="usertype" id="usertype" value="user" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <!-- <div class="sm:col-span-4">
                            <label for="confirm-password" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <p id="password-match-error" class="text-xs mt-2 text-red-500 hidden">Passwords do not match.</p>
                        </div> -->
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="addUserForm" type="submit" name="insertuser" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">Add User</button>

                <button data-modal-hide="addUser-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>





<!-- MODAL FOR EDIT DEPARTMENT -->
<div id="editDepartment-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="editDepartment-modal"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Department
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editDepartment-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="editCrsForm" method="post" action="../php/edit.setting.php">
                    <!-- Input fields will be added dynamically here -->
                    <input type="text" name="editdeptid" id="editdeptid" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="editdptname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department Name</label>
                    <input type="text" name="editdptname" id="editdptname" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                       
                    <label for="editdptacronym" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department Acronym</label>
                    <input type="text" name="editdptacronym" id="editdptacronym" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </form> 
            </div>
                <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editCrsForm" data-modal-hide="editDepartment-modal" type="submit" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800" name="updateDept">Update</button>

                <button data-modal-hide="editDepartment-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT COURSE -->
<div id="editCourses-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="editCourses-modal"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Course
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editCourses-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="editCourseForm" method="post" action="../php/edit.setting.php">
                <!-- Input fields will be added dynamically here -->
                    <input type="hidden" name="editcrsid" id="editcrsid" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="editcrsname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Course Name</label>
                    <input type="text" name="editcrsname" id="editcrsname" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                       
                    <label for="editcrsacronym" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Course Acronym</label>
                    <input type="text" name="editcrsacronym" id="editcrsacronym" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="editcrsdept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department Belong</label>
                    <select name="editcrsdept" id="editcrsdept" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                        <?php 
                        $sql = "SELECT * FROM departmenttbl";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetchAll();

                        foreach ($data as $row):
                        ?>
                        <option value="<?php echo $row['acronym']; ?>"><?php echo $row['acronym']; ?></option>
                        
                        <?php endforeach; ?>
                    </select>
                </form> 
            </div>
                <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editCourseForm" data-modal-hide="editCourses-modal" type="submit" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800" name="updateCourse">Update</button>
                <button data-modal-hide="editCourses-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT SUBJECT -->
<div id="editSubject-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="editSubject-modal"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit Subject
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editSubject-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="editSubjectForm" method="post" action="../php/edit.setting.php">
                <!-- Input fields will be added dynamically here -->
                    <input type="hidden" name="editsbjid" id="editsbjid" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <label for="editsbjname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject Name</label>
                    <input type="text" name="editsbjname" id="editsbjname" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                       
                    <label for="editsbjcode" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject Code</label>
                    <input type="text" name="editsbjcode" id="editsbjcode" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </form> 
            </div>
                <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editSubjectForm" data-modal-hide="editSubject-modal" type="submit" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800" name="updateSubject">Update</button>
                <button data-modal-hide="editSubject-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT USER DETAILS -->
<div id="editUserDetails-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="editUserDetails-modal"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit User Details
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserDetails-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="editUserDetailsForm" method="post" action="../php/edit.setting.php" enctype="multipart/form-data">
                    <div class="grid gap-2 sm:grid-cols-4 content-end">
                        <div class="sm:col-span-1">
                            <div class="w-20 h-20 border rounded">
                                <img id="user-profilepic" class="w-20 h-20 mb-3 rounded object-cover" src="" alt="Bonnie image"/>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="change_userprofile">Change Profile Picture</label>
                            <input type="hidden" readonly name="userprofilepic" id="userprofilepic" required placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                            <input name="change_userpic" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="change_userprofile" type="file">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="edituserfname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" name="edituserfname" id="edituserfname" required placeholder="User Full Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="editusertupvid" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">TUPV ID</label>
                            <input type="text" name="editusertupvid" id="editusertupvid" required placeholder="User TUPV-ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-2">
                            <?php
                                $sql = "SELECT * FROM departmenttbl";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $data = $stmt->fetchAll();
                            ?>
                            <label for="edituserdept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                            <select id="edituserdept" name= "edituserdept" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled hidden value="N/A">Choose a Department</option>
                                <?php foreach ($data as $row): ?>
                                <option value="<?php echo $row['acronym']; ?>"> <?php echo $row['acronym']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <div class="sm:col-span-4">
                            <label for="edituseruname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="edituseruname" id="edituseruname" required placeholder="Enter Username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div> -->
                        <!-- <div class="sm:col-span-4">
                            <label for="edituserpass" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="text" id="edituserpass" name="edituserpass" placeholder="Enter Password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div> -->
                        <div class="sm:col-span-4">
                            <input type="hidden" name="edituserid" id="edituserid" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                            <label for="editusertype" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                            <select id="editusertype" name= "editusertype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            </select>
                        </div>
                        <!-- <div class="sm:col-span-4">
                            <label for="confirm-password" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <p id="password-match-error" class="text-xs mt-2 text-red-500 hidden">Passwords do not match.</p>
                        </div> -->
                    </div>
                </form> 
            </div>
                <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editUserDetailsForm" data-modal-hide="editUserDetails-modal" type="submit" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800" name="updateUserDetails">Update</button>
                <button data-modal-hide="editUserDetails-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT USER ACCOUNT -->
<div id="editUserAccount-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="fixed inset-0 bg-gray-600 opacity-75" data-modal-hide="editUserAccount-modal"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Edit User Account
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserAccount-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <!-- Modal body -->
            <div class="modal-body p-6 space-y-6">
                <form id="editUserAccountForm" method="post" action="../php/edit.setting.php" enctype="multipart/form-data">
                    <div class="grid gap-2 sm:grid-cols-4 content-end">
                        <input type="hidden" readonly name="editaccuserid" id="editaccuserid" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <div class="sm:col-span-4 pb-2 border-b">
                            <label for="edituseraccfname" class="block text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <h1 id="edituseraccfname" class="text-lg font-semibold"></h1>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="edituseruname" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="edituseruname" id="edituseruname" required placeholder="Enter Username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="edituserpass" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="edituserpass" name="edituserpass" placeholder="Enter Password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="confirm-password" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <p id="password-match-error-edit" class="text-xs mt-2 text-red-500 hidden">Passwords do not match.</p>
                        </div>
                    </div>
                </form> 
            </div>
                <!-- Modal footer -->
            <div class="flex items-center py-6 mx-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editUserAccountForm" data-modal-hide="editUserAccount-modal" type="submit" class="text-white bg-main hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800" name="updateUserAccount">Update</button>
                <button data-modal-hide="editUserAccount-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>