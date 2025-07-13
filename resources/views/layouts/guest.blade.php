<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'يوسافكو - شريكك لثمار التين الشوكي')</title>
    
    <!-- Libraries (Bootstrap, Fonts, Icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Your Custom CSS (Loaded via Vite) -->
    @vite(['resources/css/app.css', 'resources/css/admin-edit-mode.css'])
</head>

<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="70">
    <!-- Preloader -->
    <div id="preloader"><div class="spinner"></div></div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}"><i class="fa-solid fa-leaf"></i> يوسافكو</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                {{-- This is the corrected navbar from a previous step --}}
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">الرئيسية</a></li>
                    {{-- Add other pages here if you create them, e.g., <a href="{{ route('about') }}">...</a> --}}
                    <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">خدماتنا</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">معرض الصور</a></li>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link bg-success text-white rounded px-3" href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link bg-primary text-white rounded px-3" href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">تسجيل الخروج</a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('login') }}">بوابة المزارعين</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    {{-- Session Messages --}}
    @if (session('success'))
        <div class="alert alert-success m-3 position-fixed top-0 end-0" style="z-index: 9999;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger m-3 position-fixed top-0 end-0" style="z-index: 9999;">{{ session('error') }}</div>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        {{-- Footer content remains the same --}}
        <div class="container">
             <div class="row">
                <div class="col-md-4 col-lg-4 mx-auto mt-3 text-center text-md-start">
                    <h5 class="text-uppercase mb-4 fw-bold"><i class="fa-solid fa-leaf me-2"></i>يوسافكو</h5>
                    <p>مبادرة سعودية لتطوير سلاسل القيمة لفاكهة التين الشوكي، نربط المزارع بالسوق بأعلى درجات الجودة والاحترافية.</p>
                </div>
                <div class="col-md-3 col-lg-3 mx-auto mt-3 text-center">
                    <h5 class="text-uppercase mb-4 fw-bold">روابط سريعة</h5>
                    <p><a href="#about" class="footer-link">من نحن</a></p>
                    <p><a href="#services" class="footer-link">خدماتنا</a></p>
                    <p><a href="#farmers" class="footer-link">للمزارعين</a></p>
                    <p><a href="#contact" class="footer-link">تواصل معنا</a></p>
                </div>
              <div class="col-md-4 col-lg-4 mx-auto mt-3 text-center text-md-start">
                  <h5 class="text-uppercase mb-4 fw-bold">تواصل</h5>
                  <p><i class="fas fa-home me-3"></i> الرياض، المملكة العربية السعودية</p>
                  <p><i class="fas fa-envelope me-3"></i> info@yosafco.com</p>
                  <p><i class="fas fa-phone me-3" dir="ltr"></i> +966 12 345 6789</p>
              </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">© {{ date('Y') }} جميع الحقوق محفوظة لـ <a href="#home" class="fw-bold text-white">يوسافكو</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap & Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- Vite loads BOTH JS files --}}
    @vite(['resources/js/app.js', 'resources/js/on-page-editor.js'])

    {{-- The modal is included only for the admin --}}
    @auth
        @if(auth()->user()->role === 'admin')
            @include('partials.edit-modal')
        @endif
    @endauth
</body>
</html>