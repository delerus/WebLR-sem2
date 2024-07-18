document.addEventListener("DOMContentLoaded", function() {
    var fotos = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];
    var titles = [":3", "O_O", "Взорвал чето", "Ура, с др!", "После качалки", "Тоже взорвал чето.."];
    var albumList = document.getElementById("album");
    var modalContainer = document.getElementById("modal-container");
    var currentIndex = 0;

    // Функция для отображения модального окна с изображением
    function displayModal(imageSrc) {
        var modal = document.createElement("div");
        modal.classList.add("modal");

        var modalImage = document.createElement("img");
        modalImage.src = imageSrc;

        var closeButton = document.createElement("span");
        closeButton.textContent = "X";
        closeButton.classList.add("close-button");
        closeButton.addEventListener("click", function() {
            modal.remove();
        });

        modal.appendChild(modalImage);
        modal.appendChild(closeButton);
        modalContainer.innerHTML = "";
        modalContainer.appendChild(modal);
    }

    // Функция для обработки нажатия клавиш
    function handleKeyPress(event) {
        if (event.key === "ArrowLeft") {
            // Перейти к предыдущему изображению
            currentIndex = (currentIndex - 1 + fotos.length) % fotos.length;
            displayModal("/media/" + fotos[currentIndex]);
        } else if (event.key === "ArrowRight") {
            // Перейти к следующему изображению
            currentIndex = (currentIndex + 1) % fotos.length;
            displayModal("/media/" + fotos[currentIndex]);
        }
    }

    // Добавляем обработчик событий для клавиатуры
    document.addEventListener("keydown", handleKeyPress);

    // Отображение изображений в альбоме
    for (var i = 0; i < fotos.length; i++) {
        var listItem = document.createElement("li");
        var figure = document.createElement("figure");
        var image = document.createElement("img");
        image.setAttribute("src", "/media/" + fotos[i]);
        image.setAttribute("alt", "silly cat" + (i + 1));

        listItem.appendChild(figure);
        figure.appendChild(image);
        var figcaption = document.createElement("figcaption");
        figcaption.textContent = titles[i];
        figure.appendChild(figcaption);

        albumList.appendChild(listItem);

        // Добавляем обработчик событий для отображения модального окна при клике на изображение
        image.addEventListener("click", function(event) {
            displayModal(event.target.src);
            // Находим индекс текущего изображения
            currentIndex = fotos.indexOf(event.target.src.split("/").pop());
        });
    }
});
