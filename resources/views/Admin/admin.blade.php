<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    {{-- Local pakai Vite dev server --}}
   @if (app()->environment('local'))
        {{-- Local pakai Vite dev server --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- Production pakai hasil build static --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app-B5ErDcyM.css') }}">
        <script type="module" src="{{ asset('build/assets/app-Bj43h_rG.js') }}"></script>
    @endif
</head>
<body class="text-gray-200 font-sans">

    <!-- SIDEBAR -->
    @include('Admin.sidebar')

    <!-- TOGGLE BUTTON (Mobile) -->
    <button id="openSidebar"
        class="lg:hidden fixed top-4 left-4 bg-indigo-600 text-white p-2 rounded-md z-50">
        ☰
    </button>

    <!-- MAIN CONTENT -->
    <div class="lg:ml-64 p-6 transition-all duration-300">
         @yield('content')
    </div>

    <!-- SCRIPT: Toggle Sidebar -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        openBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });
        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>

</body>
</html>
