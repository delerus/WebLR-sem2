<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FormValidation;
use App\Models\User;

class UserLogController extends Controller
{
    public function index(Request $request){
        return view('user_login');
    }

    public function login(Request $request){
        // Инициализация валидатора
        $validator = new FormValidation();

        // Добавляем правила валидации
        $validator->setRule('user_login', 'isNotEmpty');
        $validator->setRule('user_password', 'isNotEmpty');

        // Выполняем валидацию
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if ($errors = $validator->errors()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $user = User::where('login', $request->user_login)->get();
        if ($user->isEmpty()){
            return redirect()->back()->withInput()->withError('Такого пользователя нет');
        }
        $user = $user[0];
        if ($user->password != md5($request->user_password)){
            return redirect()->back()->withInput()->withError('Неверный пароль');
        }
        session(['name' => $user->name]);
        session(['isLogged' => 1]);

        return redirect("/");
    }

    public function logout(){
        session(['isLogged' => 0]);
        return redirect()->back();
    }
}
