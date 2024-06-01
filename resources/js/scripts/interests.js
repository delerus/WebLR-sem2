function createLists() {
    var interests = document.querySelectorAll(".Interest");
    
    var ul = document.createElement("ul");

    interests.forEach(function(interest) {

        var anchor = document.createElement("a");
        anchor.textContent = interest.querySelector("h1").textContent;
        anchor.href = "#" + interest.id;

        var li = document.createElement("li");
        li.appendChild(anchor);

        ul.appendChild(li);

        var interestsList = document.querySelector(".InterestsList ul");
        interestsList.appendChild(ul);
    });
}

document.addEventListener("DOMContentLoaded", createLists);
