<nav class="fixed top-0 z-50 w-full bg-light border-b border-light-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-secondary rounded-lg sm:hidden hover:bg-light-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <div class="mx-2 flex">
            <div class="me-2">
                <img src="../src/img/tupvlogo.png" class="h-8 object-cover" alt="" srcset="">
            </div>
            <div>
                <img src="../src/img/sslogo.png" class="h-8 object-cover" alt="" srcset="">
            </div>
        </div>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-secondary rounded-full focus:ring-4 focus:ring-light-200 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../src/img/profile_image.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-light divide-y divide-light-200 rounded shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-secondary dark:text-light" role="none">
                  <?php echo $_SESSION['full_name']?>
                </p>
                <p class="text-sm font-medium text-main truncate dark:text-gray-300" role="none">
                  <?php echo $_SESSION['type'] ?>
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-light-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-light" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-secondary hover:bg-light-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-light" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="../php/logout.php" class="block px-4 py-2 text-sm text-secondary hover:bg-light-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-light" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-light border-r border-light-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-light dark:bg-gray-800">
      <ul class="space-y-2 font-normal">
         <li>
            <a href="../admin/dashboard.php" class="text-sm flex items-center px-4 py-3 <?php if($page=='dashboard'){echo 'text-main';} else {echo 'text-secondary';}?> rounded-lg dark:text-light hover:bg-light-100 dark:hover:bg-gray-700 group">
    
                  <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                     <path d="M9 4.025A7.5 7.5 0 1 0 16.975 12H9V4.025Z"/>
                     <path d="M12.5 1c-.169 0-.334.014-.5.025V9h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 12.5 1Z"/>
                  </g>
               </svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../admin/syllabus.php" class="text-sm flex items-center px-4 py-3 <?php if($page=='syllabus'){echo 'text-main';} else {echo 'text-secondary';}?> rounded-lg dark:text-light hover:bg-light-100 dark:hover:bg-gray-700 group">
               <span class="ml-3">Syllabus</span>
            </a>
         </li>
         <li>
            <a href="../admin/questionbank.php" class="text-sm flex items-center px-4 py-3 <?php if($page=='questionbank'){echo 'text-main';} else {echo 'text-secondary';}?> rounded-lg dark:text-light hover:bg-light-100 dark:hover:bg-gray-700 group">
               <span class="ml-3">Question Bank</span>
            </a>
         </li>
         <li>
            <a href="../admin/examgenerator.php" class="text-sm flex items-center px-4 py-3 <?php if($page=='examgenerator'){echo 'text-main';} else {echo 'text-secondary';}?> rounded-lg dark:text-light hover:bg-light-100 dark:hover:bg-gray-700 group">
               <span class="ml-3">Exam Generator</span>
            </a>
         </li>
      </ul>
   </div>
</aside>