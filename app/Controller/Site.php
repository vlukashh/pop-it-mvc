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
        $buildings = Buildings::all();

        if(!empty($_GET['square']))
        {
            $id_build = $_GET['square'];
            $rooms = Rooms::where('id_building', $id_build )->get();
            return new View('site.counting', ['buildings' => $buildings, 'rooms' => $rooms]);
        }

        return new View('site.counting', ['buildings' => $buildings]);
    }
    public function counting_type(Request $request): string
    {

        $room_types = RoomTypes::all();
        if(!empty($_GET['square_type']))
        {
            $id_types = $_GET['square_type'];

            $rooms = Rooms::where('id_room_type', $id_types )->get();
            return new View('site.counting_type', ['room_types' => $room_types, 'rooms' => $rooms]);
        }
        return new View('site.counting_type', ['room_types' => $room_types]);
    }
    public function countingtwo(Request $request): string
    {
        $buildings = Buildings::all();

        if(!empty($_GET['quantity']))
        {
            $id_build = $_GET['quantity'];
            $rooms = Rooms::where('id_building', $id_build )->get();
            return new View('site.countingtwo', ['buildings' => $buildings, 'rooms' => $rooms]);
        }

        return new View('site.countingtwo', ['buildings' => $buildings]);
    }

    public function countingtwo_type(Request $request): string
    {
        $room_types = RoomTypes::all();

        if(!empty($_GET['quantity_type']))
        {
            $id_types = $_GET['quantity_type'];
            $rooms = Rooms::where('id_room_type', $id_types )->get();
            return new View('site.countingtwo_type', ['room_types' => $room_types, 'rooms' => $rooms]);
        }
        return new View('site.countingtwo_type', ['room_types' => $room_types]);

    }


    public function countingthree(Request $request): string
    {
        $buildings = Buildings::all();

        if(!empty($_GET['square']))
        {
            $id_build = $_GET['square'];
            $rooms = Rooms::where('id_building', $id_build )->get();
            return new View('site.countingthree', ['buildings' => $buildings, 'rooms' => $rooms]);
        }

        return new View('site.countingthree', ['buildings' => $buildings]);
    }
    public function rooms(Request $request): string
    {
        $rooms = Rooms::all();
        $room_types = RoomTypes::all();
        $buildings = Buildings::all();

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            if ($request->method === 'POST') {
                $rooms = Rooms::select('rooms.*')->join('buildings', 'rooms.id_building', '=', 'buildings.id_building')->where('buildings.name', 'like', "%{$search}%")->get();
                return new View('site.rooms', ['buildings' => $buildings, 'rooms' => $rooms, 'room_types' => $room_types]);
            }
        } else {

            $rooms = Rooms::all();
            $buildings = Buildings::all();
            $room_types = RoomTypes::all();

            if ($request->method === 'POST') {

                $validator = new Validator($request->all(), [
                    'name' => ['required', 'specialSymbols'],
                    'square' => ['required', 'specialSymbols'],
                    'quantity' => ['required', 'specialSymbols'],
                ], [
                    'required' => 'Поле :field пусто',
                    'specialSymbols' => 'Поле :field не должно содержать спец символы',
                ]);

                if ($validator->fails()) {
                    return new View('site.rooms', ['buildings' => $buildings, 'rooms' => $rooms, 'room_types' => $room_types, 'message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
                }

                if (Rooms::create($request->all())) {
                    app()->route->redirect('/rooms');
                    return new View('site.rooms', ['buildings' => $buildings, 'rooms' => $rooms, 'room_types' => $room_types]);
                }
            }
        }
        return new View('site.rooms', ['buildings' => $buildings, 'rooms' => $rooms, 'room_types' => $room_types]);
    }

    public function choice(Request $request): string
    {

        $buildings = Buildings::all();

        if(!empty($_GET['name']))
        {
            $id_build = $_GET['name'];
            $rooms = Rooms::where('id_building', $id_build )->get();
            return new View('site.choice', ['buildings' => $buildings, 'rooms' => $rooms]);
        }

        return new View('site.choice', ['buildings' => $buildings]);
    }

    public function buildings(Request $request): string
    {
        $buildings = Buildings::all();
        if ($request->method === 'POST') {

            $validators = new Validator($request->all(), [
                'name' => ['required', 'specialSymbols'],
                'address' => ['required', 'specialSymbols']
            ],  [
                'required' => 'Поле не заполнено',
                'specialSymbols' => 'Поле не должно содержать спец. символы'], );

            if($validators->fails()){
                return new View('site.buildings',
                    ['buildings'=>$buildings, 'message' => json_encode($validators->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $building = $request->all();
            if (!empty($_FILES['img'])) {
                $image = $_FILES['img'];
                $root = app()->settings->getRootPath();
                $path = $_SERVER['DOCUMENT_ROOT'] . $root . '/public/img/';
                $name = $image['name'];

                move_uploaded_file($image['tmp_name'], $path . $name);
//                var_dump(move_uploaded_file($image['tmp_name'], $path . $name));

                $building['img'] = $name;

                if (Buildings::create($building)) {
                    app()->route->redirect('/buildings');
                }
            }
//            else {
//                if (Buildings::create($request->all())) {
//                    app()->route->redirect('/buildings');
//                }
//            }
        }
        return new View('site.buildings',['buildings' => $buildings]);
    }


}

