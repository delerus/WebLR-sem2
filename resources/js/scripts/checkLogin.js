$(document).ready(function() {
    $('#check-login-btn').on('click', function() {
        var login = $('#user_login').val(); // Получаем значение логина

        if (login === '') {
            alert('Введите логин');
            return;
        }

        $.ajax({
            url: '/check-login', // URL для проверки логина
            type: 'POST', // Метод запроса
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF токен
                login: login
            },
            success: function(response) {
                var resultElement = $('#login-check-result'); // Элемент для вывода результата
                if (response.available) {
                    resultElement.text('Логин доступен').css('color', 'green');
                } else {
                    resultElement.text('Логин занят').css('color', 'red');
                }
            },
            error: function(xhr) {
                alert('Ошибка: ' + xhr.responseText);
            }
        });
    });
});
