@extends('layouts.app')

@section('title', 'Гостевая книга')

@section('extra-css')
    @vite('resources/css/pages/guestbook.css')
@endsection

@section('content')
    <main>
        <section>
            <h1>Гостевая книга</h1>

            <a href="{{ url('/guestbook_admin') }}" class="admin">Админка</a>

            <!-- Форма для отправки сообщения -->
            <form method="post" action="{{ route('guestbook.submit') }}">
                @csrf
                <div>
                    <label for="name">Фамилия, Имя, Отчество</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Текст отзыва</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit">Отправить</button>
            </form>

            <!-- Таблица сообщений -->
            <h2>Сообщения</h2>
            <table>
                <thead>
                    <tr>
                        <th>Дата</th>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Текст отзыва</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message['created_at'] }}</td>
                            <td>{{ $message['name']}}</td>
                            <td>{{ $message['email'] }}</td>
                            <td>{{ $message['message'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
