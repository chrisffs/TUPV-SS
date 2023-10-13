$(document).ready( function () {
    $('.settingsTable').DataTable({
    "ordering": false,
    "lengthChange": false,
    "info": false,
    
    });
    $('#settingsTable').DataTable({
    "ordering": false,
    "lengthChange": false,
    "info": false,
    "paging": false,
    });


    setTimeout(function() {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 3000);

    // FOR DEPARTMENT EDIT
    $(".edit-department").click(function () {
        var departmentId = $(this).data("id");
        var departmentName = $(this).data("dptname");
        var departmentAcronym = $(this).data("acronym");

        // Populate the modal fields with the data
        $("#editdeptid").val(departmentId);
        $("#editdptname").val(departmentName);
        $("#editdptacronym").val(departmentAcronym);

        // Show the edit modal
        $("#editDepartment-modal").removeClass("hidden");
    });


    // FOR COURSE EDIT 
    // $(".edit-course").click(function () {
    // Use event delegation to open the edit modal
    $('.settingsTable').on('click', '.edit-course', function() {
        var courseId = $(this).data("id");
        var courseName = $(this).data("crsname");
        var courseAcronym = $(this).data("acronym");
        var courseDept = $(this).data("deptname");

        // Populate the modal fields with the data
        $("#editcrsid").val(courseId);
        $("#editcrsname").val(courseName);
        $("#editcrsacronym").val(courseAcronym);
        $("#editcrsdept").val(courseDept);
        // Show the edit modal
        $("#editCourses-modal").removeClass("hidden");
        $("#editCourses-modal").addClass("flex");
    });

    // FOR SUBJECT EDIT
    $(".edit-subject").click(function () {
        var subjectId = $(this).data("id");
        var subjectName = $(this).data("sbjname");
        var subjectCode = $(this).data("sbjcode");

        // Populate the modal fields with the data
        $("#editsbjid").val(subjectId);
        $("#editsbjname").val(subjectName);
        $("#editsbjcode").val(subjectCode);

        // Show the edit modal
        $("#editSubject-modal").removeClass("hidden");
    });

    $(".edit-user").click(function () {
        var userId = $(this).data("id");
        var userTupvId = $(this).data("tupvid");
        var userName = $(this).data("username");
        var userPass = $(this).data("userpass");
        var userFname = $(this).data("userfname");
        var userDept = $(this).data("userdept");
        var userType = $(this).data("usertype");

        // Populate the modal fields with the data
        $("#edituserid").val(userId);
        $("#editusertupvid").val(userTupvId);
        $("#edituseruname").val(userName);
        $("#edituserpass").val(userPass);
        $("#edituserfname").val(userFname);
        $("#edituserdept").val(userDept);
        $("#editusertype").val(userType);

        // Show the edit modal
        $("#editUser-modal").removeClass("hidden");
    });

    // $("#confirm-password").on('keyup', function() {
    //     var password = $("#password").val();
    //     var confirmPassword = $(this).val();

    //     if (password === confirmPassword) {
    //         // Passwords match, hide the error message
    //         $("#password-match-error").addClass("hidden");
    //     } else {
    //         // Passwords do not match, show the error message
    //         $("#password-match-error").removeClass("hidden");
    //     }
    // });




} );