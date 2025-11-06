<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @if (app()->environment('local'))
        {{-- Local pakai Vite dev server --}}
        @vite(['resources/css/login.css'])
    @else
        {{-- Production pakai hasil build static --}}
        <link rel="stylesheet" href="{{ asset('build/assets/login.css') }}">
    @endif
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded shadow-md w-96">
        @csrf
        <h2 class="text-xl font-semibold mb-4 text-center">Login</h2>

        <label>Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded mb-3" required>

        <label>Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded mb-3" required>

        <div class="flex items-center mb-3">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700">
            Login
        </button>

        @error('email')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </form>
</body>
</html>
