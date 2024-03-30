<?php

namespace Controller;

use Model\Buildings;
use Model\Post;
use Model\RoomTypes;
use Src\View;
use Src\Request;
use Model\User;
use Model\Rooms;
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
        $users = User::all();
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
        return new View('site.signup',['users' => $users]);
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
    public function counting(Request $request): string
    {
        $building = Buildings::all();
        if ($request->method === 'POST' && Buildings::create($request->all())) {
            app()->route->redirect('/counting');
        }
        return new View('site.counting',['building' => $building]);
    }
    public function countingtwo(Request $request): string
    {
        $building = Buildings::all();
        if (!empty($_GET['chair']))
        {
            $id_building = $_GET['chair'];
            $rooms = Rooms::where('id_building', $id_building)->get();
            return new View('site.get_seats_build', ['building' => $building, 'rooms' => $rooms]);
        }
        return new View('site.countingtwo',['building' => $building]);
    }

    public function countingthree(Request $request): string
    {
        $building = Buildings::all();
        if ($request->method === 'POST' && Buildings::create($request->all())) {
            app()->route->redirect('/countingthree');
        }
        return new View('site.countingthree',['building' => $building]);
    }
    public function rooms(Request $request): string
    {
        $rooms = Rooms::all();
        $buildings = Buildings::all();
        $room_types = RoomTypes::all();
        if ($request->method === 'POST' && Rooms::create($request->all())) {
            app()->route->redirect('/rooms');
        }
        return new View('site.rooms',['rooms' => $rooms, 'buildings' => $buildings, 'room_types' => $room_types]);
    }
    public function choice(Request $request): string
    {
        $building = Buildings::all();
        if ($request->method === 'POST' && Buildings::create($request->all())) {
            app()->route->redirect('/choice');
        }
        return new View('site.choice',['building' => $building]);
    }

}

