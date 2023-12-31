$(document).ready(function() {
    $(".clickable").on("click", function() {
        var link = $(this).data("href");
        if (link) {
            window.open(link, "_blank"); // Use "_blank" to open in a new tab or window
        }
    });
    
    $('.text-truncate').each(function() {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
    var filter = $('#filter');
    var menuContainer = $('#files');

    filter.on('keyup', searchMenu);

    function searchMenu(e) {
        var typedText = e.target.value.toLowerCase();
        var menuItems = menuContainer.find('tr');
        
        menuItems.each(function() {
            var menuItem = $(this);
            var menuNames = menuItem.find('h1, h2');
            var showMenuItem = false;
            
            menuNames.each(function() {
                var menuName = $(this).text().toLowerCase();
                if (menuName.indexOf(typedText) !== -1) {
                    showMenuItem = true;
                }
            })
            // console.log(menuItem);
            if (showMenuItem) {
                menuItem.addClass('table-row');
                menuItem.removeClass('hidden');
            } else {
                menuItem.addClass('hidden');
            }
        })
    }
});