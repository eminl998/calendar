<li class="flex flex-row justify-between items-center">
  <div class="handle float-right">
    <svg class="w-5 h-5 inline-block mr-1" fill="currentColor" viewBox="0 0 50 50">
      <path d="M49.7,25.3l-8.3-9c-0.6-0.6-1.4-0.1-1.4,0.9V23H30c-0.6,0-1-0.4-1-1V12h5.9c1,0,1.5-0.9,0.9-1.4l-9-8.3
        c-0.4-0.3-1-0.3-1.4,0l-9,8.3c-0.6,0.6-0.1,1.4,0.9,1.4H23v10c0,0.6-0.4,1-1,1H12v-5.9c0-1-0.9-1.5-1.4-0.9l-8.3,9
        c-0.3,0.4-0.3,1,0,1.4l8.3,9c0.6,0.6,1.4,0.1,1.4-0.9V29h10c0.6,0,1,0.4,1,1v10h-5.9c-1,0-1.5,0.9-0.9,1.4l9,8.3
        c0.4,0.3,1,0.3,1.4,0l9-8.3c0.6-0.6,0.1-1.4-0.9-1.4H29V30c0-0.6,0.4-1,1-1h10v5.9c0,1,0.9,1.5,1.4,0.9l8.3-9
        C50.1,26.3,50.1,25.7,49.7,25.3z"/>
    </svg>
  </div>
  <button id="minimize-sidebar" class="w-5 h-5 mb-2 mr-2">
    <svg fill="#000000" width="30px" height="35px" viewBox="-6 -6 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-close">
      <path d='M7.314 5.9l3.535-3.536A1 1 0 1 0 9.435.95L5.899 4.485 2.364.95A1 1 0 1 0 .95 2.364l3.535 3.535L.95 9.435a1 1 0 1 0 1.414 1.414l3.535-3.535 3.536 3.535a1 1 0 1 0 1.414-1.414L7.314 5.899z' />
    </svg>
  </button>
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

@if (Auth::user()->is_admin == 1)
<li>
<a href="{{ url('/users') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
</a>
</li>
@endif

<li>
    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
        <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
        <span class="inline-flex items-center justify-center w-3 h-3 p-5 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-xl dark:bg-blue-900 dark:text-blue-300">Soon</span>
    </a>
</li>
