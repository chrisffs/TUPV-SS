$(document).ready( function () {
    $('.qBankListTable').DataTable({
        "ordering": false,
        "lengthChange": false,
        "info": false
    });

    $('#qBankPendingTable').DataTable({
        "ordering": false,
        "lengthChange": false,
        "info": false
    });

    // FOR SHOWING QUESTION
    $('.qBankListTable').on('click', '.question-show', function() {
        var id = $(this).data("id");
        var question = $(this).data("question");
        var a = $(this).data("a");
        var b = $(this).data("b");
        var c = $(this).data("c");
        var d = $(this).data("d");
        var ans = $(this).data("ans");

        // Populate the modal fields with the data
        $("#ID").text(id);
        $("#question").text(question);
        $("#a").text(a);
        $("#b").text(b);
        $("#c").text(c);
        $("#d").text(d);
        $("#ans").text(ans);
        // Show the edit modal
        $("#question-modal").addClass("flex");
        $("#question-modal").removeClass("hidden");
    });

    // FOR SHOWING CHECKER QUESTION
    $('.qBankPendingTable').on('click', '.question-showchecker', function() {
        var idchecker = $(this).data("idchecker");
        var questionchecker = $(this).data("questionchecker");
        var achecker = $(this).data("achecker");
        var bchecker = $(this).data("bchecker");
        var cchecker = $(this).data("cchecker");
        var dchecker = $(this).data("dchecker");
        var anschecker = $(this).data("anschecker");

        // Populate the modal fields with the data
        $("#IDchecker").text(idchecker);
        $("#questionchecker").text(questionchecker);
        $("#achecker").text(achecker);
        $("#bchecker").text(bchecker);
        $("#cchecker").text(cchecker);
        $("#dchecker").text(dchecker);
        $("#anschecker").text(anschecker);
        // Show the edit modal
        $("#question-modalchecker").addClass("flex");
        $("#question-modalchecker").removeClass("hidden");
        
    });
});