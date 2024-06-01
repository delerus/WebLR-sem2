@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
<div class="lr1">
    <h1>Лабораторная работа #8</h1>
</div>

<section>
    <div class="profile">
        <img src="{{ asset('media/american-psycho-patrick-bateman.gif') }}" alt="Example GIF">
        <h1>Буквально я</h1>
    </div>
</section>
<div class="fio">
    <h1>Евгений Романович</h1>
    <p>ИС/б-21-1-о</p>
</div>
<div class="clear"></div>
@endsection