@extends('Admin.admin')

@section('title', 'Edit Projek')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4 text-white">✏️ Edit Projek</h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Edit Projek --}}
   <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-gray-300">Judul Projek</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div>
                <label class="text-gray-300">Role</label>
                <input type="text" name="role" value="{{ old('role', $project->role) }}" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" required>
            </div>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full mt-1 p-2 rounded bg-gray-700 text-white">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Gambar Saat Ini</label><br>
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="Gambar Projek" class="w-32 h-32 object-cover rounded mb-2">
            @else
                <p class="text-gray-400 text-sm">Belum ada gambar.</p>
            @endif
            <input type="file" name="image" class="w-full mt-2 text-gray-300">
        </div>

        <div class="mt-4">
            <label class="text-gray-300 block mb-2">Teknologi yang Digunakan</label>
            <div id="tech-wrapper" class="space-y-2">
                @if($project->tech_stack)
                    @foreach($project->tech_stack as $tech)
                        <input type="text" name="tech_stack[]" value="{{ $tech }}" class="w-full p-2 rounded bg-gray-700 text-white">
                    @endforeach
                @else
                    <input type="text" name="tech_stack[]" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Contoh: Laravel">
                @endif
            </div>
            <button type="button" onclick="addTech()" class="mt-2 bg-gray-600 hover:bg-gray-700 px-2 py-1 text-sm rounded text-white">
                + Tambah Teknologi
            </button>
        </div>

        <div class="mt-4">
            <label class="text-gray-300">Github Link</label>
            <input type="url" name="github_link" value="{{ old('github_link', $project->github_link) }}" class="w-full mt-1 p-2 rounded bg-gray-700 text-white" placeholder="https://github.com/username/repo">
        </div>

        <div class="mt-4">
            <label class="text-gray-300 block mb-2">Key Features (opsional)</label>
            <div id="feature-wrapper" class="space-y-2">
                @if($project->key_features)
                    @foreach($project->key_features as $feature)
                        <input type="text" name="key_features[]" value="{{ $feature }}" class="w-full p-2 rounded bg-gray-700 text-white">
                    @endforeach
                @else
                    <input type="text" name="key_features[]" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="Contoh: Login dengan Google">
                @endif
            </div>
            <button type="button" onclick="addFeature()" class="mt-2 bg-gray-600 hover:bg-gray-700 px-2 py-1 text-sm rounded text-white">
                + Tambah Fitur
            </button>
        </div>

        <button type="submit" class="mt-6 bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white">
            Update Projek
        </button>
    </form>
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
