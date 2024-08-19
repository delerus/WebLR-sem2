<?php

namespace App\Models;

use App\Core\BaseActiveRecord;

class Message extends BaseActiveRecord
{
    protected $table = 'messages'; // Название таблицы
    protected $primaryKey = 'id'; // Первичный ключ
}
