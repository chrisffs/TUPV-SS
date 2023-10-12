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
});