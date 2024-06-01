$(document).ready(function() {
    // Функция для проверки корректности заполнения поля E-mail
    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    // Функция для проверки корректности заполнения поля Номер телефона
    function validatePhone(phone) {
        var re = /^\+?\d{11}$/;
        return re.test(String(phone));
    }

    // Функция для обработки потери фокуса полем E-mail
    $("#email").on("blur", function() {
        var email = $(this).val();
        if (validateEmail(email)) {
            $(this).css("background-color", "#c8f7c5");
            $(this).next(".error").remove();
        } else {
            $(this).css("background-color", "#f7c5c5");
            if (!$(this).next(".error").length) {
                $(this).after("<span class='error'>Пожалуйста, введите корректный адрес электронной почты</span>");
            }
        }
        checkForm();
    });

    // Функция для обработки потери фокуса полем Номер телефона
    $("#phone").on("blur", function() {
        var phone = $(this).val();
        if (validatePhone(phone)) {
            $(this).css("background-color", "#c8f7c5");
            $(this).next(".error").remove();
        } else {
            $(this).css("background-color", "#f7c5c5");
            if (!$(this).next(".error").length) {
                $(this).after("<span class='error'>Пожалуйста, введите корректный номер телефона (10 цифр)</span>");
            }
        }
        checkForm();
    });

    // Функция для проверки активации кнопки отправки
    function checkForm() {
        var isValidEmail = validateEmail($("#email").val());
        var isValidPhone = validatePhone($("#phone").val());

        if (isValidEmail && isValidPhone && !$(".error").length) {
            $("#submitBtn").prop("disabled", false);
        } else {
            $("#submitBtn").prop("disabled", true);
        }
    }

    $("#submitBtn").hover(function() {
        if ($(this).prop("disabled")) {
            $(this).popover({
                content: "Пожалуйста, заполните форму корректно.",
                placement: "bottom"
            });
            $(this).popover("show");
            setTimeout(function() {
                $("#submitBtn").popover("destroy");
            }, 3000);
        }
    });

    // Показ модального окна подтверждения отправки формы
    $("#contactForm").submit(function(event) {
        event.preventDefault(); // Предотвращаем отправку формы по умолчанию
        $('#confirmModal').modal('show'); // Показываем модальное окно подтверждения
    });

    // Отправка формы после подтверждения
    $("#confirmSubmit").click(function() {
        $("#contactForm").off("submit"); // Удаляем обработчик submit, чтобы избежать циклического вызова
        $("#contactForm").submit(); // Отправляем форму
    });
});
