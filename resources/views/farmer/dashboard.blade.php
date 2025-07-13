@extends('layouts.app')

@section('title', 'بوابة المزارع')
@section('header-title')
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-tractor me-3 fs-4 text-primary"></i>
        <span>بوابة المزارع - يوسافكو</span>
    </div>
@endsection

@section('content')
    {{-- Success Message Display --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Column 1: Welcome & Service Request -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-light-subtle">
                <div class="card-body p-4">
                    {{-- Personalized Welcome Message --}}
                    <div class="p-4 mb-4 bg-light-subtle border rounded-3 text-center">
                        <h4 class="fw-bold">إلى المزارع الكريم / {{ Auth::user()->name }}</h4>
                        <p class="text-muted">السلام عليكم ورحمة الله وبركاته،<br>تحية تقدير لجهودك المباركة. نحن في يوسافكو نثمّن عملك، ونتطلع إلى شراكة مثمرة معك.</p>
                    </div>

                    <h5 class="mb-3 border-bottom pb-2">تقديم طلب خدمة جديد</h5>
                    <form action="{{ route('request.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="service_type" class="form-label fw-bold">الخدمة المطلوبة:</label>
                            <select class="form-select" id="service_type" name="service_type" required>
                                <option value="" disabled selected>-- اختر من قائمة الخدمات --</option>
                                <option value="Pre-harvest Care">🍃 العناية والجاهزية قبل القطاف</option>
                                <option value="Harvesting">✂️ القطاف الآمن (اليدوي أو الآلي)</option>
                                <option value="Thorn Removal & Processing">📦 المعالجة وإزالة الأشواك</option>
                                <option value="Packaging & Transportation">🛻 التعبئة والنقل المبرد</option>
                                <option value="Marketing & Distribution">📢 التسويق والتوزيع</option>
                                <option value="Direct Purchase">💵 الشراء المباشر للمحصول</option>
                                <option value="Consultation">📋 استشارة فنية</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="product_name" class="form-label fw-bold">المنتج:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="مثال: تين شوكي، مانجو..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="quantity_kg" class="form-label fw-bold">الكمية المتوقعة (بالكيلو):</label>
                                <input type="number" class="form-control" id="quantity_kg" name="quantity_kg" placeholder="مثال: 500" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label fw-bold">ملاحظات إضافية (اختياري):</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="أي تفاصيل أخرى تود إضافتها عن المحصول أو الخدمة المطلوبة..."></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">إرسال الطلب</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Column 2: Profile & History -->
        <div class="col-lg-5">
            {{-- Farmer Profile Card --}}
            <div class="card shadow-sm border-light-subtle mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ملفي الشخصي</h5>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
                </div>
                <div class="card-body">
                    <p><strong>اسم المزارع:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>اسم المزرعة:</strong> {{ Auth::user()->farmName }}</p>
                    <p class="mb-0"><strong>البريد الإلكتروني:</strong> {{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Requests History Card --}}
            <div class="card shadow-sm border-light-subtle">
                 <div class="card-header bg-white">
                    <h5 class="mb-0">سجل طلباتي السابقة</h5>
                </div>
                <div class="card-body" style="max-height: 450px; overflow-y: auto;">
                    @forelse ($requests as $request)
                        <div class="border-bottom pb-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold mb-1">{{ $request->product_name }} - <span class="text-primary">{{ $request->service_type }}</span></p>
                                <span class="badge 
                                    @if($request->status == 'Pending') bg-warning text-dark 
                                    @elseif($request->status == 'Completed') bg-success 
                                    @else bg-info text-dark @endif">
                                    {{ $request->status }}
                                </span>
                            </div>
                            <small class="text-muted">الكمية: {{ $request->quantity_kg }} كجم | تاريخ الطلب: {{ $request->created_at->format('Y-m-d') }}</small>
                        </div>
                    @empty
                        <p class="text-muted text-center">لا توجد طلبات سابقة.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection