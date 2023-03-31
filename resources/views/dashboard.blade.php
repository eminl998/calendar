<x-app-layout>
    <div class="py-12">
        
        <div>
            
            {{-- FLASH MESSAGE --}}
            <div>
                @include('vacation-requests.index')
            </div>
            {{-- Insertimi i datave --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.parts.vacationsRequest')
            </div>
            {{-- Shfaqja e Sidebarit --}}
            <div>
                @include('components.parts.sidebar')
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            {{-- Shfaqja e kalendarit --}}
            <div>
                @include('components.parts.calendar')
            </div>
            {{-- Shfaqja e kerkesave --}}
            <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @include('components.parts.request')
            </div>
        </div>

    </div>
</x-app-layout>

