<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use Illuminate\Http\Request;

class MyBlogController extends Controller
{
    public function index(Request $request)
    {
        // Получаем номер страницы из запроса или устанавливаем 1 по умолчанию
        $page = $request->input('page', 1);
        $perPage = 5; // Количество записей на одной странице

        // Получаем все записи блога из базы данных
        $allPosts = MyBlog::findAll();

        // Определяем общее количество страниц
        $totalPages = ceil(count($allPosts) / $perPage);

        // Ограничиваем выборку в соответствии с текущей страницей
        $posts = array_slice($allPosts, ($page - 1) * $perPage, $perPage);

        return view('blog', [
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }
}
