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
        var inputValue = $(this).val();
        console.log($(this).attr('id').split("test-points").pop());
        // Check if the input value is not empty
        if (inputValue.trim() !== "") {
            // If not empty, display the points information
            var points = "( " + inputValue + " points each )";
            // Update the nearest .points span within the same container with the input value
            $(".points" + $(this).attr('id').split("test-points").pop()).text(points);
        } else {
            // If empty, clear the points information
            $(".points" + $(this).attr('id').split("test-points").pop()).text("");
        }
    });
});

