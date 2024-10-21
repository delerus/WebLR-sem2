@extends('layouts.app')

@section('title', 'Блог')

@section('extra-css')
    @vite('resources/css/pages/myblog.css')
@endsection

@section('content')
    <h1>Мой блог =)</h1>

    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->created_at }}</p>
            @if ($post->image_path)
                <img src="{{ asset($post->image_path) }}" alt="Blog Image">
            @endif
            <p>{{ $post->content }}</p>

            <!-- Список комментариев -->
            <div class="comments">
                @foreach ($post->comments as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at }})</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                @endforeach
            </div>

            @if (session('isLogged'))
                <!-- Кнопка для добавления комментария -->
                <button class="add-comment-btn" data-post-id="{{ $post->id }}">Добавить комментарий</button>
            @endif

            <hr>
        </div>

        <!-- Модальное окно для комментария -->
        @if (session('isLogged'))
            <div id="comment-modal-{{ $post->id }}" class="comment-modal" style="display: none;">
                <div class="modal-content">
                    <textarea id="comment-text-{{ $post->id }}" placeholder="Введите комментарий"></textarea>
                    <button class="submit-comment" data-post-id="{{ $post->id }}">Отправить</button>
                </div>
            </div>
        @endif
    @endforeach

    <!-- Пагинация -->
    <div class="pagination">
        @if ($currentPage > 1)
            <a href="{{ url('/blog?page=' . ($currentPage - 1)) }}">Previous</a>
        @endif

        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="{{ url('/blog?page=' . $i) }}" {{ $i == $currentPage ? 'style=color:red' : '' }}>{{ $i }}</a>
        @endfor

        @if ($currentPage < $totalPages)
            <a href="{{ url('/blog?page=' . ($currentPage + 1)) }}">Next</a>
        @endif
    </div>
@endsection

@section('extra-js')
    @vite('resources/js/scripts/addComment.js')
@endsection
