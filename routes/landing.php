

<?php

use App\Http\Controllers\Admin\MessagesController;
use Illuminate\Support\Facades\Route;




Route::prefix('/')->group(function () {

    Route::get('/', function () {
        return view('landing.layout.base');
    });

    Route::post('/mensagem', [MessagesController::class, 'store'])->name('landing.contact');
});
