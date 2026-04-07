<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\TestController;
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return redirect('/login');});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('departments', DepartmentController::class);
        //onboarding routes//
Route::middleware('auth')->group(function () {

    Route::get('/onboarding/step-1', [OnboardingController::class, 'step1']);
    Route::post('/onboarding/step-1', [OnboardingController::class, 'storeStep1']);

    Route::get('/onboarding/step-2', [OnboardingController::class, 'step2']);
    Route::post('/onboarding/step-2', [OnboardingController::class, 'storeStep2']);

    Route::get('/onboarding/step-3', [OnboardingController::class, 'step3']);
    Route::post('/onboarding/step-3', [OnboardingController::class, 'storeStep3']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';