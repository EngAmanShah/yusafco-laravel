<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') - يوسافكو</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite('resources/css/app.css')
</head>
<body style="background-color: #f8f9fa;">
    <header class="bg-white shadow-sm p-3 mb-4 d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">@yield('header-title', 'لوحة التحكم')</h4>
        <div>
            <span class="me-3">أهلاً بك، {{ Auth::user()->name }}</span>
            
            {{-- Show different links for admin --}}
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-success">لوحة الطلبات</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <a href="{{ route('logout') }}" class="btn btn-danger" 
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    تسجيل الخروج
                </a>
            </form>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

    @vite('resources/js/app.js')
</body>
</html>