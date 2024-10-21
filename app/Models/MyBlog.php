<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBlog extends Model
{
    use HasFactory;

    // Указываем название таблицы
    protected $table = 'blog_posts';

    // Указываем, какие атрибуты можно массово заполнять
    protected $fillable = [
        'title',
        'content',
        'image_path',
    ];

    // Определяем отношение с комментариями
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
