<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\ResultsVerification;
use Illuminate\Support\Facades\DB; // Для работы с базой данных
use App\Models\TestResult;

class TestController extends Controller
{
    // Отображение формы теста и списка результатов
    public function showForm()
    {
        // Получаем все результаты тестов
        $testResults = TestResult::findAll();

        // Возвращаем вид с данными о результатах
        return view('test', ['testResults' => $testResults]);
    }

    // Обработка данных теста
    public function handleForm(Request $request)
    {
        // Правильные ответы для теста
        $correctAnswers = [
            'question1' => 'Резистор',  // Ответ на вопрос 1
            'question2' => '2',         // Ответ на вопрос 2
        ];

        // Валидация полей
        $request->validate([
            'name' => 'required|string',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
        ]);

        // Проверка правильности ответов
        $is_passed = (
            $request->input('question1') === $correctAnswers['question1'] &&
            $request->input('question2') === $correctAnswers['question2']
        ) ? true : false;

        // Сохранение результатов
        $testResult = new TestResult();
        $testResult->name = $request->input('name');
        $testResult->is_passed = $is_passed;
        $testResult->open_question_answer = $request->input('question3');
        $testResult->created_at = date('Y-m-d H:i:s');  // Сохраняем текущую дату и время
        $testResult->save();

        // Перезагрузка страницы с сообщением об успешной отправке
        return redirect()->back()->with('success', 'Ваши ответы были успешно сохранены!');
    }
}
