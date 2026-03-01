<?php

use App\Livewire\Forms\HomeForm;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\HomeAdminController\Edit as HomeEdit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Admin\TrustedByAdminController\Edit as TrustedByEdit;
use App\Livewire\Admin\ServicesAdminController\Edit as ServicesEdit;
use App\Livewire\Admin\FooterAdminController\Edit as FooterEdit;

// Public routes
Route::get('/', HomeForm::class)->name('home');
Route::get('/services/{id}', \App\Livewire\Layout\ServiceDetails::class)->name('services.show');
Route::get('/reservation/{reservation}/success', \App\Livewire\Layout\ReservationSuccess::class)->name('reservation.success');
// Admin routes (protected by auth middleware)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');

    Route::get('/home/edit', HomeEdit::class)->name('admin.home.edit');
    Route::get('/trustedby/edit', TrustedByEdit::class)->name('admin.trustedby.edit');
    Route::get('/services/edit', ServicesEdit::class)->name('admin.services.edit');
    Route::get('/footer/edit', FooterEdit::class)->name('admin.footer.edit');
    Route::get('/reservations', \App\Livewire\Admin\ReservationsController\Index::class)->name('admin.reservations.index');
    Route::get('/reservations/{reservation}', \App\Livewire\Admin\ReservationsController\Show::class)->name('admin.reservations.show');

    //logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

require __DIR__ . '/auth.php';
