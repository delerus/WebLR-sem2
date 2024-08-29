<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Message;

class GuestbookController extends Controller
{
    // Отображение страницы гостевой книги
    public function showForm(Request $request)
    {
        VisitorsLogController::logVisit($request);
        $messages = $this->getMessagesFromFile();
        return view('guestbook', ['messages' => $messages]);
    }

    // Обработка отправленного сообщения
    public function submitForm(Request $request)
    {
        // Валидируем запрос
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Формируем строку для записи
        $line = now()->format('Y-m-d H:i:s') . ';' . $validated['name'] . ';' . $validated['email'] . ';' . $validated['message'] . PHP_EOL;

        // Записываем строку в файл
        Storage::append('messages/messages.inc', $line);

        // Перенаправляем пользователя обратно с успехом
        return redirect()->back()->with('success', 'Ваше сообщение успешно добавлено.');
    }

    public function getMessagesFromFile()
    {
        // Читаем содержимое файла
        $content = Storage::get('messages/messages.inc');

        // Разбиваем файл на строки
        $lines = explode(PHP_EOL, $content);

        $messages = [];

        foreach ($lines as $line) {
            if (!empty($line)) {
                // Разделяем данные строки на массив
                $data = explode(';', $line);

                // Собираем сообщения в массив
                $messages[] = [
                    'created_at' => $data[0],
                    'name' => $data[1],
                    'email' => $data[2],
                    'message' => $data[3],
                ];
            }
        }

        // Сортировка по дате убывания
        usort($messages, function ($a, $b) {
            return strtotime($b['created_at']) <=> strtotime($a['created_at']);
        });

        return $messages;
    }
}
