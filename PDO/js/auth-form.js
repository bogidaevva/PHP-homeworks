"use strict";

document.forms.authorization.addEventListener('submit', function(event){
    event.preventDefault();

    if (this.elements.login.value.trim() == "" || this.elements.password.value.trim() == "") {
        alert("Все поля являются обязательными для заполнения.");
        return;
    } else {
        fetch('auth-handler.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(answer => {
                console.log(answer);
                if (answer == 'success') window.location.replace('account.php');
                else if (answer == 'invalid password' || answer == 'user not found') {
                    this.nextElementSibling.innerText = "Неверный логин или пароль.";
                } else {
                    this.nextElementSibling.innerText = "Возникла ошибка, попробуйте позднее.";
                }
            })
    }
});