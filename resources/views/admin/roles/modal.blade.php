{{-- edit modal --}}
@foreach ($roles as $role)
<div id="update-modal-{{ $role->role_id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Role
                </h3>
                <button type="button" data-modal-hide="update-modal-{{ $role->role_id }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="p-4 md:p-5" action="{{ route('updaterole', ['role_id' => $role->role_id]) }}" method="post">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="role_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
                        <input type="text" name="role_name" id="role_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $role->role_name }}" placeholder="">
                    </div>
                </div>
                <label for="permissions" class="block mb-2 text-xl font-bold text-gray-900 dark:text-white">Permissions</label>
                <div class="flex flex-wrap mb-5">
                    @foreach ($getPermissions as $value)
                        <div class="flex flex-col items-start w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 pr-2">
                            <h3 class="mb-2 font-semibold text-base text-gray-900 dark:text-white">{{ $value['permission_name'] }}</h3>
                            <ul class="flex flex-col space-y-2">
                                @foreach ($value['group'] as $group)
                                    @php
                                        $checked = '';
                                    @endphp
                                    @if (isset($rolePermissions[$role->role_id]))
                                        @foreach ($rolePermissions[$role->role_id] as $rolePerm)
                                            @if ($rolePerm->permission_id == $group['permission_id'])
                                                @php
                                                    $checked = 'checked';
                                                @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                    <li class="flex items-center">
                                        <input id="checkbox{{ $role->role_id }}{{ $group['permission_id'] }}" type="checkbox" name="permission_id[]" value="{{ $group['permission_id'] }}" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $checked }}>
                                        <label for="checkbox{{ $role->role_id }}{{ $group['permission_id'] }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $group['permission_name'] }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@endforeach
{{-- delete modal --}}
@foreach ($roles as $role)
<div id="delete-modal-{{ $role->role_id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Confirm Deletion
                </h3>
                <button type="button" data-modal-hide="delete-modal-{{ $role->role_id }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <p class="mb-4 text-gray-900 dark:text-white">You are about to delete this role: <span>{{$role->role_name}}</span></p>
                <div class="flex justify-end">
                        <form id="delete-student-form" action="{{ route('deleterole', ['role_id' => $role->role_id]) }}" method="get">
                        @csrf
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Delete
                        </button>
                    </form>
                    <button type="button" data-modal-hide="delete-modal-{{ $role->role_id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 me-2">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
