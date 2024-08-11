<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\FormValidation;

class ContactController extends Controller
{
    // Метод для отображения формы
    public function showForm()
    {
        return view('contacts');
    }

    // Метод для обработки отправленных данных
    public function handleForm(Request $request)
    {
        // Создаем экземпляр валидации
        $validator = new FormValidation();

        // Устанавливаем правила для полей формы
        $validator->setRule('fullName', 'isNotEmpty');
        $validator->setRule('email', 'isEmail');
        $validator->setRule('age', 'isNotEmpty');
        $validator->setRule('phone', 'isPhone');
        $validator->setRule('birthDate', 'isNotEmpty');

        // Валидация данных формы
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->showErrors())) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Обработка валидных данных
        // Здесь можно добавить код для сохранения данных или отправки email

        return redirect()->back()->with('success', 'Форма успешно отправлена!');
    }
}
