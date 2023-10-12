<div id="question-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative w-full max-w-md max-h-full">
    <div class="fixed inset-0  bg-gray-700 opacity-75 ">

    </div>
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between py-5 mx-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Question
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="question-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-4">
                <p id="ID"></p>
                <p id="question" class="text-base leading-relaxed font-medium text-gray-900 dark:text-gray-400">
                
                </p>
                <ol class="text-gray-600">
                    <li><span class="font-medium mr-2">a.</span> <span id="a"></span></li>
                    <li><span class="font-medium mr-2">b.</span> <span id="b"></span></li>
                    <li><span class="font-medium mr-2">c.</span> <span id="c"></span></li>
                    <li><span class="font-medium mr-2">d.</span> <span id="d"></span></li>
                </ol>
                <p>Answer: <span id="ans"></span></p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center space-x-2 border-t py-6 mx-5 border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="question-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Remove</button>
            </div>
        </div>
    </div>
</div>