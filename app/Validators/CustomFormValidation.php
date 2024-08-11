<?php

namespace App\Validators;

class CustomFormValidation extends FormValidation
{
    // Специальные проверки для тестов
    public function isCorrectAnswer($data, $correctAnswer)
    {
        if ($data !== $correctAnswer) {
            return "Ответ неправильный.";
        }
        return null;
    }

    // Дополнение метода validate для учета специальных правил
    public function validateTest($post_array, $correctAnswers)
    {
        $this->validate($post_array); // Вызов базовой валидации

        // Проверка правильности ответов
        foreach ($correctAnswers as $question => $correctAnswer) {
            $error = $this->isCorrectAnswer($post_array[$question], $correctAnswer);
            if ($error) {
                $this->errors[$question][] = $error;
            }
        }
    }
}
