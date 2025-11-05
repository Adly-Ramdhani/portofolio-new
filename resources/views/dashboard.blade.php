<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="resources/css/app.css"> --}}
    @vite(['resources/css/app.css'])
    <style>
      /* Force About section visible on small devices and prevent hero from covering it */
      @media (max-width: 991.98px) {
        /* Make hero not full viewport so About sits closer */
        .about.full-screen {
          min-height: auto !important;
          padding-top: 2rem !important;
          padding-bottom: 1rem !important;
          align-items: flex-start !important;
        }

        /* Ensure About area is visible and not hidden by animations */
        .about_area {
          display: block !important;
          padding-top: 1.5rem !important;
          padding-bottom: 2rem !important;
          position: relative !important;
          z-index: 2 !important;
        }

        /* If you use anchor links, make sure section isn't hidden under navbar */
        #about { scroll-margin-top: 88px; }

        /* If animations didn't run, force elements visible */
        .about_area, .about_area * {
          visibility: visible !important;
          opacity: 1 !important;
          transform: none !important;
        }
      }

     /* Fallback: tampilkan konten jika JS/animasi tidak menambahkan .is-ready (berlaku untuk desktop & mobile) */
     body:not(.is-ready) .about-text .animated-item,
     body:not(.is-ready) .about-text h1,
     body:not(.is-ready) .about-text p,
     body:not(.is-ready) .custom-btn-group .btn,
     body:not(.is-ready) .about .about-image img,
     body:not(.is-ready) .about_area,
     body:not(.is-ready) .about_area * {
       visibility: visible !important;
       opacity: 1 !important;
       transform: none !important;
     }

     /* Jika hero sebelumnya mengisi full viewport, kurangi sedikit pada desktop jika perlu */
     @media (min-width: 992px) {
       body:not(.is-ready) .about.full-screen {
         min-height: auto !important;
         padding-top: 3.5rem !important;
         padding-bottom: 3.5rem !important;
       }
     }

     /* Desktop override: pastikan About terlihat (fix z-index/height/visibility) */
     @media (min-width: 992px) {
       /* kurangi tinggi hero agar About tidak tertutup */
       .about.full-screen {
         min-height: 60vh !important;
         padding-top: 3.5rem !important;
         padding-bottom: 3.5rem !important;
         position: relative !important;
         z-index: 1 !important;
       }

       /* pastikan About section selalu terlihat di atas hero bila perlu */
       .about_area {
         display: block !important;
         position: relative !important;
         z-index: 2 !important;
         visibility: visible !important;
         opacity: 1 !important;
         transform: none !important;
       }

       /* pastikan teks/image tidak tertutup oleh transform/animation awal */
       .about-text,
       .about-image,
       .about .about-image img {
         visibility: visible !important;
         opacity: 1 !important;
         transform: none !important;
       }
     }

     /* Force elements with AOS visible once our hero is ready (desktop) */
     [data-aos] {
       opacity: 0;
       transform: none;
       visibility: hidden;
     }
     body.is-ready [data-aos] {
       opacity: 1 !important;
       transform: none !important;
       visibility: visible !important;
       transition: opacity .42s ease, transform .42s ease;
     }
    </style>
    <link rel="icon" type="image/png" href="{{ Vite::asset('images/icoon1.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <title>Adly | Portofolio</title>
</head>



<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#home">
      <img src="{{ Vite::asset('resources/images/icoon1.png') }}" alt="logo" style="width:40px;height:40px;object-fit:cover;border-radius:.5rem;">
      <span class="fw-bold" style="background:linear-gradient(90deg,#7c4dff,#1e90ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
        Adly Ramdhani
      </span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="#home"><span data-hover="Home">Home</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#about"><span data-hover="About">About</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#tech"><span data-hover="Tech">Tech</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#projects"><span data-hover="Projects">Projects</span></a></li>
      </ul>
    </div>
  </div>
</nav>

<section class="about full-screen d-flex justify-content-center align-items-center" id="home">
      <div class="container">
        <div class="row flex-column flex-lg-row align-items-start">

          <!-- LEFT TEXT -->
          <div class="col-lg-7 col-md-12 col-12 d-flex align-items-start">
            <div class="about-text text-center text-lg-start w-100">
              <h1 class="animated animated-text" style="font-size: clamp(2rem, 6.5vw, 4.2rem); line-height: 0.95;">
                <span class="animated-info d-flex flex-column align-items-center align-items-lg-start">
                  <span class="animated-item">Junior Web</span>
                  <span class="animated-item">Developer</span>
                </span>
              </h1>
              <p class="mt-3">
                Creating innovative, functional, and user-friendly web applications.
              </p>
              <div class="mt-4">
                <a href="https://www.linkedin.com/in/adly-ramdhani/" class="social-icon linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.tiktok.com/@dlydh__" class="social-icon tiktok" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.instagram.com/dlydh_" class="social-icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://github.com/Adly-Ramdhani" class="social-icon github" target="_blank"><i class="fab fa-github"></i></a>
              </div>

            </div>
          </div>

          <!-- RIGHT IMAGE -->
          <div class="col-lg-5 col-md-12 col-12 d-flex align-items-start justify-content-end pe-lg-5 pe-3">
             <div class="about-image svg text-center text-lg-end">
               <img src="{{ Vite::asset('resources/images/icoon1.png') }}" class="img-fluid" alt="svg image">
 
             </div>
           </div>

        </div>
      </div>
</section>

<!-- About -->
<section class="about_area section_gap" id="about">
    <div class="container">
      <h2 class="section-title text-center" data-aos="fade-down">About Me</h2>
      <p class="subtitle text-center" data-aos="fade-up" data-aos-delay="100">
        ✨ Transforming ideas into digital experiences ✨
      </p>
      <br><br>

      <div class="row align-items-center">
        <div class="col-lg-5 col-md-8 col-sm-10 text-center text-lg-start mx-auto mb-4 mb-lg-0">
          <div class="about_img" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
            <img class="profile-photo" src="{{ Vite::asset('resources/images/adly.JPG') }}" alt="profile">
          </div>
        </div>

        <div class="col-lg-6 col-md-10 text-center text-lg-start mx-auto">
          <div class="main_title">
          <h3 class="intro" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
              <span>Hallo, saya Adly Ramdhani</span>
            </h3>
            <p class="description" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
              Seorang lulusan jurusan Pengembangan Perangkat Lunak dan Gim yang tertarik dalam pengembangan Fullstack. 
              Saya berfokus pada membangun sistem yang andal dan efisien, serta selalu berusaha memberikan solusi terbaik
              dalam setiap proyek.
            </p>
            <br>
          <a class="primary_btn appear-animation d-flex justify-content-center align-items-center mx-auto mx-lg-0"
              href="CV Adly Ramdhani.pdf"
              download
              style="text-align:center;">
                <span>Download CV</span>
          </a>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="resume py-5 d-lg-flex justify-content-center align-items-center" id="resume">
      <div class="container">
        <div class="row">
    
          <!-- Experiences -->
          <div class="col-lg-6 col-12" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
            <h2 class="mb-4">Experiences</h2>
            <div class="timeline">
              <div class="timeline-wrapper" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="timeline-yy">
                  <span>2024</span>
                </div>
                <div class="timeline-info">
                  <h3><span>Backend Developer</span><small>PT Nawa Darsana Teknologi</small></h3>
                  <p>Merancang dan mengembangkan API serta struktur basis data untuk mendukung
                    kebutuhan sistem. Bertanggung jawab pada sisi server, pengelolaan data, dan integrasi
                    dengan frontend melalui layanan RESTful API.</p>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Educations -->
          <div class="col-lg-6 col-12" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
            <h2 class="mb-4 mobile-mt-2">Educations</h2>
            <div class="timeline">
              <div class="timeline-wrapper" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <div class="timeline-yr">
                  <span>2022-2025</span>
                </div>
                <div class="timeline-info">
                  <h3><span>SMKS Wikrama Bogor</span></h3>
                  <p>Pengembangan Perangkat Lunak dan Gim.</p>
                </div>
              </div>
            </div>
          </div>
    
        </div>
      </div>
</section>

<section class="tech-section" id="tech">
  <div class="tech-container">
    
    <h2 class="tech-title">Tech Stack</h2>

    <div class="tech-grid">

      <div class="tech-card laravel"><iconify-icon icon="logos:laravel" width="42"></iconify-icon></div>
      <div class="tech-card golang"><iconify-icon icon="simple-icons:go" width="42"></iconify-icon></div>
      <div class="tech-card mysql"><iconify-icon icon="logos:mysql" width="50"></iconify-icon></div>
      <div class="tech-card tailwind"><iconify-icon icon="logos:tailwindcss" width="48"></iconify-icon></div>
      <div class="tech-card postman"><iconify-icon icon="logos:postman" width="46"></iconify-icon></div>
      <div class="tech-card dbeaver"><iconify-icon icon="simple-icons:dbeaver" width="48"></iconify-icon></div>
      <div class="tech-card php"><iconify-icon icon="logos:php" width="48"></iconify-icon></div>
      <div class="tech-card csharp"><iconify-icon icon="logos:c-sharp" width="48"></iconify-icon></div>
      <div class="tech-card docker"><iconify-icon icon="logos:docker-icon" width="48"></iconify-icon></div>
      <div class="tech-card git"><iconify-icon icon="logos:git-icon" width="48"></iconify-icon></div>
      <div class="tech-card react"><iconify-icon icon="logos:react" width="46"></iconify-icon></div>
      <div class="tech-card composer"><iconify-icon icon="logos:composer" width="44"></iconify-icon></div>
      <div class="tech-card vite"><iconify-icon icon="logos:vitejs" width="48"></iconify-icon></div>
      <div class="tech-card node"><iconify-icon icon="logos:mysql" width="48"></iconify-icon></div>
      <div class="tech-card postgres"><iconify-icon icon="logos:postgresql" width="48"></iconify-icon></div>

    </div>
  </div>
</section>


<section>

</section>
      
     <!-- PROJECTS -->
<section class="project py-5" id="projects">
    <div class="container">
        <!-- Section Title -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title" data-aos="fade-down">Portfolio Showcase</h2>
            </div>
        </div>

        <!-- Tabs -->
        <div class="d-flex justify-content-center gap-5 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="tab active" data-target="projects-tab">
                <i class="fas fa-code"></i>
                <span>Projects</span>
            </div>
            
            <div class="tab" data-target="certificates-tab">
                <i class="fas fa-certificate"></i>
                <span>Certificates</span>
            </div>
        </div>

        <!-- Projects Content -->

        

    <div id="projects-tab" class="tab-content">
      <div class="project-wrapper" data-aos="fade-up" data-aos-delay="300">
        @foreach($projects as $index => $project)
          <div class="project-card"
              data-aos="zoom-in"
              data-aos-delay="{{ 200 + ($index * 100) }}">
              
            <div class="project-image">
              <img src="{{ $project->image }}" alt="{{ $project->title }}">
            </div>

            <div class="project-content">
              <h3>{{ $project->title }}</h3>
              <h5>{{ $project->role }}</h5>
              <p>{{ Str::limit($project->description, 90, '...') }}</p>
            </div>

            <a href="{{ route('project.show', $project->id) }}" class="btn-detail">
              Detail
            </a>
          </div>
        @endforeach
      </div>
    </div>



    <div id="certificates-tab" class="tab-content" style="display: none;">
      @isset($certificates)
        <div class="certificates-swiper" data-aos="fade-up" data-aos-delay="700">
          <div class="certificates-slider">
            @forelse ($certificates as $certificate)
              <div class="certificates-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="certificates-image">
                  <img src="{{ $certificate->image }}" alt="certificate">
                </div>
              </div>
            @empty
              <p class="text-secondary">Belum ada sertifikat.</p>
            @endforelse
          </div>
        </div>
      @endisset
    </div>





      </div>
</section>
<footer class="site-footer py-5" style="background-color:#0b0f19; color:#ddd;">
  <div class="container">
    <div class="row gy-4">
      <!-- Kiri: Profil + Navigasi -->
      <div class="col-md-6 d-flex flex-column flex-md-row align-items-start gap-4">
        <div class="d-flex align-items-center gap-2">
          <img src="{{ Vite::asset('resources/images/icoon1.png') }}" alt="logo"
               style="width:40px;height:40px;object-fit:cover;border-radius:.5rem;">
          <div>
            <div class="fw-bold"
                 style="background:linear-gradient(90deg,#7c4dff,#1e90ff);
                        -webkit-background-clip:text;
                        -webkit-text-fill-color:transparent;">
              Adly Ramdhani
            </div>
            <small class="text-muted">Web Junior Developer</small>
          </div>
        </div>

        <ul class="list-unstyled mt-3 mt-md-0 ms-md-4">
          <li><a href="#home" class="text-decoration-none text-light d-block mb-1">Home</a></li>
          <li><a href="#about" class="text-decoration-none text-light d-block mb-1">About</a></li>
          <li><a href="#resume" class="text-decoration-none text-light d-block mb-1">Resume</a></li>
          <li><a href="#project" class="text-decoration-none text-light d-block mb-1">Projects</a></li>
          <li><a href="#contact" class="text-decoration-none text-light d-block">Contact</a></li>
        </ul>
      </div>

      <!-- Kanan: Form Kirim Pesan -->
      <div class="col-md-6">
        <form action="{{ route('contact.store') }}" method="POST" class="d-flex flex-column gap-3">
            @csrf

            <div class="d-flex flex-column">
              <label for="name" class="form-label text-light mb-1">Nama</label>
              <input id="name" type="text" name="name"
                    class="form-control form-control-sm bg-dark text-light border-0"
                    placeholder="Nama Anda" required>
            </div>

            <div class="d-flex flex-column">
              <label for="email" class="form-label text-light mb-1">Email</label>
              <input id="email" type="email" name="email"
                    class="form-control form-control-sm bg-dark text-light border-0"
                    placeholder="Email Anda" required>
            </div>

            <div class="d-flex flex-column">
              <label for="message" class="form-label text-light mb-1">Pesan</label>
              <textarea id="message" name="message" rows="3"
                        class="form-control form-control-sm bg-dark text-light border-0"
                        placeholder="Tulis pesan..." required></textarea>
            </div>

            <button type="submit"
                    class="btn btn-sm text-white fw-semibold align-self-start"
                    style="background:linear-gradient(90deg,#1e90ff,#7c4dff);border:0;">
              Kirim
            </button>
        </form>

      </div>
    </div>

    <div class="text-center mt-4">
      <small class="text-secondary">© {{ date('Y') }} Adly Ramdhani. All rights reserved.</small>
    </div>
  </div>

  <!-- Tombol Back to Top -->
  <button id="backToTop" aria-label="Back to top"
          style="position:fixed;right:1rem;bottom:1rem;display:none;
          padding:.5rem .65rem;border-radius:.6rem;border:0;
          background:linear-gradient(90deg,#1e90ff,#7c4dff);
          color:#fff;z-index:1200;">
    ↑
  </button>

  <script>
    (function () {
      const btn = document.getElementById('backToTop');
      if (!btn) return;
      window.addEventListener('scroll', () => {
        btn.style.display = (window.scrollY > 300) ? 'block' : 'none';
      });
      btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    })();
  </script>
</footer>

<!-- add bootstrap bundle so toggler works on mobile -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- include AOS JS and init so data-aos elements reveal correctly on desktop -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  // init AOS and make sure it won't block visibility if JS loads late
  if (window.AOS) {
    AOS.init({ once: true, duration: 700, offset: 80 });
  }
</script>

<script>
    const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-content');

// Hide semua tab-content di awal
tabContents.forEach(tc => tc.style.display = 'none');
// Tampilkan tab pertama (Projects) sebagai default
document.getElementById('projects-tab').style.display = 'block';

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        tabContents.forEach(tc => tc.style.display = 'none');

        const target = tab.getAttribute('data-target');
        document.getElementById(target).style.display = 'block';
    });
});

</script>


<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    })
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    })
</script>
@endif

<script>
  (function () {
    function triggerReady() {
      if (!document.body.classList.contains('is-ready')) {
        console.log('adding .is-ready');
        document.body.classList.add('is-ready');
      } else {
        console.log('.is-ready already present');
      }
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', function () {
        setTimeout(triggerReady, 120);
      });
    } else {
      // in case DOM already ready
      setTimeout(triggerReady, 120);
    }

    // debug: allow manual trigger from console: window.triggerHero = triggerReady
    window.triggerHero = triggerReady;
  })();
</script>

</body>
</html>