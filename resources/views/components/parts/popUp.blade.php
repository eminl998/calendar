<div id="myModal" tabindex="-1" aria-hidden="true" class="top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full ">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        @props(['disabled' => false])
        <div>
            <div class="flex items-center justify-center mb-2">
                <form method="POST" action="{{ route('vacation-requests.store') }}">
                    @csrf
                    <div class="font-semibold text-gray-800 dark:text-gray-200">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                    </div>
                    <div class="mt-1 font-semibold text-gray-800 dark:text-gray-200">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" min="{{ date('Y-m-d') }}" {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                    </div>
                    <div class="mt-1 font-semibold text-gray-800 dark:text-gray-200">
                        {{-- <label>Leave Type</label> --}}
                        <select name="leave_type" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md py-2 px-4">
                            <option value="Annual Leave" {{old('leave_type')=='Annual Leave'?'selected':''}} >Annual leave</option>
                            <option value="Parental Leave" {{old('leave_type')=='Parental Leave'?'selected':''}} >Parental leave</option>
                            <option value="Sick Leave" {{old('leave_type')=='Sick Leave'?'selected':''}} >Sick leave</option>
                            <option value="Compassionate Leave" {{old('leave_type')=='Compassionate Leave'?'selected':''}} >Compassionate leave</option>
                            <option value="Daily Rest" {{old('leave_type')=='Daily Rest'?'selected':''}} >Daily rest</option>
                        </select>
                    </div>
                    <div class="mt-1 leading-tight">
                        <button type="submit" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 hover:text-white font-bold py-2 px-4 mt-5 ">Submit</button>
                        <button class="mr-2 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm hover:bg-red-500 hover:text-white font-bold py-2 px-4 mt-5 " onclick="closeModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openModal() {
document.getElementById("myModal").style.display = "block";
}

function closeModal() {
document.getElementById("myModal").style.display = "none";
}
</script>
