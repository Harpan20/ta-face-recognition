<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyProfileVideoController;
use App\Http\Controllers\CompanyValueController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExcellenceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoClaimController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\WhatsappController;

// temporary
Route::get('/', function () {
    return redirect('login');
});
Route::get('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login', [LoginController::class, 'proseslogin'])->name('admin.proses');

Route::get('login-with-face', [LoginController::class, 'loginWithFaceIndex'])->name('admin.login.face.index');
Route::post('login-with-face', [LoginController::class, 'loginWithFaceCheck'])->name('admin.login.face.check');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    // profile
    Route::resource('visions', VisionController::class)->except(['show']);
    Route::resource('missions', MissionController::class)->except(['show']);
    Route::resource('emails', EmailController::class)->except(['show']);
    Route::resource('countries', CountryController::class)->only(['index']); // numbers related
    Route::resource('phone-numbers', PhoneNumberController::class)->except(['show']); // numbers related
    Route::resource('whatsapps', WhatsappController::class)->except(['show']); // numbers related
    Route::resource('addresses', AddressController::class)->except(['show']);
    Route::resource('excellences', ExcellenceController::class)->except(['show']);
    Route::resource('company-profile-videos', CompanyProfileVideoController::class)->except(['show']);

    // client
    Route::resource('contact-forms', ContactFormController::class)->except(['show']); // numbers related
    Route::resource('company-values', CompanyValueController::class)->except(['show']);
    Route::resource('clients', ClientController::class)->except(['show']);
    Route::resource('testimonies', TestimonyController::class)->except(['show']);

    // team
    Route::resource('teams', TeamController::class)->except(['show']);
    Route::resource('positions', PositionController::class)->except(['show']);

    // post
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('post-types', PostTypeController::class)->except(['show']);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class)->except(['show']);

    // product
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('features', FeatureController::class)->except(['show']);
    Route::resource('benefits', BenefitController::class)->except(['show']);
    Route::resource('advantages', AdvantageController::class)->except(['show']);
    Route::resource('supports', SupportController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['show']);

    // promo
    Route::resource('promos', PromoController::class)->except(['show']);
    Route::resource('promo-claims', PromoClaimController::class)->only(['index', 'destroy']);

    // demo
    Route::resource('demos', DemoController::class)->only(['index', 'destroy']);
});
