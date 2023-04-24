<x-app-layout>
    <div>
        <div>

            {{-- FLASH MESSAGE --}}
            <div>
                @include('vacation-requests.index')
            </div>

            {{-- Shfaqja e Sidebarit --}}
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden ">
                @include('components.parts.sidebar')
            </div>

            {{-- Shfaqja e kalendarit --}}
            <div>
                @include('components.parts.calendar')
            </div>

            {{-- Shfaqja e kerkesave --}}
            <div  class="bg-gray-100 dark:bg-gray-800 overflow-hidden mt-4">
                @include('components.parts.request')
            </div>

        </div>
    </div>

</x-app-layout>

