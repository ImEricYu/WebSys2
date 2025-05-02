<x-app-layout>
  <div>
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-2">

              <!-- Search Form -->
              <div class="flex justify-between items-center">
                  <form action="{{ route('admin.permissions.index') }}" method="GET" class="flex">
                      <input type="text" name="search" placeholder="Search Permissions..." 
                             class="px-4 py-2 border rounded-md" value="{{ request('search') }}">
                      <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-md">
                          Search
                      </button>
                  </form>
                  @can('Permission create')
                      <a href="{{ route('admin.permissions.create') }}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">
                          New Permission
                      </a>
                  @endcan
              </div>

              <!-- Permissions Table -->
              <div class="bg-white shadow-md rounded my-6">
                  <table class="text-left w-full border-collapse">
                      <thead>
                          <tr>
                              <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Permission Name</th>
                              <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @can('Permission access')
                              @foreach($permissions as $permission)
                                  <tr class="hover:bg-grey-lighter">
                                      <td class="py-4 px-6 border-b border-grey-light">{{ $permission->name }}</td>
                                      <td class="py-4 px-6 border-b border-grey-light text-right">
                                          @can('Permission edit')
                                              <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                          @endcan
                                          @can('Permission delete')
                                              <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="inline">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                                              </form>
                                          @endcan
                                      </td>
                                  </tr>
                              @endforeach
                          @endcan
                      </tbody>
                  </table>
              </div>

              <!-- Pagination Links -->
              @can('Permission access')
                  <div class="text-right p-4 py-10">
                      {{ $permissions->appends(['search' => request('search')])->links() }}
                  </div>
              @endcan

          </div>
      </main>
  </div>
</x-app-layout>

