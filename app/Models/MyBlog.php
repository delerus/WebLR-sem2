<?php

namespace App\Models;

use App\Core\BaseActiveRecord;

class MyBlog extends BaseActiveRecord
{
    protected $table = 'blog_posts'; // Название таблицы

    // Опционально можно определить атрибуты, если это необходимо
    protected $attributes = [
        'id',
        'title',
        'content',
        'image_path',
        'created_at',
        'updated_at',
    ];
}
