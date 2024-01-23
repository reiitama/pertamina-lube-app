<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OilController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomController;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::controller(OilController::class)->prefix('oil')->group(function () {
        Route::get('oil', [OilController::class, 'index'])->name('oil.index');
        Route::get('show/{id}', 'show')->name('oil.show');
        Route::get('/{id}/edit', [OilController::class, 'edit'])->name('oil.edit');
        Route::put('/update/{id}', [OilController::class, 'update'])->name('oil.update');
        Route::get('/oil/export/csv/{condemIDs}', 'App\Http\Controllers\OilController@exportCsv')->name('oil.export.csv');
        Route::get('/oil/export/pdf/{condemIDs}', 'App\Http\Controllers\OilController@exportPdf')->name('oil.export.pdf');
        Route::get('/oil/export/excel/{condemIDs}', 'App\Http\Controllers\OilController@exportExcel')->name('oil.export.excel');
        Route::get('/oil/download/pdf', 'App\Http\Controllers\OilController@downloadPdf')->name('oil.download.pdf');
    });

    Route::controller(InventoryController::class)->prefix('inventory')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('create', [InventoryController::class, 'create'])->name('inventory.create');
        Route::post('store', [InventoryController::class, 'store'])->name('inventory.store');
        Route::get('/{id}', 'edit')->name('inventory.edit');
        Route::put('/update/{id}', [InventoryController::class, 'update'])->name('inventory.update');
        Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
    });


    Route::get('/oil', [OilController::class, 'index'])->name('oil');

    Route::controller(CustomController::class)->prefix('custom')->group(function () {
        Route::get('/', [CustomController::class, 'index'])->name('custom');
        Route::get('/showcustom/{conID}', [CustomController::class, 'showcustom'])->name('custom.showcustom');
        Route::get('/custom/export/csv/{condemIDs}', 'App\Http\Controllers\CustomController@exportCsv')->name('custom.export.csv');
        Route::get('/custom/export/pdf/{condemIDs}', 'App\Http\Controllers\CustomController@exportPdf')->name('custom.export.pdf');
        Route::get('/custom/download/pdf', 'App\Http\Controllers\CustomController@downloadPdf')->name('custom.download.pdf');
        Route::get('/custom/export/excel/{condemIDs}', 'App\Http\Controllers\CustomController@exportExcel')->name('custom.export.excel');
    });

    // Route::get('/custom', [CustomController::class, 'index'])->name('custom');
    // Route::get('show/{conID}', 'CustomController@show')->name('oil.showcustom');

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
