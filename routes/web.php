<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvoiceController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('store.index');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('invoices', InvoiceController::class);
Route::get('/home',[InvoiceController::class,'index']);

// Route::get('/invoice', [InvoiceController::class, 'showAll']);

Route::get('/invoice', [InvoiceController::class, 'showAll'])->middleware(['auth', 'verified'])->name('invoice');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('store.invoice.show');
Route::put('/invoice/{id}', [InvoiceController::class, 'update'])->name('store.invoice.update');
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('store.invoice.destroy');



Route::get('/invoices',function(){
    return view('store.index');
});

// Route::get('/invoice', function () {
//     return view('store.invoice');
// })->middleware(['auth', 'verified'])->name('invoice');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
