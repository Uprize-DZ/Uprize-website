<?php

use App\Livewire\Forms\HomeForm;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\HomeAdminController\Edit as HomeEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Admin\TrustedByAdminController\Edit as TrustedByEdit;
use App\Livewire\Admin\ServicesAdminController\Edit as ServicesEdit;

// Public routes
Route::get('/', HomeForm::class)->name('home');
Route::get('/services/{id}', \App\Livewire\Layout\ServiceDetails::class)->name('services.show');
// Admin routes (protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    Route::get('/home/edit', HomeEdit::class)->name('admin.home.edit');
    Route::get('/trustedby/edit', TrustedByEdit::class)->name('admin.trustedby.edit');
    Route::get('/services/edit', ServicesEdit::class)->name('admin.services.edit');

    //logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

require __DIR__ . '/auth.php';
