<?php

namespace App\Validators;

class ResultsVerification extends CustomFormValidation
{

    public function validateTest($post_array, $correctAnswers)
    {
        // Выполняем базовую валидацию
        $this->validate($post_array);

        // Проверка правильности ответов на тест
        foreach ($correctAnswers as $question => $correctAnswer) {
            if (array_key_exists($question, $post_array)) {
                $error = $this->isCorrectAnswer($post_array[$question], $correctAnswer);
                if ($error) {
                    $this->errors[$question][] = $error;
                }
            } else {
                $this->errors[$question][] = "Ответ на вопрос $question не был выбран.";
            }
        }
    }
}
