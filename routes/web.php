<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

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

Route::get('change-lang/{locale}', [LanguageController::class, 'changeLanguage'])->name('change_language');

Route::group(['middleware' => 'localization'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('privacy-policy' , [HomeController::class, 'showPrivacyPolicy'])->name('privacy');
    Route::get('about' , [HomeController::class, 'showAboutPage'])->name('about');
    Route::post('/contact/submit', [HomeController::class, 'submitContactForm'])->name('contact.submit');
    // partner
    Route::get('/become-partner', [PartnerController::class, 'create'])->name('partner.index');
    Route::post('/become-partner-apply', [PartnerController::class, 'applyAsSeller'])->name('partner.apply');
    Route::get('{slug}' , [HomeController::class, 'showPage'])->name('page');
});
