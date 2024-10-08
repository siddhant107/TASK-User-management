<!DOCTYPE html>
<html lang="en">

<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>


<body>
    <div class="h-screen">
        <header>
            <nav class="bg-white shadow-lg">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-7">
                            <!-- Logo -->
                            <div>
                                <a href="#" class="flex items-center py-4 px-2">
                                    <img src="https://via.placeholder.com/40" alt="Logo" class="h-8 w-8 mr-2">
                                    <span class="font-semibold text-gray-500 text-lg">TASK MANAGEMENT</span>
                                </a>
                            </div>
                            <!-- Primary Navbar items -->
                            <div class="hidden md:flex items-center space-x-1">
                                <a href="{{ route('tasks.create') }}"
                                    class="py-4 px-2 font-semibold capitalize {{ request()->routeIs('tasks.create') ? 'text-green-500 border-b-4 border-green-500' : 'text-blue-500 hover:text-green-500 transition duration-300' }}">ADD-
                                    TASK</a>
                                <a href="{{ route('tasks.index') }}"
                                    class="py-4 px-2 font-semibold capitalize {{ request()->routeIs('tasks.index') ? 'text-green-500 border-b-4 border-green-500' : 'text-black-500' }} hover:text-green-500 transition duration-300' ">TASK-
                                    LIST
                                </a>
                            </div>



                        </div>
                        <!-- Secondary Navbar items -->
                        <div class="hidden md:flex items-center space-x-3">
                            <a href="{{ route('users.index') }}"
                                class="py-4 px-2 font-semibold capitalize {{ request()->routeIs('users.index') ? 'text-green-500 border-b-4 border-green-500' : 'text-blue-500 hover:text-green-500 transition duration-300' }}">USER-TABLE
                            </a>
                            <a href="{{ route('users.create') }}"
                                class="py-4 px-2 font-semibold capitalize {{ request()->routeIs('users.create') ? 'text-green-500 border-b-4 border-green-500' : 'text-blue-500 hover:text-green-500 transition duration-300' }}">ADD-USER</a>
                            <!-- Sign Out Button -->
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="py-2 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Sign
                                    Out</button>
                            </form>
                        </div>
                    </div>

                </div>

                <script>
                    const btn = document.querySelector("button.mobile-menu-button");
                    const menu = document.querySelector(".mobile-menu");

                    btn.addEventListener("click", () => {
                        menu.classList.toggle("hidden");
                    });
                </script>
            </nav>
        </header>
