<?php 
include '../php/session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <title>Document</title>
</head>
<body class="bg-light-100">

<?php 
$page = 'dashboard';
include '../php/header.php' 
?>

<div class="absolute w-full">
   <img src="../src/img/admin_bg.png" class="object-cover w-full z-0 h-[16rem]" srcset="">
</div>
<div class="p-2 sm:ml-64 relative">
   <div class="p-4 mt-14">
      <div class="mb-10">
         <h1 class="text-4xl font-bold text-light">Hello Admin!</h1>
         <h4 class="text-light text-xl">Welcome Back!</h4>
      </div>
      <div class="grid grid-cols-4 gap-4 mb-6">
         <div class="flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 rounded-lg me-6">
               <svg class="w-[32px] h-[32px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
               </svg>
            </div>
            <div>
               <h1 class="text-2xl font-bold text-dark">148</h1>
               <h3 class="text-sm text-secondary">Modules Uploaded</h3>
            </div>
         </div>
         <div class="flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 rounded-lg me-6">
               <svg class="w-[32px] h-[32px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
               </svg>
            </div>
            <div>
               <h1 class="text-2xl font-bold text-dark">1024</h1>
               <h3 class="text-sm text-secondary">Questions Made</h3>
            </div>
         </div>
         
         <div class="col-span-2 flex items-center bg-light p-6 border border-light-200 rounded-lg">
            <div class="bg-light-100 p-4 text-center rounded-lg me-6">
               <h1 class="font-bold text-main text-3xl">24</h1>
               <h3 class="text-dark text-sm text-secondary">September</h3>
            </div>
            <div>
               <h3 class="text-sm text-secondary">Upcoming Events</h3>
               <h1 class="text-2xl font-bold text-dark">Prelim Examination</h1>
            </div>
         </div>
      </div>
      <div class="grid grid-cols-3 gap-4">
         <div class="col-span-1">
            <h1 class="leading-tight tracking-tight text-2xl font-bold mb-2">Recent</h1>
         </div>
         <div class="col-span-2">
            <h1 class="leading-tight tracking-tight text-2xl font-bold mb-2">Quick Actions</h1>
         </div>
      </div>
      <div class="grid grid-cols-3 grid-rows-2 gap-4 content-stretch">
         <div class="col-span-1 row-span-2">
            <div class="bg-light p-6 border border-light-200 rounded-lg ">
               <h2 class="leading-tight tracking-tight font-semibold text-dark mb-4">Activity Log</h2>
               <div class="mb-4 min-h-[480px]">
                  <ol class="divide-y divider-gray-200 dark:divide-gray-700">
                     <li>
                        <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                           <div class="w-5/6 flex gap-2 text-gray-600 dark:text-gray-400 ">
                              <div class="">
                                 <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                 <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                                 </svg>
                              </div>
                              <div class="min-w-0">
                                 <h4 class="text-main text-xs font-medium mb-1"><span>Question Bank    </span>•<span class="text-gray-400 italic">    1 minute ago</span></h4>
                                 <h4 class="text-dark text-sm font-medium">Accepted <span class="text-main italic">Question</span> Submitted by <span class="font-semibold text-dark">Ramon Lito</span> </h4>
                                 <h4 class="text-gray-500 text-sm truncate">What is the main component of the Earth's atmosphere?</h4>
                              </div>
                           </div>
                           <div class="invisible group-hover/main:visible w-1/6 flex justify-end items-center">
                              <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">Undo</a>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                           <div class="w-5/6 flex gap-2 text-gray-600 dark:text-gray-400 ">
                              <div class="">
                                 <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                 <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                                 </svg>
                              </div>
                              <div class="min-w-0">
                                 <h4 class="text-main text-xs font-medium mb-1"><span>Syllabus    </span>•<span class="text-gray-400 italic">    1 hour ago</span></h4>
                                 <h4 class="text-dark text-sm font-medium">Accepted <span class="text-main italic">Module</span> Uploaded by <span class="font-semibold text-dark">Ramon Lito</span> </h4>
                                 <h4 class="text-gray-500 text-sm truncate">ENVIRONMENTAL_ENGINEERINGWEEK1&2.pdf</h4>
                              </div>
                           </div>
                           <div class="invisible group-hover/main:visible w-1/6 flex justify-end items-center">
                              <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">Undo</a>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                           <div class="w-5/6 flex gap-2 text-gray-600 dark:text-gray-400 ">
                              <div class="">
                                 <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                 <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                                 </svg>
                              </div>
                              <div class="min-w-0">
                                 <h4 class="text-main text-xs font-medium mb-1"><span>Syllabus    </span>•<span class="text-gray-400 italic">    1 hour ago</span></h4>
                                 <h4 class="text-dark text-sm font-medium">Accepted <span class="text-main italic">Module</span> Uploaded by <span class="font-semibold text-dark">Ramon Lito</span> </h4>
                                 <h4 class="text-gray-500 text-sm truncate">ENVIRONMENTAL_ENGINEERINGWEEK1&2.pdf</h4>
                              </div>
                           </div>
                           <div class="invisible group-hover/main:visible w-1/6 flex justify-end items-center">
                              <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">Undo</a>
                           </div>
                        </div>
                     </li>
                  </ol>
               </div>
               <div class="mt-auto mx-0 text-end">
                  <a href="#" class="inline-flex items-center font-medium text-main hover:text-red-800">
                     View more
                     <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-span-2 row-span-1 bg-light p-6 border border-light-200 rounded-lg h-50">
            <h2 class="leading-tight tracking-tight font-semibold text-dark mb-4">Pending Questions</h2>
            <div class="mb-4">
               <ol class="divide-y divider-gray-200 dark:divide-gray-700">
                  <li>
                     <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-11/12 flex gap-2 text-gray-600 dark:text-gray-400">
                           <div class="">
                              <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                              </svg>
                           </div>
                           <div class="grow">
                              <div class="flex align-center">
                                 <img src="../src/img/profile_image.jpg" class="rounded-full h-4 w-4 mr-2" alt="" srcset="">
                                 <h4 class="text-main text-xs font-medium mb-1"><span class="text-dark">Ramon Lito    </span>•<span class="text-gray-400 italic">    1 minute ago</span></h4>
                              </div>
                              
                              <h4 class="text-dark text-sm font-medium">What is the main component of the Earth's atmosphere?</h4>
                              <div class="flex text-sm justify-between">
                                 <h4 class="text-dark">a. Nitrogen</h4>
                                 <h4 class="text-dark">b. Oxygen</h4>
                                 <h4 class="text-dark">c. Carbon Dioxide</h4>
                                 <h4 class="text-dark">d. Helium</h4>
                              </div>
                              <div class="mt-2 flex flex-wrap">
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Bachelor of Science in Mechanical Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Engineering Subject</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">3rd Year</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Prelim</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">1st Semester</div>   
                              </div>
                           </div>
                        </div>
                        <div class="invisible group-hover/main:visible w-1/12 flex gap-2 flex-col justify-center items-center">
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                              </svg>
                           </a>
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-secondary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                           </a>
                           
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-11/12 flex gap-2 text-gray-600 dark:text-gray-400">
                           <div class="">
                              <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                              </svg>
                           </div>
                           <div class="grow">
                              <div class="flex align-center">
                                 <img src="../src/img/profile_image.jpg" class="rounded-full h-4 w-4 mr-2" alt="" srcset="">
                                 <h4 class="text-main text-xs font-medium mb-1"><span class="text-dark">Ramon Lito    </span>•<span class="text-gray-400 italic">    1 minute ago</span></h4>
                              </div>
                              
                              <h4 class="text-dark text-sm font-medium">What is the main component of the Earth's atmosphere?</h4>
                              <div class="flex text-sm justify-between">
                                 <h4 class="text-dark">a. Nitrogen</h4>
                                 <h4 class="text-dark">b. Oxygen</h4>
                                 <h4 class="text-dark">c. Carbon Dioxide</h4>
                                 <h4 class="text-dark">d. Helium</h4>
                              </div>
                              <div class="mt-2 flex flex-wrap">
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Bachelor of Science in Mechanical Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Engineering Subject</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">3rd Year</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Prelim</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">1st Semester</div>   
                              </div>
                           </div>
                        </div>
                        <div class="invisible group-hover/main:visible w-1/12 flex gap-2 flex-col justify-center items-center">
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                              </svg>
                           </a>
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-secondary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                           </a>
                           
                        </div>
                     </div>
                  </li>
                  <li>
                     <div class="group/main cursor-default px-2 py-3 flex align-center hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-11/12 flex gap-2 text-gray-600 dark:text-gray-400">
                           <div class="">
                              <svg class="w-[24px] h-[24px] text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                              </svg>
                           </div>
                           <div class="grow">
                              <div class="flex align-center">
                                 <img src="../src/img/profile_image.jpg" class="rounded-full h-4 w-4 mr-2" alt="" srcset="">
                                 <h4 class="text-main text-xs font-medium mb-1"><span class="text-dark">Ramon Lito    </span>•<span class="text-gray-400 italic">    1 minute ago</span></h4>
                              </div>
                              
                              <h4 class="text-dark text-sm font-medium">What is the main component of the Earth's atmosphere?</h4>
                              <div class="flex text-sm justify-between">
                                 <h4 class="text-dark">a. Nitrogen</h4>
                                 <h4 class="text-dark">b. Oxygen</h4>
                                 <h4 class="text-dark">c. Carbon Dioxide</h4>
                                 <h4 class="text-dark">d. Helium</h4>
                              </div>
                              <div class="mt-2 flex flex-wrap">
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">College of Bachelor of Science in Mechanical Engineering</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Engineering Subject</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">3rd Year</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Prelim</div>
                                 <div class="bg-red-100 text-red-800 text-xs font-medium m-1 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">1st Semester</div>   
                              </div>
                           </div>
                        </div>
                        <div class="invisible group-hover/main:visible w-1/12 flex gap-2 flex-col justify-center items-center">
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                              </svg>
                           </a>
                           <a class="text-sm font-medium text-main p-1.5 hover:bg-light-200 rounded-lg dark:text-blue-500 dark:hover:bg-gray-700" href="#">
                              <svg class="w-5 h-5 text-secondary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                           </a>
                           
                        </div>
                     </div>
                  </li>
               </ol>
            </div>
            <div class="mt-auto mx-0 text-end">
               <a href="#" class="inline-flex items-center font-medium text-main hover:text-red-800">
                  View more
                  <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                  </svg>
               </a>
            </div>
         </div>
         <div class="col-span-2 row-span-1 bg-light p-6 border border-light-200 rounded-lg h-50">
            2
         </div>
      </div>


      
   </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>