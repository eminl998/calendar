@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 8000)"
         x-show="show"
         class="fixed bg-gray-800 dark:bg-white text-white dark:text-gray-800 py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
