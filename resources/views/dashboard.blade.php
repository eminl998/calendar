<x-app-layout>
    <div class="py-12">
        
        <div>
            
            {{-- FLASH MESSAGE --}}
            <div>
                @include('vacation-requests.index')
            </div>

            {{-- Shfaqja e Sidebarit --}}
            <div>
                @include('components.parts.sidebar')
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            {{-- Shfaqja e kalendarit --}}
            <div>
                @include('components.parts.calendar')
            </div>
            <div>
                <head>
                    <title>Holiday Vacations</title>
                </head>
                <body>
                    <h1>Holiday Vacations</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Holiday Date</th>
                                <th>Rest Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($vacations as $vacation)
                                <tr>
                                    <td>{{ $vacation->title }}</td>
                                    <td>{{ $vacation->description }}</td>
                                    <td>{{ $vacation->holiday_date }}</td>
                                    <td>{{ $vacation->rest_date }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </body>

            </div>
            
            {{-- Shfaqja e kerkesave --}}
            <div  class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @include('components.parts.request')
            </div>

            
        </div>

    </div>
</x-app-layout>

