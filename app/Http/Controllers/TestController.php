<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\ResultsVerification;

class TestController extends Controller
{
    // Отображение формы теста
    public function showForm()
    {
        return view('test');
    }

    // Обработка данных теста
    public function handleForm(Request $request)
    {
        // Инициализируем валидацию
        $validator = new ResultsVerification();

        // Устанавливаем правила для базовой валидации
        $validator->setRule('question1', 'isNotEmpty');
        $validator->setRule('question2', 'isNotEmpty');
        $validator->setRule('question3', 'isNotEmpty');

        // Правильные ответы для теста
        $correctAnswers = [
            'question1' => 'Resistor',  // Ответ на вопрос 1
            'question2' => '2',         // Ответ на вопрос 2
        ];

        // Выполняем проверку теста
        $validator->validateTest($request->all(), $correctAnswers);

        // Если есть ошибки
        if (!empty($validator->errors())) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Если все ответы верны
        return redirect()->back()->with('success', 'Вы успешно прошли тест!');
    }
}
