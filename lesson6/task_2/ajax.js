"use strict";

document.forms.registration.addEventListener('submit', function(event){
    event.preventDefault();

    if (this.elements.login.value.trim() == "" || this.elements.password.value.trim() == "") {
        alert("Поля являются обязательными для заполнения.")
        return;
    } else {
        fetch('handler.php', {
            method: 'post',
            body: new FormData(this)
        }).then(response => response.text())
            .then(answer => {
                if (answer == 1) {
                    alert("Регистрация прошла успешно!")
                }
                if (answer == 0) {
                    alert("Пользователь с таким логином уже зарегистрирован.")
                }
                if (answer == 'error') {
                    alert("Произошла ошибка.")
                }
            })
    }
});