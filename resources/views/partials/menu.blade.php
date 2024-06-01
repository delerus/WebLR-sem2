<div class="menu">
    <ul>
        <li><a href="{{ url('/') }}">Главная страница</a></li>
        <li><a href="{{ url('/about') }}">Обо мне</a></li>
        <li>
            <a href="{{ url('/interests') }}">Мои интересы</a>
            <ul>
                <li><a href="{{ url('/interests#Games') }}">Игры</a></li>
                <li><a href="{{ url('/interests#Games2') }}">Игры2</a></li>
                <li><a href="{{ url('/interests#Films') }}">Фильмы</a></li>
                <li><a href="{{ url('/interests#Sport') }}">Спорт</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/study') }}">Учеба</a></li>
        <li><a href="{{ url('/album') }}">Фотоальбом</a></li>
        <li><a href="{{ url('/contacts') }}">Контакт</a></li>
        <li><a href="{{ url('/test') }}">Тест</a></li>
        <li><a href="{{ url('/history') }}">История просмотра</a></li>
    </ul>
    <div id="currentDateTime"></div>
</div>