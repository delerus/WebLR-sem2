@extends('layouts.app')

@section('title', 'Контакты')

@section('extra-css')
    @vite('resources/css/pages/contacts.css')
@endsection

@section('extra-js')

@endsection

@section('content')
    <main>
        <form id="contactForm" method="POST" action="{{ route('contacts.handle') }}">
            @csrf
            <h1>Связаться со мной</h1>

            <div class="input-group">
                <label for="fullName">Ваше имя:</label>
                <input type="text" id="fullName" name="fullName" value="{{ old('fullName') }}">
                @error('fullName')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group gender">
                <label>Пол:</label>
                <input type="radio" id="male" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }}>
                <label for="male">Мужской</label>
                <input type="radio" id="female" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
                <label for="female">Женский</label>
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group age">
                <label for="age">Возраст:</label>
                <select id="age" name="age">
                    <option value="under18" {{ old('age') === 'under18' ? 'selected' : '' }}>Меньше 18</option>
                    <option value="18to30" {{ old('age') === '18to30' ? 'selected' : '' }}>18-30</option>
                    <option value="31to50" {{ old('age') === '31to50' ? 'selected' : '' }}>31-50</option>
                    <option value="over50" {{ old('age') === 'over50' ? 'selected' : '' }}>Старше 50</option>
                </select>
                @error('age')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="phone">Номер телефона:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="birthDate">Дата рождения:</label>
                <input type="text" id="birthDate" name="birthDate" value="{{ old('birthDate') }}">
                @error('birthDate')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" id="submitBtn">Отправить</button>
                <button type="reset">Очистить форму</button>
            </div>
        </form>
    </main>

    <div id="modal-container"></div>
@endsection
