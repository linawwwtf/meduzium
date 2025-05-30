<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventsSignController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SuggestionImagesController;
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
Route::post('/get-pdf-order-file', [PdfController::class, 'store'])->name('pdf.get');

/* Контакты */
Route::post('/contact/main-page', [ContactController::class, 'createMainContactForm'])->name('contact.main-page');

Route::get('/events/sign-up', [EventsSignController::class, 'signUp'])->name('events.sign-up');
Route::post('/events/sign-up', [EventsSignController::class, 'addSignUp'])->name('events.sign-up.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/suggest-image', function () {
    return view('suggest-image');
});
Route::post('/suggest-image', [SuggestionImagesController::class, 'create'])->name('suggest-image.submit');

Route::get('/reviews', [ReviewController::class, 'indexUser'])->name('reviews.index');
Route::get('/add-review', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Группа для аутентифицированных пользователей
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/register', [AuthController::class, 'showAdminRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'registerAdmin'])->name('register.submit');

    Route::resource('events', EventController::class)->except(['show']);

    Route::get('/suggestion-images', [SuggestionImagesController::class, 'index'])->name('suggestions.index');

    Route::post('/gallery/change', [GalleryController::class, 'change'])->name('gallery.change');
    Route::get('/gallery/reset', [GalleryController::class, 'reset'])->name('gallery.reset');

    Route::get('/reviews', [ReviewController::class, 'indexAdmin'])->name('reviews.index');
    Route::patch('/reviews/{review}', [ReviewController::class, 'updateStatus'])->name('reviews.updateStatus');
    Route::delete('/reviews/{review}', [ReviewController::class, 'delete'])->name('reviews.delete');

    Route::get('/contacts', [ContactController::class, 'indexAdmin'])->name('contacts.index');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
