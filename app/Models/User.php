<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users_data'; // Название таблицы
    protected $primaryKey = 'id'; // Первичный ключ
}
