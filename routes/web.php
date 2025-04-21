<?php

use App\Http\Controllers\OeuvreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oeuvre',[OeuvreController::class,'index'])->name('oeuvre.index');
Route::get('/oeuvre/create',[OeuvreController::class,'create'])->name('oeuvre.create');
Route::post('/oeuvre/create',[OeuvreController::class,'store'])->name('oeuvre.store');
Route::get('/oeuvre/{oeuvre}/edit',[OeuvreController::class,'edit'])->name('oeuvre.edit');
Route::put('/oeuvre/{oeuvre}/edit',[OeuvreController::class,'update'])->name('oeuvre.update');
Route::delete('/oeuvre/{oeuvre}/destroy',[OeuvreController::class,'destroy'])->name('oeuvre.destroy');
