"use strict";

function showCakes(answer) {
    let cakes = document.querySelectorAll(".cake");
    Array.from(cakes).forEach(cake => cake.remove());
    answer.success.forEach(obj => {
    let cake = document.createElement("div");
    cake.classList.add("cake"); 

    cake.innerHTML = `
        <h4>${obj.title}</h4> 
        <p>${obj.price}</p> 
        <a href="/cake?id=${obj.id} ">Подробнее</a>`;

        document.body.append(cake);   
    });
}

function showMessage(answer) {
    let message =  document.createElement("p");
    message.innerText = answer.error;

    let cakes = document.querySelectorAll(".cake");
    Array.from(cakes).forEach(cake => cake.remove());
                
    document.body.append(message);
}

document.forms.price.addEventListener('submit', function(event) {
    event.preventDefault();

    if (this.elements.min.value.trim() == "" || this.elements.max.value.trim() == "") {
        alert("Введите параметры поиска.");
        return;
    } else if (parseInt(this.elements.min.value.trim()) > parseInt(this.elements.max.value.trim())) {
        alert("Проверьте корректность введенных параметров.");
        return;
    } else {
        let min = parseInt(this.elements.min.value.trim());
        let max = parseInt(this.elements.max.value.trim());


        fetch('/search_by_price?min=' + min + '&max=' + max).then(response => response.json())
        .then(answer => {
            if (Object.keys(answer)[0] == 'success') {
                if (document.querySelector("p") !== undefined) {
                    document.querySelector("p").remove();
                }
                showCakes(answer);
            } else {
                showMessage(answer);
            }
        })
    }
});

document.forms.title.addEventListener('submit', function(event) {
    event.preventDefault();

    if (this.elements.title.value.trim() == "") {
        alert("Введите название торта.");
        return;
    } else {
        let title = this.elements.title.value.trim();
        fetch('/search_by_title?title=' + title).then(response => response.json())
        .then(answer => {
            if (Object.keys(answer)[0] == 'success') {
                if (document.querySelector("p") !== undefined) {
                    document.querySelector("p").remove();
                }
                showCakes(answer);
            } else {
                showMessage(answer);
            }
        })
    }
});


