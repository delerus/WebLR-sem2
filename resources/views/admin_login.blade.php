@extends('layouts.app')

@section('title', 'Вход для администратора')

@section('content')
    <h1> Вход от имени администратора </h1>
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
        <form action="{{ route('admin.login') }}" method="POST">
    @csrf
        <input type="text" name="admin_login" placeholder="Login" required><br>
        <input type="password" name="admin_password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>
@endsection
