@props(['disabled' => false])

<form method="POST" action="{{ route('vacation-requests.store') }}">
    @csrf

    <div class="font-semibold  text-gray-800 dark:text-gray-200 leading-tight">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            ]) !!}
        >
    </div>

    <div class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            ]) !!}
        >
    </div>
    <div>
        <select name="leave_type">
            <option value="annual_leave" selected>Annual leave</option>
            <option value="parental_leave">Parental leave</option>
            <option value="sick_leave">Sick leave</option>
            <option value="compassionate_leave">Compassionate leave</option>
            <option value="daily_rest">Daily rest</option>
        </select>
    </div>



    <div> 
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </div>
</form>
