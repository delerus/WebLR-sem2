<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Validators\FormValidation;
use Illuminate\Http\Request;

class CSVUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_blog');
    }

    public function handleUpload(Request $request)
    {
        // Валидация загруженного файла
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        // Получаем файл
        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Чтение содержимого файла
        if (($handle = fopen($path, "r")) !== FALSE) {
            $header = fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) !== count($header)) {
                    continue; // Пропускаем строки с неверным количеством столбцов
                }

                $row = array_combine($header, $data);

                // Инициализация валидатора
                $validator = new FormValidation();
                $validator->setRule('title', 'isNotEmpty');
                $validator->setRule('content', 'isNotEmpty');
                $validator->validate($row);

                // Проверка на наличие ошибок
                if ($validator->errors()) {
                    return redirect()->back()->withErrors($validator->showErrors())->withInput();
                }

                // Создание и сохранение новой записи блога
                $blogPost = new BlogPost();
                $blogPost->title = $row['title'];
                $blogPost->content = $row['content'];
                $blogPost->created_at = $row['created_at'];
                $blogPost->updated_at = $row['created_at']; // Заполняем updated_at таким же значением, как created_at
                $blogPost->save();
            }
            fclose($handle);
        }

        return redirect()->route('blog.index')->with('success', 'Записи успешно загружены.');
    }
}
