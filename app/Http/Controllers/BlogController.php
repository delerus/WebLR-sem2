<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Validators\FormValidation;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        // Инициализация валидатора
        $validator = new FormValidation();

        // Добавляем правила валидации
        $validator->setRule('title', 'isNotEmpty');
        $validator->setRule('content', 'isNotEmpty');

        // Выполняем валидацию
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if ($errors = $validator->errors()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        // Создаём новую запись блога
        $blogPost = new BlogPost();
        $blogPost->title = $request->input('title');
        $blogPost->content = $request->input('content');

        // Установка дат создания и обновления
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

        return redirect()->back();
    }


    public function index()
    {
        return view('admin_dashboard');
    }
}
