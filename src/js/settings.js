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

    // $("#confirm-password").on('keyup', function() {
    //     var password = $("#edituserpass").val();
    //     var confirmPassword = $(this).val();
    //     console.log(password);
    //     console.log(confirmPassword);
    //     if (password === confirmPassword) {
    //         // Passwords match, hide the error message
    //         $("#password-match-error-edit").addClass("hidden");
    //     } else {
    //         // Passwords do not match, show the error message
    //         $("#password-match-error-edit").removeClass("hidden");
    //     }
    // });
    var addUserForm = $("#addUserForm");
    var password = $("#userPass");
    var confirmPassword = $("#confirm-password2");
    var passwordMatchError = $("#password-match-error");

    var editUserAccountForm = $("#editUserAccountForm");
    var editUserPass = $("#edituserpass");
    var confirmPasswordEdit = $("#confirm-password");
    // Event listener for checking password match
    confirmPassword.on('keyup', function () {
        var passwordValue = password.val();
        var confirmPasswordValue = $(this).val();

        if (passwordValue === confirmPasswordValue) {
            // Passwords match, hide the error message
            passwordMatchError.addClass("hidden");
        } else {
            // Passwords do not match, show the error message
            passwordMatchError.removeClass("hidden");
        }
    });

    // Form submission handler
    addUserForm.on('submit', function (event) {
        if (password.val() !== confirmPassword.val()) {
            // Passwords don't match, prevent form submission
            passwordMatchError.removeClass("hidden");

            // Add an alert
            alert("Passwords do not match. Please check and try again.");

            event.preventDefault();
        } else {
            // Passwords match, you can proceed with form submission
            passwordMatchError.addClass("hidden");
        }
    });

    // Event listener for checking password match
    confirmPasswordEdit.on('keyup', function () {
        var editUserPassValue = editUserPass.val();
        var confirmPasswordEditValue = $(this).val();

        if (editUserPassValue === confirmPasswordEditValue) {
            // Passwords match, hide the error message
            $("#password-match-error-edit").addClass("hidden");
        } else {
            // Passwords do not match, show the error message
            $("#password-match-error-edit").removeClass("hidden");
        }
    });

    // Form submission handler
    editUserAccountForm.on('submit', function (event) {
        if (editUserPass.val() !== confirmPasswordEdit.val()) {
            // Passwords don't match, prevent form submission
            $("#password-match-error-edit").removeClass("hidden");

            // Add an alert
            alert("Passwords do not match. Please check and try again.");

            event.preventDefault();
        } else {
            // Passwords match, you can proceed with form submission
            $("#password-match-error-edit").addClass("hidden");
        }
    });



} );