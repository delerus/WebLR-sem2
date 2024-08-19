<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class GuestbookController extends Controller
{
    // Отображение страницы гостевой книги
    public function showForm()
    {
        $messages = Message::findAll();
        return view('guestbook', ['messages' => $messages]);
    }

    // Обработка отправленного сообщения
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->created_at = now();
        $message->save();

        return redirect()->route('guestbook.show')->with('success', 'Сообщение успешно отправлено!');
    }
}
