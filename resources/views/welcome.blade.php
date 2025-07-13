@extends('layouts.guest')

@section('title', 'يوسافكو - شريكك لثمار التين الشوكي')

@section('content')

    <!-- 1. HERO SECTION -->
    <header id="home" class="hero-section text-center"
            style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2)), url('{{ $site_content['hero_image'] ? asset('storage/' . $site_content['hero_image']) : asset('images/bann.webp') }}');">
        <div class="container position-relative">
            @include('partials.editable', ['data' => $site_content, 'key' => 'hero_image', 'type' => 'image'])

            <div class="d-flex flex-column align-items-center">
                <div class="position-relative">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'hero_title'])
                    <h1 class="hero-title display-3 fw-bolder mb-3">{{ $site_content['hero_title'] ?? 'من المزرعة إلى السوق العالمي' }}</h1>
                </div>
                <div class="position-relative">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'hero_subtitle'])
                    <p class="hero-subtitle lead my-4">{{ $site_content['hero_subtitle'] ?? 'يوسافكو: شريككم الموثوق في معالجة وتسويق فاكهة التين الشوكي بأعلى معايير الجودة.' }}</p>
                </div>
                <div>
                    <a href="#services" class="btn btn-primary btn-lg mx-2 mt-3">اكتشف خدماتنا</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg mx-2 mt-3">تواصل معنا</a>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. GALLERY SECTION -->
    <section id="gallery" class="section-padding bg-light fade-in">
        <div class="container">
            <div class="section-title text-center mb-5">
                <div class="position-relative d-inline-block">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_title'])
                    <h2 class="display-5 fw-bold">{{ $site_content['gallery_title'] ?? 'من أعمالنا' }}</h2>
                </div>
                <br>
                <div class="position-relative d-inline-block">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_subtitle'])
                    <p class="lead text-muted">{{ $site_content['gallery_subtitle'] ?? 'نظرة على عملياتنا ومنتجاتنا عالية الجودة.' }}</p>
                </div>
            </div>
            <div id="imageGallery" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3 shadow-lg">
                    <div class="carousel-item active">
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_img_1', 'type' => 'image'])
                            <img src="{{ $site_content['gallery_img_1'] ? asset('storage/' . $site_content['gallery_img_1']) : asset('images/a.jpg') }}" class="d-block w-100" alt="صورة من المزرعة">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_img_2', 'type' => 'image'])
                            <img src="{{ $site_content['gallery_img_2'] ? asset('storage/' . $site_content['gallery_img_2']) : asset('images/b.jpg') }}" class="d-block w-100" alt="عملية الفرز والتنظيف">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_img_3', 'type' => 'image'])
                            <img src="{{ $site_content['gallery_img_3'] ? asset('storage/' . $site_content['gallery_img_3']) : asset('images/c.jpg') }}" class="d-block w-100" alt="التعبئة والتغليف">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'gallery_img_4', 'type' => 'image'])
                            <img src="{{ $site_content['gallery_img_4'] ? asset('storage/' . $site_content['gallery_img_4']) : asset('images/d.jpg') }}" class="d-block w-100" alt="المنتج النهائي">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#imageGallery" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageGallery" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
            </div>
        </div>
    </section>

    <!-- 3. ABOUT SECTION -->
    <section id="about" class="section-padding fade-in">
        <div class="container">
            <div class="row align-items-center g-lg-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="video-showcase position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'about_video', 'type' => 'video'])
                        <video id="mainVideoPlayer" class="img-fluid rounded-3 shadow-lg" controls autoplay muted loop>
                            <source src="{{ $site_content['about_video'] ? asset('storage/' . $site_content['about_video']) : asset('videos/main.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title text-start position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'about_title'])
                        <h2 class="display-5 fw-bold mb-4">{{ $site_content['about_title'] ?? 'نبذة عن يوسافكو' }}</h2>
                    </div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'about_us_paragraph'])
                        <p class="lead mb-4">{{ $site_content['about_us_paragraph'] ?? 'شركة يوسافكو هي مبادرة سعودية تهدف إلى تطوير سلاسل القيمة لفاكهة التين الشوكي، عبر تقديم خدمات احترافية للمزارعين.' }}</p>
                    </div>
                    <div class="mt-4">
                        <div class="position-relative mb-3">
                            <h3 class="fw-bold fs-4">🌟 رؤيتنا</h3>
                            @include('partials.editable', ['data' => $site_content, 'key' => 'vision_paragraph'])
                            <p>{{ $site_content['vision_paragraph'] ?? 'أن نكون الشركة الرائدة في المملكة والمنطقة في معالجة وتسويق فاكهة التين الشوكي.' }}</p>
                        </div>
                        <div class="position-relative mb-3">
                            <h3 class="fw-bold fs-4">🎯 هدفنا</h3>
                            @include('partials.editable', ['data' => $site_content, 'key' => 'goal_paragraph'])
                            <p>{{ $site_content['goal_paragraph'] ?? 'تطوير سلسلة القيمة لثمار التين الشوكي من المزرعة إلى المستهلك.' }}</p>
                        </div>
                        <div class="position-relative">
                            <h3 class="fw-bold fs-4">💬 رسالتنا</h3>
                            @include('partials.editable', ['data' => $site_content, 'key' => 'mission_paragraph'])
                            <p>{{ $site_content['mission_paragraph'] ?? 'تمكين المزارعين وتعزيز قيمة منتجاتهم من خلال حلول فعّالة وآمنة.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
  <!-- 4. WHY CHOOSE US SECTION -->
<section id="why-us" class="section-padding fade-in" style="background-image: linear-gradient(rgba(10, 132, 36, 0.7), rgba(40, 167, 69, 0.9)), url('{{ $site_content['why_us_bg_image'] ? asset('storage/' . $site_content['why_us_bg_image']) : asset('images/ffr.jpg') }}');">
    <div class="container position-relative">
        @include('partials.editable', ['data' => $site_content, 'key' => 'why_us_bg_image', 'type' => 'image'])
        <div class="section-title text-center mb-5">
            <div class="position-relative d-inline-block">
                @include('partials.editable', ['data' => $site_content, 'key' => 'why_us_title'])
                <h2 class="display-5 fw-bold text-white">{{ $site_content['why_us_title'] ?? 'لماذا تختار يوسافكو؟' }}</h2>
            </div>
            <br>
            <div class="position-relative d-inline-block">
                @include('partials.editable', ['data' => $site_content, 'key' => 'why_us_subtitle'])
                <p class="lead text-white-50">{{ $site_content['why_us_subtitle'] ?? 'نحن نجمع بين الخبرة والتقنية لتقديم أفضل الحلول.' }}</p>
            </div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card h-100">
                    <div class="feature-icon mb-3"><i class="fas fa-flask-vial"></i></div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature1_title'])
                        {{-- THE FIX: We use text-dark because the card has a white background --}}
                        <h5 class="fw-bold text-dark">{{ $site_content['feature1_title'] ?? 'قوة البحث والتطوير' }}</h5>
                    </div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature1_text'])
                        {{-- THE FIX: We use text-muted because the card has a white background --}}
                        <p class="text-muted small">{{ $site_content['feature1_text'] ?? 'لدينا قدرات بحث وتطوير تقنية قوية، ونقدم حلولاً مخصصة لاحتياجات عملائنا.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card h-100">
                    <div class="feature-icon mb-3"><i class="fas fa-users-gear"></i></div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature2_title'])
                        <h5 class="fw-bold text-dark">{{ $site_content['feature2_title'] ?? 'فريق محترف' }}</h5>
                    </div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature2_text'])
                        <p class="text-muted small">{{ $site_content['feature2_text'] ?? 'مع مختبراتنا المتخصصة وفرقنا الفنية، نبتكر ونحسن منتجاتنا وخدماتنا باستمرار.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card h-100">
                    <div class="feature-icon mb-3"><i class="fas fa-gears"></i></div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature3_title'])
                        <h5 class="fw-bold text-dark">{{ $site_content['feature3_title'] ?? 'معدات إنتاج حديثة' }}</h5>
                    </div>
                    <div class="position-relative">
                        @include('partials.editable', ['data' => $site_content, 'key' => 'feature3_text'])
                        <p class="text-muted small">{{ $site_content['feature3_text'] ?? 'مجهزون بمعدات إنتاج آلية متطورة تضمن الدقة والكفاءة في جميع مراحل العمل.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card h-100">
                     <div class="feature-icon mb-3"><i class="fas fa-industry"></i></div>
                     <div class="position-relative">
                         @include('partials.editable', ['data' => $site_content, 'key' => 'feature4_title'])
                         <h5 class="fw-bold text-dark">{{ $site_content['feature4_title'] ?? 'خط إنتاج متكامل' }}</h5>
                     </div>
                     <div class="position-relative">
                         @include('partials.editable', ['data' => $site_content, 'key' => 'feature4_text'])
                         <p class="text-muted small">{{ $site_content['feature4_text'] ?? 'نضمن كفاءة عالية في عملية الإنتاج، بدءًا من استلام المواد الخام وحتى المنتج النهائي.' }}</p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- 5. SERVICES SECTION -->
    <section id="services" class="section-padding fade-in">
        <div class="container">
            <div class="section-title text-center mb-5">
                <div class="position-relative d-inline-block">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'services_title'])
                    <h2 class="display-5 fw-bold">{{ $site_content['services_title'] ?? 'خدماتنا المتكاملة' }}</h2>
                </div>
                <br>
                <div class="position-relative d-inline-block">
                    @include('partials.editable', ['data' => $site_content, 'key' => 'services_subtitle'])
                    <p class="lead text-muted">{{ $site_content['services_subtitle'] ?? 'حلول مبتكرة تضمن الجودة، تحقق الراحة، وتفتح آفاقاً جديدة لتسويق منتجك.' }}</p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-seedling"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service1_title'])
                            <h4 class="fw-bold">{{ $site_content['service1_title'] ?? '🍃 1. العناية قبل القطاف' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service1_text'])
                            <p class="text-muted">{{ $site_content['service1_text'] ?? 'زيارات ميدانية لتقييم جاهزية الثمار وتوجيهات فنية لتحسين الجودة.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-scissors"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service2_title'])
                            <h4 class="fw-bold">{{ $site_content['service2_title'] ?? '✂️ 2. القطاف الآمن' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service2_text'])
                            <p class="text-muted">{{ $site_content['service2_text'] ?? 'فرق مدرّبة على القطاف باحتراف لتجنّب إتلاف الثمار.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-wind"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service3_title'])
                            <h4 class="fw-bold">{{ $site_content['service3_title'] ?? '📦 3. المعالجة وإزالة الأشواك' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service3_text'])
                            <p class="text-muted">{{ $site_content['service3_text'] ?? 'تجهيز الثمار بشكل صحي وآمن وجاهز للاستهلاك.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service4_title'])
                            <h4 class="fw-bold">{{ $site_content['service4_title'] ?? '🛻 4. التعبئة والنقل' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service4_text'])
                            <p class="text-muted">{{ $site_content['service4_text'] ?? 'تعبئة احترافية ونقل مبرد للحفاظ على الجودة.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-bullhorn"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service5_title'])
                            <h4 class="fw-bold">{{ $site_content['service5_title'] ?? '📢 5. التسويق والتوزيع' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service5_text'])
                            <p class="text-muted">{{ $site_content['service5_text'] ?? 'تسويق إلكتروني واتفاقيات مع الأسواق وتصميم الهوية.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 p-4 text-center">
                        <div class="icon-wrapper mb-3"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service6_title'])
                            <h4 class="fw-bold">{{ $site_content['service6_title'] ?? '💵 6. الشراء المباشر' }}</h4>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'service6_text'])
                            <p class="text-muted">{{ $site_content['service6_text'] ?? 'نقدم خيار الشراء المباشر بأسعار تنافسية وعادلة.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
  <!-- 6. FARMERS SECTION -->
<section id="farmers" class="section-padding fade-in" style="background-image: linear-gradient(rgba(40, 167, 69, 0.8), rgba(28, 126, 52, 0.9)), url('{{ $site_content['farmers_bg_image'] ? asset('storage/' . $site_content['farmers_bg_image']) : asset('images/images.jpg') }}');">
    <div class="container position-relative">
        @include('partials.editable', ['data' => $site_content, 'key' => 'farmers_bg_image', 'type' => 'image'])
        <div class="section-title text-center mb-5">
             <div class="position-relative d-inline-block">
                 @include('partials.editable', ['data' => $site_content, 'key' => 'farmers_title'])
                 <h2 class="display-5 fw-bold text-white">{{ $site_content['farmers_title'] ?? 'بوابة المزارعين' }}</h2>
             </div>
             <br>
             <div class="position-relative d-inline-block">
                @include('partials.editable', ['data' => $site_content, 'key' => 'farmers_subtitle'])
                <p class="lead text-white-50">{{ $site_content['farmers_subtitle'] ?? 'انضم لشبكتنا أو سجل الدخول لإدارة خدماتك بكل سهولة.' }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5 text-center">
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'farmers_card_title'])
                            {{-- THE FIX: Removed default dark text class --}}
                            <h5 class="card-title mb-3">{{ $site_content['farmers_card_title'] ?? 'إدارة حسابك وخدماتك' }}</h5>
                        </div>
                        <div class="position-relative">
                            @include('partials.editable', ['data' => $site_content, 'key' => 'farmers_card_text'])
                            {{-- THE FIX: Changed 'text-muted' to 'text-dark' for better readability inside the white card --}}
                            <p class="text-dark">{{ $site_content['farmers_card_text'] ?? 'انضم إلى شبكة مزارعي يوسافكو للوصول إلى لوحة التحكم الخاصة بك، وطلب الخدمات، ومتابعة طلباتك بكل سهولة.' }}</p>
                        </div>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">تسجيل الدخول</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg">إنشاء حساب جديد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- 7. CONTACT SECTION -->
<section id="contact" class="section-padding fade-in">
    <div class="container">
        <div class="section-title text-center mb-5">
            <div class="position-relative d-inline-block">
                @include('partials.editable', ['data' => $site_content, 'key' => 'contact_title'])
                <h2 class="display-5 fw-bold">{{ $site_content['contact_title'] ?? 'تواصل معنا' }}</h2>
            </div>
            <br>
            <div class="position-relative d-inline-block">
                @include('partials.editable', ['data' => $site_content, 'key' => 'contact_subtitle'])
                <p class="lead text-muted">{{ $site_content['contact_subtitle'] ?? 'نسعد باستقبال استفساراتكم. فريقنا جاهز لخدمتكم.' }}</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-7">
                {{-- This is the correct contact form --}}
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="card p-4 p-lg-5 border-0 shadow-sm h-100">
                    @csrf
                     <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="contactName" type="text" class="form-control" id="contactName" placeholder=" " required>
                                <label for="contactName">الاسم</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="contactEmail" type="email" class="form-control" id="contactEmail" placeholder=" " required>
                                <label for="contactEmail">البريد الإلكتروني</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input name="contactSubject" type="text" class="form-control" id="contactSubject" placeholder=" " required>
                                <label for="contactSubject">الموضوع</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="contactMessage" class="form-control" id="contactMessage" placeholder=" " style="height: 150px" required></textarea>
                                <label for="contactMessage">رسالتك</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg w-100">إرسال الرسالة</button>
                        </div>
                     </div>
                </form>
                {{-- This div is used by JavaScript to show success/error messages --}}
                <div id="contactFormResponse" class="mt-3"></div>
            </div>
        </div>
    </div>
</section>

    

@endsection