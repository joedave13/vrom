<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="p-4 bg-white border-b border-gray-200">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
                            {{-- Search Form --}}
                            <div class="w-full md:w-1/2">
                                <form action="{!! url()->current() !!}" method="GET" class="flex items-center"
                                    autocomplete="off">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" name="search" id="simple-search"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                            placeholder="Search" value="{{ old('search') }}">
                                        <input type="submit" hidden>
                                    </div>
                                </form>
                            </div>
                            {{-- End --}}

                            {{-- Create User Button --}}
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('admin.user.create') }}"
                                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add User
                                </a>
                            </div>
                            {{-- End --}}
                        </div>

                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-200">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Role
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Phone Number
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                                        Created At
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Detail</span>
                                                        <span class="sr-only">Edit</span>
                                                        <span class="sr-only">Delete</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse ($users as $user)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-10 w-10">
                                                                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://static.thenounproject.com/png/5034901-200.png' }}"
                                                                        alt="user-img"
                                                                        class="h-10 w-10 rounded-full object-contain">
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $user->name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $user->email }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-left">
                                                            {!! $user->role == 'USER'
                                                                ? '<span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">User</span>'
                                                                : '<span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Admin</span>' !!}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                                                            {{ $user->phone }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                                                            {{ $user->created_at }}
                                                        </td>
                                                        <td class="px-6 py-4 flex justify-end gap-x-1">
                                                            <a href="{{ route('admin.user.show', $user) }}"
                                                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4 mr-2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                                </svg>
                                                                Detail
                                                            </a>
                                                            <a href="{{ route('admin.user.edit', $user) }}"
                                                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4 mr-2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                                Edit
                                                            </a>
                                                            <button type="button"
                                                                onclick="document.getElementById('delete-user-form' + {{ $user->id }}).submit();"
                                                                class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-4 h-4 mr-2">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                                Delete
                                                            </button>

                                                            <form id="delete-user-form{{ $user->id }}"
                                                                action="{{ route('admin.user.destroy', $user) }}"
                                                                method="post" class="hidden">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4"
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500 text-center">
                                                            No Data
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
