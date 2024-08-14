@extends('layouts.app')

@section('title', 'Тест')

@section('extra-css')

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

                        <input type="radio" name="question1" id="question1-1" value="Резистор" {{ old('question1') == 'Резистор' ? 'checked' : '' }}>
                        <label for="question1-1">Резистор</label>

                        <input type="radio" name="question1" id="question1-2" value="Конденсатор" {{ old('question1') == 'Конденсатор' ? 'checked' : '' }}>
                        <label for="question1-2">Конденсатор</label>

                        <input type="radio" name="question1" id="question1-3" value="Индуктивность" {{ old('question1') == 'Индуктивность' ? 'checked' : '' }}>
                        <label for="question1-3">Индуктивность</label>
                    </div>

                    <div class="form__group">
                        <div class="form__group-title">Вопрос 2: Как называется элемент, который изменяет свое сопротивление в зависимости от напряжения или тока?</div>
                        <select name="question2" id="question2">
                            <option value="1" {{ old('question2') == '1' ? 'selected' : '' }}>Резистор</option>
                            <option value="2" {{ old('question2') == '2' ? 'selected' : '' }}>Варистор</option>
                            <option value="3" {{ old('question2') == '3' ? 'selected' : '' }}>Диод</option>
                            <option value="4" {{ old('question2') == '4' ? 'selected' : '' }}>Транзистор</option>
                            <option value="5" {{ old('question2') == '5' ? 'selected' : '' }}>Тиристор</option>
                        </select>
                    </div>

                    <div class="form__group">
                        <div class="form__group-title">Вопрос 3: Опишите кратко, что такое тиристор.</div>
                        <textarea name="question3" id="question3" rows="4" >{{ old('question3') }}</textarea>
                    </div>

                    <button class="primary-button" type="submit">Отправить</button>
                    <button class="secondary-button" type="reset">Очистить форму</button>

                    @if($errors->any())
                        <div class="error-messages" style="margin-top: 20px; color: red;">
                            <h4>Результаты теста:</h4>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @elseif(session('success'))
                        <div class="success-message" style="margin-top: 20px; color: green;">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </section>
    </main>

    <div id="modal-container"></div>
@endsection