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
            'question1' => 'Резистор',  // Ответ на вопрос 1
            'question2' => '2',         // Ответ на вопрос 2
        ];

        // Выполняем проверку теста
        $validator->validateTest($request->all(), $correctAnswers);

        // Проверяем, есть ли ошибки
        $errors = $validator->errors();

        // Инициализируем переменные для общего вывода ошибок
        $hasIncorrectAnswers = false;
        $hasEmptyFields = false;

        // Проходимся по ошибкам и устанавливаем соответствующие флаги
        foreach ($errors as $question => $messages) {
            foreach ($messages as $message) {
                if (strpos($message, 'Ответ на вопрос') !== false && strpos($message, 'не был выбран') !== false) {
                    $hasEmptyFields = true;
                } elseif (strpos($message, 'Ответ неправильный') !== false) {
                    $hasIncorrectAnswers = true;
                }
            }
        }

        // Формируем итоговые сообщения об ошибках
        $finalErrors = [];
        if ($hasEmptyFields) {
            $finalErrors[] = 'Есть незаполненные поля.';
        }
        if ($hasIncorrectAnswers) {
            $finalErrors[] = 'Есть неверные ответы.';
        }

        // Если есть финальные ошибки, возвращаем пользователя на форму с этими ошибками
        if (!empty($finalErrors)) {
            return redirect()->back()->withErrors($finalErrors)->withInput();
        }

        // Если все ответы верны, передаем сообщение об успехе
        return redirect()->back()->with('success', 'Вы успешно прошли тест!');
    }
}
