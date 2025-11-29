@extends('frontend.layouts.app')
@push('css')
    <style>
        @media (max-width: 767.98px) {
            .p-horizontal {
                text-align: justify;
            }
        }
    </style>
@endpush
@section('content')
    <header class="header-2 position-relative overflow-hidden">
        <div id="hero-slider" class="position-relative" style="height: 75vh; overflow: hidden;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner mb-4">
                    <div class="carousel-item active">
                        <div class="page-header min-vh-75"
                            style="background-image: url('assets_frontend/img/apoteker.png');">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 my-auto">
                                        <h1 class="text-white fadeIn2 fadeInBottom">Apoteker Indonesia</h1>
                                        <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">
                                            Kami adalah profesional yang mengedukasi pasien, memastikan penggunaan obat aman
                                            dan hasil terapi efektif.
                                        </p>
                                        <a href="" class="btn bg-gradient-info w-auto me-2">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="page-header min-vh-75"
                            style="background-image: url('assets_frontend/img/apoteker-3.png');">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 my-auto">
                                        <h1 class="text-white fadeIn2 fadeInBottom">Struktur Organisasi</h1>
                                        <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">
                                            Lihat hierarki kepengurusan organisasi profesi kami, memastikan tata kelola yang
                                            transparan dan akuntabel.
                                        </p>
                                        <a href="" class="btn bg-gradient-info w-auto me-2">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="page-header min-vh-75"
                            style="background-image: url('assets_frontend/img/apoteker-4.png');">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 my-auto">
                                        <h1 class="text-white fadeIn2 fadeInBottom">Program Pengembangan Profesional</h1>
                                        <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">
                                            Tingkatkan kompetensi melalui berbagai pelatihan, seminar, dan sertifikasi
                                            sesuai standar kefarmasian terkini.
                                        </p>
                                        <a href="" class="btn bg-gradient-info w-auto me-2">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol navigasi -->
                <div class="min-vh-75 position-absolute w-100 top-0">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

            <!-- Titik indikator -->
            <div id="hero-dots" class="position-absolute start-50 translate-middle-x d-flex gap-2" style="bottom: 90px;">
                <span class="dot rounded-circle bg-white opacity-100" style="width:10px;height:10px;cursor:pointer;"></span>
                <span class="dot rounded-circle bg-white opacity-50" style="width:10px;height:10px;cursor:pointer;"></span>
                <span class="dot rounded-circle bg-white opacity-50" style="width:10px;height:10px;cursor:pointer;"></span>
            </div>
        </div>
    </header>


    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            @php
                                $total = $totalDonasiApproved ?? 0;
                                $display = 'Rp ' . number_format($total, 0, ',', '.'); // e.g. "Rp 1.250.000"
                            @endphp

                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    {{-- data-raw berisi angka mentah untuk JS --}}
                                    <h1 class="text-gradient text-dark"
                                        style="font-size: 2rem; font-weight: 700; margin-bottom: 4px;">
                                        <span id="state1" data-count="{{ $total }}" data-raw="{{ $total }}"
                                            style="font-size: 2rem;">
                                            {{ $display }}
                                        </span>
                                    </h1>
                                    <h5 class="mt-3">Total Donasi Terkumpul</h5>
                                    <p class="text-sm font-weight-normal text-muted">
                                        Terima kasih—dukungan Anda membantu memperkuat solidaritas dan perjuangan apoteker
                                        Indonesia.
                                        Setiap donasi membawa dampak nyata bagi kesejahteraan dan keberlangsungan organisasi
                                        kita.
                                    </p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark"> <span id="state2" countTo="15">10</span>+</h1>
                                    <h5 class="mt-3">Artikel</h5>
                                    <p class="text-sm font-weight-normal">Terdapat 10+ artikel yang membahas berbagai topik
                                        terkait apoteker.</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark" id="state3" countTo="4">5</h1>
                                    <h5 class="mt-3">Seminar</h5>
                                    <p class="text-sm font-weight-normal">Terdapat 5 seminar yang membahas berbagai topik
                                        terkait apoteker.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-12 my-auto">
                        <div class="info-horizontal border-radius-xl d-block d-md-flex p-4 h-100">
                            <div class="ps-0 ps-md-3 mt-3 mt-md-0">
                                <h5>Serikat Apoteker Indonesia</h5>
                                <p class="p-horizontal">Kami aktif menyelenggarakan berbagai kegiatan pengembangan
                                    profesi dan sosial, mulai dari
                                    seminar ilmiah, pelatihan kefarmasian, hingga program pengabdian masyarakat. Setiap
                                    kegiatan dirancang untuk memperkuat kompetensi apoteker serta berkontribusi nyata dalam
                                    peningkatan mutu pelayanan kesehatan di Indonesia. Melalui kolaborasi dan inovasi, kami
                                    berkomitmen membangun komunitas apoteker yang profesional, berintegritas, dan berdampak
                                    positif bagi masyarakat.</p><br>
                                <a href="#" class="text-dark icon-move-right">
                                    Lihat Slengkapnya
                                    <i class="fas fa-arrow-right text-sm ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-12 my-auto">
                        <a href="#">
                            <img class="w-100 border-radius-lg shadow-lg"
                                src="{{ asset('assets_frontend/img/apoteker-3.png') }}" alt="Product Image">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5 py-5">
            <div class="container">
                <div class="row justify-content-center text-center ms-auto me-auto">
                    <div class="col-lg-10 mb-5">
                        <h2 class="text-dark mb-0">Our Leader</h2>
                        <p class="text-muted mt-3 p-horizontal">
                            Sosok yang menjadi panutan dan penggerak utama organisasi. Dengan visi yang jelas dan semangat
                            pengabdian tinggi,
                            beliau memimpin Serikat Apoteker Indonesia untuk terus memperjuangkan profesionalisme,
                            integritas,
                            dan kesejahteraan apoteker di seluruh Indonesia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <!-- Foto / kartu pemimpin -->
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url('{{ asset('assets_frontend/img/apoteker-5.png') }}'); background-size: cover;">
                                    <div class="card-body py-7 text-center"><br><br>
                                        <h3 class="text-white">Ketua Umum</h3>
                                        <p class="text-white opacity-8 ">Pemimpin yang menginspirasi dengan visi, empati,
                                            dan
                                            dedikasi untuk kemajuan profesi apoteker Indonesia.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url('{{ asset('assets_frontend/img/apoteker-6.png') }}'); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Tentang Pemimpin Kami</h3>
                                        <p class="text-white opacity-8" style="text-align: justify;">
                                            Memimpin dengan prinsip kolaborasi, kejujuran, dan inovasi,
                                            beliau berkomitmen membangun ekosistem farmasi yang kuat dan berdaya saing.
                                        </p>
                                        <a href="#" class="btn btn-white btn-sm w-50 mx-auto mt-3">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi nilai kepemimpinan -->
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-symbols-rounded text-gradient text-success text-3xl">groups</i>
                                    <h5 class="font-weight-bolder mt-3">Kepemimpinan Kolaboratif</h5>
                                    <p class="pe-5" style="text-align: justify;">Mendorong sinergi antar anggota agar
                                        organisasi tumbuh secara kolektif
                                        dan berkelanjutan.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i class="material-symbols-rounded text-gradient text-success text-3xl">verified</i>
                                    <h5 class="font-weight-bolder mt-3">Integritas Tinggi</h5>
                                    <p class="pe-3" style="text-align: justify;">Menjadi teladan dalam kejujuran,
                                        tanggung
                                        jawab, dan etika profesi
                                        apoteker.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-5">
                            <div class="col-md-6 mt-3">
                                <i class="material-symbols-rounded text-gradient text-success text-3xl">lightbulb</i>
                                <h5 class="font-weight-bolder mt-3">Visi Inovatif</h5>
                                <p class="pe-5" style="text-align: justify;">Memimpin perubahan dengan ide-ide baru yang
                                    menjawab tantangan dunia
                                    kesehatan modern.</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="info">
                                    <i class="material-symbols-rounded text-gradient text-success text-3xl">handshake</i>
                                    <h5 class="font-weight-bolder mt-3">Kepedulian Sosial</h5>
                                    <p class="pe-3" style="text-align: justify;">Menumbuhkan budaya empati dan
                                        kepedulian
                                        terhadap masyarakat serta
                                        profesi apoteker di daerah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-4 py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="row justify-content-center text-center ms-auto me-auto">
                        <div class="col-lg-10">
                            <h2 class="text-dark mb-0">Our Activities</h2>
                            <p class="text-muted mt-3 p-horizontal">Kami aktif menyelenggarakan berbagai kegiatan
                                pengembangan
                                profesi dan sosial,
                                mulai dari seminar ilmiah, pelatihan kefarmasian, hingga program pengabdian masyarakat. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center mt-3">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                                <div class="front front-background"
                                    style=" 
                                background-image: url('{{ asset('assets_frontend/img/logo_spai.png') }}'); 
                                background-repeat: no-repeat; 
                                background-position: center; 
                                background-size: contain; 
                                height: 440px; 
                                border-radius: 1rem;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url('{{ asset('assets_frontend/img/apoteker-5.png') }}'); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from prototyping
                                            to full-functional code because all elements are implemented.</p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                                <div class="front front-background"
                                    style=" 
                                background-image: url('{{ asset('assets_frontend/img/logo_spai.png') }}'); 
                                background-repeat: no-repeat; 
                                background-position: center; 
                                background-size: contain; 
                                height: 440px; 
                                border-radius: 1rem;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url('{{ asset('assets_frontend/img/apoteker-5.png') }}'); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from prototyping
                                            to full-functional code because all elements are implemented.</p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                                <div class="front front-background"
                                    style=" 
                                background-image: url('{{ asset('assets_frontend/img/logo_spai.png') }}'); 
                                background-repeat: no-repeat; 
                                background-position: center; 
                                background-size: contain; 
                                height: 440px; 
                                border-radius: 1rem;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url('{{ asset('assets_frontend/img/apoteker-5.png') }}'); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from prototyping
                                            to full-functional code because all elements are implemented.</p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h2 class="mb-0 font-weight-bolder text-black">Trusted by Thousands of Indonesian Pharmacists</h2>
                        <p class="text-muted mt-3 p-horizontal">
                            Serikat Profesi Apoteker Indonesia (SPAI) menjadi wadah bagi para apoteker yang berkomitmen
                            meningkatkan kompetensi, profesionalisme, dan kontribusi nyata bagi masyarakat melalui berbagai
                            program pengembangan profesi dan kegiatan sosial.
                        </p>
                    </div>
                </div>

                <div class="row mt-6">
                    <div class="col-lg-4 col-md-8">
                        <div class="card card-plain">
                            <div class="card-body">
                                <div class="author">
                                    <div class="name">
                                        <h6 class="mb-0 font-weight-bolder">dr. apt. Rahmawati, M.Farm</h6>
                                        <div class="stats">
                                            <i class="far fa-clock"></i> 2 hari lalu
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">
                                    “Melalui SPAI, saya bisa mengikuti pelatihan kefarmasian yang sangat bermanfaat
                                    untuk meningkatkan pelayanan di tempat kerja saya.”
                                </p>
                                <div class="rating mt-3">
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8 ms-md-auto">
                        <div class="card bg-dark shadow-dark">
                            <div class="card-body text-white">
                                <div class="author align-items-center">
                                    <div class="name">
                                        <h6 class="mb-0 text-white font-weight-bolder">apt. Dwi Nugraha, S.Farm</h6>
                                        <div class="stats">
                                            <i class="far fa-clock"></i> 1 minggu lalu
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">
                                    “SPAI bukan hanya organisasi, tapi juga komunitas yang peduli terhadap pengembangan
                                    profesi apoteker. Kegiatannya inspiratif dan membangun semangat kebersamaan.”
                                </p>
                                <div class="rating mt-3">
                                    <i class="fas fa-star text-white"></i>
                                    <i class="fas fa-star text-white"></i>
                                    <i class="fas fa-star text-white"></i>
                                    <i class="fas fa-star text-white"></i>
                                    <i class="fas fa-star text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="card card-plain">
                            <div class="card-body">
                                <div class="author">
                                    <div class="name">
                                        <h6 class="mb-0 font-weight-bolder">apt. Fajar Prasetyo, M.Farm.Klin</h6>
                                        <div class="stats">
                                            <i class="far fa-clock"></i> 3 minggu lalu
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4">
                                    “Saya bangga menjadi bagian dari SPAI. Kegiatan sosial dan pengabdian masyarakatnya
                                    menunjukkan bahwa apoteker memiliki peran penting dalam kesehatan bangsa.”
                                </p>
                                <div class="rating mt-3">
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                    <i class="fas fa-star text-dark"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="horizontal dark my-5">

                {{-- <div class="row justify-content-center align-items-center">
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-75"
                        src="{{ asset('assets_frontend/img/logos/gray-logos/logo-bpom.png') }}" alt="BPOM">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-75" src="{{ asset('assets_frontend/img/logos/gray-logos/logo-iai.png') }}"
                        alt="Ikatan Apoteker Indonesia">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-75"
                        src="{{ asset('assets_frontend/img/logos/gray-logos/logo-depkes.png') }}"
                        alt="Kementerian Kesehatan">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <img class="w-100 opacity-75"
                        src="{{ asset('assets_frontend/img/logos/gray-logos/logo-univ.png') }}"
                        alt="Universitas Farmasi">
                </div>
            </div> --}}
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const carousel = document.querySelector('#carouselExampleControls');
            const dots = document.querySelectorAll('#hero-dots .dot');

            // Aktifkan carousel otomatis
            const bsCarousel = new bootstrap.Carousel(carousel, {
                interval: 4000,
                ride: 'carousel',
                pause: false, // biar tidak berhenti saat mouse hover
                wrap: true // biar berputar terus
            });

            // Update titik saat slide berubah
            carousel.addEventListener('slide.bs.carousel', function(event) {
                dots.forEach((dot, i) => {
                    dot.style.opacity = i === event.to ? "1" : "0.5";
                });
            });

            // Klik titik untuk pindah slide
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => bsCarousel.to(i));
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const el = document.getElementById('state1');
            if (!el) return;

            // Ambil nilai mentah dari attribute data-count / data-raw
            const end = parseInt(el.getAttribute('data-count') || el.getAttribute('data-raw') || '0', 10) || 0;

            // Jika 0, langsung tampilkan Rp 0
            if (end === 0) {
                el.textContent = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    maximumFractionDigits: 0
                }).format(0);
                return;
            }

            // Simple count-up
            const duration = 1000; // durasi animasi (ms)
            const frameRate = 60; // fps
            const totalFrames = Math.round((duration / 1000) * frameRate);
            let frame = 0;
            const easeOutQuad = t => t * (2 - t);

            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            });

            const start = 0;
            const animate = () => {
                frame++;
                const progress = easeOutQuad(frame / totalFrames);
                const current = Math.round(start + (end - start) * progress);
                el.textContent = formatter.format(current);

                if (frame < totalFrames) {
                    requestAnimationFrame(animate);
                } else {
                    // pastikan akhir tepat
                    el.textContent = formatter.format(end);
                }
            };

            requestAnimationFrame(animate);
        });
    </script>
@endpush
