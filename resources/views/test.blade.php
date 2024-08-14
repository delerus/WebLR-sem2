@extends('layouts.app')

@section('title', 'Тест')

@section('extra-css')

@endsection

@section('extra-js')

@endsection

@section('content')
    <main>
        <section class="test" style="margin-top: calc(10px + 1%); display: flex; justify-content: center; text-align: center;">
            <div class="container">
                <h1 class="title" style="margin-bottom: 10px;">Тест по предмету "Основы электротехники и электроники"</h1>

                <form method="post" action="{{ route('test.submit') }}" class="contact__form form" id="test_form">
                    @csrf
                    <div class="form__group">
                        <div class="form__group-title">Вопрос 1: Какой тип элемента с тремя выводами?</div>

                        <input type="radio" name="question1" id="question1-1" value="Resistor">
                        <label for="question1-1">Резистор</label>

                        <input type="radio" name="question1" id="question1-2" value="Capacitor">
                        <label for="question1-2">Конденсатор</label>

                        <input type="radio" name="question1" id="question1-3" value="Inductor">
                        <label for="question1-3">Индуктивность</label>
                    </div>

                    <div class="form__group">
                        <div class="form__group-title">Вопрос 2: Как называется элемент, который изменяет свое сопротивление в зависимости от напряжения или тока?</div>
                        <select name="question2" id="question2">
                            <option value="1">Резистор</option>
                            <option value="2">Варистор</option>
                            <option value="3">Диод</option>
                            <option value="4">Транзистор</option>
                            <option value="5">Тиристор</option>
                        </select>
                    </div>

                    <div class="form__group">
                        <div class="form__group-title">Вопрос 3: Опишите кратко, что такое тиристор.</div>

                        <textarea name="question3" id="question3" rows="4" placeholder="Введите ваш ответ"></textarea>
                    </div>

                    <button class="primary-button" type="submit">Отправить</button>
                    <button class="secondary-button" type="reset">Очистить форму</button>
                </form>
            </div>
        </section>
    </main>

    <div id="modal-container"></div>
@endsection
