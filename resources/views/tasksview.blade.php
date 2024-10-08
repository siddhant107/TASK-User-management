 {{-- @include('layouts.header')

<div class="bg-gray-100 p-4 h-full">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @php
                session()->forget('success');
            @endphp
        </div>
    @endif

    <div class="container mx-auto">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">Sl. No.</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">description</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">start date</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">created by</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">end date</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">task done</th>
                    <th class="py-2 px-4 bg-gray-200 text-left capitalize">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($myTasks as $allDetails)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->description }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->start_date }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->created_by }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->end_date }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->task_done ? 'Yes' : 'No' }}</td>
                        <td>


                            <a href="{{ route('tasks.edit', $allDetails->id) }}"
                                class="inline-flex items-center px-2 py-1 mx-1 my-1 bg-blue-500 text-white rounded-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>

                            <form action="{{ route('tasks.destroy', $allDetails->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-2 py-1 mx-1 my-1 bg-red-500 text-white rounded-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 ml-2">Delete</button>
                            </form>

                        </td>



                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- pagination links --}}
 {{-- <div class="mt-4">
     {{ $myTasks->links() }} --}}
 {{-- </div>
    </div>
</div>



@include('layouts.footer') --}}




 @include('layouts.header')

 <div class="bg-gray-100 p-4 h-full">
     @if (session('success'))
         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
             {{ session('success') }}
             @php
                 session()->forget('success');
             @endphp
         </div>
     @endif

     <div class="container mx-auto">
         <table class="min-w-full bg-white rounded-lg shadow-md">
             <thead>
                 <tr>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Sl. No.</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Name</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Description</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Start Date</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Created By</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">End Date</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Task Done</th>
                     <th class="py-2 px-4 bg-gray-200 text-left capitalize">Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($myTasks as $allDetails)
                     <tr>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->name }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->description }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->start_date }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">
                             {{ $allDetails->creator ? $allDetails->creator->email : 'Unknown' }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->end_date }}</td>
                         <td class="py-2 px-4 border-b border-gray-200">{{ $allDetails->task_done ? 'Yes' : 'No' }}
                         </td>
                         <td class="py-2 px-4 border-b border-gray-200 flex space-x-2">

                             <a href="{{ route('task.view', $allDetails->id) }}"
                                 class="inline-flex items-center px-3 py-1 bg-green-500 text-white rounded-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">View</a>

                             <a href="{{ route('tasks.show', $allDetails->id) }}"
                                 class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>

                             <form action="{{ route('tasks.destroy', $allDetails->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                     class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>

         {{-- Pagination links --}}
         <div class="mt-4">
             {{ $myTasks->links() }}
         </div>
     </div>
 </div>

 @include('layouts.footer')
