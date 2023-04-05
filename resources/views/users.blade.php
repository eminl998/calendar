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

                                        <td class="px-10 py-6">
                                            <div class="">
                                                {{ $user->name }}
                                            </div>
                                        </td>

                                        <td class="px-10 py-6">
                                                {{ $user->email }}
                                        </td>

                                        <td class="px-10 py-6">
                                            {{ $user->vacationRequests()->where('status', 'approved')->count() }}
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

