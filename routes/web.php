<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApiCar\ApiCarController;

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

// Retorno de dados via API
Route::group(['namespace' => 'ApiCar'], function () {

    // Trazer os detalhes do veiculo
    Route::get('apidetailscar', [ApiCarController::class, 'getDetailsCar'])->name('apidetailscar');

    // Trazer o ano do veiculo
    Route::get('apiano', [ApiCarController::class, 'getApiAno'])->name('apiano');

    // Trazer o retorno de modelos atrelado a marca
    Route::get('apimodels', [ApiCarController::class, 'getApiModels'])->name('apimodels');

    // Retorno de marcas pela API
    Route::get('apicarmanufacturers', [ApiCarController::class, 'getApiCarManufacturers'])->name('apicarmanufacturers');

});


// Retorno de web
Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    // Retorna a página index da web
    Route::get('/', [WebController::class, 'index']);
});

// Painel administrativo
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    // Retorna página de criação de modelo
    Route::get('carmodels', [AdminController::class, 'createCarModelos'])->name('carmodels');

    // Metodo para criar marca
    Route::post('store', [AdminController::class, 'store'])->name('store');

    // Retorna a página para a criação de marca
    Route::get('create', [AdminController::class, 'create'])->name('create');

    // Retorna a página index do painel administrativo
    Route::get('/', [AdminController::class, 'index'])->name('home');
});
