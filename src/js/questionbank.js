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

    $('#qBankPendingTableDEC').DataTable({
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
        console.log(question);
        // Populate the modal fields with the data
        $("#ID").text(id);
        $("#question").html(question);
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
    $('#qBankPendingTable').on('click', '.question-showchecker', function() {
        var idchecker = $(this).data("idchecker");
        var questionchecker = $(this).data("questionchecker");
        var achecker = $(this).data("achecker");
        var bchecker = $(this).data("bchecker");
        var cchecker = $(this).data("cchecker");
        var dchecker = $(this).data("dchecker");
        var anschecker = $(this).data("anschecker");

        // Populate the modal fields with the data
        $("#IDchecker").text(idchecker);
        $("#questionchecker").html(questionchecker);
        $("#achecker").text(achecker);
        $("#bchecker").text(bchecker);
        $("#cchecker").text(cchecker);
        $("#dchecker").text(dchecker);
        $("#anschecker").text(anschecker);
        // Show the edit modal
        $("#question-modalchecker").addClass("flex");
        $("#question-modalchecker").removeClass("hidden");
        
    });





    // // FOR SHOWING CHECKER QUESTION DECLINED
    // $('#qBankPendingTableDEC').on('click', '.question-showcheckerDEC', function() {
    //     var idcheckerDEC = $(this).data("idcheckerDEC");
    //     var questioncheckerDEC = $(this).data("questioncheckerDEC");
    //     var acheckerDEC = $(this).data("acheckerDEC");
    //     var bcheckerDEC = $(this).data("bcheckerDEC");
    //     var ccheckerDEC = $(this).data("ccheckerDEC");
    //     var dcheckerDEC = $(this).data("dcheckerDEC");
    //     var anscheckerDEC = $(this).data("anscheckerDEC");
        
    //     // Populate the modal fields with the data
    //     $("#IDcheckerDEC").text(idcheckerDEC);
    //     $("#questioncheckerDEC").text(questioncheckerDEC);
    //     $("#acheckerDEC").text(acheckerDEC);
    //     $("#bcheckerDEC").text(bcheckerDEC);
    //     $("#ccheckerDEC").text(ccheckerDEC);
    //     $("#dcheckerDEC").text(dcheckerDEC);
    //     $("#anscheckerDEC").text(anscheckerDEC);
    //     // Show the edit modal
    //     $("#question-modalcheckerDEC").addClass("flex");
    //     $("#question-modalcheckerDEC").removeClass("hidden");
        
    // });
});