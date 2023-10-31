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
    // "paging": false,
    });
    
    $('#userTupvId').on('input', function() {
        // Synchronize the value with the 'userUName' input
        $('#userUName').val($(this).val());
    });

    setTimeout(function() {
        $(".alert").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 2500);

    // FOR DEPARTMENT EDIT
    // $(".edit-department").click(function () {
    $('.settingsTable').on('click', '.edit-department', function() {
        var departmentId = $(this).data("id");
        var departmentName = $(this).data("dptname");
        var departmentAcronym = $(this).data("acronym");

        // Populate the modal fields with the data
        $("#editdeptid").val(departmentId);
        $("#editdptname").val(departmentName);
        $("#editdptacronym").val(departmentAcronym);

        // Show the edit modal
        $("#editDepartment-modal").removeClass("hidden");
        $("#editDepartment-modal").addClass("flex");
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
    // $(".edit-subject").click(function () {
    $('.settingsTable').on('click', '.edit-subject', function() {
        var subjectId = $(this).data("id");
        var subjectName = $(this).data("sbjname");
        var subjectCode = $(this).data("sbjcode");

        // Populate the modal fields with the data
        $("#editsbjid").val(subjectId);
        $("#editsbjname").val(subjectName);
        $("#editsbjcode").val(subjectCode);

        // Show the edit modal
        $("#editSubject-modal").removeClass("hidden");
        $("#editSubject-modal").addClass("flex");
    });
    $('.settingsTable').on('click', '.edit-userDetails', function() {
        var userId = $(this).data("id");
        var userPic = $(this).data("userpic");
        var userTupvId = $(this).data("tupvid");
        var userFname = $(this).data("userfname");
        var userDept = $(this).data("userdept");
        var userType = $(this).data("usertype");

        // Populate the modal fields with the data
        $("#edituserid").val(userId);
        $("#user-profilepic").attr("src", "../files/userpics/" + userPic);
        $("#userprofilepic").val(userPic);
        $("#editusertupvid").val(userTupvId);
        $("#edituserfname").val(userFname);
        $("#edituserdept").val(userDept);
        $("#editusertype").val(userType);
        
        // Show the edit modal
        $("#editUserDetails-modal").removeClass("hidden");
        $("#editUserDetails-modal").addClass("flex");
    });
    $('.settingsTable').on('click', '.edit-userAccount', function() {
        var userId = $(this).data("id");
        var userName = $(this).data("username");
        var userFname = $(this).data("userfname");

        // Populate the modal fields with the data
        $("#editaccuserid").val(userId);
        $("#edituseruname").val(userName);
        $("#edituseraccfname").text(userFname);

        // Show the edit modal
        $("#editUserAccount-modal").removeClass("hidden");
        $("#editUserAccount-modal").addClass("flex");
    });

    $("#confirm-password").on('keyup', function() {
        var password = $("#edituserpass").val();
        var confirmPassword = $(this).val();
        console.log(password);
        console.log(confirmPassword);
        if (password === confirmPassword) {
            // Passwords match, hide the error message
            $("#password-match-error-edit").addClass("hidden");
        } else {
            // Passwords do not match, show the error message
            $("#password-match-error-edit").removeClass("hidden");
        }
    });
    $("#confirm-password2").on('keyup', function() {
        var password2 = $("#userPass").val();
        var confirmPassword2 = $(this).val();
        console.log(confirmPassword2);
        if (password2 === confirmPassword2) {
            // Passwords match, hide the error message
            $("#password-match-error").addClass("hidden");
        } else {
            // Passwords do not match, show the error message
            $("#password-match-error").removeClass("hidden");
        }
    });




} );