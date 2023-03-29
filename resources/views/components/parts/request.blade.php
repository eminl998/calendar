@props(['disabled' => false])
<div class="container mx-auto mt-10 border-2 border-white p-4">
    <div class="flex items-center justify-center mt-4 mb-4">    
        @csrf
        <div class="text-center lg:flex lg:items-center justify-between">
            <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6 border-2 border-white p-4">
                <div class="section bg-blue-200 mr-4 border-2 border-white p-4">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Employee
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Request Dates
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Leave type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $vacationRequests = App\Models\VacationRequest::all();
                            @endphp
                            @foreach($vacationRequests->sortByDesc('start_date') as $request)
                                @if($request->status == 'pending')
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-800">
                                @elseif($request->status == 'approved')
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                @else
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                @endif
                                    <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                        @if($request->status == 'approved')
                                            @php
                                                $user = App\Models\User::find($request->user_id);
                                            @endphp
                                            @if ($user)
                                                <div class="font-semibold ">
                                                    {{ $user->name }}
                                                </div>
                                            @endif
                                        @endif
                                    <td>
                                        <div class="pl-3">
                                            <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                                {{ $request->start_date }} to {{ $request->end_date }}
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $request->leave_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            {{ $request->status }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($request->status == 'pending')
                                        <form method="POST" action="{{ route('vacation-requests.destroy', $request->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Cancel</button>
                                        </form>
                                        @else
                                            Aproved or Rejected at 01.01.2030 
                                        @endif
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div> 
</div>
