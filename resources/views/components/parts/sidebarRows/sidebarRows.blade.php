
<div class="list-item mt-7 py-1">
    <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <span>
            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white inline-block align-middle" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3 inline-block align-middle">Dashboard</span>
        </span>
    </a>
</div>

<div class="list-item py-1">
    <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="openModal()" >
        <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white inline-block align-middle" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
        </svg>
        <span class="ml-3 inline-block align-middle">Make a Request</span>
    </a>
    @include('components.parts.popUp')
</div>


<div class="list-item py-1">
    <a href="{{ url('/holidays') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <span>
            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white inline-block align-middle" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M18,3H17V1a1,1,0,0,0-2,0V3H5V1A1,1,0,0,0,3,1V3H2A2,2,0,0,0,0,5V16a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V5A2,2,0,0,0,18,3ZM4,6A1,1,0,0,1,5,5H6A1,1,0,0,1,6,7H5A1,1,0,0,1,4,6Zm4,0A1,1,0,0,1,9,5h1A1,1,0,0,1,10,7H9A1,1,0,0,1,8,6Zm4,0A1,1,0,0,1,13,5h1a1,1,0,0,1,0,2H13A1,1,0,0,1,12,6Z"></path>
            </svg>
            <span class="ml-3 inline-block align-middle">Holiday Vacations</span>
        </span>
    </a>
</div>

@if (Auth::user()->is_admin == 1)
<div class="list-item py-1">
    <a href="{{ url('/users') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
        <span>
            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white inline-block align-middle" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3 inline-block align-middle">Users</span>
        </span>
    </a>
</div>
@endif

