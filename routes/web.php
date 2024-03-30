<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);;
Route::add('GET', '/counting', [Controller\Site::class, 'counting']);;
Route::add('GET', '/countingtwo', [Controller\Site::class, 'countingtwo']);;
Route::add('GET', '/countingthree', [Controller\Site::class, 'countingthree']);;
Route::add(['GET', 'POST'], '/rooms', [Controller\Site::class, 'rooms']) ->middleware('sotr');
Route::add('GET', '/choice', [Controller\Site::class, 'choice'])->middleware('sotr');;