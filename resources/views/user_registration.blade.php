@extends('layouts.app')

@section('title', 'ВХОД')

@section('extra-css')

@endsection

@section('content')
    <h1> РЕГИСТРАЦИЯ МАКСИМА </h1>
    @if(session('error'))
        @php
            echo $errors->first('login');
            echo $errors->first('email');
        @endphp
    @endif
        <form action="{{ route('user.registration') }}" method="POST">
    @csrf
        <input type="text" name="user_login" placeholder="Login" required><br>
        <input type="text" name="user_password" placeholder="Password" required><br>
        <input type="text" name="user_name" placeholder="Name" required><br>
        <input type="email" name="user_email" placeholder="Email" required><br>
        <input type="submit" value="МАКСИМ">
@endsection
