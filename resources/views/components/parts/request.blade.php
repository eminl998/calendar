@props(['disabled' => false])
<div class="mx-auto mt-1 p-4">
    <div class="flex items-center justify-center mt-4 mb-4">
        @csrf
        <div class="text-center lg:flex lg:items-center justify-between">
            <div class="flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6  p-4">
                <div class="section bg-gray-300 dark:bg-gray-900 mr-4 p-2 rounded-xl">
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
                            
                            @foreach ($pendingRequests->sortByDesc('start_date') as $request)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                        @php $user = App\Models\User::find($request->user_id) @endphp
                                        @if ($user) <div>{{ $user->name }}</div> @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ $request->start_date }} to {{ $request->end_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $request->leave_type }}</td>
                                    <td class="px-6 py-4"><div class="flex items-center">{{ $request->status }}</div></td>
                                    <td class="px-6 py-4">
                                        @if (Auth::user()->is_admin == 1)
                                            <div class="flex flex-row">
                                                <div><form method="POST" action="{{ route('vacation-requests.approve', $request->id) }}" class="inline">@csrf<button type="submit" class="text-green-500 mr-2">Accept</button></form></div>
                                                <div class="ml-3"><form method="POST" action="{{ route('vacation-requests.reject', $request->id) }}" class="inline">@csrf<button type="submit" class="text-red-500">Decline</button></form></div>
                                            </div>
                                        @else
                                            <form method="POST" action="{{ route('vacation-requests.destroy', $request->id) }}" class="inline">@csrf @method('DELETE')<button type="submit" class="text-red-500">Cancel</button></form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($approvedRequests->sortByDesc('start_date') as $request)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                        @php $user = App\Models\User::find($request->user_id) @endphp
                                        @if ($user) <div>{{ $user->name }}</div> @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ $request->start_date }} to {{ $request->end_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $request->leave_type }}</td>
                                    <td class="px-6 py-4"><div class="flex items-center">{{ $request->status }}</div></td>
                                    <td class="px-6 py-4">Approved on {{ $request->updated_at }}</td>
                                </tr>
                            @endforeach
                            @foreach ($rejectedRequests->sortByDesc('start_date') as $request)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                        @php $user = App\Models\User::find($request->user_id) @endphp
                                        @if ($user) <div>{{ $user->name }}</div> @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ $request->start_date }} to {{ $request->end_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $request->leave_type }}</td>
                                    <td class="px-6 py-4"><div class="flex items-center text-red-500">{{ $request->status }}</div></td>
                                    <td class="px-6 py-4">Rejected on {{ $request->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
