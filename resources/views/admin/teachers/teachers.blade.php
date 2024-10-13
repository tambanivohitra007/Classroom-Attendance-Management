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
    @include('admin.teachers.modal')

    <div class="relative overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Teachers
            </caption>
            <thead>
                <tr>
                    <td colspan="5" class="p-4">
                        <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Add new teacher +
                        </button>
                    </td>
                </tr>
                <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Teacher ID</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Faculty</th>
                    <th scope="col" class="px-6 py-3">Last Updated</th>
                    <th scope="col" class="px-6 py-3"><span class="sr-only"></span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Profile Picture">
                            <div class="ml-3">
                                <div>{{ $teacher->first_name }} {{ $teacher->last_name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $teacher->teacher_id }}</td>
                    <td class="px-6 py-4">{{ $teacher->email }}</td>
                    <td class="px-6 py-4">{{ $teacher->faculty }}</td>
                    <td class="px-6 py-4">{{ $teacher->updated_at->diffForHumans() }}</td>
                    <td class="px-6 py-4">
                        <button data-modal-target="update-modal-{{ $teacher->teacher_id }}" data-modal-toggle="update-modal-{{ $teacher->teacher_id }}" type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit
                        </button>
                        <button data-modal-target="delete-modal-{{ $teacher->teacher_id }}" data-modal-toggle="delete-modal-{{ $teacher->teacher_id }}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (Session::has('success'))
    <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
    @endif
    @if (Session::has('fail'))
    <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
    @endif

<form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf

</form>

    </div>
</body>
</html>

</html>
