@include('layouts.header')

<div class="max-w-3xl mx-auto mt-8 px-4 py-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Task</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="task_name" class="block text-sm font-medium text-gray-700">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ $task->name }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
            <span class="text-danger">
                @error('task_name')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="task_description" class="block text-sm font-medium text-gray-700">Task Description</label>
            <textarea id="task_description" name="task_description" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">{{ $task->description }}</textarea>
            <span class="text-danger">
                @error('task_description')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2">
            <div>
                <label for="task_start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" idtask="task_start_date" name="task_start_date" value="{{ $task->start_date }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50"
                    disabled>
                <span class="text-danger">
                    @error('task_start_date')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div>
                <label for="task_end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" id="task_end_date" name="task_end_date" value="{{ $task->end_date }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                <span class="text-danger">
                    @error('task_end_date')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>

        <div>
            <label for="task_created_by" class="block text-sm font-medium text-gray-700">Created By</label>

            <select id="task_created_by" name="task_created_by"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-600 focus:ring-opacity-50">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->created_by == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('task_created_by')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="task_done" class="block text-sm font-medium text-gray-700">Task Done</label>
            <div class="mt-2 flex items-center space-x-4">
                <div class="flex items-center">
                    <input type="radio" id="task_done-yes" name="task_done" value="1"
                        {{ $task->task_done ? 'checked' : '' }}
                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="task_done-yes" class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="task_done-no" name="task_done" value="0"
                        {{ !$task->task_done ? 'checked' : '' }}
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
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
        </div>
    </form>
</div>

@include('layouts.footer')
