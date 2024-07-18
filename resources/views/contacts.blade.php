@extends('layouts.app')

@section('title', 'Контакты')

@section('extra-css')
    @vite('resources/css/pages/contacts.css')
@endsection

@section('extra-js')
    @vite('resources/js/scripts/contacts.js')
@endsection

@section('content')
    <main>
        <form id="contactForm">
            <h1>Связаться со мной</h1>
            <div class="input-group">
              <label for="fullName">Ваше имя:</label>
              <input type="text" id="fullName" name="fullName" required>
            </div>

            <div class="input-group gender">
              <label>Пол:</label><p></p>
              <input type="radio" id="male" name="gender" value="male" required>
              <label for="male">Мужской</label>
              <input type="radio" id="female" name="gender" value="female" required>
              <label for="female">Женский</label>
            </div>

            <div class="input-group age">
              <label for="age">Возраст:</label>
              <select id="age" name="age" required>
                <option value="under18">Меньше 18</option>
                <option value="18to30">18-30</option>
                <option value="31to50">31-50</option>
                <option value="over50">Старше 50</option>
              </select>
            </div>

            <div class="input-group">
              <label for="email">E-mail:</label>
              <input type="text" id="email">
            </div>

            <div class="input-group">
              <label for="email">Номер телефона:</label>
              <input type="text" id="phone">
            </div>

            <div class="input-group">
              <label for="birthDate">Дата рождения:</label>
              <input type="text" id="birthDate" name="birthDate" required>
            </div>

            <div class="button-group">
              <button type="submit" id="submitBtn" disabled>Отправить</button>
              <button type="reset">Очистить форму</button>
            </div>

          </form>

    </main>

    <div id="modal-container"></div>
@endsection
