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

        @foreach ($interests as $interest)
            <div class="Interest" id="{{ $interest['id'] }}">
                <h1>
                    {{ $interest['name'] }}
                </h1>
                <p>
                    {{ $interest['desc'] }}
                </p>
                <picture>
                    <img src="/media/{{ $interest['img'] }}" alt="interest img placeholder">
                </picture>
            </div>
        @endforeach


    </div>
@endsection
