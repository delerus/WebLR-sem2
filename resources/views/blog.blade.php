@extends('layouts.app')

@section('title', 'Блог')

@section('extra-css')
    @vite('resources/css/pages/myblog.css')
@endsection

@section('content')
    <h1>Мой блог =)</h1>
    <a href="{{ url('/blog_admin') }}" class="admin">Админка</a>

    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->created_at }}</p>
            @if ($post->image_path)
                <img src="{{ asset($post->image_path) }}" alt="Blog Image">
            @endif
            <p>{{ $post->content }}</p>
        </div>
        <hr>
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
