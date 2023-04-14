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
                                    <th class="py-4">Working position</th>
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
                                                {{ $user->name }}
                                        </td>

                                        <td class="px-15 py-6">
                                                {{ $user->email }}
                                        </td>

                                        <td class="px-15 py-6">
                                                {{ $user->position }}
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
                                            <a href="{{ route('users.downloadPdf', ['email' => $user->email]) }}" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                <path fill="currentColor" d="M13,0H3C1.9,0,1,0.9,1,2v12c0,1.1,0.9,2,2,2h10c1.1,0,2-0.9,2-2V3L13,0z M11,12H5v-1h6V12z M11,10H5v-1h6V10z M11,8H5V7h6V8z M11,5H5V4h6V5z"/>
                                                <path fill="currentColor" d="M8,11.6L4.7,8.3c-0.4-0.4-0.4-1,0-1.4s1.1-0.4,1.4,0L8,9.8l2.9-2.9c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4L8,11.6z"/>
                                                </svg>
                                            </a>
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
