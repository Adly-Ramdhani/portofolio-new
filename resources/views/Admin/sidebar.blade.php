 <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-64 bg-[#1e293b] shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full z-40">
        <div class="p-4 border-b border-gray-700 flex items-center justify-between">
            <h1 class="text-xl font-bold text-white">Admin Panel</h1>
            <!-- Tombol close (mobile) -->
            <button id="closeSidebar" class="lg:hidden text-gray-400 hover:text-white">
                ✕
            </button>
        </div>

        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-[#334155] transition-colors">
                🏠 <span class="ml-3">Dashboard</span>
            </a>
            <a href="{{ route('admin.sertifikat') }}" class="flex items-center px-6 py-3 hover:bg-[#334155] transition-colors">
                👥 <span class="ml-3">Sertifikat</span>
            </a>
        <a href="{{ route('admin.projek') }}" class="flex items-center px-6 py-3 hover:bg-[#334155] transition-colors">
            <span class="mr-2">📦</span> <span>Projek</span>
        </a>


        </nav>

        <form action="{{ route('logout') }}" method="POST" class="absolute bottom-0 w-full p-4 border-t border-gray-700">
            @csrf
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-lg text-white font-semibold">
                Logout
            </button>
        </form>
    </aside>