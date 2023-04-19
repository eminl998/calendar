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
                                <div
                                    class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name"
                                        {!! $attributes->merge([
                                            'class' =>
                                                'h-10 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
                                        ]) !!} value="{{ old('name') }}"
                                        required>
                                </div>
                                <div
                                    class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email"
                                        {!! $attributes->merge([
                                            'class' =>
                                                'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
                                        ]) !!} value="{{ old('email') }}"
                                        required>
                                </div>

                                    <div
                                    class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password"
                                        {!! $attributes->merge([
                                            'class' =>
                                                'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
                                        ]) !!} required>
                                </div>

                                <div
                                    class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                    <label for="position">Position:</label>
                                    <div style="height: 50px; overflow-y: scroll;">
                                        <select name="position"
                                            class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md py-2 px-4">
                                            <option value="Software Developer"
                                                {{ old('position') == 'Software Developer' ? 'selected' : '' }}>
                                                Software Developer</option>
                                            <option value="Front-End Developer"
                                                {{ old('position') == 'Front-End Developer' ? 'selected' : '' }}>
                                                Front-End Developer</option>
                                            <option value="Back-End Developer"
                                                {{ old('position') == 'Back-End Developer' ? 'selected' : '' }}>
                                                Back-End Developer</option>
                                            <option value="Full Stack Developer"
                                                {{ old('position') == 'Full Stack Developer' ? 'selected' : '' }}>
                                                Full Stack Developer</option>
                                            <option value="DevOps Engineer"
                                                {{ old('position') == 'DevOps Engineer' ? 'selected' : '' }}>
                                                DevOps Engineer</option>
                                            <option value="Quality Assurance (QA) Analyst"
                                                {{ old('position') == 'Quality Assurance (QA) Analyst' ? 'selected' : '' }}>
                                                Quality Assurance (QA) Analyst</option>
                                            <option value="User Interface (UI) Designer"
                                                {{ old('position') == 'User Interface (UI) Designer' ? 'selected' : '' }}>
                                                User Interface (UI) Designer</option>
                                            <option value="User Experience (UX) Designer"
                                                {{ old('position') == 'User Experience (UX) Designer' ? 'selected' : '' }}>
                                                User Experience (UX) Designer</option>
                                            <option value="Technical Writer"
                                                {{ old('position') == 'Technical Writer' ? 'selected' : '' }}>
                                                Technical Writer</option>
                                            <option value="Product Manager"
                                                {{ old('position') == 'Product Manager' ? 'selected' : '' }}>
                                                Product Manager</option>
                                            <option value="Project Manager"
                                                {{ old('position') == 'Project Manager' ? 'selected' : '' }}>
                                                Project Manager</option>
                                            <option value="Technical Support Specialist"
                                                {{ old('position') == 'Technical Support Specialist' ? 'selected' : '' }}>
                                                Technical Support Specialist</option>
                                            <option value="Database Administrator"
                                                {{ old('position') == 'Database Administrator' ? 'selected' : '' }}>
                                                Database Administrator</option>
                                            <option value="Cloud Architect"
                                                {{ old('position') == 'Cloud Architect' ? 'selected' : '' }}>
                                                Cloud Architect</option>
                                            <option value="Security Analyst"
                                                {{ old('position') == 'Security Analyst' ? 'selected' : '' }}>
                                                Security Analyst</option>
                                            <option value="Other"
                                                {{ old('position') == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div
                                    class="flex flex-col font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                                    <label for="is_admin">Is Admin:</label>
                                    <select name="is_admin" id="is_admin"
                                        {!! $attributes->merge([
                                            'class' =>
                                                'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm',
                                        ]) !!} required>
                                        <option value="0"
                                            {{ old('is_admin') == '0' ? 'selected' : '' }}>
                                            No</option>
                                        <option value="1"
                                            {{ old('is_admin') == '1' ? 'selected' : '' }}>
                                            Yes</option>
                                    </select>
                                </div>

                                <div class="mt-1 leading-tight">
                                    <button type="submit"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 hover:text-white font-bold py-2 px-4 mt-5">Register
                                        New User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
