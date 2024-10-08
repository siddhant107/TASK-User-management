<head>
    <title>LoginPage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body
    class="bg-gradient-to-r from-blue-500 via-lightblue-500 to-cream-500 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm p-10 bg-white bg-opacity-20 shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold text-center text-grey-700 mb-6">LOGIN</h2>

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="username" name="email" placeholder="email"
                    class="mt-1 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <span class="text-red-500 text-xs italic mt-2">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="******************"
                    class="mt-1 block w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <span class="text-red-500 text-xs italic mt-2">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign In
                </button>
                <a href="#"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</body>

@include('layouts.footer')
