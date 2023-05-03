<x-app-layout>
    @if (Auth::check() && Auth::user()->is_admin == 1)
        <div class="section bg-gray-300 dark:bg-gray-900 mr-10 mt-5 ml-10 p-2 rounded-xl">
            <div class="text-right mb-2 mr-2">
                <button type="submit" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm hover:bg-red-500 hover:text-white font-bold py-2 px-4 mt-1 mr-2">Cancel</button>
                <button type="submit"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 hover:text-white font-bold py-2 px-4 mt-1">Save
                    Changes</button>
            </div>
            <table class="w-full text-sm text-centre text-gray-700 dark:text-gray-200 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                    <tr>
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Is Admin</th>
                        <th class="py-2">Position</th>
                        <th class="py-2">Personal ID number</th>
                        <th class="py-2">Phone Number</th>
                        <th class="py-2">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="font-bold">
                            <div class="form-group">
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" class="form-control rounded">
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" class="form-control rounded">
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <select id="is_admin" name="is_admin" class="form-control rounded">
                                    <option value="0" @if (!$user->is_admin) selected @endif>No</option>
                                    <option value="1" @if ($user->is_admin) selected @endif>Yes
                                    </option>
                                </select>
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <input type="text" id="position" name="position"
                                    value="{{ old('position', $user->personalIDnumber) }}" class="form-control rounded">
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <input type="text" id="personalIDnumber" name="personalIDnumber"
                                    value="{{ old('personalIDnumber', $user->personalIDnumber) }}"
                                    class="form-control rounded">
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <input type="text" id="phoneNumber" name="phoneNumber"
                                    value="{{ old('phoneNumber', $user->phoneNumber) }}" class="form-control rounded">
                            </div>
                        </td>
                        <td class="">
                            <div class="form-group">
                                <select id="gender" name="gender" class="form-control rounded">
                                    <option value="female" @if (!$user->gender) selected @endif>Female
                                    </option>
                                    <option value="male" @if ($user->gender) selected @endif>Male
                                    </option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <h1>You are not Authorised for this page</h1>
    @endif
</x-app-layout>
