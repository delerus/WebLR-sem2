<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Метод для добавления комментария
    public function addComment(Request $request)
    {
        // Проверка, авторизован ли пользователь (через сессию)
        if (!session('isLogged')) {
            return response()->json(['error' => 'Пользователь не авторизован'], 403);
        }

        // Проверка на наличие текста комментария
        $request->validate([
            'comment' => 'required|max:500',
            'post_id' => 'required|exists:blog_posts,id',
        ]);

        // Создание нового комментария
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => 1, // Взяли ID пользователя из сессии (нужно заранее сохранить его при логине)
            'comment' => $request->comment,
        ]);

        // Возвращаем успешный ответ с новыми данными
        return response()->json([
            'success' => true,
            'message' => 'Комментарий добавлен!',
            'comment' => [
                'author' => session('name'), // Имя пользователя из сессии
                'comment' => $request->comment,
                'created_at' => now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
