<x-app-layout>
  <div>
       <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
           <div class="container mx-auto px-6 py-2">

               <!-- Search Form -->
               <div class="flex justify-between items-center">
                   <form action="{{ route('admin.roles.index') }}" method="GET" class="flex">
                       <input type="text" name="search" placeholder="Search Roles..." 
                              class="px-4 py-2 border rounded-md" value="{{ request('search') }}">
                       <button type="submit" class="bg-blue-500 text-white px-4 py-2 ml-2 rounded-md">
                           Search
                       </button>
                   </form>
                   @can('Role create')
                       <a href="{{ route('admin.roles.create') }}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">
                           New Role
                       </a>
                   @endcan
               </div>

               <!-- Roles Table -->
               <div class="bg-white shadow-md rounded my-6">
                   <table class="text-left w-full border-collapse">
                       <thead>
                           <tr>
                               <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-2/12">Role Name</th>
                               <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Permissions</th>
                               <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right w-2/12">Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           @can('Role access')
                               @foreach($roles as $role)
                                   <tr class="hover:bg-grey-lighter">
                                       <td class="py-4 px-6 border-b border-grey-light">{{ $role->name }}</td>
                                       <td class="py-4 px-6 border-b border-grey-light">
                                           @foreach($role->permissions as $permission)
                                               <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">
                                                   {{ $permission->name }}
                                               </span>
                                           @endforeach
                                       </td>
                                       <td class="py-4 px-6 border-b border-grey-light text-right">
                                           @can('Role edit')
                                               <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">
                                                   Edit
                                               </a>
                                           @endcan
                                           @can('Role delete')
                                               <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline">
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
                                   <td colspan="3" class="text-center py-4 px-6 border-b border-grey-light">No roles found.</td>
                               </tr>
                           @endcan
                       </tbody>
                   </table>
               </div>

               <!-- Pagination Links -->
               @can('Role access')
                   <div class="text-right p-4 py-10">
                       {{ $roles->appends(['search' => request('search')])->links() }}
                   </div>
               @endcan

           </div>
       </main>
   </div>
</x-app-layout>
