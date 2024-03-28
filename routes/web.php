<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);;
Route::add('GET', '/counting', [Controller\Site::class, 'counting']);;
Route::add('GET', '/countingtwo', [Controller\Site::class, 'countingtwo']);;
Route::add('GET', '/countingthree', [Controller\Site::class, 'countingthree']);;