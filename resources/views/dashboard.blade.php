<x-app-layout>
    <div class="py-12">
        
        <div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.parts.vacationsRequest')
            </div>

            <div class="bg-green-600">
                @include('components.parts.calendar')
            </div>

            <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @include('components.parts.request')
            </div>
        </div>
        <div>
           @if (session()->has('success'))
            <div x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 6000)"
                x-show="show"
                class="absoulte font-semibold bg-white text-gray-800 dark:text-gray-200 py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p>{{ session('success') }}</p>
            </div>
            @endif
        </div> 
    </div>
</x-app-layout>

