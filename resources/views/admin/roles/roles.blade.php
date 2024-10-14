<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body>
    @include('admin.navbar')
    @include('admin.roles.modal')
    <div class="relative overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Roles
            </caption>
        </table>
    </div>

    <div class="flex justify-between space-x-4 p-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-1/2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption class="p-2 text-base font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Roles List
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Role ID</th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Role name</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$role->role_id}}
                            </th>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">{{$role->role_name}}</td>
                            <td class="px-6 py-4">
                                <button data-modal-target="update-modal-{{ $role->role_id }}" data-modal-toggle="update-modal-{{ $role->role_id }}" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                </button>
                                <button data-modal-target="delete-modal-{{ $role->role_id }}" data-modal-toggle="delete-modal-{{ $role->role_id }}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xm px-5 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-1/2 bg-gray-100 dark:bg-gray-800">
            <div class="px-4 py-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-1 text-base font-semibold text-left rtl:text-right text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 mb-0">
                        Add new role
                    </caption>
                    <tbody>
                        <tr>
                            <td>
                                <form class="w-full" action="{{route('addrole')}}" method="post">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="role_name" class="block mb-2 text-xl font-bold text-gray-900 dark:text-white">Role Name</label>
                                        <input type="text" id="role_name" name="role_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </div>
                                    <label for="permissions" class="block mb-2 text-xl font-bold text-gray-900 dark:text-white">Permissions</label>
                                    <div class="flex flex-wrap mb-5">
                                        @foreach ($getPermissions as $value)
                                            <div class="flex flex-col items-start w-full sm:w-1/2 md:w-1/3 lg:w-1/4 mb-4 pr-2">
                                                <h3 class="mb-2 font-semibold text-base text-gray-900 dark:text-white">{{ $value['permission_name'] }}</h3>
                                                <ul class="flex flex-col space-y-2">
                                                    @foreach ($value['group'] as $group)
                                                    <li class="flex items-center">
                                                        <input id="checkbox" type="checkbox" name="permission_id[]" value="{{ $group['permission_id'] }}" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $group['permission_name'] }}</label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
</body>
</html>
