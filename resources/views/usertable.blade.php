@include('layouts.header')

<div class="container mx-auto mt-8">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-left capitalize">Sl. No.</th>
                <th class="py-2 px-4 bg-gray-200 text-left capitalize">Name</th>
                <th class="py-2 px-4 bg-gray-200 text-left capitalize">Email</th>
                <th class="py-2 px-4 bg-gray-200 text-left capitalize">Join at</th>
                <th class="py-2 px-4 bg-gray-200 text-left capitalize">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersArray as $user)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user['name'] }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user['email'] }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $user['created_at'] }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>

                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@include('layouts.footer')
