{{-- Tell this page to use your main guest layout --}}
@extends('layouts.guest')

@section('title', 'تسجيل الدخول')

{{-- Put all content for this page in the 'content' section --}}
@section('content')

<section class="section-padding" style="padding-top: 150px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">تسجيل الدخول</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Session Status (e.g., for password reset links) -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-floating mb-3">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder=" " />
                                <label for="email">البريد الإلكتروني</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-floating mb-3">
                                <input id="password" class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" placeholder=" " />
                                <label for="password">كلمة المرور</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="d-block mb-4">
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label for="remember_me" class="form-check-label">
                                        <span>تذكرني</span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        هل نسيت كلمة المرور؟
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    دخول
                                </button>
                            </div>
                            <hr>
                            <div class="text-center">
                                <p>ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection