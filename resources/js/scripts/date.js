document.addEventListener("DOMContentLoaded", function() {
    console.log('Скрипт загружен');
    function addZero(num) {
        return num < 10 ? "0" + num : num;
    }

    function getCurrentDateTime() {
        const months = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
        const currentDate = new Date();
        const hours = addZero(currentDate.getHours());
        const minutes = addZero(currentDate.getMinutes());
        const day = addZero(currentDate.getDate());
        const monthIndex = currentDate.getMonth();
        const year = String(currentDate.getFullYear());

        return `${hours}:${minutes} ${day} ${months[monthIndex]} ${year}`;
    }

    function updateDateTime() {
        const dateTimeElement = document.getElementById("currentDateTime");
        if (dateTimeElement) {
            dateTimeElement.textContent = getCurrentDateTime();
        }
    }

    setInterval(updateDateTime, 1000);
    updateDateTime(); // Обновляем сразу при загрузке страницы
});
