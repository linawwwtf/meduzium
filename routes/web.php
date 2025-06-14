<?php

use App\Http\Controllers\Admin\TicketPriceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventsSignController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Models\Event;
use App\Models\Models3D;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/exposition', function () {
    $models = Models3D::all();
    return view('exposition', compact('models'));
});
Route::get('/about', function () {
    return view('about');
});


/* Билеты */
Route::get('/buy-ticket', function () {
    $events = Event::all();

    return view('buy-ticket', compact('events'));
});
Route::post('buy-ticket', [TicketController::class, 'store'])->name('ticket.buy');
Route::get('/buy-ticket', [TicketController::class, 'showTicketForm'])->name('ticket.buy');
Route::post('/get-pdf-order-file', [PdfController::class, 'store'])->name('pdf.get');

/* Контакты */
Route::post('/contact/main-page', [ContactController::class, 'createMainContactForm'])->name('contact.main-page');

Route::get('/events/sign-up', [EventsSignController::class, 'signUp'])->name('events.sign-up');
Route::post('/events/sign-up', [EventsSignController::class, 'addSignUp'])->name('events.sign-up.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/suggest-image', [GalleryController::class, 'showSuggestForm'])->name('suggest-image');
Route::post('/suggest-image', [GalleryController::class, 'storeSuggestion'])->name('suggest-image.store');

Route::get('/reviews', [ReviewController::class, 'indexUser'])->name('reviews.index');
Route::get('/add-review', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/{id}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Группа для админа
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/register', [AuthController::class, 'showAdminRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'registerAdmin'])->name('register.submit');

    Route::resource('events', EventController::class)->except(['show']);

    Route::get('/gallery', [GalleryController::class, 'adminIndex'])->name('gallery');
    Route::post('/gallery/update', [GalleryController::class, 'updateGallery'])->name('gallery.update');
    Route::get('/gallery/reset', [GalleryController::class, 'resetGallery'])->name('gallery.reset');
    Route::delete('/suggestions/{id}', [GalleryController::class, 'deleteSuggestion'])->name('suggestions.delete');

    Route::get('/reviews', [ReviewController::class, 'indexAdmin'])->name('reviews.index');
    Route::get('/reviews/archive', [ReviewController::class, 'indexArchive'])->name('reviews.archive');
    Route::patch('/reviews/{review}', [ReviewController::class, 'updateStatus'])->name('reviews.updateStatus');
    Route::delete('/reviews/{review}', [ReviewController::class, 'delete'])->name('reviews.delete');

    Route::get('/contacts', [ContactController::class, 'indexAdmin'])->name('contacts.index');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/ticket-prices', [TicketPriceController::class, 'edit'])
        ->name('ticket-prices.edit');

    Route::post('/ticket-prices', [TicketPriceController::class, 'update'])
        ->name('ticket-prices.update');
});
