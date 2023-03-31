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
                            @foreach($pendingRequests->sortByDesc('start_date') as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-800">
                                <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                    <div>
                                        @php
                                            $user = App\Models\User::find($request->user_id);
                                        @endphp
                                        @if ($user)
                                            <div>
                                                {{ $user->name }}
                                            </div>
                                        @endif
                                    </div>     
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                        {{ $request->start_date }} to {{ $request->end_date }}
                                    </div>
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
                                        @if (Auth::user()->is_admin == 1)
                                            <div class="flex flex-row">
                                                <div>
                                                    <form method="POST" action="{{ route('vacation-requests.approve', $request->id) }}" class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-green-500 mr-2">Accept</button>
                                                    </form>
                                                </div>
                                                <div class="ml-3">
                                                    <form method="POST" action="{{ route('vacation-requests.reject', $request->id) }}" class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-red-500">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            <form method="POST" action="{{ route('vacation-requests.destroy', $request->id) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Cancel</button>
                                            </form>

                                        @endif
                                    @else
                                        @if ($request->status == 'approved')
                                            Approved on {{ $request->updated_at }}
                                        @elseif ($request->status == 'rejected')
                                            Rejected on {{ $request->updated_at }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tbody>
                            @foreach($approvedRequests->sortByDesc('start_date') as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-800">
                                <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                    <div>
                                        @php
                                            $user = App\Models\User::find($request->user_id);
                                        @endphp
                                        @if ($user)
                                            <div>
                                                {{ $user->name }}
                                            </div>
                                        @endif
                                    </div>     
                                </td>
                                <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ $request->start_date }} to {{ $request->end_date }}
                                        </div>
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
                                        @if (Auth::user()->is_admin == 1)
                                        <div class="flex flex-row">
                                            <div>
                                            <form method="POST" action="{{ route('vacation-requests.approve', $request->id) }}" class="inline">
                                                @csrf
                                                <button type="submit" class="text-green-500 mr-2">Accept</button>
                                            </form>
                                            </div>
                                            <div class="ml-3">
                                            <form method="POST" action="{{ route('vacation-requests.reject', $request->id) }}" class="inline">
                                                @csrf
                                                <button type="submit" class="text-red-500">Decline</button>
                                            </form>
                                            </div>
                                        </div>
                                        @else
                                            <span class="text-gray-500">Pending approval</span>
                                        @endif
                                    @else
                                        @if ($request->status == 'approved')
                                            Approved on {{ $request->updated_at }}
                                        @elseif ($request->status == 'rejected')
                                            Rejected on {{ $request->updated_at }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tbody>
                            @foreach($rejectedRequests->sortByDesc('start_date') as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-800">
                                <td class="flex items-center px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">
                                    <div>
                                        @php
                                            $user = App\Models\User::find($request->user_id);
                                        @endphp
                                        @if ($user)
                                            <div>
                                                {{ $user->name }}
                                            </div>
                                        @endif
                                    </div>     
                                </td>
                                <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ $request->start_date }} to {{ $request->end_date }}
                                        </div>
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
                                        @if (Auth::user()->is_admin == 1)
                                        <div class="flex flex-row">
                                            <div>
                                            <form method="POST" action="{{ route('vacation-requests.approve', $request->id) }}" class="inline">
                                                @csrf
                                                <button type="submit" class="text-green-500 mr-2">Accept</button>
                                            </form>
                                            </div>
                                            <div class="ml-3">
                                            <form method="POST" action="{{ route('vacation-requests.reject', $request->id) }}" class="inline">
                                                @csrf
                                                <button type="submit" class="text-red-500">Decline</button>
                                            </form>
                                            </div>
                                        </div>
                                        @else
                                            <span class="text-gray-500">Pending approval</span>
                                        @endif
                                    @else
                                        @if ($request->status == 'approved')
                                            Approved on {{ $request->updated_at }}
                                        @elseif ($request->status == 'rejected')
                                            Rejected on {{ $request->updated_at }}
                                        @endif
                                    @endif
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
