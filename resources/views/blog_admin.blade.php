@extends('layouts.app')

@section('title', 'Редактор Блога')

@section('content')
    <h1>Добавить запись блога</h1>

    <!-- Отображение сообщений об успехе и ошибках -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Форма для добавления записи блога -->
    <form action="{{ route('admin_blog.store') }}" method="POST" enctype="multipart/form-data">
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
@endsection


