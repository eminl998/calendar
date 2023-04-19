<x-app-layout>
    {{-- Shfaqja e Userave --}}
    @if (Auth::check() && Auth::user()->is_admin == 1)
    <div class="mx-auto mt-10   p-4">

        <div class="flex items-center justify-center mt-4 mb-4">
            @csrf
            <div class="text-center lg:flex lg:items-center justify-between">
                <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6  p-4">
                    <div class="section bg-gray-300 dark:bg-gray-150 mr-4 p-2 rounded-xl">
                        {{-- <div class="text-right mb-2 mr-2">
                            <a href="{{ route('register') }}" class="inline-block px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md">Register New User</a>
                        </div> --}}
                        <table class="w-full text-sm text-centre text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th class="py-4">ID</th>
                                    <th class="py-4">Name</th>
                                    <th class="py-4">Working position</th>
                                    <th class="py-4">Day off's</th>
                                    <th class="py-4">Annual Leave</th>
                                    <th class="py-4">Parental leave</th>
                                    <th class="py-4">Sick leave</th>
                                    <th class="py-4">Compassionate leave</th>
                                    <th class="py-4">Daily rest</th>
                                    <th class="py-4">Actions</th>
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
                                            <div style="display: inline-flex;">
                                                <a href="https://mail.google.com/mail/?view=cm&to={{$user->email}}&su=Hello%20from%20my%20website&body=Dear%20{{$user->name}},%0D%0A%0D%0AThank%20you%20for%20visiting%20my%20website.%20I%20would%20like%20to%20connect%20with%20you%20and%20discuss%20your%20interests%20further.%0D%0A%0D%0ABest%20regards.%0D%0A%0D%0AVianova%20Team" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="26" height="26">
                                                        <path d="M1 3.5l.5-.5h13l.5.5v9l-.5.5h-13l-.5-.5v-9zm1 1.035V12h12V4.536L8.31 8.9H7.7L2 4.535zM13.03 4H2.97L8 7.869 13.03 4z" fill="currentColor"/>
                                                    </svg>
                                                </a>
                                                <a class="ml-2" href="{{ route('users.downloadPdf', ['email' => $user->email]) }}"
                                                    download>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20"
                                                        viewBox="0 0 16 16">
                                                        <path fill="currentColor"
                                                            d="M2.5 6.5V6H2V6.5H2.5ZM6.5 6.5V6H6V6.5H6.5ZM6.5 10.5H6V11H6.5V10.5ZM13.5 3.5H14V3.29289L13.8536 3.14645L13.5 3.5ZM10.5 0.5L10.8536 0.146447L10.7071 0H10.5V0.5ZM2.5 7H3.5V6H2.5V7ZM3 11V8.5H2V11H3ZM3 8.5V6.5H2V8.5H3ZM3.5 8H2.5V9H3.5V8ZM4 7.5C4 7.77614 3.77614 8 3.5 8V9C4.32843 9 5 8.32843 5 7.5H4ZM3.5 7C3.77614 7 4 7.22386 4 7.5H5C5 6.67157 4.32843 6 3.5 6V7ZM6 6.5V10.5H7V6.5H6ZM6.5 11H7.5V10H6.5V11ZM9 9.5V7.5H8V9.5H9ZM7.5 6H6.5V7H7.5V6ZM9 7.5C9 6.67157 8.32843 6 7.5 6V7C7.77614 7 8 7.22386 8 7.5H9ZM7.5 11C8.32843 11 9 10.3284 9 9.5H8C8 9.77614 7.77614 10 7.5 10V11ZM10 6V11H11V6H10ZM10.5 7H13V6H10.5V7ZM10.5 9H12V8H10.5V9ZM2 5V1.5H1V5H2ZM13 3.5V5H14V3.5H13ZM2.5 1H10.5V0H2.5V1ZM10.1464 0.853553L13.1464 3.85355L13.8536 3.14645L10.8536 0.146447L10.1464 0.853553ZM2 1.5C2 1.22386 2.22386 1 2.5 1V0C1.67157 0 1 0.671573 1 1.5H2ZM1 12V13.5H2V12H1ZM2.5 15H12.5V14H2.5V15ZM14 13.5V12H13V13.5H14ZM12.5 15C13.3284 15 14 14.3284 14 13.5H13C13 13.7761 12.7761 14 12.5 14V15ZM1 13.5C1 14.3284 1.67157 15 2.5 15V14C2.22386 14 2 13.7761 2 13.5H1Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div>
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-red-500 hover:text-white font-bold py-2 px-4">Delete</button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="py-1">
                        @props(['disabled' => false])
                        @include('vacation-requests.index')

                        <!-- Regjistrimi i Userit te ri -->
                        <div class="mt-1">

                            <div class="flex items-center justify-center mt-4 mb-4">

                            <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                                <div class="mt-1">
                                    <div class="flex items-center justify-center mt-4 mb-4">
                                        <div class="text-center lg:flex lg:items-center justify-between">
                                            <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                                                <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                    <label for="name">Name:</label>
                                                    <input type="text" name="name" id="name" {!! $attributes->merge(['class' => 'h-10 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} value="{{ old('name') }}" required>
                                                </div>
                                                <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                    <label for="email">Email:</label>
                                                    <input type="email" name="email" id="email" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} value="{{ old('email') }}" required>
                                                </div>
                                                <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                    <label for="is_admin">Is Admin:</label>
                                                    <select name="is_admin" id="is_admin" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} required>
                                                        <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>No</option>
                                                        <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                </div>
                                                <!-- change it to dropdown -->
                                                <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                    <label for="position">Position:</label>
                                                    <input type="text" name="position" id="position" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} value="{{ old('position') }}" required>
                                                </div>
                                                <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                    <label for="password">Password:</label>
                                                    <input type="password" name="password" id="password" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!} required>
                                                </div>

                                                <div class="mt-1 leading-tight">
                                                    <button type="submit" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 hover:text-white font-bold py-2 px-4 mt-5 ">Register New User</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="mr-4">
    You are not authorised for this page
    </div>
    @endif
</x-app-layout>
