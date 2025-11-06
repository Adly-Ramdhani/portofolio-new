<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Local pakai Vite dev server --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{-- Production pakai hasil build static --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app-B5ErDcyM.css') }}">
        <script type="module" src="{{ asset('build/assets/app-Bj43h_rG.js') }}"></script>
    @endif
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/images/icoon1.png') }}">
    <title>Adly | Portofolio</title>
    <title>View</title>
</head>
<body>
<div class="container py-5">
    <div class="rounded-4 border border-secondary p-5 mx-auto"
         style="background: linear-gradient(180deg, #0f172a, #1e293b); max-width: 1200px;">

        <a href="{{ route('dashboard') }}" 
           class="btn btn-outline-light mb-4">
            ← Kembali
        </a>

        <div class="row g-5 align-items-start">
            <!-- Kiri: Deskripsi -->
            <div class="col-lg-7 text-light">
                <h3 class="fw-bold mb-2 text-white">{{ $projects->title }}</h3>
                <h6 class="text-info mb-4">{{ $projects->role }}</h6>

                <p class="opacity-75 mb-4" style="line-height: 1.8;">
                    {{ $projects->description }}
                </p>

                {{-- Tech Stack --}}
                @if($projects->tech_stack)
                    <h6 class="fw-semibold mb-2 text-secondary">Technologies Used</h6>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @foreach($projects->tech_stack as $tech)
                            <span class="badge bg-primary bg-opacity-75 px-3 py-2">{{ $tech }}</span>
                        @endforeach
                    </div>
                @endif

                {{-- Statistik --}}
               @php
                    $techStack = array_filter($projects->tech_stack ?? []);
                    $keyFeatures = array_filter($projects->key_features ?? []);
                @endphp

                <div class="d-flex gap-3 mb-4">
                    <div class="bg-dark rounded-3 p-3 text-center flex-fill border border-secondary">
                        <h6 class="mb-1 text-white">{{ count($techStack) }}</h6>
                        <small class="text-secondary">Total Teknologi</small>
                    </div>
                    <div class="bg-dark rounded-3 p-3 text-center flex-fill border border-secondary">
                        <h6 class="mb-1 text-white">{{ count($keyFeatures) }}</h6>
                        <small class="text-secondary">Fitur Utama</small>
                    </div>
                </div>



                {{-- Tombol Demo --}}
                @if($projects->github_link)
                    <a href="{{ $projects->github_link}}" target="_blank" 
                       class="btn btn-gradient btn-lg px-4 py-2 mt-2">
                        Github
                    </a>
                @endif
            </div>

            <!-- Kanan: Gambar Preview -->
            <div class="col-lg-5 text-center">
                @if($projects->image)
                    <img src="{{  $projects->image}}"
                         alt="{{ $projects->title }}"
                         class="img-fluid rounded-4 border border-secondary shadow mb-4"
                         style="max-height: 320px; object-fit: cover;">
                @endif

                {{-- Key Features --}}
                <div class="p-4 bg-dark rounded-4 border border-secondary text-start">
                    <h6 class="text-warning fw-semibold mb-3">⭐ Key Features</h6>
                    <ul class="list-unstyled mb-0">
                        @foreach ($projects->key_features ?? [] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.btn-gradient {
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    color: #fff;
    border: none;
    transition: 0.3s;
}
.btn-gradient:hover {
    opacity: 0.85;
}
</style>


</body>
</html>
