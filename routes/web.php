<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PartenaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//route pays
Route::get('/pays', [PaysController::class,'index'])->name('pays.index');
Route::post('/store', [PaysController::class,'store'])->name('store');
//fin route pays


//route partenaire
Route::get('/partenaire', [PartenaireController::class,'index'])->name('partenaires.index');
Route::post('/store', [PartenaireController::class,'store'])->name('store');
Route::get('/partenaire-delete/{id}', [PartenaireController::class,'destroy'])->name('partenaires.destroy');
//fin route partenaire




require __DIR__.'/auth.php';
