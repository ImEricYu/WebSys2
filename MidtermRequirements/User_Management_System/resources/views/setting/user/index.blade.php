<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">

                <!-- Search Form -->
                <div class="flex justify-between items-center">
                    <form action="{{ route('admin.users.index') }}" method="GET" class="flex">
                        <input type="text" name="search" placeholder="Search Users..." 
                               class="px-4 py-2 border rounded-md" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-md">
                            Search
                        </button>
                    </form>
                    @can('User create')
                        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">
                            New User
                        </a>
                    @endcan
                </div>

                <!-- Users Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Email</th> <!-- Email Column -->
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Role</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('User access')
                                @foreach($users as $user)
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->email }}</td> <!-- Display Email -->
                                        <td class="py-4 px-6 border-b border-grey-light">
                                            @foreach($user->roles as $role)
                                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="py-4 px-6 border-b border-grey-light text-right">
                                            @can('User edit')
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('User delete')
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center py-4 px-6 border-b border-grey-light">No users found.</td> <!-- Adjusted colspan to 4 -->
                                </tr>
                            @endcan
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                @can('User access')
                    <div class="text-right p-4 py-10">
                        {{ $users->appends(['search' => request('search')])->links() }}
                    </div>
                @endcan

            </div>
        </main>
    </div>
</x-app-layout>
