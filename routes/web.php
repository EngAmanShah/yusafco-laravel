<?php

use Illuminate\Support\Facades\Route;

// --- Import all controllers at the top ---
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FarmerDashboardController;

// --- Import Admin controllers with aliases to avoid name conflicts ---
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceRequestController as AdminServiceRequestController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\SiteContentController as AdminSiteContentController;
use App\Http\Controllers\Admin\FarmerController as AdminFarmerController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // --- Farmer-Specific Routes ---
    Route::get('/dashboard', [FarmerDashboardController::class, 'index'])->name('dashboard');
// NEW - corrected
Route::post('/service-requests', [FarmerDashboardController::class, 'storeRequest'])->name('request.store');
    // --- Profile routes from Breeze ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin-Only Routes
    |--------------------------------------------------------------------------
    | All routes in this group will have URLs starting with /admin/...
    | and route names starting with admin...
    */
    Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {
        
        // Admin Dashboard: URL=/admin/dashboard, Name=admin.dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/farmers/{user}/approve', [AdminFarmerController::class, 'approve'])->name('farmers.approve');
        Route::delete('/farmers/{user}/reject', [AdminFarmerController::class, 'reject'])->name('farmers.reject');
        // Service Request Management
       // Inside your admin route group
       Route::post('/requests/{id}/update-status', [AdminServiceRequestController::class, 'updateStatus'])->name('requests.updateStatus');
        Route::delete('/requests/{request}', [AdminServiceRequestController::class, 'destroy'])->name('requests.destroy');
        

        
        // Message Management
        Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
        
        // Site Content Management: URL=/admin/content, Name=admin.content.edit
        Route::get('/content', [AdminSiteContentController::class, 'edit'])->name('content.edit');
          Route::post('/content/{key}', [AdminSiteContentController::class, 'update'])->name('content.update');
    });
});

// This includes all the default auth routes from Breeze
require __DIR__.'/auth.php';