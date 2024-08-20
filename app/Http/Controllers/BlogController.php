<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        // Валидация данных прямо в контроллере
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Создаём новую запись блога
        $blogPost = new BlogPost();
        $blogPost->title = $validatedData['title'];
        $blogPost->content = $validatedData['content'];

        $blogPost->created_at = now();
        $blogPost->updated_at = now();

        // Проверка наличия изображения и сохранение его пути
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'media/Blog/' . $filename;
            $file->move(public_path('media/Blog'), $filename);
            $blogPost->image_path = $path;
        }

        // Сохранение записи в базу данных
        $blogPost->save();

        return redirect()->route('blog.index')->with('success', 'Запись блога успешно добавлена!');
    }

    public function index()
    {
        return view('blog_admin');
    }
}
