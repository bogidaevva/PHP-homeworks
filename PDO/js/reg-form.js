"use strict";

document.forms.registration.addEventListener('submit', function(event){
    event.preventDefault();

    if (this.elements.login.value.trim() == "" || this.elements.test_password.value.trim() == "" || this.elements.password.value.trim() == "") {
        alert("Все поля являются обязательными для заполнения.");
        return;
    } else if (this.elements.test_password.value.trim() !== this.elements.password.value.trim()) {
        alert("Подтвердите пароль еще раз.");
        return;
    } else {
        this.submit();
    }
});
