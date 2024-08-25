@extends('layouts.app')

@section('title', 'Загрузить блог')

@section('extra-css')

@endsection

@section('content')
    <h1>Загрузка сообщений блога из CSV файла</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('upload-blog.handle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="csv_file">Выберите CSV файл:</label>
            <input type="file" name="csv_file" id="csv_file" required>
        </div>
        <button type="submit">Загрузить</button>
    </form>
@endsection
