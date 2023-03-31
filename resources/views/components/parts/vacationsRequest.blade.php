@props(['disabled' => false])
<div class="mt-10">
    <div class="flex items-center justify-center mt-4 mb-4">
        <form method="POST" action="{{ route('vacation-requests.store') }}" class="">
            @csrf
            <div class="text-center lg:flex lg:items-center justify-between">
                <div class=" flex sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                    </div>
                    <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
                    </div>
                    <div class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                        <label>Leave Type</label>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- @props(['disabled' => false])

<form method="POST" action="{{ route('vacation-requests.store') }}">
    @csrf
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" {{ $disabled ? 'disabled' : '' }}>
    <label for="end_date">End Date:</label>
<input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" {{ $disabled ? 'disabled' : '' }}>

<label>Leave Type</label>
<select name="leave_type">
    <option value="Annual Leave" {{old('leave_type')=='Annual Leave'?'selected':''}} >Annual leave</option>
    <option value="Parental Leave" {{old('leave_type')=='Parental Leave'?'selected':''}} >Parental leave</option>
    <option value="Sick Leave" {{old('leave_type')=='Sick Leave'?'selected':''}} >Sick leave</option>
    <option value="Compassionate Leave" {{old('leave_type')=='Compassionate Leave'?'selected':''}} >Compassionate leave</option>
    <option value="Daily Rest" {{old('leave_type')=='Daily Rest'?'selected':''}} >Daily rest</option>
</select>

<button type="submit">Submit</button>
</form> --}}





