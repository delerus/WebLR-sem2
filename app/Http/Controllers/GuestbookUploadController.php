<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestbookUploadController extends Controller
{
    // Метод для отображения формы загрузки
    public function showForm()
    {
        return view('admin_dashboard');
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
