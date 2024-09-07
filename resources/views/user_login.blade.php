@extends('layouts.app')

@section('title', 'Вход для МАКСИМА')

@section('content')
    <h1> Вход от имени МАКСИМА </h1>
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
        <form action="{{ route('user.login') }}" method="POST">
    @csrf
        <input type="text" name="user_login" placeholder="Login" required><br>
        <input type="password" name="user_password" placeholder="Password" required><br>
        <input type="submit" value="Я УЖЕ МАКСИМ">
    </form>
    <button><a href="{{ url('/registration') }}">У МЕНЯ НЕТ АККАУНТА</a></button>
@endsection
