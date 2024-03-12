<?php

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

Route::get('/', function () {
    return view('index',[
        'name'=> 'John',
    ]);
});
Route::get('/hello', function () {
    return redirect('heelo');
});
Route::get('/heelo', function () {
    return 'Heelo';
})->name('hello');
Route::get('/hello/{name}', function ($name) {
    return ' Hello '. $name .'!';
});

Route::fallback(function (){
    return "Something went wrong";
});