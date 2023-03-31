<x-app-layout>
    <div class="py-12">
        
        <div>
            
            <div>
                @include('vacation-requests.index')
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.parts.vacationsRequest')
            </div>

            <div>
                @include('components.parts.calendar')
            </div>

            <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @include('components.parts.request')
            </div>
            
        </div>

    </div>
</x-app-layout>

