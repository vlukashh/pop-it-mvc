<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Model\Room;
use Src\Auth\Auth;
use Src\Validator\Validator;

class Site
{
    //public function index(Request $request): string
    //{
        //$posts = Post::where('id', $request->id)->get();
        //return (new View())->render('site.post', ['posts' => $posts]);
    //}

    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
    public function counting(): string
    {
        return new View('site.counting', ['message' => 'hello working']);
    }
    public function countingtwo(): string
    {
        return new View('site.countingtwo', ['message' => 'hello working']);
    }

    public function countingthree(): string
    {
        return new View('site.countingthree', ['message' => 'hello working']);
    }
    public function room(Request $request): string
    {
        if ($request->method === 'POST' && Room::create($request->all())) {
            app()->route->redirect('/room');
        }
        return new View('site.room');
    }
    public function choice(): string
    {
        return new View('site.choice', ['message' => 'hello working']);
    }

}

