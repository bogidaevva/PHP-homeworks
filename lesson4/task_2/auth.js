"use strict";

let user = document.querySelector('.user');
let form = document.getElementsByTagName('form')[0];
user.addEventListener('click', () => {
    form.classList.add('show');
});

form.addEventListener('submit', function(event) {
    event.preventDefault();

    let fd = new FormData();

    if (this.elements.login.value.trim() == "" || this.elements.password.value.trim() == "") {
        document.getElementsByTagName("span")[0].innerText = "Убедитесь, что все поля заполнены.";
        document.getElementsByTagName("span")[0].className = "show";
        return;
    } else {
        fd.append('login', form.elements.login.value);
        console.log(form.elements.login.value);
        fd.append('password', form.elements.password.value);
        console.log(form.elements.password.value);
    }

    // for (var pair of fd.entries()) {
    //     console.log(pair[0]+ ', '+ pair[1]); 
    // }

    fetch('handler.php', {
        method: 'POST',
        body: fd
    }).then(response => response.text())
    .then(answer => {
        if (answer == 1) {
            form.classList.remove("show");
            document.getElementsByTagName("p")[0].innerText = "Пользователь успешно авторизован";
        } else {
            document.getElementsByTagName("span")[0].innerText = "Не удалось найти пользователя с таким логином или паролем.";
            document.getElementsByTagName("span")[0].className = "show";
        }
    });
});