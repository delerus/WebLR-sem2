@extends('layouts.app')

@section('title', 'Обо мне')

@section('extra-css')
    @vite('resources/css/pages/about.css')
@endsection

@section('content')
    <div class="content">
        <section>
            <p>Этапы жизни человека:</p>
            <p>1) Рождение</p>
            <p>2) <img src="{{ asset('media/lr1.png') }}" alt="lr1"></p>
            <p>3) Смерть</p>
        </section>
    </div>
@endsection