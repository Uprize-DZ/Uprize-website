<?php
use App\Livewire\Forms\HomeForm;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\HomeAdminController\Edit as HomeEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public routes
Route::get('/', HomeForm::class)->name('home');

// Admin routes (protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    Route::get('/home/edit', HomeEdit::class)->name('admin.home.edit');
    //logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

require __DIR__ . '/auth.php';
