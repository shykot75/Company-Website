<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CompanyController::class, 'index'])->name('home');
Route::get('/contact-us', [CompanyController::class, 'contact'])->name('contact');
Route::post('/message-us', [CompanyController::class, 'message'])->name('contact.message');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // ADMIN DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    //HOME SLIDER
    Route::get('/add-slider', [SliderController::class, 'add'])->name('add.slider');
    Route::post('/create-slider', [SliderController::class, 'create'])->name('create.slider');
    Route::get('/manage-slider', [SliderController::class, 'manage'])->name('manage.slider');
    Route::get('/edit-slider/{id}', [SliderController::class, 'edit'])->name('edit.slider');
    Route::post('/update-slider/{id}', [SliderController::class, 'update'])->name('update.slider');
    Route::post('/delete-slider/{id}', [SliderController::class, 'delete'])->name('delete.slider');

    //HOME ABOUT
    Route::get('/add-about', [AboutController::class, 'index'])->name('add.about');
    Route::post('/create-about', [AboutController::class, 'create'])->name('create.about');
    Route::get('/manage-about', [AboutController::class, 'manage'])->name('manage.about');
    Route::get('/edit-about/{id}', [AboutController::class, 'edit'])->name('edit.about');
    Route::post('/update-about/{id}', [AboutController::class, 'update'])->name('update.about');
    Route::post('/delete-about/{id}', [AboutController::class, 'delete'])->name('delete.about');

    //HOME PORTFOLIO
    Route::get('/add-portfolio', [PortfolioController::class, 'index'])->name('add.portfolio');
    Route::post('/create-portfolio', [PortfolioController::class, 'create'])->name('create.portfolio');
    Route::get('/manage-portfolio', [PortfolioController::class, 'manage'])->name('manage.portfolio');
    Route::get('/edit-portfolio/{id}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
    Route::post('/update-portfolio/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
    Route::post('/delete-portfolio/{id}', [PortfolioController::class, 'delete'])->name('delete.portfolio');

    //CONTACT MODULE
    Route::get('/add-contact', [ContactController::class, 'index'])->name('add.contact');
    Route::post('/create-contact', [ContactController::class, 'create'])->name('create.contact');
    Route::get('/manage-contact', [ContactController::class, 'manage'])->name('manage.contact');
    Route::get('/edit-contact/{id}', [ContactController::class, 'edit'])->name('edit.contact');
    Route::post('/update-contact/{id}', [ContactController::class, 'update'])->name('update.contact');
    Route::post('/delete-contact/{id}', [ContactController::class, 'delete'])->name('delete.contact');

    //MESSAGE MODULE
    Route::get('/manage-message', [MessageController::class, 'manage'])->name('manage.message');
    Route::post('/delete-message/{id}', [MessageController::class, 'delete'])->name('delete.message');





});
