@extends('layouts.app')

@section('title', 'تعديل محتوى الموقع')
@section('header-title', 'تعديل محتوى الموقع')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.content.update') }}" enctype="multipart/form-data">
            @csrf
            
            <h5 class="mb-4">قسم "من نحن"</h5>
            <div class="mb-3">
                <label class="form-label fw-bold">فقرة "من نحن"</label>
                <textarea name="content[about_us_paragraph]" class="form-control" rows="4">{{ $contents['about_us_paragraph'] ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">فقرة "رؤيتنا"</label>
                <textarea name="content[vision_paragraph]" class="form-control" rows="3">{{ $contents['vision_paragraph'] ?? '' }}</textarea>
            </div>
             <div class="mb-3">
                <label class="form-label fw-bold">فقرة "هدفنا"</label>
                <textarea name="content[goal_paragraph]" class="form-control" rows="3">{{ $contents['goal_paragraph'] ?? '' }}</textarea>
            </div>
             <div class="mb-3">
                <label class="form-label fw-bold">فقرة "رسالتنا"</label>
                <textarea name="content[mission_paragraph]" class="form-control" rows="3">{{ $contents['mission_paragraph'] ?? '' }}</textarea>
            </div>

            <hr class="my-4">

            <h5 class="mb-4">الصور والفيديوهات</h5>
            <p class="text-muted">ملاحظة: ارفع صورة جديدة فقط إذا أردت تغيير الصورة الحالية.</p>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="hero_image" class="form-label fw-bold">صورة الواجهة الرئيسية (Hero Section)</label>
                    <input class="form-control" type="file" name="files[hero_image]" id="hero_image">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="main_video" class="form-label fw-bold">الفيديو الرئيسي في قسم "من نحن"</label>
                    <input class="form-control" type="file" name="files[main_video]" id="main_video">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">حفظ التغييرات</button>
        </form>
    </div>
</div>
@endsection