<?php 
if (isset($_SESSION['useralert_message'])) {
    ?>
    <div id="marketing-banner-success" tabindex="-1" class="alert fixed z-50 gap-4 w-11/12 md:w-fit -translate-x-1/2 left-1/2 top-6 flex items-center justify-between p-4 md:p-6 mb-4 text-sm text-<?php echo $_SESSION['useralert_messagecolor'] ?>-800 border border-<?php echo $_SESSION['useralert_messagecolor'] ?>-200 rounded-lg bg-<?php echo $_SESSION['useralert_messagecolor'] ?>-50">
        <div class="flex items-center">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <?php echo $_SESSION['useralert_message']?>
            </div>
        </div>
        <div class="flex items-center flex-shrink-0">
            <button data-dismiss-target="#marketing-banner-success" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-<?php echo $_SESSION['useralert_messagecolor'] ?>-50 text-<?php echo $_SESSION['useralert_messagecolor'] ?>-500 rounded-lg focus:ring-2 focus:ring-<?php echo $_SESSION['useralert_messagecolor'] ?>-400 p-1.5 hover:bg-<?php echo $_SESSION['useralert_messagecolor'] ?>-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-<?php echo $_SESSION['useralert_messagecolor'] ?>-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    <?php
    // Reset the session variable to prevent displaying the alert on page reload
    unset($_SESSION['useralert_message']);
    unset($_SESSION['useralert_messagecolor']);
}
?>