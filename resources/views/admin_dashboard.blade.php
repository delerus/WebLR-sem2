@extends('layouts.app')

@section('title', 'Админ-панель')

@section('content')
   <!-- Форма для добавления записи в блог -->
   <h1>Добавить запись в блог</h1>
<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">Тема сообщения:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div>
        <label for="image_path">Изображение:</label>
        <input type="file" id="image_path" name="image_path">
    </div>
    <div>
        <label for="content">Текст сообщения:</label>
        <textarea id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
    </div>
    <div>
        <button type="submit">Добавить запись</button>
    </div>
</form>

<!-- Форма для загрузки CSV -->
<h1>Загрузить записи в блог</h1>
<form action="{{ route('csv.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('csv.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="csv_file">Выберите CSV файл:</label>
            <input type="file" name="csv_file" id="csv_file" required>
        </div>
        <button type="submit">Загрузить</button>
    </form>
</form>

<!-- Форма для загрузки файла в гостевую книгу -->
<h1>Загрузить записи в гостевую книгу</h1>
<form action="{{ route('guestbook.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="guestbook_file" style="text-align: center">Выберите файл messages.inc:</label>
    <input type="file" name="guestbook_file" id="guestbook_file" required style="margin: 10px">
    <button type="submit">Загрузить файл</button>
</form>

<!-- Информация о посещениях -->
<h1>Докс сват</h1>

    <table>
        <thead>
            <tr>
                <th>Дата и время</th>
                <th>Посещённая страница</th>
                <th>IP-адрес</th>
                <th>Имя хоста</th>
                <th>Браузер</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
                <tr>
                    <td>{{ $visit->visited_at }}</td>
                    <td>{{ $visit->page_visited }}</td>
                    <td>{{ $visit->ip_address }}</td>
                    <td>{{ $visit->host_name }}</td>
                    <td>{{ $visit->browser_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $visits->links() }}
    </div>

@endsection

