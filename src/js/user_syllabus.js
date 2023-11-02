$(document).ready(function() {
    // Hide the button initially
    // var modalButton = $('[data-modal-toggle="extralarge-modal"]');
    // // modalButton.hide();
  
    // // Use setTimeout to trigger a click event after 2 seconds
    // setTimeout(function() {
    //   modalButton.click();
    // }, 1300);
    
    
    $('.text-truncate').each(function() {
        const text = $(this).text();
        const truncated = text.split(' ').slice(0, 5).join(' '); // Get the first 20 words
        $(this).text(truncated + '...'); // Display truncated text with ellipsis
    });
    var filter = $('#filter');
    var menuContainer = $('#folders');

    filter.on('keyup', searchMenu);

    function searchMenu(e) {
        var typedText = e.target.value.toLowerCase();
        var menuItems = menuContainer.find('a');
        
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
            if (showMenuItem) {
                menuItem.addClass('block');
                menuItem.removeClass('hidden');
            } else {
                menuItem.addClass('hidden');
            }
        })
    }
});