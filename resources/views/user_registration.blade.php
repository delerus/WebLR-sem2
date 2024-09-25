@extends('layouts.app')

@section('title', 'Регистрация пользователя')

@section('extra-css')

@endsection

@section('content')
    <h1>Регистрация пользователя</h1>
    @if(session('error'))
        @php
            echo $errors->first('login');
            echo $errors->first('email');
        @endphp
    @endif
    <form id="registration-form">
        @csrf
        <div>
            <input type="text" name="user_login" id="user_login" placeholder="Login" required><br>
            <button type="button" id="check-login-btn">Проверить логин</button> <!-- Кнопка проверки логина -->
        </div>
        <input type="password" name="user_password" placeholder="Password" required><br>
        <input type="text" name="user_name" placeholder="Name" required><br>
        <input type="email" name="user_email" placeholder="Email" required><br>
        <input type="submit" value="Зарегистрироваться">
    </form>

    <p id="login-check-result"></p> <!-- Вывод результата проверки логина -->
@endsection

@section('extra-js')
    @vite('resources/js/scripts/checkLogin.js')
@endsection
