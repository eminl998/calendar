<aside id="default-sidebar" class="fixed top-15 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-fulll px-3 py-4 overflow-y-auto bg-gray-300 dark:bg-gray-900 rounded-lg">
      <ul class="space-y-2 font-medium">
        <li>
            <div class="ml-3 text-xs dark:text-white">Shortcuts</div>
         </li>
         <li>
            <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>

         <li> 
            <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="openModal()" >
               <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
               <span class="ml-3">Make a Request</span>
            </a>
            @include('components.parts.popUp')
         </li>
         
         <li> 
            <a href="{{ url('/holidays') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M18,3H17V1a1,1,0,0,0-2,0V3H5V1A1,1,0,0,0,3,1V3H2A2,2,0,0,0,0,5V16a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V5A2,2,0,0,0,18,3ZM4,6A1,1,0,0,1,5,5H6A1,1,0,0,1,6,7H5A1,1,0,0,1,4,6Zm4,0A1,1,0,0,1,9,5h1A1,1,0,0,1,10,7H9A1,1,0,0,1,8,6Zm4,0A1,1,0,0,1,13,5h1a1,1,0,0,1,0,2H13A1,1,0,0,1,12,6Z" />
               </svg>
               <span class="ml-3">Holiday Vacations</span>
            </a>
         </li>

         
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
            </a>
         </li>
      </ul>
   </div>
</aside>




