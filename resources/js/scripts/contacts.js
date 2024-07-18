document.addEventListener("DOMContentLoaded", function() {
    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }


    function validatePhone(phone) {
    var re = /^\+?\d{11}$/;
    return re.test(String(phone));
    }

    var emailInput = document.getElementById("email");
    var phoneInput = document.getElementById("phone");
    var submitBtn = document.getElementById("submitBtn");

    emailInput.addEventListener("blur", function() {
        var email = emailInput.value;
        if (validateEmail(email)) {
            emailInput.style.backgroundColor = "#c8f7c5";
            var errorSpan = emailInput.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains("error")) {
                errorSpan.remove();
            }
        } else {
            emailInput.style.backgroundColor = "#f7c5c5";
            if (!emailInput.nextElementSibling || !emailInput.nextElementSibling.classList.contains("error")) {
                var errorSpan = document.createElement("span");
                errorSpan.classList.add("error");
                errorSpan.textContent = "Пожалуйста, введите корректный адрес электронной почты";
                emailInput.insertAdjacentElement("afterend", errorSpan);
            }
        }
        checkForm();
    });

    phoneInput.addEventListener("blur", function() {
        var phone = phoneInput.value;
        if (validatePhone(phone)) {
            phoneInput.style.backgroundColor = "#c8f7c5";
            var errorSpan = phoneInput.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains("error")) {
                errorSpan.remove();
            }
        } else {
            phoneInput.style.backgroundColor = "#f7c5c5";
            if (!phoneInput.nextElementSibling || !phoneInput.nextElementSibling.classList.contains("error")) {
                var errorSpan = document.createElement("span");
                errorSpan.classList.add("error");
                errorSpan.textContent = "Пожалуйста, введите корректный номер телефона (10 цифр)";
                phoneInput.insertAdjacentElement("afterend", errorSpan);
            }
        }
        checkForm();
    });

    function checkForm() {
    var isValidEmail = validateEmail(emailInput.value);
    var isValidPhone = validatePhone(phoneInput.value);
    var emailError = emailInput.nextElementSibling;
    var phoneError = phoneInput.nextElementSibling;

    if (isValidEmail && isValidPhone && !emailError && !phoneError) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
    }
});
