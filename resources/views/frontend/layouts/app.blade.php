<!--
=========================================================
* Material Kit 3 - v3.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets_frontend/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets_frontend/img/favicon.png') }}">
    <title>
        Material Kit 3 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets_frontend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets_frontend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets_frontend/css/material-kit.css?v=3.1.0') }}" rel="stylesheet" />
    @stack('css')
    <style>
        .nav-link.active,
        .dropdown-item.active {
            color: #007bff !important;
            font-weight: bold;
        }

        .nav-link.active i,
        .dropdown-item.active i {
            color: #007bff !important;
        }
    </style>
</head>

<body class="index-page bg-gray-200">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur border-radius-lg mt-4 top-0 z-index-3 shadow position-absolute my-3 p-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3 text-sm" href="/homepage" rel="tooltip"
                            title="Designed and Coded by Creative Tim" data-placement="bottom">
                            <img src="{{ asset('assets_frontend/img/logo_spai.png') }}" width="40px" alt="" srcset="">
                            Serikat Apoteker Indonesia
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a href="/homepage"
                                        class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">dashboard</i>
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                                        id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">groups</i>
                                        About
                                        <img src="{{ asset('assets_frontend/img/down-arrow-dark.svg') }}"
                                            alt="down-arrow" class="arrow ms-auto ms-md-2">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-animation dropdown-lg dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuBlocks">
                                        <div class="d-none d-lg-block">
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/history">
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6
                                                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                Sejarah Organisasi</h6>
                                                            <span class="text-sm">Lihat sejarah organisasi ini</span>
                                                        </div>
                                                        <img src="{{ asset('assets_frontend/img/down-arrow.svg') }}"
                                                            alt="down-arrow" class="arrow">
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/structure">
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6
                                                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                Struktur Organisasi</h6>
                                                            <span class="text-sm">Lihat struktur organisasi ini</span>
                                                        </div>
                                                        <img src="{{ asset('assets_frontend/img/down-arrow.svg') }}"
                                                            alt="down-arrow" class="arrow">
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="row d-lg-none">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-2">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">search</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <a href="/history">
                                                            <div>
                                                                <h6
                                                                    class="dropdown-header d-flex justify-content-cente align-items-center p-0">
                                                                    Sejarah Organasasi</h6>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2 mt-3">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">groups</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <a href="/structure">
                                                            <div>
                                                                <h6
                                                                    class="dropdown-header d-flex justify-content-cente align-items-center p-0">
                                                                    Struktur Organisasi</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                                        id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">article</i>
                                        News
                                        <img src="{{ asset('assets_frontend/img/down-arrow-dark.svg') }}"
                                            alt="down-arrow" class="arrow ms-auto ms-md-2">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-animation dropdown-lg dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuBlocks">
                                        <div class="d-none d-lg-block">
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/news">
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6
                                                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                Artikel & Berita</h6>
                                                            <span class="text-sm">Lihat Artikel & berita organisasi
                                                                ini</span>
                                                        </div>
                                                        <img src="{{ asset('assets_frontend/img/down-arrow.svg') }}"
                                                            alt="down-arrow" class="arrow">
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md" href="/activity">
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6
                                                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                Kegiatan</h6>
                                                            <span class="text-sm">Lihat kegiatan organisasi ini</span>
                                                        </div>
                                                        <img src="{{ asset('assets_frontend/img/down-arrow.svg') }}"
                                                            alt="down-arrow" class="arrow">
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="row d-lg-none">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-2">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">news</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <a href="/news">
                                                            <div>
                                                                <h6
                                                                    class="dropdown-header d-flex justify-content-cente align-items-center p-0">
                                                                    Artikel & Berita</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2 mt-3">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">campaign</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <a href="/activity">
                                                            <div>
                                                                <h6
                                                                    class="dropdown-header d-flex justify-content-cente align-items-center p-0">
                                                                    Kegiatan</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a href="/seminar"
                                        class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold {{ request()->Routeis('seminar') ? 'active' : '' }}">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">event</i>
                                        Seminar
                                    </a>
                                </li>
                                @auth
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold {{ request()->Routeis('profile') ? 'active' : '' }}"
                                        id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">contacts</i>
                                        Account
                                        <img src="{{ asset('assets_frontend/img/down-arrow-dark.svg') }}"
                                            alt="down-arrow" class="arrow ms-auto ms-md-2">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-animation dropdown-sm dropdown-lg-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuBlocks">
                                        <div class="d-none d-lg-block">
                                            <h6
                                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                                Account
                                            </h6>
                                            <a href="/profile" class="dropdown-item border-radius-md">
                                                <span>Profile</span>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" class="w-100">
                                                @csrf
                                                <button
                                                    class="dropdown-item border-radius-md align-items-center border-0 bg-transparent text-start w-100">
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="row d-lg-none">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-2">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">person</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <a href="#">
                                                            <div>
                                                                <h6
                                                                    class="dropdown-header d-flex justify-content-cente align-items-center p-0">
                                                                    Profile</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <div class="icon h-10 me-3 d-flex mt-1">
                                                        <i
                                                            class="material-symbols-rounded opacity-6 me-2 text-md">logout</i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <form action="{{ route('logout') }}" method="POST"
                                                            class="w-100">
                                                            @csrf
                                                            <button
                                                                class="dropdown-item d-flex align-items-center p-0 border-0 bg-transparent text-start w-100">
                                                                <h7 class="m-0">Logout</h7>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item my-auto ms-3 ms-lg-0">
                                    <a href="{{ route('login') }}"
                                        class="btn  bg-gradient-dark  mb-0 mt-2 mt-md-0">Login</a>
                                </li>
                                @endauth


                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
    @yield('content')
    <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
    <footer class="footer pt-5 mt-5">
        <div class="container">
            <div class=" row">
                {{-- <div class="col-md-3 mb-4 ms-auto">
                    <div>
                        <a href="https://www.creative-tim.com/product/material-kit">
                            <img src="{{ asset('assets_frontend/img/logo-ct-dark.png') }}" class="mb-3 footer-logo"
                                alt="main_logo">
                        </a>
                        <h6 class="font-weight-bolder mb-4">Material Kit 3</h6>
                    </div>
                    <div>
                        <ul class="d-flex flex-row ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim" target="_blank">
                                    <i class="fab fa-facebook text-lg opacity-8"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                                    <i class="fab fa-twitter text-lg opacity-8"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://dribbble.com/creativetim" target="_blank">
                                    <i class="fab fa-dribbble text-lg opacity-8"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://github.com/creativetimofficial" target="_blank">
                                    <i class="fab fa-github text-lg opacity-8"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-1" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w"
                                    target="_blank">
                                    <i class="fab fa-youtube text-lg opacity-8"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Company</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/templates/free" target="_blank">
                                    Freebies
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/templates/premium"
                                    target="_blank">
                                    Premium Tools
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/blog" target="_blank">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Resources</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://iradesign.io/" target="_blank">
                                    Illustrations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                                    Bits & Snippets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                                    Affiliate Program
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-sm">Help & Support</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                                    Contact Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center"
                                    target="_blank">
                                    Knowledge Center
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://services.creative-tim.com/?ref=ct-mk2-footer"
                                    target="_blank">
                                    Custom Development
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                                    Sponsorships
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                    <div>
                        <h6 class="text-sm">Legal</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="https://www.creative-tim.com/knowledge-center/terms-of-service"
                                    target="_blank">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center/privacy-policy"
                                    target="_blank">
                                    Privacy Policy
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.creative-tim.com/license" target="_blank">
                                    Licenses (EULA)
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="text-center">
                        <p class="text-dark my-4 text-sm font-weight-normal">
                            All rights reserved. Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script> Material Kit by <a href="#">Creative
                                Tim</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets_frontend/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets_frontend/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets_frontend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('assets_frontend/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>

    @stack('scripts')
</body>

</html>