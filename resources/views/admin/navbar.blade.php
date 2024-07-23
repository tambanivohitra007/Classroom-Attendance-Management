<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="" class="h-8" alt="" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
        </a>
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <a href="{{ route('listroles') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                  Roles
                </a>
                <a class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                  Users
                </a>
            </div>
            <a href="#" class="text-sm text-blue-600 dark:text-white hover:underline" onclick="document.getElementById('logout-form').submit(); return false;">Log out</a>
        </div>
    </div>
</nav>

<ul class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full focus-within:z-10">
        <a href="{{url('/dashboard')}}" style="color: white;" class="nav-link inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Students</a>
    </li>
    <li class="w-full focus-within:z-10">
        <a href="{{url('/teachers')}}" style="color: white;" class="nav-link inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Teachers</a>
    </li>
    <li class="w-full focus-within:z-10">
        <a href="{{url('/semesters')}}" style="color: white;" class="nav-link inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Semesters</a>
    </li>
    <li class="w-full focus-within:z-10">
        <a href="{{url('/courses')}}" style="color: white;" class="nav-link inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Courses</a>
    </li>
    <li class="w-full focus-within:z-10">
        <a href="{{url('/classrooms')}}" style="color: white;" class="nav-link inline-block w-full p-4 bg-white border-s-0 border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Classrooms</a>
    </li>
</ul>

<style>
.active-link {
    background-color: #374151;
    color: white;
}

.active-link.dark {
    background-color: #374151;
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.nav-link');
    const currentUrl = window.location.pathname;

    links.forEach(link => {
        const linkUrl = new URL(link.href).pathname;
        console.log('Current URL:', currentUrl);
        console.log('Link URL:', linkUrl);
        if (linkUrl === currentUrl) {
            link.classList.add('active-link');
        }
    });
});

</script>

