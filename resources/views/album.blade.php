@extends('layouts.app')

@section('title', 'Фотоальбом')

@section('extra-css')
    @vite('resources/css/pages/album.css')
@endsection

@section('extra-js')
    @vite('resources\js\scripts\album.js')
    @vite('https://code.jquery.com/jquery-3.6.0.min.js')
@endsection

@section('content')
    <main>
        <ul id="album"></ul>
    </main>

    <div id="modal-container"></div>
@endsection
