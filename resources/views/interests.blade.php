@extends('layouts.app')

@section('title', 'Интересы')

@section('extra-css')
    @vite('resources/css/pages/interests.css')
@endsection

@section('extra-js')
    @vite('resources/js/scripts/interests.js')
@endsection

@section('content')
    <div class="content">
        <div class="InterestsList">
            <h1>Мои интересы</h1>
            <ul>
                
            </ul>
        </div>
        <div class="Interest" id="Games">
            <h1>
                Игры
            </h1>
            <p>
                В свободное время я в основном играю в видеоигры. 
                Мои <strong>ЛЮБИМЫЕ</strong> игры: Dota 2, Persona 5, Yakuza 0, Divinity: Original Sin 2.
            </p>
            <picture>
                <img src="{{ asset('media/games.jpg') }}" alt="games placeholder">
            </picture>
        </div>

        <div class="Interest" id="Games2">
            <h1>
                Игры2
            </h1>
            <p>
                Бывает, что обычные игры надоедают. Тогда я запускаю эти игры:
            </p>
            <picture>
                <img src="{{ asset('media/games2.png') }}" alt="games2 placeholder">
            </picture>
        </div>

        <div class="Interest" id="Films">
            <h1>
                Фильмы
            </h1>
            <p>
                Также люблю смотреть фильмы. Особенно люблю фильмы из тик ток эдитов с сигмами. Каждый день выделяю 1 час и 40 минут для просмотра фильма "Драйв", чтобы стать как Райан Гослинг.
            </p>
            <picture>
                <img src="{{ asset('media/films.jpg') }}" alt="films placeholder">
            </picture>
        </div>

        <div class="Interest" id="Sport">
            <h1>
                Спорт
            </h1>
            <p>
                Спорт это очень круто и полезно, но я предпочитаю пить пиво.
            </p>
            <picture>
                <img src="{{ asset('media/sport.jpg') }}" alt="sport placeholder">
            </picture>
        </div>

    </div>
@endsection