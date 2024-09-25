<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FormValidation;
use App\Models\User;

class UserRegController extends Controller
{
    public function registrate(Request $request) {
        // Инициализация валидатора
        $validator = new FormValidation();

        // Добавляем правила валидации
        $validator->setRule('user_login', 'isNotEmpty');
        $validator->setRule('user_password', 'isNotEmpty');
        $validator->setRule('user_name', 'isNotEmpty');
        $validator->setRule('user_email', 'isNotEmpty');

        // Выполняем валидацию
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if ($errors = $validator->errors()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $exists = User::where('login', $request->user_login)->exists();
        if($exists){
            return  redirect()->back()->withError('Такой пользователь ЕСТЬ')->withInput();
        }

        $exists = User::where('email', $request->user_email)->exists();
        if($exists){
            return  redirect()->back()->withError('Такой пользователь ЕСТЬ')->withInput();
        }

        $newUser = new User();
        $newUser->login = trim($request->user_login);
        $newUser->password = md5(trim($request->user_password));
        $newUser->name = trim($request->user_name);
        $newUser->email = trim($request->user_email);

        $newUser->save();

        session(['name' => trim($request->user_name)]);
        session(['isLogged' => 1]);
        return redirect("/");
    }

    public function index(Request $request){
        return view('user_registration');
    }

    public function checkLogin(Request $request) {
        $login = $request->input('login');
        $isTaken = User::where('login', $login)->exists();
        return response()->json(['available' => !$isTaken]);
    }
}

