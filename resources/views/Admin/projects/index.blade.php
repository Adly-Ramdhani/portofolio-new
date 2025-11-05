@extends('Admin.admin')

@section('title', 'Projek')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-white">📦 Daftar Projek</h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Projek --}}
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-[#1e293b] p-4 rounded-xl mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-gray-300">Judul Projek</label>
                <input type="text" name="title" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div>
                <label class="text-gray-300">Role</label>
                <input type="text" name="role" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" required>
            </div>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full mt-1 p-2 rounded bg-gray-700 text-white"></textarea>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Upload Gambar</label>
            <input type="file" name="image" class="w-full mt-1 text-gray-300">
        </div>

        <div class="mt-4">
            <label class="text-gray-300 block mb-2">Teknologi yang Digunakan</label>
            <div id="tech-wrapper" class="space-y-2">
                <input type="text" name="tech_stack[]" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Contoh: Laravel">
            </div>
            <button type="button" onclick="addTech()" class="mt-2 bg-gray-600 hover:bg-gray-700 px-2 py-1 text-sm rounded text-white">
                + Tambah Teknologi
            </button>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Github Link</label>
            <input type="url" name="github_link" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" placeholder="https://github.com/username/repo">
         </div>

        <div class="mt-4">
            <label class="text-gray-300 block mb-2">Key Features (opsional)</label>
            <div id="feature-wrapper" class="space-y-2">
                <input type="text" name="key_features[]" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Contoh: Login dengan Google">
            </div>
            <button type="button" onclick="addFeature()" class="mt-2 bg-gray-600 hover:bg-gray-700 px-2 py-1 text-sm rounded text-white">
                + Tambah Fitur
            </button>
        </div>

        <button type="submit" class="mt-6 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">
            Tambah Projek
        </button>
    </form>

    {{-- List Projek --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse($projects as $project)
            <div class="bg-[#1e293b] rounded-xl p-3">
                @if($project->image)
                    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-40 object-cover rounded mb-3">
                @endif
                <h3 class="text-lg font-semibold text-white">{{ $project->title }}</h3>
                <p class="text-sm text-gray-400 mb-2">{{ $project->role }}</p>
              <p class="text-gray-300 text-sm mb-3">
                    {{ \Illuminate\Support\Str::limit($project->description, 100, '...') }}
                </p>


                {{-- Tampilkan tech stack --}}
                @if($project->tech_stack)
                    <div class="flex gap-2 mb-3">
                        @foreach($project->tech_stack as $tech)
                            @switch($tech)
                                @case('laravel')
                                    <i class="fab fa-laravel text-red-500 text-xl" title="Laravel"></i>
                                    @break
                                @case('react')
                                    <i class="fab fa-react text-blue-400 text-xl" title="React"></i>
                                    @break
                                @case('tailwind')
                                    <i class="fab fa-css3-alt text-sky-400 text-xl" title="TailwindCSS"></i>
                                    @break
                                @case('mysql')
                                    <i class="fas fa-database text-yellow-400 text-xl" title="MySQL"></i>
                                    @break
                                @case('nodejs')
                                    <i class="fab fa-node-js text-green-500 text-xl" title="Node.js"></i>
                                    @break
                            @endswitch
                        @endforeach
                    </div>
                @endif

                <a href="{{ route('projects.edit', $project->id) }}"
                    class="block w-full bg-blue-600 hover:bg-red-700 text-white px-3 py-2 rounded text-center font-medium transition">
                    Edit
                    </a>

                    <br>
                {{-- Tombol hapus --}}
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded w-full">Hapus</button>
                </form>
            </div>
        @empty
            <p class="col-span-3 text-gray-400 text-center">Belum ada projek.</p>
        @endforelse
    </div>
</div>

<script>
function addTech() {
    let wrapper = document.getElementById('tech-wrapper');
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'tech_stack[]';
    input.className = 'w-full p-2 rounded bg-gray-700 text-white';
    input.placeholder = 'Teknologi lainnya...';
    wrapper.appendChild(input);
}

function addFeature() {
    let wrapper = document.getElementById('feature-wrapper');
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'key_features[]';
    input.className = 'w-full p-2 rounded bg-gray-700 text-white';
    input.placeholder = 'Fitur lainnya...';
    wrapper.appendChild(input);
}
</script>
@endsection
