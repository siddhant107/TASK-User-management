{{-- resources/views/taskdetails.blade.php --}}
@include('layouts.header')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Task Details</h1>

        <div class="space-y-4">
            <p><strong>Name:</strong> {{ $task->name }}</p>
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
            <p><strong>Created By:</strong> {{ $task->creator->name }}</p>
            <p><strong>End Date:</strong> {{ $task->end_date }}</p>
            <p><strong>Task Done:</strong> {{ $task->task_done ? 'Yes' : 'No' }}</p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('tasks.index') }}" class="text-blue-500">Back to Task List</a>
        </div>
    </div>
</div>

@include('layouts.footer')
