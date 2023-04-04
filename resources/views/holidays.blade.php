<x-app-layout>
    <div class="py-1">
        @props(['disabled' => false])

        <div class="mt-1">
            <div class="flex items-center justify-center mt-4 mb-4">
                <form method="POST" action="{{ route('holidays.store') }}" class="">
                    @csrf
                    <div class="text-center lg:flex lg:items-center justify-between">
                        <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                            <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>{{ old('description') }}</textarea>
                            </div>
                            <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                <label for="holiday_date">Holiday Date:</label>
                                <input type="date" name="holiday_date" id="holiday_date" value="{{ old('holiday_date') }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                            </div>
                            <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                <label for="rest_date">Holiday Date:</label>
                                <input type="date" name="rest_date" id="rest_date" value="{{ old('rest_date') }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                            </div>
                            
                            <div class="mt-1 leading-tight"> 
                                <button type="submit" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 hover:text-white font-bold py-2 px-4 mt-5 ">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Shfaqja e Pushimeve --}}
        <div class="mx-auto mt-10   p-4">
            <div class="flex items-center justify-center mt-4 mb-4">    
                @csrf
                <div class="text-center lg:flex lg:items-center justify-between">
                    <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6  p-4">
                        <div class="section bg-gray-300 dark:bg-gray-150 mr-4 p-2 rounded-xl">
                            <table class="w-full text-sm text-centre text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th>Title</th>
                                    <th>Holiday Date</th>
                                    <th>Rest Date</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($holidays as $holiday)
                                    <tr class="bg-white  dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="flex items-center px-8 py-8 text-gray-800 whitespace-nowrap dark:text-white">
                                            <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ $holiday->title }}
                                            </div>     
                                        </td>
                                        <td class="px-8 py-8">
                                            <div class="">
                                                {{ $holiday->holiday_date }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-8">
                                                {{ $holiday->rest_date }}
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

