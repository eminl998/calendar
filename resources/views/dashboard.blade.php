<x-app-layout>
    <div class="py-12">  
        <div>
            
            {{-- FLASH MESSAGE --}}
            <div>
                @include('vacation-requests.index')
            </div>

            {{-- Shfaqja e Sidebarit --}}
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.parts.sidebar')
            </div>

            {{-- Shfaqja e kalendarit --}}
            <div>
                @include('components.parts.calendar')
            </div>
            
            {{-- Shfaqja e kerkesave --}}
            <div  class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @include('components.parts.request')
            </div>  

        </div>
    </div>

</x-app-layout>

