$(document).ready(function () {
    $("#part").change(function () {
        var selectedParts = parseInt($(this).val());
        $("#testPartsContainer").empty();

        for (var i = 1; i <= selectedParts; i++) {
            var testPartHTML = `
                <div class="col-span-2">
                    <label for="testpart${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TEST ${i}</label>
                    <input id="testpart${i}" name="testpart${i}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="number" placeholder="Enter no. of Questions" required>
                </div>
            `;
            $("#testPartsContainer").append(testPartHTML);
        }
        
    });
    $(".test-points-input").on("input", function () {
        // Get the input value
        var points = $(this).val();
        console.log($(this).closest(".flex"));
        // Update the nearest .points span within the same container with the input value
        $(this).closest(".flex").find(".points").text(points + "points each )");
    });
});