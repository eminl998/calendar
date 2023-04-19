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

                                        <td class="px-10 py-6" style="display: inline-block;">
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
                                                <a class="ml-2" href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9.12856092,0 L11.102803,0.00487381102 C11.8809966,0.0985789507 12.5627342,0.464975115 13.1253642,1.0831551 C13.583679,1.58672038 13.8246919,2.17271137 13.8394381,2.81137259 L19.3143116,2.81154887 C19.6930068,2.81154887 20,3.12136299 20,3.50353807 C20,3.88571315 19.6930068,4.19552726 19.3143116,4.19552726 L17.478,4.195 L17.4783037,15.8224356 C17.4783037,18.3654005 16.529181,20 14.4365642,20 L5.41874994,20 C3.32701954,20 2.39315828,18.3737591 2.39315828,15.8224356 L2.393,4.195 L0.685688428,4.19552726 C0.306993166,4.19552726 0,3.88571315 0,3.50353807 C0,3.12136299 0.306993166,2.81154887 0.685688428,2.81154887 L6.15581653,2.81128823 C6.17048394,2.29774844 6.36057711,1.7771773 6.7098201,1.26219866 C7.23012695,0.494976667 8.04206594,0.0738475069 9.12856092,0 Z M16.106,4.195 L3.764,4.195 L3.76453514,15.8224356 C3.76453514,17.7103418 4.28461756,18.6160216 5.41874994,18.6160216 L14.4365642,18.6160216 C15.5759705,18.6160216 16.1069268,17.7015972 16.1069268,15.8224356 L16.106,4.195 Z M6.71521035,6.34011422 C7.09390561,6.34011422 7.40089877,6.64992834 7.40089877,7.03210342 L7.40089877,15.0820969 C7.40089877,15.464272 7.09390561,15.7740861 6.71521035,15.7740861 C6.33651508,15.7740861 6.02952192,15.464272 6.02952192,15.0820969 L6.02952192,7.03210342 C6.02952192,6.64992834 6.33651508,6.34011422 6.71521035,6.34011422 Z M9.44248307,6.34011422 C9.82117833,6.34011422 10.1281715,6.64992834 10.1281715,7.03210342 L10.1281715,15.0820969 C10.1281715,15.464272 9.82117833,15.7740861 9.44248307,15.7740861 C9.06378781,15.7740861 8.75679464,15.464272 8.75679464,15.0820969 L8.75679464,7.03210342 C8.75679464,6.64992834 9.06378781,6.34011422 9.44248307,6.34011422 Z M12.1697558,6.34011422 C12.5484511,6.34011422 12.8554442,6.64992834 12.8554442,7.03210342 L12.8554442,15.0820969 C12.8554442,15.464272 12.5484511,15.7740861 12.1697558,15.7740861 C11.7910605,15.7740861 11.4840674,15.464272 11.4840674,15.0820969 L11.4840674,7.03210342 C11.4840674,6.64992834 11.7910605,6.34011422 12.1697558,6.34011422 Z M9.17565461,1.38234438 C8.53434679,1.42689992 8.11102741,1.64646338 7.84152662,2.04385759 C7.6437582,2.33547837 7.5448762,2.58744977 7.52918786,2.81194335 L12.4673768,2.81085985 C12.4530266,2.51959531 12.3382454,2.26423777 12.1153724,2.01935991 C11.7693001,1.63911901 11.3851686,1.43266964 11.0215648,1.38397839 L9.17565461,1.38234438 Z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
