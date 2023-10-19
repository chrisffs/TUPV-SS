$(document).ready( function () {
    $('.archiveTable').DataTable({
    "ordering": false,
    "lengthChange": false,
    "info": false
    });

    // FOR SHOWING QUESTION
    $('.archiveTable').on('click', '.question-showchecker', function() {
        var id = $(this).data("id");
        var question = $(this).data("question");
        var a = $(this).data("a");
        var b = $(this).data("b");
        var c = $(this).data("c");
        var d = $(this).data("d");
        var ans = $(this).data("ans");

        // Populate the modal fields with the data
        console.log(question);
        $("#IDchecker").text(id);
        $("#questionchecker").text(question);
        $("#achecker").text(a);
        $("#bchecker").text(b);
        $("#cchecker").text(c);
        $("#dchecker").text(d);
        $("#anschecker").text(ans);
        // Show the edit modal
        $("#question-modalcheckerDEC").addClass("flex");
        $("#uestion-modalcheckerDEC").removeClass("hidden");
    });
} );