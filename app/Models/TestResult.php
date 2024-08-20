<?php

namespace App\Models;

use App\Core\BaseActiveRecord;

class TestResult extends BaseActiveRecord
{
    // Название таблицы в базе данных
    protected $table = 'test_results';

    // Поля таблицы
    protected $attributes = [
        'name' => null,
        'is_passed' => null,
        'open_question_answer' => null,
        'created_at' => null,  // Добавляем поле для даты
    ];
}
