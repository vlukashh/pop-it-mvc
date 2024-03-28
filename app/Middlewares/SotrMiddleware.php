<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class SotrMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не авторизован, то редирект на страницу входа
        if (!Auth::checksotr()) {
            app()->route->redirect('/hello');
        }
    }
}