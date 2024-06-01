// history.js

document.addEventListener("DOMContentLoaded", function() {
    // Получаем данные из sessionStorage или создаем новый объект, если данных еще нет
    var sessionHistory = JSON.parse(sessionStorage.getItem("sessionHistory")) || {};

    // Получаем текущий путь страницы (URL без домена и параметров)
    var currentPage = location.pathname;

    // Увеличиваем количество посещений текущей страницы
    sessionHistory[currentPage] = (sessionHistory[currentPage] || 0) + 1;

    // Сохраняем обновленные данные в sessionStorage
    sessionStorage.setItem("sessionHistory", JSON.stringify(sessionHistory));

    // Получаем таблицу истории из DOM
    var tableBody = document.querySelector("#sessionHistory tbody");

    // Очищаем содержимое таблицы
    tableBody.innerHTML = "";

    // Заполняем таблицу данными из sessionStorage
    for (var page in sessionHistory) {
        var row = document.createElement("tr");
        var pageCell = document.createElement("td");
        var countCell = document.createElement("td");
        pageCell.textContent = page;
        countCell.textContent = sessionHistory[page];
        row.appendChild(pageCell);
        row.appendChild(countCell);
        tableBody.appendChild(row);
    }
});
