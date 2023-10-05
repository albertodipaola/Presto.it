<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/announcements/index', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/category/{category}', [AnnouncementController::class, 'category'])->name('announcements.category');
Route::get('/announcements/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::get('/work-with-us', [PublicController::class, 'workWithUs'])->name('work-with-us');
    Route::get('/become-revisor', [RevisorController::class, 'becomeRevisor'])->name('become-revisor');
});

//revisor
Route::middleware(['is_revisor'])->group(function () {
    Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/revisor/accept-announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept-announcement');
    Route::patch('/revisor/reject-announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject-announcement');
});

Route::get('/revisor/make-revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('revisor.make-revisor');

//local
Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('set-language');