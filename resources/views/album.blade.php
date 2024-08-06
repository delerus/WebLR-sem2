@extends('layouts.app')

@section('title', 'Фотоальбом')

@section('extra-css')
    @vite('resources/css/pages/album.css')
@endsection

@section('content')
    <main>
        <ul id="album">
            @foreach ($photos as $photo)
                <li>
                    <img src="/media/{{ $photo['file_name'] }}" alt="{{ $photo['caption'] }}">
                    <p>{{ $photo['caption'] }}</p>
            @endforeach
        </ul>
    </main>

    <div id="modal-container"></div>
@endsection
