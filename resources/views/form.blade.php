<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

@include('layouts.header')


<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto mt-8 px-4 py-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Task Details</h2>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf <!-- Add this line for CSRF protection -->
            <div>
                <label for="task_name" class="block text-sm font-medium text-gray-700">Task Name</label>
                <input type="text" id="task_name" name="task_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                <span class="text-danger">
                    @error('task_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div>
                <label for="task_description" class="block text-sm font-medium text-gray-700">Task
                    Description</label>
                <textarea id="task_description" name="task_description" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50"></textarea>
                <span class="text-danger">
                    @error('task_description')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2">
                <div>
                    <label for="task_start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="task_start_date" name="task_start_date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                    <span class="text-danger">
                        @error('task_start_date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            {{-- <div>
                <label for="task_created_by" class="block text-sm font-medium text-gray-700">Created By</label>
                <select name="task_created_by" id=""
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                    <option value="">--</option>
                    @foreach ($userData as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <input type="text" id="task-created-by" name="task-created-by"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                <span class="text-danger">
                    @error('task_created_by')
                        {{ $message }}
                    @enderror
                </span>
            </div> --}}
            <div>
                <label for="task_done" class="block text-sm font-medium text-gray-700">Task Done</label>
                <div class="mt-2 flex items-center space-x-4">
                    <div class="flex items-center">
                        <input type="radio" id="task_done-yes" name="task_done" value="1"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="task_done-yes" class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="task_done-no" name="task_done" value="0"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="task_done-no" class="ml-2 text-sm font-medium text-gray-900">No</label>
                    </div>
                </div>
                <span class="text-danger">
                    @error('task_done')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </form>

    </div>

</body>

</html>


@include('layouts.footer')
