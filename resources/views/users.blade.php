<x-app-layout>
        {{-- Shfaqja e Userave --}}
        <div class="mx-auto mt-10   p-4">
            <div class="flex items-center justify-center mt-4 mb-4">    
                @csrf
                <div class="text-center lg:flex lg:items-center justify-between">
                    <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6  p-4">
                        <div class="section bg-gray-300 dark:bg-gray-150 mr-4 p-2 rounded-xl">
                            <table class="w-full text-sm text-centre text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th class="py-4">ID</th>
                                    <th class="py-4">Name</th>
                                    <th class="py-4">Email</th>
                                    <th class="py-4">Day off's</th>
                                    <th class="py-4">Annual Leave</th>
                                    <th class="py-4">Parental leave</th>
                                    <th class="py-4">Sick leave</th>
                                    <th class="py-4">Compassionate leave</th>
                                    <th class="py-4">Daily rest</th>
                                    <th class="py-4">Download</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                    
                                    <tr class="bg-white  dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="flex items-center px-8 py-8 text-gray-800 whitespace-nowrap dark:text-white">
                                            <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ $user->id }}
                                            </div>     
                                        </td>

                                        <td class="px-20 py-6">
                                            <div class="">
                                                {{ $user->name }}
                                            </div>
                                        </td>

                                        <td class="px-20 py-6">
                                                {{ $user->email }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Annual leave'] + $user->daysOff['Parental leave'] + $user->daysOff['Sick leave'] + $user->daysOff['Compassionate leave'] + $user->daysOff['Daily rest'] }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Annual leave'] }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Parental leave'] }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Sick leave'] }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Compassionate leave'] }}
                                        </td>

                                        <td class="px-20 py-6">
                                            {{ $user->daysOff['Daily rest'] }}
                                        </td>

                                        <td class="px-10 py-6">
                                            <a href="{{ route('users.downloadPdf', ['email' => $user->email]) }}">Download as PDF</a>
                                        </td>
 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
