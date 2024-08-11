<?php

namespace App\Validators;

class FormValidation
{
    protected $rules = [];
    protected $errors = [];

    // Метод проверки на пустоту
    public function isNotEmpty($data)
    {
        if (empty(trim($data))) {
            return "Значение не должно быть пустым.";
        }
        return null;
    }

    // Метод проверки на целое число
    public function isInteger($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_INT)) {
            return "Значение должно быть целым числом.";
        }
        return null;
    }

    // Метод проверки на меньшее значение
    public function isLess($data, $value)
    {
        if ($this->isInteger($data) === null && $data < $value) {
            return "Значение должно быть не меньше $value.";
        }
        return null;
    }

    // Метод проверки на большее значение
    public function isGreater($data, $value)
    {
        if ($this->isInteger($data) === null && $data > $value) {
            return "Значение должно быть не больше $value.";
        }
        return null;
    }

    // Метод проверки на email
    public function isEmail($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return "Значение должно быть валидным email адресом.";
        }
        return null;
    }

    public function isPhone($data)
    {
        if (!preg_match("/^\+?\d{11}$/", $data)) {
            return "Значение должно быть владиным номером телефона";
        }
        return null;
    }

    // Метод установки правила
    public function setRule($field_name, $validator_name)
    {
        $this->rules[$field_name][] = $validator_name;
    }

    // Метод выполнения валидации
    public function validate($post_array)
    {
        foreach ($this->rules as $field_name => $validators) {
            if (!array_key_exists($field_name, $post_array)) {
                $this->errors[$field_name][] = "Поле $field_name отсутствует в данных.";
                continue;
            }

            foreach ($validators as $validator_name) {
                $error = $this->$validator_name($post_array[$field_name]);
                if ($error) {
                    $this->errors[$field_name][] = $error;
                }
            }
        }
    }

    // Метод получения ошибок
    public function errors()
    {
        return $this->errors;
    }

    // Метод вывода ошибок в формате HTML
    public function showErrors()
    {
        $html = "<ul>";
        foreach ($this->errors as $field_name => $errors) {
            foreach ($errors as $error) {
                $html .= "<li>$field_name: $error</li>";
            }
        }
        $html .= "</ul>";
        return $html;
    }
}
