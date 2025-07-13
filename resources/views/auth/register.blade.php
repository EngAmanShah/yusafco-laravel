@extends('layouts.guest')

@section('title', 'تسجيل حساب جديد')

@section('content')
<section class="section-padding" style="padding-top: 120px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">إنشاء حساب مزرعة جديد</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Full Name -->
                            <div class="form-floating mb-3">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder=" " />
                                <label for="name">الاسم الكامل</label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Farm Name (This is our custom field) -->
                            <div class="form-floating mb-3">
                                <input id="farmName" class="form-control @error('farmName') is-invalid @enderror" type="text" name="farmName" :value="old('farmName')" required autocomplete="organization" placeholder=" " />
                                <label for="farmName">اسم المزرعة</label>
                                @error('farmName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder=" " />
                                <label for="email">البريد الإلكتروني</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder=" " />
                                <label for="password">كلمة المرور</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-floating mb-3">
                                <input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" placeholder=" " />
                                <label for="password_confirmation">تأكيد كلمة المرور</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    لديك حساب بالفعل؟
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    تسجيل
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection