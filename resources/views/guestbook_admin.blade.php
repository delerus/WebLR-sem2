@extends('layouts.app')

@section('title', 'Гостевая книга (Админка)')

@section('extra-css')
    @vite('resources/css/pages/guestbook.css')
@endsection

@section('content')
    <h1 style="text-align: center; margin: 10% 0 1% 0">Загрузка комментариев гостевой книги</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guestbook.upload.file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="guestbook_file" style="text-align: center">Выберите файл messages.inc:</label>
        <input type="file" name="guestbook_file" id="guestbook_file" required style="margin: 10px">
        <button type="submit">Загрузить файл</button>
    </form>
@endsection
