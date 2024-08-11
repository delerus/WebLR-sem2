<?php

namespace App\Validators;

class ResultsVerification extends CustomFormValidation
{
    public function verifyResults($post_array, $correctAnswers)
    {
        $this->validateTest($post_array, $correctAnswers);
        return empty($this->errors);
    }

    public function displayResults()
    {
        return $this->showErrors();
    }
}

