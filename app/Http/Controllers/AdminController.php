<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\BlogPost;
use App\Validators\FormValidation;
use Illuminate\Http\Request;
use App\Models\VisitorsLog;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Session::get('isAdmin')) {
            return redirect()->route('admin.login');
        }

        $visits = VisitorsLog::orderBy('visited_at', 'desc')->paginate(10);

        return view('admin_dashboard', compact('visits'));
    }

    public function storeBlogPost(Request $request)
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

        Log::debug($request);
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

     // Метод для обработки загрузки файла
     public function uploadFile(Request $request)
     {
         // Загружаем файл во временное хранилище
         $file = $request->file('guestbook_file');

         // Заменяем старый файл на новый
         $file = $request->file('guestbook_file');
         $file->storeAs('messages', 'messages.inc');

         return redirect()->back()->with('success', 'Файл успешно загружен и заменен.');
     }

}
