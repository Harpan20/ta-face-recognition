<?php

use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\V1\AddressController;
use App\Http\Controllers\API\V1\ArticleController;
use App\Http\Controllers\API\V1\ClientController;
use App\Http\Controllers\API\V1\CompanyProfileVideoController;
use App\Http\Controllers\API\V1\CompanyValueController;
use App\Http\Controllers\API\V1\ContactFormController;
use App\Http\Controllers\API\V1\DemoController;
use App\Http\Controllers\API\V1\EmailController;
use App\Http\Controllers\API\V1\ExcellenceController;
use App\Http\Controllers\API\V1\MissionController;
use App\Http\Controllers\API\V1\PhoneNumberController;
use App\Http\Controllers\API\V1\PositionController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\TeamController;
use App\Http\Controllers\API\V1\TestimonyController;
use App\Http\Controllers\API\V1\VisionController;
use App\Http\Controllers\API\V1\WhatsappController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    // profile
    Route::apiResource('visions', VisionController::class)->only('index');
    Route::apiResource('missions', MissionController::class)->only('index');
    Route::apiResource('emails', EmailController::class)->only('index');
    Route::apiResource('phone-numbers', PhoneNumberController::class)->only('index');
    Route::apiResource('whatsapps', WhatsappController::class)->only('index');
    Route::apiResource('addresses', AddressController::class)->only('index');
    Route::apiResource('excellences', ExcellenceController::class)->only('index');
    Route::apiResource('company-profile-videos', CompanyProfileVideoController::class)->only('index');
    Route::apiResource('company-values', CompanyValueController::class)->only('index');

    Route::apiResource('clients', ClientController::class)->only('index');
    Route::apiResource('testimonies', TestimonyController::class)->only('index');

    // team
    Route::apiResource('teams', TeamController::class)->only('index');
    Route::apiResource('positions', PositionController::class)->only('index');

    // post
    Route::apiResource('articles', ArticleController::class)
        ->parameters(['articles' => 'slug'])
        ->only('index', 'show');

    // product
    Route::apiResource('products', ProductController::class)->only('index', 'show');

    // client
    Route::apiResource('demos', DemoController::class)->only('store');
    Route::apiResource('contact-forms', ContactFormController::class)->only('store');
    Route::get('my-name', fn () => response()->json(['name' => 'Regyta Harpan']));
});

Route::get('produk', [ProdukController::class, 'index'])->name('api.produk');
Route::get('produk/deposito', [ProdukController::class, 'indexDeposito'])->name('api.produk.deposito');
Route::get('produk/kredit', [ProdukController::class, 'indexKredit'])->name('api.produk.kredit');

// Route::get('laporan', [LaporanController::class, 'index'])->name('api.laporan');
