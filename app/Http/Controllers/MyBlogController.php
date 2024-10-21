<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use App\Models\Comment; // Импортируем модель Comment
use Illuminate\Http\Request;

class MyBlogController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = 5;

        // Получаем все записи блога из базы данных
        $allPosts = MyBlog::with('comments.user')->paginate($perPage); // Загрузка комментариев

        return view('blog', [
            'posts' => $allPosts,
            'currentPage' => $page,
            'totalPages' => ceil($allPosts->total() / $perPage),
        ]);
    }
}

