@extends('admin.admin')

@section('title', 'Sertifikat')

@section('content')
<div class="container mx-auto py-6">

    <!-- Form Upload -->
    <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-[#1e293b] p-6 rounded-xl shadow">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">
                Nama Sertifikat (Opsional)
            </label>
            <input type="text" name="title" id="title"
                   class="block w-full text-sm text-gray-300 bg-gray-700 rounded-md border border-gray-600 p-2"
                   placeholder="Contoh: Sertifikat Cloud AWS">
        </div>

        <div class="mb-4">
            <label for="formFile" class="block text-sm font-medium text-gray-300 mb-2">
                Pilih Gambar
            </label>
            <input
                class="block w-full text-sm text-gray-300
                       file:mr-3 file:py-1 file:px-3
                       file:rounded-md file:border-0
                       file:text-sm file:font-semibold
                       file:bg-indigo-600 file:text-white
                       hover:file:bg-indigo-700
                       cursor-pointer"
                type="file"
                id="formFile"
                name="image"
                accept="image/*"
                onchange="previewImage(event)"
            >
        </div>

        <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow">
            Upload Gambar
        </button>

        <!-- Preview Gambar -->
        <div class="mt-4">
            <img id="preview" src="#" alt="Preview Gambar"
                 class="hidden max-w-full h-auto object-contain rounded-lg">
        </div>
    </form>

    <!-- Daftar Sertifikat -->
    <div class="certificate-list grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
        @forelse ($certificates as $certificate)
            <div class="bg-[#1e293b] p-3 rounded-lg shadow relative">
                <img src="{{ $certificate->image }}"
                    alt="{{ $certificate->title ?? 'Certificate' }}" 
                    class="w-full h-auto rounded-lg mb-2">

                
                @if($certificate->title)
                    <p class="text-gray-300 text-sm text-center">{{ $certificate->title }}</p>
                @endif

                <!-- Tombol Delete -->
                <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" class="absolute top-2 right-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded">
                        Hapus
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-400 col-span-4 text-center">Belum ada sertifikat.</p>
        @endforelse
    </div>

</div>

<!-- Script Preview -->
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
