

<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;




Route::prefix('/administrativo')->group(function () {

    Route::get('/', function () {
        return redirect()->route('budgets.index');
    });

    Route::prefix('/login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('login.index');
        Route::post('/auth', [LoginController::class, 'login'])->name('login.auth');
        Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    });

    Route::prefix('/login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('login.index');
        Route::post('/auth', [LoginController::class, 'login'])->name('login.auth');
        Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    });

    Route::prefix('/orcamentos')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.budgets.index');
        })->name('budgets.index');
    });

    Route::prefix('/catalogo')->group(function () {
        Route::prefix('/categorias')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
            Route::post('/salvar', [CategoriesController::class, 'store'])->name('categories.store');
            Route::post('/atualizar', [CategoriesController::class, 'update'])->name('categories.update');
            Route::post('/remover', [CategoriesController::class, 'remove'])->name('categories.remove');
        });
        Route::prefix('/produtos')->group(function () {
            Route::get('/', [ProductsController::class, 'index'])->name('products.index');
            Route::post('/salvar', [ProductsController::class, 'save'])->name('products.save');
        });
    });

    Route::prefix('/clientes')->group(function () {
        Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
    });

    Route::prefix('/mensagens')->group(function () {
        Route::get('/', [MessagesController::class, 'index'])->name('messages.index');
        Route::get('/{id}', [MessagesController::class, 'open'])->name('messages.open');
    });
});
